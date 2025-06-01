<?php
require_once "custom-post-type.php";

class MissionPostType implements CustomPostType
{
    public $key = "mission";

    static public function manage()
    {
        $instance = new self;

        $instance->register_post_type();
    }

    public function register_post_type()
    {
        register_post_type($this->key, array(
            'labels' => array(
                'name' => 'Missions',
                'singular_name' => 'Mission',
                'menu_name' => 'Missions et Attributions',
                'add_new' => 'Ajouter une nouvelle mission et attribution',
                'add_new_item' => 'Ajouter une nouvelle mission et attribution',
                'edit_item' => 'Modifier la mission/attribution',
                'new_item' => 'Nouveau Mission/Attribution',
                'view_item' => 'Voir Mission/Attribution',
                'not_found' => 'Aucune Mission/Attribution trouvée',
            ),
            'public' => true,
            'menu_icon' => 'dashicons-buddicons-activity',
            'menu_position' => 20,
            'supports' => array('title', 'thumbnail','editor'),
            'has_archive' => true,
            'rewrite' => array('slug' => 'mission-attribution'),
        ));
    }
}
