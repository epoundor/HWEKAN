<?php get_header() ?>
<div class="container">
    <section class="additionnal_container py-4 lg:py-10">
        <div class="flex justify-between items-center">
            <h1 class="section-title"><?= the_title() ?></h1>
            <?= button("Voir l’organigramme", "/anmh/organigramme", "bg-vert text-white !whitespace-nowrap", "organigramme") ?>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
            <?php
            $args = array(
                'post_type' => 'team',
                'posts_per_page' => -1,
            );

            $query = new WP_Query($args);

            // Vérifier si des articles ont été trouvés dans la catégorie spécifiée
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post()

            ?>
                    <div class="flex flex-col gap-4.5">
                        <div class="overflow-hidden rounded-14 aspect-[328/295]">
                            <img class="w-full h-full" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>">
                        </div>
                        <div class="flex flex-col gap-1">
                            <b><?= the_title() ?></b>
                            <span class="text-sm text-slate-500"><?= get_field("job_title") ?></span>
                        </div>
                    </div>
            <?php
                endwhile;
            else :
                echo 'Aucune mission trouvée.';
            endif;
            wp_reset_postdata();
            ?>
        </div>

    </section>
</div>

<?php get_footer() ?>