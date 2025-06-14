<?php
get_header();

$type = $_GET['type'] ?? 'post';

$cpts = $GLOBALS["menus"];

$active_cpt = array_filter($cpts, function ($cpt) use ($type) {
    return $cpt['slug'] === $type;
});

function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);
    if ($factor == 0) return $bytes . ' ' . $size[0];
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' . $size[$factor];
}

function show_cpt()
{
    $type = get_post_type();

    switch ($type) {
        case "post":
            article("!w-full");
            break;
        case "opportunity":
            opportunity("!w-full");
            break;
        case "interview":
            interview("!w-full");
            break;
        case "agenda":
            agenda("!w-full");
            break;
        case "documentation":
            $file = get_field("file");
            if ($file) {
                $file_url = $file['url'];
                $file_size = $file['filesize'];
            } else {
                $file_url = '';
                $file_size = '';
            }
?>
            <div class="col-span-full py-8 flex flex-col md:flex-row md:items-center gap-4 last:border-b md:border-t border-gray-200">
                <?php documentation("md:!w-45.5 min-w-45.5 md:max-w-45.5") ?>
                <div class="flex flex-col gap-4">
                    <span class="text-[#868686] uppercase text-sm font-semibold">PUBLIÉ LE <?= get_the_date("d M Y") ?></span>
                    <b class="text-xl">
                        <?php the_title() ?>
                    </b>
                    <div class="flex flex-col gap-3">
                        <p class="text-sm font-medium"><?= get_the_excerpt() ?></p>
                        <div class="flex gap-2 text-xs"><span>PDF</span> <span>|</span> <?= human_filesize($file_size) ?> </div>

                        <div class="flex gap-3.5">
                            <a target="_blank" class="py-3 px-4 max-md:flex-1 border text-center text-sm font-semibold rounded-lg" href="<?= $file_url ?>">Lire</a>
                            <a download class="py-3 px-4 max-md:flex-1 bg-white text-center text-black text-sm font-semibold rounded-lg" href="<?= $file_url ?>">Télécharger</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            break;
        case "portrait":
        ?>
            <div class="col-span-full py-8 flex flex-col md:flex-row md:items-center gap-10 last:border-b md:border-t border-gray-200">
                <div class="md:w-45.5 min-w-45.5 md:max-w-45.5 h-58.5 relative max-md:w-full">
                    <img class="w-full h-full object-cover" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>" />
                </div>
                <div class="flex flex-col gap-4 flex-1">
                    <span class="text-[#868686] uppercase text-sm font-semibold">PUBLIÉ LE <?= get_the_date("d M Y") ?></span>
                    <b class="text-xl">
                        <?php the_title() ?>
                    </b>
                    <div class="flex flex-col gap-6 lg:gap-9.5">
                        <p class="text-sm font-medium"><?= get_the_excerpt() ?></p>

                        <div class="flex gap-3.5">
                            <a class="py-3 px-10 max-md:flex-1 border text-center text-sm font-semibold rounded-lg" href="<?= get_the_permalink() ?>">Découvrir</a>
                        </div>
                    </div>
                </div>
            </div>
<?php
            break;
        default:
            echo "";
            break;
    }
}
?>
<section class="relative h-76 bg-center bg-contain md:bg-cover bg-no-repeat bg-fixed" style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">
    <div class="absolute inset-0 bg-black/74">
        <div class="py-13.5 flex flex-col gap-10 overflow-hidden container lg:items-center">
            <h1 class="text-4xl font-bold text-center">
                <?php the_title() ?>
            </h1>
            <div class="flex gap-4 overflow-x-auto">
                <?php
                foreach ($cpts as $cpt) : ?>
                    <a href="?type=<?= $cpt["slug"] ?>" class="border border-white rounded-lg p-4 block text-nowrap <?= $type === $cpt['slug'] ? 'bg-white text-black' : '' ?>">
                        <span class="text-xs font-medium"><?= $cpt["label"] ?> </span>
                    </a>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>

</section>
<section class="py-2 px-4 bg-white">
    <div class="container flex flex-col gap-6 lg:gap-15">
        <a href="/" class="flex items-center gap-2">
            <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.50156 1.08749C5.34587 0.931444 5.13449 0.84375 4.91406 0.84375C4.69363 0.84375 4.48226 0.931444 4.32656 1.08749L0.501563 4.91249C0.176562 5.23749 0.176562 5.76249 0.501563 6.08749L4.32656 9.91249C4.65156 10.2375 5.17656 10.2375 5.50156 9.91249C5.82656 9.58749 5.82656 9.06249 5.50156 8.73749L2.26823 5.49582L5.50156 2.26249C5.82656 1.93749 5.81823 1.40415 5.50156 1.08749Z" fill="black" />
            </svg>
            <span class="text-sm font-medium inline-block text-gray-500 p-1">Accueil</span>
        </a>
        <form class="flex gap-2 border-b justify-start items-center pb-3.5 lg:pb-6">
            <?= icon('search') ?>
            <input type="search" name="s" autofocus class="w-full text-black focus-visible:outline-none lg:text-xl">
        </form>
    </div>
</section>
<section class="container py-15 flex flex-col gap-6" data-aos="fade-up">
    <span class="text-3xl"><?= reset($active_cpt)['label'] ?></span>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        $args = [
            'post_type' => $type,
            'post_status' => 'publish',
            'posts_per_page' => 12,
        ];
        $posts = get_posts($args);

        if ($posts) :
            foreach ($posts as $post) :
                setup_postdata($post);
                show_cpt();
            endforeach;
            wp_reset_postdata();
        else : ?>
            <p class="text-gray-500">Aucun contenu trouvé pour ce type.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer() ?>