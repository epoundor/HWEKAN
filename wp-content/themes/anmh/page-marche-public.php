<?php get_header();
$search = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$wp_query->set('post_type', "markets");

?>
<div class="bg-functionnal-gray">

    <section class="container py-4 lg:py-10">
        <h1 class="section-title"><?= the_title() ?></h1>
        <div class="flex flex-col py-6 lg:my-10 rounded-lg lg:bg-white lg:p-6">
            <form class="flex gap-4 lg:justify-between">
                <label class="border-2 border-gray-200 rounded flex-1">
                    <input placeholder="Rechercher" value="<?= $search ?>" name="search" class="bg-gray-100 py-4 px-3 outline-none w-full rounded-lg" type="search">
                </label>
                <?= button("", "", "bg-blue text-white lg:hidden", "search") ?>
                <?= button("Rechercher", "", "bg-blue text-white lg:inline-flex hidden") ?>
            </form>
        </div>
        <div class="flex flex-col mt-6 gap-6">

            <?php
            $args = array(
                'post_type' => 'markets',
                'paged' => $paged,
                'posts_per_page' => 6,
                's' => $search,
            );

            $query = new WP_Query($args);

            // Vérifier si des articles ont été trouvés dans la catégorie spécifiée
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post()

            ?>
                    <?php market() ?>


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
                echo 'Aucun marché  trouvé.';
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </section>
</div>
<?php get_footer() ?>