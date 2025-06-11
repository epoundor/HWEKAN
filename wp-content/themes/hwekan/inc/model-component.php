<?php

function article($classes = null)
{
?>
    <a href="<?= get_the_permalink() ?>" class="py-6 px-8 flex flex-col gap-5 bg-white w-63.75 <?= $classes ?>">
        <div class="h-27">
            <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>" class="w-full h-full object-cover">
        </div>
        <div class="flex flex-col gap-3 font-bold text-black">
            <span class="text-primary text-[8px]"><?php the_date("d/m/Y") ?></span>
            <b><?= the_title() ?></b>
        </div>
        <p class="text-xs font-medium text-black h-17 truncate"><?= get_the_excerpt() ?></p>
        <button class="px-4 py-2.5 text-center text-xs text-primary font-medium rounded border border-gray-200">Lire la suite</button>
    </a>
<?php
}

function interview($classes = null)
{
?>
    <a href="<?= get_the_permalink() ?>" class="py-6 px-8 flex flex-col gap-5 bg-white w-63.75 <?= $classes ?>">
        <div class="h-27 relative">
            <div class="py-1 px-2 font-medium text-[10px] bg-white text-black absolute left-1/2 -translate-x-1/2 -top-3">Interview</div>
            <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>" class="w-full h-full object-cover">
        </div>
        <div class="flex flex-col gap-3 font-bold text-black">
            <span class="text-primary text-[8px]"><?php the_date("d/m/Y") ?></span>
            <b><?= the_title() ?></b>
        </div>
        <p class="text-xs font-medium text-black h-17 truncate"><?= get_the_excerpt() ?></p>
        <button class="px-4 py-2.5 text-center text-xs text-primary font-medium rounded border border-gray-200">Lire la suite</button>
    </a>
<?php
}

function portrait($classes = null)
{
?>
    <div class="w-65 aspect-[65/90] relative <?= $classes ?>" style="background-image: url('<?= get_the_post_thumbnail_url() ?>'); background-size: cover; background-position: center;">
        <div class="absolute bottom-0 inset-0 flex flex-col justify-end items-center bg-gradient-to-t to-20% from-black/40 to-transparent">
            <a href="<?= get_the_permalink() ?>" class="w-10/12 bg-white py-3 px-6 font-semibold text-black mb-7.5 text-center">Découvire</a>
        </div>
    </div>
<?php
}

function documentation($classes = null)
{
?>
    <div class="p-7 bg-white w-65.5 aspect-[131/170] <?= $classes ?>" title="<?= get_the_title() ?>">
        <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>">
    </div>
<?php
}

function agenda($classes = null)
{
?>
    <div class="px-8 pt-4 pb-10.5 bg-[#F2F2F2] w-64.5 aspect-square <?= $classes ?>" title="<?= get_the_title() ?>">
        <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>">
    </div>
<?php
}

function opportunity($classes = null)
{
?>
    <div class="px-8 pt-4 pb-10.5 bg-[#F2F2F2] w-64.5 aspect-square <?= $classes ?>" title="<?= get_the_title() ?>">
        <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>">
    </div>
<?php
}
