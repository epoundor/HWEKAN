<?php get_header() ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap');
</style>
<main class="bg-white text-black">
    <div class="additionnal_container">
        <div class="flex py-2 px-4">
            <a href="/" class="flex items-center gap-2">
                <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.50156 1.08749C5.34587 0.931444 5.13449 0.84375 4.91406 0.84375C4.69363 0.84375 4.48226 0.931444 4.32656 1.08749L0.501563 4.91249C0.176562 5.23749 0.176562 5.76249 0.501563 6.08749L4.32656 9.91249C4.65156 10.2375 5.17656 10.2375 5.50156 9.91249C5.82656 9.58749 5.82656 9.06249 5.50156 8.73749L2.26823 5.49582L5.50156 2.26249C5.82656 1.93749 5.81823 1.40415 5.50156 1.08749Z" fill="black" />
                </svg>
                <span class="text-sm font-medium inline-block text-gray-500 p-1">Accueil</span>
            </a>
            <a href="/media" class="flex items-center gap-2">
                <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.50156 1.08749C5.34587 0.931444 5.13449 0.84375 4.91406 0.84375C4.69363 0.84375 4.48226 0.931444 4.32656 1.08749L0.501563 4.91249C0.176562 5.23749 0.176562 5.76249 0.501563 6.08749L4.32656 9.91249C4.65156 10.2375 5.17656 10.2375 5.50156 9.91249C5.82656 9.58749 5.82656 9.06249 5.50156 8.73749L2.26823 5.49582L5.50156 2.26249C5.82656 1.93749 5.81823 1.40415 5.50156 1.08749Z" fill="black" />
                </svg>
                <span class="text-sm font-medium inline-block text-gray-500 p-1">Articles</span>
            </a>
            <a href="<?= get_the_permalink() ?>" class="flex items-center gap-2">
                <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.50156 1.08749C5.34587 0.931444 5.13449 0.84375 4.91406 0.84375C4.69363 0.84375 4.48226 0.931444 4.32656 1.08749L0.501563 4.91249C0.176562 5.23749 0.176562 5.76249 0.501563 6.08749L4.32656 9.91249C4.65156 10.2375 5.17656 10.2375 5.50156 9.91249C5.82656 9.58749 5.82656 9.06249 5.50156 8.73749L2.26823 5.49582L5.50156 2.26249C5.82656 1.93749 5.81823 1.40415 5.50156 1.08749Z" fill="black" />
                </svg>
                <span class="text-sm font-medium inline-block text-gray-500 p-1 truncate"><?= get_the_title() ?></span>
            </a>
        </div>
        <div class="py-18.75 flex flex-col gap-10">
            <div class="flex flex-col gap-6 font-lora">
                <span class="text-[40px] font-semibold"><?php the_title() ?></span>
                <div class="flex gap-2 text-sm">
                    <span>ARTICLES</span>
                    <span>-</span>
                    <span>DERNIÈRE MISE À JOUR</span>
                    <?= get_the_date("d/m/Y") ?>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>" class="h-49.5">
                <span class="italic text-[#565656] uppercase text-right text-xs"> Crédit photo: <?= get_the_post_thumbnail_caption() ?> </span>
            </div>
            <?php the_content() ?>
        </div>
    </div>
</main>


<?php get_footer() ?>