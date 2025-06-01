<?php get_header();

$search_term = get_search_query();
$search_type = $_GET["search_type"] ?? 'event';

$categories = [
    'event' => 'Événements',
    'ressource' => 'Ressources',
    'post' => 'Actualités',
    'markets' => 'Marchés publics',
    'offer' => 'Offres d\'emploi',
    'project' => 'Projets',
];
$classes = [
    'event' => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6',
    'ressource' => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6',
    'post' => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6',
    'markets' => 'flex flex-col mt-6 gap-6',
    'offer' => 'flex flex-col mt-6 gap-6',
    'project' => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6',
];
?>
<div class="bg-blue">
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="container px-4 py-5.5">
        <div class="flex gap-4 items-center py-2">
            <label class='border-b border-white text-white pb-2 relative items-center flex-1 flex gap-4'>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.4073 19.7527L16.9969 15.3422C18.0587 13.9286 18.6319 12.208 18.63 10.44C18.63 5.92406 14.9559 2.25 10.44 2.25C5.92406 2.25 2.25 5.92406 2.25 10.44C2.25 14.9559 5.92406 18.63 10.44 18.63C12.208 18.6319 13.9286 18.0587 15.3422 16.9969L19.7527 21.4073C19.9759 21.6069 20.2671 21.7135 20.5664 21.7051C20.8658 21.6967 21.1505 21.574 21.3623 21.3623C21.574 21.1506 21.6967 20.8658 21.7051 20.5664C21.7134 20.2671 21.6069 19.9759 21.4073 19.7527ZM4.59 10.44C4.59 9.28298 4.9331 8.15194 5.5759 7.18991C6.21871 6.22789 7.13235 5.47808 8.2013 5.03531C9.27025 4.59253 10.4465 4.47668 11.5813 4.70241C12.7161 4.92813 13.7584 5.48529 14.5766 6.30343C15.3947 7.12156 15.9519 8.16393 16.1776 9.29872C16.4033 10.4335 16.2875 11.6098 15.8447 12.6787C15.4019 13.7476 14.6521 14.6613 13.6901 15.3041C12.7281 15.9469 11.597 16.29 10.44 16.29C8.88905 16.2881 7.40216 15.6712 6.30548 14.5745C5.2088 13.4778 4.59186 11.9909 4.59 10.44Z" fill="white" />
                </svg>

                <input required type='search' placeholder="Saisissez votre recherche" class="w-full h-full focus-visible:outline-none text-xl py-2" name="s" oninput='this.classList.toggle("active", this.value !== "")' value="<?php echo get_search_query(); ?>" />
            </label>


        </div>
    </form>
</div>


<div class="bg-functionnal-gray">
    <div class="container">
        <div class="py-4 lg:py-7.75">
            <b class="text-2xl lg:text-[40px]"><?= $wp_query->found_posts ?> résultat(s) trouvé(s)</b>
        </div>
        <div class="flex flex-col gap-6 lg:gap-15 pb-10 lg:pb-20">
            <div class="bg-white py-6 px-4 rounded-lg flex gap-4 flex-wrap">
                <?php
                foreach ($categories as $key => $category) : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>?s=<?php echo $search_term; ?>&search_type=<?php echo $key; ?>" class="rounded-lg py-3 px-4 text-xs block <?= $search_type == $key ? 'bg-blue text-white' : 'bg-gray-50' ?>"><?= $category ?></a>
                <?php endforeach; ?>
            </div>
            <div class="<?= $classes[$search_type] ?>">
                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <?php if (get_post_type() === 'event') : ?>
                            <?php event() ?>
                        <?php elseif (get_post_type() === 'ressource') : ?>
                            <?php ressource() ?>
                        <?php elseif (get_post_type() === 'post') : ?>
                            <?php article() ?>
                        <?php elseif (get_post_type() === 'markets') : ?>
                            <?php market() ?>
                        <?php elseif (get_post_type() === 'project') : ?>
                            <?php project() ?>
                        <?php endif ?>


                    <?php endwhile; ?>

            </div>
            <div class="pagination">
                <?= paginate_links(array(
                        'total' => $wp_query->max_num_pages,
                        'prev_text' => icon('arrow-left'),
                        'next_text' => icon('arrow-right'),
                    ));
                ?>
            </div>
        <?php else : ?>

            <p><?php esc_html_e('Aucun résultat trouvé.', 'text-domain'); ?></p>

        <?php endif; ?>
        </div>


    </div>
</div>

<?php get_footer() ?>