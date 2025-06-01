<?php
require_once 'inc/menu.php';
require_once 'inc/components.php';
require_once "inc/partner-post-type.php";
require_once "inc/mission-post-type.php";
require_once "inc/markets-post-type.php";
require_once "inc/event-post-type.php";
require_once "inc/team-post-type.php";
require_once "inc/offer-post-type.php";
require_once "inc/project-post-type.php";
require_once "inc/ressources-post-type.php";
require_once 'inc/acf-fields.php';
require_once 'inc/model-component.php';

ini_set('display_errors', '0');
define('WP_DEBUG_DISPLAY', false);


function nothing()
{
    return;
}

$GLOBALS["VERSION"] = "0.0.11";

function anmh_theme_scripts()
{
    // Style
    wp_enqueue_style('tailwind', get_template_directory_uri() . "/tailwindcss.css", array(), $GLOBALS["VERSION"]);

    // Javascript
    wp_enqueue_script('main', get_template_directory_uri() . "/assets/js/main.js", array(), $GLOBALS["VERSION"], true);
}

add_action('wp_enqueue_scripts', 'anmh_theme_scripts');
function anmh_theme_supports()
{
    add_theme_support(('title-tag'));
    add_theme_support(('post-thumbnails'));
    add_theme_support('html5', array('search-form'));
    add_theme_support('admin-bar', array("callback" => "nothing"));
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'anmh_theme_supports');

function anmh_custom_post_type()
{
    PartnerPostType::manage();
    MissionPostType::manage();
    EventPostType::manage();
    TeamPostType::manage();
    ProjectPostType::manage();
    MarketPostType::manage();
    OfferPostType::manage();
    RessourcePostType::manage();
}

function anmh_init()
{
    $menu = new Menu();
    $menu->setup_nav_menus();
    $menu->setup_pages();
    anmh_custom_post_type();
}

add_action('init', 'anmh_init');

// ------------------ Search Form ---------------
function custom_search_filter($query)
{
    if (!is_page('ressourcefulness') && !is_admin() && $query->is_search) {
        return $query;
    }
    if (!is_admin() && $query->is_search) {

        // Récupérer le type de recherche
        $search_type = isset($_GET['search_type']) ? sanitize_text_field($_GET['search_type']) : 'event';

        $query->set('post_type', $search_type);
        $query->set('posts_per_page', 12);
    }
    return $query;
}
add_action('pre_get_posts', 'custom_search_filter');


// Options ACF
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'   => 'ANMH option page',
        'menu_title'  => 'Options thème',
        'menu_slug'   => 'theme-general-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false,
        'position'      => 2
    ));
}
