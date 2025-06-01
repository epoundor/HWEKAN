<?php get_header() ?>
<section class="container py-4 lg:py-10 flex flex-col gap-10">
    <h1 class="section-title"><?= the_title() ?></h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => -1,
        );

        $query = new WP_Query($args);

        // Vérifier si des articles ont été trouvés dans la catégorie spécifiée
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post()

        ?>
                <?php project() ?>
        <?php
            endwhile;
        else :
            echo 'Aucun projet trouvé.';
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>
<?php get_footer() ?>