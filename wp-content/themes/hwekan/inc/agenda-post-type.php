<?php
require_once "custom-post-type.php";

class AgendaPostType implements CustomPostType
{
    public $key = "agenda";

    static public function manage()
    {
        $instance = new self;

        $instance->register_post_type();
    }

    public function register_post_type()
    {
        register_post_type($this->key, array(
            'labels' => array(
                'name' => 'Agenda Culturel',
                'plural_name' => 'Agendas Culturels',
                'singular_name' => 'Agenda Culturel',
                'menu_name' => 'Agenda Culturel',
                'add_new' => 'Ajouter un agenda culturel',
                'add_new_item' => 'Ajouter un nouvel agenda culturel',
                'edit_item' => 'Modifier l\'agenda culturel',
                'new_item' => 'Nouvel agenda culturel',
                'view_item' => 'Voir un agenda culturel',
                'not_found' => 'Aucun agenda culturel',
            ),
            'public' => true,
            'menu_icon' => 'dashicons-calendar-alt',
            'menu_position' => 20,
            'supports' => array('title', 'thumbnail'),
            'has_archive' => true,
            'rewrite' => array('slug' => 'agenda'),
        ));
    }
}
