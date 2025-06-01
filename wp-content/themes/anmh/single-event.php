<?php get_header();
$date = get_field("time");
if ($date) {
    $timestamp = strtotime($date);
    $jour = date_i18n('d', $timestamp);
    $mois = date_i18n('M', $timestamp);
    $time = date_i18n('H:i', $timestamp);
} ?>

<div class="container">
    <section class="additionnal_container py-10 md:py-15 page">

        <div class="rounded-40 max-md:aspect-[164/83] md:h-134 overflow-hidden relative">
            <img class="w-full h-full" src="<?= the_post_thumbnail_url() ?>" alt="<?= the_post_thumbnail_caption() ?>">
        </div>
        <div class="flex flex-col-reverse lg:flex-row gap-6 mt-15">
            <div class="flex flex-col lg:flex-row gap-3 items-start">
                <div class="rounded-lg p-2 text-white font-bold aspect-square text-center event_gradient">
                    <span class="text-32 leading-[120%]"><?= $jour ?></span>
                    <span class="text-base"><?= $mois ?></span>
                </div>
                <div class="flex-col gap-3 flex">
                    <div class="section-title"><?= get_the_title() ?></div>
                    <div class="inline-flex gap-4">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.99995 1.8335C7.02763 1.83255 6.07359 2.09769 5.24119 2.60019C4.40879 3.1027 3.72976 3.8234 3.27768 4.68423C2.8256 5.54506 2.6177 6.51319 2.6765 7.48373C2.73531 8.45427 3.05858 9.39022 3.61129 10.1902C3.63341 10.2336 3.66024 10.2745 3.69129 10.3122L3.77129 10.4095C3.84595 10.5062 3.92262 10.5995 3.98862 10.6762L7.48529 14.9255C7.54798 15.0012 7.62663 15.062 7.71561 15.1038C7.80458 15.1455 7.90168 15.167 7.99995 15.1668C8.0985 15.1669 8.19582 15.1451 8.28493 15.103C8.37404 15.0609 8.45271 14.9996 8.51529 14.9235L11.91 10.7868C12.0475 10.639 12.1761 10.4832 12.2953 10.3202L12.38 10.2168C12.4122 10.1777 12.4395 10.1347 12.4613 10.0888C12.9881 9.28439 13.2877 8.35248 13.3282 7.39174C13.3688 6.43099 13.1488 5.47715 12.6916 4.63118C12.2345 3.78521 11.5571 3.07859 10.7312 2.58609C9.90525 2.09359 8.96156 1.83356 7.99995 1.8335ZM7.99995 5.16683C8.39552 5.16683 8.7822 5.28413 9.11109 5.50389C9.43999 5.72366 9.69634 6.03601 9.84771 6.40146C9.99909 6.76692 10.0387 7.16905 9.96152 7.55701C9.88435 7.94497 9.69387 8.30134 9.41417 8.58105C9.13446 8.86075 8.7781 9.05123 8.39013 9.1284C8.00217 9.20557 7.60004 9.16597 7.23459 9.01459C6.86913 8.86322 6.55678 8.60687 6.33701 8.27797C6.11725 7.94907 5.99995 7.56239 5.99995 7.16683C5.99995 6.6364 6.21067 6.12769 6.58574 5.75262C6.96081 5.37755 7.46952 5.16683 7.99995 5.16683Z" fill="#4B5563" />
                        </svg>

                        <span class="text-sm text-gray-600">Cotonou, Bénin, Salle de conférence du CHIC - Calavi</span>
                    </div>
                </div>
            </div>
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
        <div class="mt-6 md:mt-13.5 space-y-2">
            <?= the_content() ?>
        </div>

    </section>
</div>
<?php
$current_id = get_the_ID();

$args = array(
    'post_type' => 'event',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
    'post__not_in'   => array($current_id),
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$query = new WP_Query($args);
if ($query->have_posts()) : ?>
    <div class="bg-functionnal-gray">
        <div class="container py-6">
            <div class="additionnal_container flex flex-col gap-6">
                <span class="section-title">Autres évènements</span>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <?php
                    // Vérifier si des articles ont été trouvés dans la catégorie spécifiée
                    while ($query->have_posts()) : $query->the_post()

                    ?>
                        <?php article() ?>
                    <?php
                    endwhile;
                else :
                    echo 'Aucun évènement trouvé.';
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php endif;
                wp_reset_postdata() ?>
<?php get_footer() ?>