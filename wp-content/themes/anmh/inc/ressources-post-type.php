<?php
require_once "custom-post-type.php";

class RessourcePostType implements CustomPostType
{
    public $key = "ressource";

    static public function manage()
    {
        $instance = new self;

        $instance->register_post_type();
    }

    public function register_post_type()
    {
        register_post_type($this->key, array(
            'labels' => array(
                'name' => 'Ressources',
                'singular_name' => 'Ressource',
                'menu_name' => 'Ressources',
                'add_new' => 'Ajouter un ressource',
                'add_new_item' => 'Ajouter une nouvelle ressource',
                'edit_item' => 'Modifier la ressource',
                'new_item' => 'Nouvelle Ressource',
                'view_item' => 'Voir Ressource',
                'not_found' => 'Aucune Ressource trouvé',
            ),
            'public' => true,
            'menu_icon' => 'dashicons-archive',
            'menu_position' => 20,
            'supports' => array('title',"editor", "thumbnail"),
            'has_archive' => true,
            'rewrite' => array('slug' => 'ressources'),
        ));
    }
}
