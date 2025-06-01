<?php get_header();
$document_title = get_field("document")["document_title"];
$type_ressource = get_field("type_ressource");
$document_video =  get_field("document_video")
?>

<div class="container">
    <section class="additionnal_container py-10 md:py-15 page">

        <div class="rounded-40 max-md:aspect-[164/83] md:h-134 overflow-hidden relative">
            <img class="w-full h-full" src="<?= the_post_thumbnail_url() ?>" alt="<?= the_post_thumbnail_caption() ?>">
        </div>
        <div class="flex flex-col-reverse lg:flex-row gap-6 mt-15">
            <div class="flex flex-col lg:flex-row gap-3 items-start">
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
    <div class="py-10">
        <?php if ($document_title && $type_ressource !== "video"): ?>
            <div class="rounded-3xl bg-[#F7F2EA] px-6 py-12.5 flex flex-col gap-10 items-center">
                <span class="text-32 font-medium">
                    <?= $document_title; ?>
                </span>
                <a href="<?= $document_title ?>" download class="flex gap-2.5 items-center rounded-lg py-3 px-3.5 text-sm xl:text-base xl:p-4 text-center font-semibold bg-vert text-white w-fit">
                    <span class="flex-1"> Télécharger le document</span>
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.5 15V16.2C21.5 17.8802 21.5 18.7202 21.173 19.362C20.8854 19.9265 20.4265 20.3854 19.862 20.673C19.2202 21 18.3802 21 16.7 21H8.3C6.61984 21 5.77976 21 5.13803 20.673C4.57354 20.3854 4.1146 19.9265 3.82698 19.362C3.5 18.7202 3.5 17.8802 3.5 16.2V15M17.5 10L12.5 15M12.5 15L7.5 10M12.5 15V3" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </a>
            </div>
        <?php endif ?>
        <?php if ($type_ressource == "video") : ?>
            <div class="aspect-video rounded-40 overflow-hidden">
                <iframe class="w-full  aspect-video" src="<?= $document_video ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
            </div>
        <?php endif ?>
    </div>
</div>



<?php get_footer() ?>