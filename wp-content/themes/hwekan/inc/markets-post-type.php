<?php
require_once "custom-post-type.php";

class MarketPostType implements CustomPostType
{
    public $key = "markets";

    static public function manage()
    {
        $instance = new self;

        $instance->register_post_type();
    }

    public function register_post_type()
    {
        register_post_type($this->key, array(
            'labels' => array(
                'name' => 'Marchés',
                'singular_name' => 'Marché',
                'menu_name' => 'Marchés',
                'add_new' => 'Ajouter un marché',
                'add_new_item' => 'Ajouter un nouveau marché',
                'edit_item' => 'Modifier le marché',
                'new_item' => 'Nouveau Marché',
                'view_item' => 'Voir Marché',
                'not_found' => 'Aucun Marché trouvé',
            ),
            'public' => true,
            'menu_icon' => 'dashicons-megaphone',
            'menu_position' => 20,
            'supports' => array('title'),
            'has_archive' => true,
            'rewrite' => array('slug' => 'markets'),
        ));
    }
}
