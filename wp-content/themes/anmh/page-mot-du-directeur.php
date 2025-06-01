<?php get_header() ?>
<section class="container py-4 lg:py-10">
    <h1 class="section-title"><?= the_title() ?></h1>
    <div class="flex flex-col lg:flex-row gap-6 lg:gap-20">
        <div class="flex flex-col gap-6 lg:flex-1/3">
            <img src="<?= get_field('pr_image') ?>" class="max-lg:h-73.75 rounded-2xl lg:aspect-square lg:w-82 object-top" alt="image du pr">
            <div class="flex flex-col gap-1">
                <b><?= get_field('pr_name') ?></b>
                <span class="font-semibold text-slate-500 text-sm"><?= get_field('pr_job_title') ?></span>
            </div>
        </div>
        <div class="flex-2/3 space-y-6">
            <div class="flex flex-col gap-2.5">
                <div class="font-bold text-[22px] lg:text-2xl/9"><?= the_field("message_title") ?></div>
                <div class="w-15 h-1.75 bg-vert"></div>
            </div>
            <div class="space-y-4 font-medium text-[15px]/7.5">
                <? the_content() ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>