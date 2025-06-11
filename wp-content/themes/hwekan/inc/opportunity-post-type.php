<?php
require_once "custom-post-type.php";

class OpportunityPostType implements CustomPostType
{
    public $key = "opportunity";

    static public function manage()
    {
        $instance = new self;

        $instance->register_post_type();
    }

    public function register_post_type()
    {
        register_post_type($this->key, array(
            'labels' => array(
                'name' => 'Opportunité',
                'plural_name' => 'Opportunités',
                'singular_name' => 'Opportunité',
                'menu_name' => 'Opportunité',
                'add_new' => 'Ajouter une opportunité',
                'add_new_item' => 'Ajouter une nouvelle opportunité',
                'edit_item' => 'Modifier l\'opportunité',
                'new_item' => 'Nouvelle opportunité',
                'view_item' => 'Voir une opportunité',
                'not_found' => 'Aucune opportunité',
            ),
            'public' => true,
            'menu_icon' => 'dashicons-portfolio',
            'menu_position' => 20,
            'supports' => array('title', 'thumbnail'),
            'has_archive' => true,
            'rewrite' => array('slug' => 'opportunity'),
        ));
    }
}
