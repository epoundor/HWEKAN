<?php get_header() ?>

<div class="container">
    <section class="additionnal_container py-10 md:py-15 page">
        <div class="flex gap-6 flex-col">
            <div class="section-title"><?= get_the_title() ?></div>
            <div class="flex gap-2 items-center">
                <b>Partager </b>
                <div class="flex gap-1.5">

                    <a target="popup" onclick='window.open("https://www.facebook.com/share.php?u=<?= get_the_permalink() ?>","popup","width=550,height=450"); return false;' class="flex justify-center items-center rounded-full cursor-pointer">
                        <?= icon("facebook_rounded") ?>
                    </a>
                    <a target="popup" class="flex justify-center items-center rounded-full cursor-pointer">
                        <?= icon("instagram_rounded") ?>
                    </a>
                    <a target="popup" onclick='window.open( "https://twitter.com/intent/tweet?text=<?= get_the_permalink() ?>" ,"popup","width=550,height=450"); return false;' class="flex justify-center items-center rounded-full cursor-pointer">
                        <?= icon("twitter_rounded") ?>
                    </a>
                    <!--<a target="popup" onclick='window.open("https://www.linkedin.com/sharing/share-offsite/?url=<?= get_the_permalink() ?>" ,"popup" ,"width=550,height=450"); return false;' class="flex justify-center items-center rounded-full cursor-pointer">
                    <?= icon("linkedin") ?>
                </a>
                -->
                </div>
            </div>
        </div>
        <div class="mt-6 lg:mt-15">
            <div class="rounded-40 max-md:aspect-[17/14] md:h-162.5 overflow-hidden relative">
                <img class="w-full h-full" src="<?= the_post_thumbnail_url() ?>" alt="<?= the_post_thumbnail_caption() ?>">
            </div>
            <div class="mt-6 md:mt-13.5 space-y-2">
                <?= the_content() ?>
            </div>
        </div>

    </section>
</div>
<div class="bg-functionnal-gray">
    <div class="container py-6">
        <div class="additionnal_container flex flex-col gap-6">
            <span class="section-title">Autres actualités</span>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                $current_id = get_the_ID();

                $args = array(
                    'post_type' => 'post',
                    'post_status'    => 'publish',
                    'posts_per_page' => 3,
                    'post__not_in'   => array($current_id),
                    'orderby'        => 'date',
                    'order'          => 'DESC',
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
                    echo 'Aucune actualité trouvé.';
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer() ?>