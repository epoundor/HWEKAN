<?php
require_once "custom-post-type.php";

class DocumentationPostType implements CustomPostType
{
    public $key = "documentation";

    static public function manage()
    {
        $instance = new self;

        $instance->register_post_type();
    }

    public function register_post_type()
    {
        register_post_type($this->key, array(
            'labels' => array(
                'name' => 'Documentations',
                'singular_name' => 'Documentation',
                'menu_name' => 'Documentations',
                'add_new' => 'Ajouter un documentation',
                'add_new_item' => 'Ajouter un nouveau documentation',
                'edit_item' => 'Modifier le documentation',
                'new_item' => 'Nouveau Documentation',
                'view_item' => 'Voir Documentation',
                'not_found' => 'Aucun Documentation trouvé',
            ),
            'public' => true,
            'menu_icon' => 'dashicons-book-alt',
            'menu_position' => 20,
            'supports' => array('title', 'thumbnail', 'excerpt'),
            'has_archive' => true,
            'rewrite' => array('slug' => 'documentation'),
        ));
    }
}
