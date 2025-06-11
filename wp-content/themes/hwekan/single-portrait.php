<?php get_header();
$name = get_field("name");
$job = get_field("job");
$description = get_field("description");

?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap');
</style>
<main class="bg-white text-black">
    <div class="additionnal_container">
        <h1 class="text-[32px] py-4 font-bold">Portrait</h1>
        <div class="lg:flex">
            <div class="lg:w-1/3 flex flex-col gap-4.5">
                <img class="w-full aspect-[82/106] relative" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>" />
                <div class="flex flex-col gap-1">
                    <b class="text-xl"><?= $name ?></b>
                    <span class="text-gray-700 text-sm"><?= $job ?></span>
                </div>
            </div>
            <div class="lg:w-2/3 lg:pl-10 py-15 lg:pt-0 flex flex-col gap-6 font-lora page">
                <div class="flex flex-col gap-2.5">
                    <span class="text-2xl font-bold"><?php the_title() ?></span>
                    <span class="text-sm"><?= $description ?></span>
                </div>
                <div class="flex gap-2 text-sm">
                    <span>DERNIÈRE MISE À JOUR</span>
                    <?= get_the_date("d/m/Y") ?>
                </div>
                <?php the_content() ?>
                <div class="flex gap-2 py-6 items-center lg:ml-auto">
                    <b class="font-medium text-[#555555]">Partagez cet article :</b>
                    <div class="flex gap-4">
                        <a target="popup" onclick='window.open("https://www.linkedin.com/sharing/share-offsite/?url=<?= get_the_permalink() ?>" ,"popup" ,"width=550,height=450"); return false;' class="flex justify-center items-center rounded-full cursor-pointer">
                            <?= icon("linkedin") ?>
                        </a>

                        <a target="popup" class="flex justify-center items-center rounded-full cursor-pointer">
                            <?= icon("instagram") ?>
                        </a>
                        <a target="popup" onclick='window.open("https://www.facebook.com/share.php?u=<?= get_the_permalink() ?>","popup","width=550,height=450"); return false;' class="flex justify-center items-center rounded-full cursor-pointer">
                            <?= icon("facebook") ?>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>


<?php get_footer() ?>