<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<?php get_header() ?>

<section id="hero" class="container py-10 lg:h-[calc(100vh-83px)] !h-fit">
    <div class="swiper-wrapper !h-full">
        <?php foreach ($slides = get_field('slides', 'option') as $slide): ?>
            <div class="swiper-slide max-h-full">
                <div style="background-color: <?= $slide['color']; ?>" class="rounded-4xl overflow-hidden max-lg:pt-4 max-lg:px-4 max-lg:pb-6 flex flex-col max-lg:gap-6 max-h-full">
                    <div class="relative">
                        <img src="<?= esc_url($slide['image']); ?>" class="aspect-video lg:aspect-[62/25] rounded-3xl w-full" alt="hero image">
                        <?= pagination() ?>
                    </div>
                    <div class="gap-6 flex flex-col lg:flex-row justify-between lg:items-center lg:p-10">
                        <span class="font-semibold text-xl text-white lg:text-2xl block lg:w-1/2"><?= $slide["description"] ?></span>
                        <?= button($slide['button_label'], $slide['button_link'], 'bg-white text-black font-semibold') ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<section class="container py-7.5 flex flex-col gap-10">
    <h2 class="section-title text-center">Les missions de l’ANMH en 6 points</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $args = array(
            'post_type' => 'mission',
            'posts_per_page' => 6,
        );

        $query = new WP_Query($args);

        // Vérifier si des articles ont été trouvés dans la catégorie spécifiée
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();

        ?>
                <div style="background-color: <?= get_field('color'); ?>" class="py-10 px-7.5 rounded-3xl flex flex-col items-center gap-4 text-center">
                    <div class="w-16 h-16 bg-black rounded-full flex justify-center items-center p-4">
                        <img src="<?= the_post_thumbnail_url() ?>" alt="<?= the_post_thumbnail_caption() ?>">
                    </div>
                    <span class="font-bold text-[22px]"><?= the_title() ?></span>
                    <p class="text-sm font-medium"><?= get_the_content() ?></p>
                </div>

        <?php
            endwhile;
        else :
            echo 'Aucune mission trouvée.';
        endif;
        wp_reset_postdata();
        ?>

    </div>
    <div class="justify-center py-4 items-center hidden lg:flex">
        <a class="font-semibold text-vert" href="/anmh/missions-et-attributions/">Voir la mission et les attributions de l’ANMH</a>
        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4.5 12H20.5M20.5 12L14.5 6M20.5 12L14.5 18" stroke="#008751" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

    </div>
</section>
<section id="evenements" class="container py-7.5 flex flex-col gap-6">
    <div class="flex justify-between items-center">
        <h2 class="section-title">Événements à venir</h2>
        <div class="justify-center py-4 items-center flex">
            <a class="font-semibold text-vert" href="/evenements/">Voir tout</a>
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.5 12H20.5M20.5 12L14.5 6M20.5 12L14.5 18" stroke="#008751" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $args = array(
            'post_type' => 'event',
            'posts_per_page' => 3,
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

</section>
<section id="projets" class="container py-7.5 flex flex-col gap-6">
    <div class="flex justify-between items-center">
        <h2 class="section-title">Projets</h2>
        <div class="justify-center py-4 items-center flex">
            <a class="font-semibold text-vert" href="/projets/">Voir tout</a>
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.5 12H20.5M20.5 12L14.5 6M20.5 12L14.5 18" stroke="#008751" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => 3,
        );

        $query = new WP_Query($args);

        // Vérifier si des articles ont été trouvés dans la catégorie spécifiée
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post()

        ?>

                <?php project()  ?>

        <?php
            endwhile;
        else :
            echo 'Aucune mission trouvée.';
        endif;
        wp_reset_postdata();
        ?>
    </div>

</section>
<div class="bg-functionnal-gray">
    <section id="ressources" class="container py-7.5 flex flex-col gap-6">
        <div class="flex justify-between items-center">
            <h2 class="section-title">Ressources</h2>
            <div class="justify-center py-4 items-center flex">
                <a class="font-semibold text-vert" href="/ressources/">Voir tout</a>
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 12H20.5M20.5 12L14.5 6M20.5 12L14.5 18" stroke="#008751" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            $args = array(
                'post_type' => 'ressource',
                'posts_per_page' => 3,
            );

            $query = new WP_Query($args);

            // Vérifier si des articles ont été trouvés dans la catégorie spécifiée
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post()

            ?>

                    <?php ressource() ?>

            <?php
                endwhile;
            else :
                echo 'Aucune ressource trouvée.';
            endif;
            wp_reset_postdata();
            ?>
        </div>

    </section>
    <section id="actualites" class="container py-7.5 flex flex-col gap-6 ">
        <div class="flex justify-between items-center">
            <h2 class="section-title">Actualités</h2>
            <div class="justify-center py-4 items-center flex">
                <a class="font-semibold text-vert" href="/actualites/">Voir tout</a>
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 12H20.5M20.5 12L14.5 6M20.5 12L14.5 18" stroke="#008751" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
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
                echo 'Aucune actualité trouvée.';
            endif;
            wp_reset_postdata();
            ?>
        </div>

    </section>
</div>



<section id="partenaires" class="container py-7.5 flex flex-col gap-6 max-lg:bg-functionnal-gray">
    <span class="section-title text-center">Nos partenaires</span>

    <?php
    $args_partner = array(
        'post_type' => 'partner',
        'posts_per_page' => -1,
    );

    $query_partner = new WP_Query($args_partner);

    // Vérifier si des articles ont été trouvés dans la catégorie spécifiée
    if ($query_partner->have_posts()): ?>
        <div class="swiper-wrapper items-center">
            <?php
            while ($query_partner->have_posts()):
                $query_partner->the_post();

            ?>
                <img class="swiper-slide" src="<?= get_the_post_thumbnail_url() ?>" title="<?= the_title() ?>" alt="<?= get_the_post_thumbnail_caption() ?>">
            <?php
            endwhile; ?>
        </div>
    <?php
    else :
        // Aucun article trouvé dans la catégorie spécifiée
        echo 'Aucun Evènement trouvé';
    endif;
    wp_reset_postdata();
    ?>
</section>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?= get_template_directory_uri() . "/assets/js/swiper.js?ver=" . $GLOBALS["VERSION"] ?>"></script>

<?php get_footer() ?>