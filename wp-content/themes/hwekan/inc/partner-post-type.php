<?php
require_once "custom-post-type.php";

class PartnerPostType implements CustomPostType
{
    public $key = "partner";

    static public function manage()
    {
        $instance = new self;

        $instance->register_taxonomy();
        $instance->add_default_categories();
        $instance->register_post_type();

        add_action('add_meta_boxes', ['PartnerPostType', 'manage_url_metabox']);
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

    public function register_taxonomy()
    {
        register_taxonomy('partner_category', $this->key, array(
            'labels' => array(
                'name' => 'Catégories de Partenaires',
                'singular_name' => 'Catégorie de Partenaire',
                'search_items' => 'Rechercher une catégorie',
                'all_items' => 'Toutes les catégories',
                'edit_item' => 'Modifier la catégorie',
                'update_item' => 'Mettre à jour la catégorie',
                'add_new_item' => 'Ajouter une nouvelle catégorie',
                'new_item_name' => 'Nom de la nouvelle catégorie',
                'menu_name' => 'Catégories',
            ),
            'hierarchical' => true, // Permet d’avoir une hiérarchie
            'show_admin_column' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'categorie-partenaire'),
        ));
    }
    public function add_default_categories()
    {
        $categories = [
            'Agréments'          => 'approvals',
            'Académiques'           => 'academic',
            'Institutionnels'   => 'institutional'
        ];

        foreach ($categories as $name => $slug) {
            if (!term_exists($name, 'partner_category')) {
                wp_insert_term($name, 'partner_category', [
                    'slug' => $slug
                ]);
            }
        }
    }

    static public function manage_url_metabox()
    {
        add_meta_box(
            'partner_url',
            'URL du site du Partenaire',
            function ($post) {
                $value = get_post_meta($post->ID, 'partner_url', true);
                echo '<label for="partner_url">Lien du site :</label>';
                echo '<input type="url" id="partner_url" name="partner_url" value="' . esc_attr($value) . '" class="widefat" />';
            },
            'partner',
            'normal',
            'default'
        );

        add_action('save_post_partner', function ($post_id) {
            if (isset($_POST['partner_url'])) {
                update_post_meta($post_id, 'partner_url', sanitize_text_field($_POST['partner_url']));
            }
        });
    }
}
