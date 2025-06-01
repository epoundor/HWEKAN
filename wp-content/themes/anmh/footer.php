<?php
$option_info_email = get_field('email', 'option');
$option_info_facebook = get_field('facebook', 'option');
$option_info_linkedin = get_field('linkedin', 'option');
$option_info_youtube = get_field('youtube', 'option');


?>
</main>
<footer>
    <div class="bg-vert">
        <div class="container py-6 px-4 gap-10 justify-between flex flex-col md:flex-row md:justify-between">
            <div class="flex gap-4.5 items-center md:max-w-1/2">
                <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_746_5279)">
                        <path d="M41.8 10.91L30.86 0.729989C30.3537 0.261921 29.6895 0.00195313 29 0.00195312C28.3105 0.00195313 27.6463 0.261921 27.14 0.729989L16.25 10.91H41.8Z" fill="#E7B301" />
                        <path d="M52 10.9102H6V30.5702L21 42.0002H37L52 30.5702V10.9102Z" fill="#F5F6F6" />
                        <path d="M41 20.1201H17C16.7348 20.1201 16.4804 20.0148 16.2929 19.8272C16.1054 19.6397 16 19.3853 16 19.1201C16 18.8549 16.1054 18.6005 16.2929 18.413C16.4804 18.2255 16.7348 18.1201 17 18.1201H41C41.2652 18.1201 41.5196 18.2255 41.7071 18.413C41.8946 18.6005 42 18.8549 42 19.1201C42 19.3853 41.8946 19.6397 41.7071 19.8272C41.5196 20.0148 41.2652 20.1201 41 20.1201Z" fill="#CFD0D6" />
                        <path d="M41 25.6201H17C16.7348 25.6201 16.4804 25.5148 16.2929 25.3272C16.1054 25.1397 16 24.8853 16 24.6201C16 24.3549 16.1054 24.1005 16.2929 23.913C16.4804 23.7255 16.7348 23.6201 17 23.6201H41C41.2652 23.6201 41.5196 23.7255 41.7071 23.913C41.8946 24.1005 42 24.3549 42 24.6201C42 24.8853 41.8946 25.1397 41.7071 25.3272C41.5196 25.5148 41.2652 25.6201 41 25.6201Z" fill="#CFD0D6" />
                        <path d="M41 31.1201H17C16.7348 31.1201 16.4804 31.0148 16.2929 30.8272C16.1054 30.6397 16 30.3853 16 30.1201C16 29.8549 16.1054 29.6005 16.2929 29.413C16.4804 29.2255 16.7348 29.1201 17 29.1201H41C41.2652 29.1201 41.5196 29.2255 41.7071 29.413C41.8946 29.6005 42 29.8549 42 30.1201C42 30.3853 41.8946 30.6397 41.7071 30.8272C41.5196 31.0148 41.2652 31.1201 41 31.1201Z" fill="#CFD0D6" />
                        <path d="M41 36.6201H17C16.7348 36.6201 16.4804 36.5148 16.2929 36.3272C16.1054 36.1397 16 35.8853 16 35.6201C16 35.3549 16.1054 35.1005 16.2929 34.913C16.4804 34.7255 16.7348 34.6201 17 34.6201H41C41.2652 34.6201 41.5196 34.7255 41.7071 34.913C41.8946 35.1005 42 35.3549 42 35.6201C42 35.8853 41.8946 36.1397 41.7071 36.3272C41.5196 36.5148 41.2652 36.6201 41 36.6201Z" fill="#CFD0D6" />
                        <path d="M6.11 30.6502L6 30.5702V20.4102L0 26.0002L6.11 30.6502Z" fill="#E7B301" />
                        <path d="M52 20.4102V30.5702L51.79 30.7302L58 26.0002L52 20.4102Z" fill="#E7B301" />
                        <path d="M0 58H0.13H57.54H57.87H58L37 42H21L0 58Z" fill="#E7B301" />
                        <path d="M0 58V26L21 42L0 58Z" fill="#FBD142" />
                        <path d="M58 58V26L37 42L58 58Z" fill="#FBD142" />
                    </g>
                    <defs>
                        <clipPath id="clip0_746_5279">
                            <rect width="58" height="58" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                <b class="text-lg text-white">Abonnez-vous à notre newsletter et soyez les premiers informés de nos actualités</b>
            </div>
            <div class="flex flex-col gap-2 md:flex-row">
                <input type="email" name="email" placeholder="Entrez votre email" class="py-3 px-4 bg-gray-50 text-gray-500 rounded-lg">
                <?= button("S’abonner", "", "bg-black text-white") ?>
            </div>
        </div>
    </div>
    <div class="bg-[#262626]">
        <div class="container p-6 flex flex-col lg:flex-row lg:justify-between gap-10 text-white">
            <div class="flex flex-col gap-10">
                <img class="w-78.75" src="<?= get_field("footer_logo", "option") ?>" alt="Logo ANMH">
                <div class="flex flex-col gap-4">
                    <span class="font-semibold text-sm">Pour une santé publique accessible à tous.</span>
                    <div class="flex gap-2">
                        <a aria-label="facebook" href="<?= esc_url($option_info_facebook) ?>" target="_blank"
                            class="text-white hover:text-black transition transition-discrete flex items-center justify-center border border-white rounded-full w-8 h-8 p-2 hover:bg-white">
                            <?= icon("twitter") ?>
                        </a>
                        <a aria-label="facebook" href="<?= esc_url($option_info_facebook) ?>" target="_blank"
                            class="text-white hover:text-black transition transition-discrete flex items-center justify-center border border-white rounded-full w-8 h-8 p-2 hover:bg-white">
                            <?= icon("facebook") ?>
                        </a>
                        <a aria-label="facebook" href="<?= esc_url($option_info_facebook) ?>" target="_blank"
                            class="text-white hover:text-black transition transition-discrete flex items-center justify-center border border-white rounded-full w-8 h-8 p-2 hover:bg-white">
                            <?= icon("youtube") ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-10">
                <img class="lg:hidden" src="<?= get_template_directory_uri() . '/assets/minister-logo.svg' ?>" alt="logo du minister">
                <div class="flex flex-col gap-6">
                    <div class="text-xs">
                        <span class="text-white/50 ">Liens utiles </span>
                        <ul class="flex flex-col gap-2 underline *:py-1">
                            <li>Présidence du Bénin</li>
                            <li>Ministre de la santé</li>
                            <li>Ministre de l'Économie et des Finances</li>
                            <li>Ministère du Travail et de la Fonction publique</li>
                        </ul>
                    </div>
                    <ul class="flex gap-6 underline text-white/50 text-xs">
                        <li>Plan du site</li>
                        <li>Conditions d’utilisation</li>
                    </ul>
                </div>
            </div>
            <img class="lg:block !object-contain hidden w-89" src="<?= get_template_directory_uri() . '/assets/minister-logo.svg' ?>" alt="logo du minister">


        </div>
        <div class="p-6 text-center text-white text-sm">© Agence Nationale de Maintenance Hospitalière - 2025 . Tous droits réservés</div>
    </div>
    <div class="flex">
        <div class="flex-1 bg-[#3D855B] h-2"></div>
        <div class="flex-1 bg-[#F5C142] h-2"></div>
        <div class="flex-1 bg-[#D92E20] h-2"></div>
    </div>

    <?= wp_footer() ?>
</footer>