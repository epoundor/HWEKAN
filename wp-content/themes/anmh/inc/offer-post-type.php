<?php
require_once "custom-post-type.php";

class OfferPostType implements CustomPostType
{
    public $key = "offer";

    static public function manage()
    {
        $instance = new self;

        $instance->register_post_type();
    }

    public function register_post_type()
    {
        register_post_type($this->key, array(
            'labels' => array(
                'name' => 'Offre D\'emploi',
                'singular_name' => 'Offre D\'emploi',
                'menu_name' => 'Offres D\'emploi',
                'add_new' => 'Ajouter une offre d\'emploi',
                'add_new_item' => 'Ajouter une nouvelle offre d\'emploi',
                'edit_item' => 'Modifier l\'offre d\'emploi',
                'new_item' => 'Nouvelle Offre D\'emploi',
                'view_item' => 'Voir Offre D\'emploi',
                'not_found' => 'Aucune offre d\'emploi trouvée',
            ),
            'public' => true,
            'menu_icon' => 'dashicons-portfolio',
            'menu_position' => 20,
            'supports' => array('title'),
            'has_archive' => true,
            'rewrite' => array('slug' => 'offer'),
        ));
    }
}
