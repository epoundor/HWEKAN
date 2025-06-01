<?php
require_once "custom-post-type.php";

class ProjectPostType implements CustomPostType
{
    public $key = "project";

    static public function manage()
    {
        $instance = new self;

        $instance->register_post_type();
    }

    public function register_post_type()
    {
        register_post_type($this->key, array(
            'labels' => array(
                'name' => 'Projets',
                'singular_name' => 'Projet',
                'menu_name' => 'Projets',
                'add_new' => 'Ajouter un projet',
                'add_new_item' => 'Ajouter un nouveau projet',
                'edit_item' => 'Modifier le projet',
                'new_item' => 'Nouveau Projet',
                'view_item' => 'Voir Projet',
                'not_found' => 'Aucune Projet trouvé',
            ),
            'public' => true,
            'menu_icon' => 'dashicons-megaphone',
            'menu_position' => 20,
            'supports' => array('title', 'thumbnail','editor'),
            'has_archive' => true,
            'rewrite' => array('slug' => 'project'),
        ));
    }
}
