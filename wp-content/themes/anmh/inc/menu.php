<?php
class Menu
{
    public $nav_links = [
        [
            "title" => "L’anmh",
            "slug" => "anmh"
        ],
        [
            "title" => "Ressources",
            "slug" => "resourcefulness"
        ],
        [
            "title" => "Événements",
            "slug" => "evenements"
        ],
        [
            "title" => "Projets",
            "slug" => "projets"
        ],
        [
            "title" => "Actualités",
            "slug" => "actualites"
        ],
        [
            "title" => "Opportunités",
            "slug" => "opportunites"
        ],
        [
            "title" => "Contact",
            "slug" => "contact"
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

        $this->create_anmh_subpages();
        $this->add_anmh_subpages_to_menu();
    }

    function setup_nav_menus()
    {
        register_nav_menus(array(
            'primary-menu' => __('Menu primaire', 'text_domain'),
            'footer-menu' => __('Menu secondaire', 'text_domain'),
        ));

        wp_create_nav_menu("Menu primaire");
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

        // foreach ($link as $key => $this->nav_links) {

        //     var_dump($this->nav_links);
        // $page_title = 'Nouvelle Page';
        // $page_slug = 'nouvelle-page';

        // // Vérifier si la page existe déjà
        // $page = get_page_by_path($page_slug);

        // if (!$page) {
        //     $page_id = wp_insert_post([
        //         'post_title'   => $page_title,
        //         'post_name'    => $page_slug,
        //         'post_status'  => 'publish',
        //         'post_type'    => 'page'
        //     ]);
        // } else {
        //     $page_id = $page->ID;
        // }

        // if ($menu_id && $page_id) {
        //     wp_update_nav_menu_item($menu_id, 0, [
        //         'menu-item-title'   => $page_title,
        //         'menu-item-object'  => 'page',
        //         'menu-item-object-id' => $page_id,
        //         'menu-item-status'  => 'publish',
        //         'menu-item-type'    => 'post_type',
        //     ]);
        // }
        // }
    }

    function create_anmh_subpages()
    {
        // Vérifier si la page parent existe
        $parent_page1 = get_page_by_path('anmh');

        if (!$parent_page1) {
            return;
        }

        $subpages1 = [
            ['title' => 'Mot du Directeur Général', 'slug' => 'mot-du-directeur'],
            ['title' => 'Missions et attributions', 'slug' => 'missions-et-attributions'],
            ['title' => 'Organigramme', 'slug' => 'organigramme'],
            ['title' => 'Equipe gouvernante', 'slug' => 'equipe-gouvernante'],
        ];

        foreach ($subpages1 as $subpage) {

            if (get_page_by_path("anmh/" . $subpage["slug"])) {
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

        $parent_page2 = get_page_by_path('opportunites');

        if (!$parent_page2) {
            return;
        }

        $subpages1 = [
            ['title' => 'Marchés publics', 'slug' => 'marche-public'],
            ['title' => 'Offre d\'emploi', 'slug' => 'carrer'],
        ];

        foreach ($subpages1 as $subpage) {

            if (get_page_by_path("opportunites/" . $subpage["slug"])) {
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

    function add_anmh_subpages_to_menu()
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

    function create_anmh_formation_subpages()
    {
        // Vérifier si la page parent existe
        $parent_page = get_page_by_path('formations');

        if (!$parent_page) {
            return;
        }

        $subpages = [
            ['title' => 'Formations Continues (Cours du soir)', 'slug' => 'formation-continue'],
            ['title' => 'Formations en licence professionnelle', 'slug' => 'licence-pro'],
            ['title' => 'Formations professionnelles Certifiantes', 'slug' => 'formation-certifiante'],
            ['title' => 'Nos Enseignants', 'slug' => 'nos-enseignants'],
        ];

        foreach ($subpages as $subpage) {

            if (get_page_by_path("formations/" . $subpage["slug"])) {
                continue;
            }
            wp_insert_post([
                'post_title'   => $subpage['title'],
                'post_content' => '',
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_name'    => $subpage['slug'],
                'post_parent'  => $parent_page->ID,
            ]);
        }
    }
}
