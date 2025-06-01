<?php
require_once "custom-post-type.php";

class EventPostType implements CustomPostType
{
    public $key = "event";

    static public function manage()
    {
        $instance = new self;

        $instance->register_post_type();
    }

    public function register_post_type()
    {
        register_post_type($this->key, array(
            'labels' => array(
                'name' => 'Evènements',
                'singular_name' => 'Evènement',
                'menu_name' => 'Evènements',
                'add_new' => 'Ajouter un évènement',
                'add_new_item' => 'Ajouter une nouvel évènement',
                'edit_item' => 'Modifier l\'évènement',
                'new_item' => 'Nouvel évènement',
                'view_item' => 'Voir Evènement',
                'not_found' => 'Aucun Evènement trouvé',
            ),
            'public' => true,
            'menu_icon' => 'dashicons-megaphone',
            'menu_position' => 20,
            'supports' => array('title', 'thumbnail','editor'),
            'has_archive' => true,
            'rewrite' => array('slug' => 'event'),
        ));
    }
}
