<?php

function article($classes = null)
{
?>
    <a href="<?= get_the_permalink() ?>" class="p-3 flex flex-col gap-4 bg-white h-full w-full rounded-2xl <?= $classes ?>">
        <div class="h-40">
            <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>" class="w-full h-full object-cover rounded-[14px]">
        </div>
        <div class="flex flex-col font-lora flex-1">
            <b class="text-black text-lg"><?= the_title() ?></b>
            <p class="font-medium text-[#4A4A68]"><?= get_the_excerpt() ?></p>
        </div>
        <button class="px-4 py-3 text-center bg-primary font-medium rounded border border-gray-200">Lire la suite</button>
    </a>
<?php
}

function interview($classes = null)
{
?>

    <a href="<?= get_the_permalink() ?>" class="p-3 flex flex-col gap-4 bg-white h-full w-full rounded-2xl <?= $classes ?>">
        <div class="h-40 relative">
            <div class="py-1 px-2 font-medium text-[10px] bg-white text-black absolute left-1/2 -translate-x-1/2 -top-3">Interview</div>
            <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>" class="w-full h-full object-cover rounded-[14px]">
        </div>
        <div class="flex flex-col font-lora flex-1">
            <b class="text-black text-lg"><?= the_title() ?></b>
            <p class="font-medium text-[#4A4A68]"><?= get_the_excerpt() ?></p>
        </div>
        <button class="px-4 py-3 text-center bg-primary hover:bg-white font-medium rounded border border-gray-200">Lire la suite</button>
    </a>
<?php
}

function portrait($classes = null)
{
?>
    <div class="w-full aspect-[65/90] rounded-2xl relative <?= $classes ?>" style="background-image: url('<?= get_the_post_thumbnail_url() ?>'); background-size: cover; background-position: center;">
        <div class="absolute bottom-0 inset-0 flex flex-col justify-end items-center bg-gradient-to-t to-20% from-black/40 to-transparent">
            <a href="<?= get_the_permalink() ?>" class="w-10/12 bg-white text-black hover:bg-black rounded-lg hover:!text-white py-3 px-6 font-semibold  mb-7.5 text-center">Découvire</a>
        </div>
    </div>
<?php
}

function documentation($classes = null)
{
?>
    <div class="p-4.5 bg-white w-full rounded-2xl aspect-[131/170] <?= $classes ?>" title="<?= get_the_title() ?>">
        <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>">
    </div>
<?php
}

function agenda($classes = null)
{
?>
    <div class="px-8 pt-4 pb-10.5 rounded-2xl bg-[#F2F2F2] w-full aspect-square <?= $classes ?>" title="<?= get_the_title() ?>">
        <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>">
    </div>
<?php
}

function opportunity($classes = null)
{
?>
    <div class="px-8 pt-4 pb-10.5 bg-[#F2F2F2] w-full aspect-square rounded-2xl <?= $classes ?>" title="<?= get_the_title() ?>">
        <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>">
    </div>
<?php
}
