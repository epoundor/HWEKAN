<?php get_header() ?>
<div class="container py-7.5 flex flex-col gap-10">
    <span class="section-title">Événements à venir</span>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $args = array(
            'post_type' => 'event',
            'posts_per_page' => -1,
        );

        $query = new WP_Query($args);

        // Vérifier si des articles ont été trouvés dans la catégorie spécifiée
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post()

        ?>
                <?php event() ?>
        <?php
            endwhile;
        else :
            echo 'Aucun évènement trouvé.';
        endif;
        wp_reset_postdata();
        ?>
    </div>
</div>
<?php get_footer() ?>