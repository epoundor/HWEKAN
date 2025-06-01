<?php get_header();
$search = sanitize_text_field($_GET['search']) ?: '';
$paged = get_query_var('paged') ?: 1;
$type = $_GET['type'] ?? '';
$sujet = $_GET['sujet'] ?? '';

$field_type = acf_get_field('type_ressource');
$field_sujet = acf_get_field('sujet_ressource');

// Les choix possibles
$types = $field_type['choices'] ?? [];
$sujets = $field_sujet['choices'] ?? [];

$args = array(
    'post_type' => 'ressource',
    'paged' => $paged,
    'posts_per_page' => 6,
    's' => $search,
);

if ($type) {
    $args['meta_query'][] = [
        'key' => 'type_ressource',
        'value' => $type,
        'compare' => '='
    ];
}

if ($sujet) {
    $args['meta_query'][] = [
        'key' => 'sujet_ressource',
        'value' => $sujet,
        'compare' => '='
    ];
}


?>
<div class="bg-functionnal-gray">

    <section class="container py-4 lg:py-10">
        <h1 class="section-title"><?= the_title() ?></h1>
        <div class="flex flex-col py-6 lg:my-10 rounded-lg lg:bg-white lg:p-6">
            <form class="flex flex-col lg:flex-row gap-6">
                <label class="border-2 border-gray-200 rounded flex-1 lg:max-w-75">
                    <input placeholder="Rechercher" value="<?= $search ?>" name="search" class="bg-gray-100 py-4 px-3 rounded-lg outline-none w-full" type="search">
                </label>
                <?php select("Sélectionner un type", "type", $types) ?>
                <?= button("Rechercher", "", "bg-vert text-white inline-flex ") ?>
            </form>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php

            $query = new WP_Query($args);

            // Vérifier si des articles ont été trouvés dans la catégorie spécifiée
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post()

            ?>
                    <?php ressource() ?>


                <?php
                endwhile ?>
                <div class="pagination">
                    <?= paginate_links(array(
                        'total' => $query->max_num_pages,
                        'prev_text' => icon('arrow-left'),
                        'next_text' => icon('arrow-right'),
                    ));
                    ?>
                </div>
            <?php
            else :
                echo 'Aucune ressource trouvée.';
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </section>
</div>
<?php get_footer() ?>