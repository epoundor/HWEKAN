<?php
require_once "custom-post-type.php";

class PortraitPostType implements CustomPostType
{
    public $key = "portrait";

    static public function manage()
    {
        $instance = new self;

        $instance->register_post_type();
    }

    public function register_post_type()
    {
        register_post_type($this->key, array(
            'labels' => array(
                'name' => 'Portraits',
                'singular_name' => 'Portrait',
                'menu_name' => 'Portraits',
                'add_new' => 'Ajouter un portrait',
                'add_new_item' => 'Ajouter un nouveau portrait',
                'edit_item' => 'Modifier le portrait',
                'new_item' => 'Nouveau Portrait',
                'view_item' => 'Voir Portrait',
                'not_found' => 'Aucun Portrait trouvé',
            ),
            'public' => true,
            'menu_icon' => 'dashicons-format-image',
            'menu_position' => 20,
            'supports' => array('title',"editor", 'thumbnail', 'excerpt'),
            'has_archive' => true,
            'rewrite' => array('slug' => 'portrait'),
        ));
    }
}
