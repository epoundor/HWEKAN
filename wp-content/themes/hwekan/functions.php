<?php
require_once 'inc/menu.php';
require_once 'inc/acf-fields.php';
require_once 'inc/components.php';
require_once 'inc/portrait-post-type.php';
require_once 'inc/documentation-post-type.php';
require_once 'inc/interview-post-type.php';
require_once 'inc/agenda-post-type.php';
require_once 'inc/opportunity-post-type.php';
require_once 'inc/partner-post-type.php';

require_once 'inc/model-component.php';

ini_set('display_errors', '0');
define('WP_DEBUG_DISPLAY', false);


function nothing()
{
    return;
}

$GLOBALS["VERSION"] = "0.0.7";

function hwekan_theme_scripts()
{
    // Style
    wp_enqueue_style('tailwind', get_template_directory_uri() . "/tailwindcss.css", array(), $GLOBALS["VERSION"]);

    // Javascript
    // wp_enqueue_script('main', get_template_directory_uri() . "/assets/js/main.js", array(), $GLOBALS["VERSION"], true);
}

add_action('wp_enqueue_scripts', 'hwekan_theme_scripts');
function hwekan_theme_supports()
{
    add_theme_support(('title-tag'));
    add_theme_support(('post-thumbnails'));
    add_theme_support('html5', array('search-form'));
    add_theme_support('admin-bar', array("callback" => "nothing"));
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'hwekan_theme_supports');

function hwekan_custom_post_type()
{
    PortraitPostType::manage();
    DocumentationPostType::manage();
    InterviewPostType::manage();
    PartnerPostType::manage();
    AgendaPostType::manage();
    OpportunityPostType::manage();
}

function hwekan_init()
{
    $menu = new Menu();
    $menu->setup_nav_menus();
    $menu->setup_pages();
    hwekan_custom_post_type();
}

add_action('init', 'hwekan_init');

// ------------------ Search Form ---------------
// function custom_search_filter($query)
// {
//     if (!is_page('ressourcefulness') && !is_admin() && $query->is_search) {
//         return $query;
//     }
//     if (!is_admin() && $query->is_search) {

//         // Récupérer le type de recherche
//         $search_type = isset($_GET['search_type']) ? sanitize_text_field($_GET['search_type']) : 'event';

//         $query->set('post_type', $search_type);
//         $query->set('posts_per_page', 12);
//     }
//     return $query;
// }
// add_action('pre_get_posts', 'custom_search_filter');


// Options ACF
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'   => 'hwekan option page',
        'menu_title'  => 'Options thème',
        'menu_slug'   => 'theme-general-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false,
        'position'      => 2
    ));
}

add_action('rest_api_init', function () {
    register_rest_route('hwekan', '/filters', [
        'methods' => 'GET',
        'callback' => function ($req) {
            $slug = $req['slug'];
            $args = [
                'post_type' => $slug,
                'post_status' => 'publish',
                'posts_per_page' => 3,
            ];
            $posts = get_posts($args);
            return array_map(function ($p) {
                $fields = function_exists('get_fields') ? get_fields($p->ID) : [];
                // Image à la une
                $featured_image = get_the_post_thumbnail_url($p->ID, 'full');
                // Taxonomies associées
                $taxonomies = get_object_taxonomies($p->post_type, 'names');
                $terms = [];
                foreach ($taxonomies as $tax) {
                    $terms[$tax] = wp_get_post_terms($p->ID, $tax, ['fields' => 'all']);
                }
                return [
                    'id'              => $p->ID,
                    'slug'            => $p->post_name,
                    // 'type'            => $p->post_type,
                    'title'           => get_the_title($p),
                    // 'content'         => apply_filters('the_content', $p->post_content),
                    'excerpt'         => get_the_excerpt($p),
                    'date'            => $p->post_date,
                    // 'modified'        => $p->post_modified,
                    // 'status'          => $p->post_status,
                    'author'          => get_the_author_meta('display_name', $p->post_author),
                    'featured_image'  => $featured_image,
                    'acf'             => $fields,
                    // 'taxonomies'      => $terms,
                    // 'meta'            => get_post_meta($p->ID),
                ];
            }, $posts);
        }
    ]);
});


// Limiter l’extrait à 20 mots
function custom_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');

function custom_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

// Constants
$GLOBALS['menus'] = [
    [
        "label" => "Parutions",
        "slug" => "post"
    ],
    [
        "label" => "Opportunités",
        "slug" => "opportunity"
    ],
    [
        "label" => "Interviews",
        "slug" => "interview"
    ],
    [
        "label" => "Agenda culturel",
        "slug" => "agenda"
    ],
    [
        "label" => "Documentations",
        "slug" => "documentation"
    ],
    [
        "label" => "Portraits",
        "slug" => "portrait"
    ],
];