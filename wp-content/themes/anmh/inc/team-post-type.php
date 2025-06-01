<?php
require_once "custom-post-type.php";

class TeamPostType implements CustomPostType
{
    public $key = "team";

    static public function manage()
    {
        $instance = new self;

        $instance->register_post_type();
    }

    public function register_post_type()
    {
        register_post_type($this->key, array(
            'labels' => array(
                'name' => 'Equipes',
                'singular_name' => 'Membre de l\'équipe',
                'menu_name' => 'Equipes',
                'add_new' => 'Ajouter un membre de l\'équipe',
                'add_new_item' => 'Ajouter un nouveau membre de l\'équipe',
                'edit_item' => 'Modifier le membre de l\'équipe',
                'new_item' => 'Nouveau membre de l\'équipe',
                'view_item' => 'Voir le membre de l\'équipe',
                'not_found' => 'Aucun membre trouvé',
            ),
            'public' => true,
            'menu_icon' => 'dashicons-businessperson',
            'menu_position' => 20,
            'supports' => array('title', 'thumbnail'),
            'has_archive' => true,
            'rewrite' => array('slug' => 'team'),
        ));
    }
}
