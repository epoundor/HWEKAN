<?php
require_once "custom-post-type.php";

class InterviewPostType implements CustomPostType
{
    public $key = "interview";

    static public function manage()
    {
        $instance = new self;

        $instance->register_post_type();
    }

    public function register_post_type()
    {
        register_post_type($this->key, array(
            'labels' => array(
                'name' => 'Interviews',
                'singular_name' => 'Interview',
                'menu_name' => 'Interviews',
                'add_new' => 'Ajouter un interview',
                'add_new_item' => 'Ajouter un nouvel interview',
                'edit_item' => 'Modifier l\'interview',
                'new_item' => 'Nouveau Interview',
                'view_item' => 'Voir l\'interview',
                'not_found' => 'Aucun interview trouvé',
            ),
            'public' => true,
            'menu_icon' => 'dashicons-format-chat',
            'menu_position' => 20,
            'supports' => array('title', 'thumbnail', 'excerpt', "editor"),
            'has_archive' => true,
            'rewrite' => array('slug' => 'interview'),
        ));
    }
}
