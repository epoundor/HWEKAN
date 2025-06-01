<?php get_header() ?>
<div class="bg-functionnal-gray">
    <div class="container">

        <section class="additionnal_container py-4 lg:py-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                );

                $query = new WP_Query($args);

                // Vérifier si des articles ont été trouvés dans la catégorie spécifiée
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post()

                ?>
                        <?php article() ?>
                <?php
                    endwhile;
                else :
                    echo 'Aucun actualité trouvé.';
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </section>
    </div>
</div>

<?php get_footer() ?>