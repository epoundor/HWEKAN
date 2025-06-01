<?php
class Menu
{
    public $nav_links = [
        [
            "title" => "Accueil",
            "slug" => "accueil"
        ],
        [
            "title" => "Espace media",
            "slug" => "media"
        ],
        [
            "title" => "Studio services",
            "slug" => "studio"
        ],


    ];

    // Configure les pages nécessaires au thème
    function setup_pages()
    {
        foreach ($this->nav_links as $nav_link) {
            // Vérifier si la page existe déjà par slug
            $existing_page = get_page_by_path($nav_link["slug"]);
            if (!$existing_page) {
                $new_page_data = array(
                    'post_title'    => $nav_link["title"],
                    'post_content'  => '',
                    'post_status'   => 'publish',
                    'post_type'     => 'page',
                    'post_name'     => $nav_link["slug"] // Modifier le slug de la page ici
                );
                // Insérer la nouvelle page dans la base de données
                $new_page_id = wp_insert_post($new_page_data);
            }
        }

        // Définir la page d'accueil
        $homepage = get_page_by_path('home');
        if ($homepage) {
            update_option('page_on_front', $homepage->ID);
            update_option('show_on_front', 'page');
        }

        // Définir la page des articles
        $posts_page = get_page_by_path('actualites');
        if ($posts_page) {
            update_option('page_for_posts', $posts_page->ID);
        }

        $this->create_hwekan_subpages();
        $this->add_hwekan_subpages_to_menu();
    }

    function setup_nav_menus()
    {
        register_nav_menus(array(
            'primary-menu' => __('Header menu', 'text_domain'),
            'footer-menu' => __('Footer menu', 'text_domain'),
        ));

        wp_create_nav_menu("Menu primaire");
        wp_create_nav_menu("Menu secondaire");
    }

    function setup_nav_primary_menu()
    {

        $menu_location = 'primary-menu';
        $locations = get_nav_menu_locations(); // Récupère les emplacements des menus

        if (isset($locations[$menu_location])) {
            $menu_id = $locations[$menu_location];
        } else {
            die('Le menu n\'est pas encore assigné à un emplacement.');
        }
    }

    function create_hwekan_subpages()
    {
        // Vérifier si la page parent existe
        $parent_page1 = get_page_by_path('media');

        if (!$parent_page1) {
            return;
        }

        $subpages1 = [
            ['title' => 'Articles', 'slug' => 'actualites'],
            ['title' => 'Opportunités', 'slug' => 'opportunites'],
            ['title' => 'Interviews', 'slug' => 'interviews'],
            ['title' => 'Equipe gouvernante', 'slug' => 'equipe-gouvernante'],
            ['title' => 'Documentations', 'slug' => 'documentations'],
            ['title' => 'Portraits', 'slug' => 'portraits'],
        ];

        foreach ($subpages1 as $subpage) {

            if (get_page_by_path("media/" . $subpage["slug"])) {
                continue;
            }
            wp_insert_post([
                'post_title'   => $subpage['title'],
                'post_content' => '',
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_name'    => $subpage['slug'],
                'post_parent'  => $parent_page1->ID,
            ]);
        }

        $parent_page2 = get_page_by_path('studio');

        if (!$parent_page2) {
            return;
        }

        $subpages1 = [
            ['title' => 'Nos Services', 'slug' => 'nos-services'],
        ];

        foreach ($subpages1 as $subpage) {

            if (get_page_by_path("studio/" . $subpage["slug"])) {
                continue;
            }
            wp_insert_post([
                'post_title'   => $subpage['title'],
                'post_content' => '',
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_name'    => $subpage['slug'],
                'post_parent'  => $parent_page2->ID,
            ]);
        }
    }

    function add_hwekan_subpages_to_menu()
    {
        $menu_name = 'Menu primaire';
        $menu = wp_get_nav_menu_object($menu_name);


        if (!$menu) {
            return;
        }

        $menu_id = $menu->term_id;


        // Récupérer la page parent

        // Récupérer les sous-pages
        $subpages = $this->nav_links;

        foreach ($subpages as $subpage) {
            $page = get_page_by_path($subpage['slug']);

            // Vérifier si l'élément existe déjà dans le menu
            $exists = wp_get_nav_menu_items($menu_id, ['post_status' => 'publish']);
            foreach ($exists as $item) {
                if ($item->object_id == $page->ID) {
                    continue 2; // Passer à la prochaine sous-page
                }
            }

            // Ajouter la sous-page au menu
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title'  => $page->post_title,
                'menu-item-object' => 'page',
                'menu-item-object-id' => $page->ID,
                'menu-item-type'   => 'post_type',
                'menu-item-status' => 'publish'
            ]);
        }
    }
}
