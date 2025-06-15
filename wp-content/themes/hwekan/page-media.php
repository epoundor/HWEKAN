<?php
get_header();

$type = $_GET['type'] ?? 'post';

$cpts = $GLOBALS["menus"];
$search = $_GET['search'] ?? '';
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

                        <div class="flex gap-3.5 md:grid grid-cols-2 md:w-75">
                            <a target="_blank" class="py-3 px-4 max-md:flex-1 border text-center text-sm font-semibold rounded-lg flex gap-2 justify-center items-center" href="<?= $file_url ?>"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.36458 3.8877C5.03125 3.8877 2.18458 5.96103 1.03125 8.8877C2.18458 11.8144 5.03125 13.8877 8.36458 13.8877C11.6979 13.8877 14.5446 11.8144 15.6979 8.8877C14.5446 5.96103 11.6979 3.8877 8.36458 3.8877ZM8.36458 12.221C6.52458 12.221 5.03125 10.7277 5.03125 8.88769C5.03125 7.0477 6.52458 5.55436 8.36458 5.55436C10.2046 5.55436 11.6979 7.0477 11.6979 8.88769C11.6979 10.7277 10.2046 12.221 8.36458 12.221ZM6.36458 8.8877C6.36458 7.78103 7.25792 6.8877 8.36458 6.8877C9.47125 6.8877 10.3646 7.78103 10.3646 8.8877C10.3646 9.99436 9.47125 10.8877 8.36458 10.8877C7.25792 10.8877 6.36458 9.99436 6.36458 8.8877Z" fill="white" />
                                </svg>
                                <span>Lire</span></a>
                            <a download class="py-3 px-4 max-md:flex-1 bg-white text-center text-black text-sm font-semibold rounded-lg flex gap-2 justify-center items-center" href="<?= $file_url ?>"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.8698 7.2207H11.9298C12.5231 7.2207 12.8165 7.9407 12.3965 8.3607L9.33646 11.4207C9.07646 11.6807 8.65646 11.6807 8.39646 11.4207L5.33646 8.3607C4.91646 7.9407 5.21646 7.2207 5.80979 7.2207H6.86979V3.88737C6.86979 3.5207 7.16979 3.2207 7.53646 3.2207H10.2031C10.5698 3.2207 10.8698 3.5207 10.8698 3.88737V7.2207ZM4.86979 14.554C4.50313 14.554 4.20312 14.254 4.20312 13.8874C4.20312 13.5207 4.50313 13.2207 4.86979 13.2207H12.8698C13.2365 13.2207 13.5365 13.5207 13.5365 13.8874C13.5365 14.254 13.2365 14.554 12.8698 14.554H4.86979Z" fill="black" />
                                </svg>
                                <span>Télécharger</span></a>
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
<section class="relative h-90.5 bg-center bg-contain md:bg-cover bg-no-repeat bg-fixed" style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">
    <div class="absolute inset-0 bg-black/74">
        <div class="py-13 flex flex-col gap-10 overflow-hidden container lg:items-center">
            <h1 class="text-4xl font-bold text-center">
                <?php the_title() ?>
            </h1>
            <div class="flex gap-4 overflow-x-auto justify-center">
                <?php
                foreach ($cpts as $cpt) : ?>
                    <a href="?type=<?= $cpt["slug"] ?>" class="border border-white rounded-lg p-4 block hover:bg-white hover:text-black text-nowrap <?= $type === $cpt['slug'] ? 'bg-white text-black' : '' ?>">
                        <span class="text-xs font-medium"><?= $cpt["label"] ?> </span>
                    </a>
                <?php
                endforeach;
                ?>
            </div>
            <form class="pt-3 lg:w-163">
                <input type="hidden" name="type" value="<?= $type ?>" />
                <input type="search" value="<?= $search ?>" name="search" placeholder="Recherchez un contenu" autofocus class="w-full text-white bg-white/40 py-3.5 px-8 rounded-xl focus-visible:outline-none lg:text-xl">
            </form>
        </div>
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
            's' => $search,
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