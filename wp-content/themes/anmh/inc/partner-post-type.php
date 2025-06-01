<?php
require_once "custom-post-type.php";

class PartnerPostType implements CustomPostType
{
    public $key = "partner";

    static public function manage()
    {
        $instance = new self;

        $instance->register_post_type();
    }

    public function register_post_type()
    {
        register_post_type($this->key, array(
            'labels' => array(
                'name' => 'Partenaires',
                'singular_name' => 'Partenaire',
                'menu_name' => 'Partenaires',
                'add_new' => 'Ajouter un Partenaire',
                'add_new_item' => 'Ajouter un nouveau Partenaire',
                'edit_item' => 'Modifier le Partenaire',
                'new_item' => 'Nouveau Partenaire',
                'view_item' => 'Voir le Partenaire',
                'not_found' => 'Aucun Partenaire trouvé',
            ),
            'public' => true,
            'menu_icon' => 'dashicons-groups',
            'menu_position' => 20,
            'supports' => array('title', 'thumbnail'),
            'has_archive' => true,
            'rewrite' => array('slug' => 'partenaires'),
        ));
    }
}
