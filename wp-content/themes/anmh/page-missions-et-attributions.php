<?php get_header() ?>
<div class="container py-4 flex flex-col">
    <h1 class="section-title"><?= the_title() ?></h1>
    <div class="mt-4 lg:mt-10 rounded-3xl overflow-hidden h-71.75">
        <img class="h-full w-full object-top" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>">
    </div>
    <div class="flex flex-col gap-10 py-6">
        <div class="flex flex-col gap-2.5">
            <div class="font-bold text-[22px] lg:text-2xl/9"><?= the_field("description") ?></div>
            <div class="w-15 h-1.75 bg-vert"></div>
        </div>
        <div class="flex flex-col gap-4.5">
            <b class="text-2xl">A ce titre, elle est
                chargée :</b>
            <div class="flex flex-col gap-4">
                <?php
                $args = array(
                    'post_type' => 'mission',
                    'posts_per_page' => -1,
                );

                $query = new WP_Query($args);

                // Vérifier si des articles ont été trouvés dans la catégorie spécifiée
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();

                ?>
                        <div class="bg-gray-100 py-4 px-6 rounded-14 font-semibold"><?= get_the_content() ?></div>


                <?php
                    endwhile;
                else :
                    echo 'Aucune mission trouvée.';
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>