<?php
function event()
{
    $date = get_field("time");
    if ($date) {
        $timestamp = strtotime($date);
        $jour = date_i18n('d', $timestamp);
        $mois = date_i18n('M', $timestamp);
        $time = date_i18n('H:i', $timestamp);
    }
?>
    <a href="<?= get_the_permalink() ?>" class="rounded-3xl flex flex-col gap-10 p-6 event_gradient">
        <div class="rounded-lg p-2 bg-white font-bold w-fit aspect-square text-center">
            <span class="text-32"><?= $jour ?></span> <br>
            <span><?= $mois ?></span>
        </div>
        <div class="flex flex-col gap-4 font-bold text-white">
            <span class="text-[22px] font-bold"><?= the_title() ?></span>
            <span class="font-medium"><?= $time ?></span>
        </div>
    </a>
<?php
}

function market()
{
    $file = get_field("file");
?>
    <div class="flex flex-col lg:flex-row gap-4 p-4 lg:p-6 lg:gap-3 relative bg-white rounded-lg">
        <div class="absolute w-1 h-15 bg-vert rounded-3xl top-6 -left-0.5">
        </div>
        <div class="bg-gray-50 rounded-xl hidden lg:flex size-25 items-center justify-center">
            <?= icon("pdf") ?>
        </div>
        <div class="flex flex-col lg:flex-row flex-1 gap-4 justify-between items-start">

            <div class="flex flex-col gap-2 lg:gap-3">
                <b class="text-sm md:text-base lg:text-xl"><?= the_title() ?></b>
                <div class="flex gap-2 text-gray-500 text-xs">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 5H1.5M8 1V3M4 1V3M3.9 11H8.1C8.94008 11 9.36012 11 9.68099 10.8365C9.96323 10.6927 10.1927 10.4632 10.3365 10.181C10.5 9.86012 10.5 9.44008 10.5 8.6V4.4C10.5 3.55992 10.5 3.13988 10.3365 2.81901C10.1927 2.53677 9.96323 2.3073 9.68099 2.16349C9.36012 2 8.94008 2 8.1 2H3.9C3.05992 2 2.63988 2 2.31901 2.16349C2.03677 2.3073 1.8073 2.53677 1.66349 2.81901C1.5 3.13988 1.5 3.55992 1.5 4.4V8.6C1.5 9.44008 1.5 9.86012 1.66349 10.181C1.8073 10.4632 2.03677 10.6927 2.31901 10.8365C2.63988 11 3.05992 11 3.9 11Z" stroke="#6B7280" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <?= get_the_date("d/m/Y") ?>
                </div>

            </div>
            <a href="<?= $file ?>" download class="flex gap-2.5 items-center xl:text-base xl:p-4 text-center font-semibold bg-vert text-white rounded-lg px-3 py-2 text-xs w-fit">
                <span class=""><svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 15.5V16.7C21 18.3802 21 19.2202 20.673 19.862C20.3854 20.4265 19.9265 20.8854 19.362 21.173C18.7202 21.5 17.8802 21.5 16.2 21.5H7.8C6.11984 21.5 5.27976 21.5 4.63803 21.173C4.07354 20.8854 3.6146 20.4265 3.32698 19.862C3 19.2202 3 18.3802 3 16.7V15.5M17 10.5L12 15.5M12 15.5L7 10.5M12 15.5V3.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span> <span class="flex-1"> Télécharger</span>
            </a>
        </div>


    </div>
<?php
}

function offer()
{
    $file = get_field("file");
    $availability = get_field("availability");
    $contrat_type = get_field("contrat_type");
?>
    <div class="flex flex-col lg:flex-row gap-4 p-4 lg:p-6 lg:gap-3 relative bg-white rounded-lg">
        <div class="absolute w-1 h-15 bg-vert rounded-3xl top-6 -left-0.5">
        </div>
        <div class="bg-gray-50 rounded-xl hidden lg:flex size-25 items-center justify-center">
            <?= icon("pdf") ?>
        </div>
        <div class="flex flex-col lg:flex-row flex-1 gap-4 justify-between items-start">

            <div class="flex flex-col gap-2 lg:gap-3">
                <b class="text-sm md:text-base lg:text-xl"><?= the_title() ?></b>
                <div class="flex text-gray-500 text-xs gap-4">
                    <div class="flex gap-2">
                        <span class="flex gap-1.5">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 3.5C8 3.03501 8 2.80252 7.94889 2.61177C7.81019 2.09413 7.40587 1.68981 6.88823 1.55111C6.69748 1.5 6.46499 1.5 6 1.5C5.53501 1.5 5.30252 1.5 5.11177 1.55111C4.59413 1.68981 4.18981 2.09413 4.05111 2.61177C4 2.80252 4 3.03501 4 3.5M2.6 10.5H9.4C9.96005 10.5 10.2401 10.5 10.454 10.391C10.6422 10.2951 10.7951 10.1422 10.891 9.95399C11 9.74008 11 9.46005 11 8.9V5.1C11 4.53995 11 4.25992 10.891 4.04601C10.7951 3.85785 10.6422 3.70487 10.454 3.60899C10.2401 3.5 9.96005 3.5 9.4 3.5H2.6C2.03995 3.5 1.75992 3.5 1.54601 3.60899C1.35785 3.70487 1.20487 3.85785 1.10899 4.04601C1 4.25992 1 4.53995 1 5.1V8.9C1 9.46005 1 9.74008 1.10899 9.95399C1.20487 10.1422 1.35785 10.2951 1.54601 10.391C1.75992 10.5 2.03995 10.5 2.6 10.5Z" stroke="#6B7280" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?= $availability ?>
                        </span>
                        <span class="flex gap-1.5">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 1.13477V3.20004C7 3.48006 7 3.62007 7.0545 3.72703C7.10243 3.82111 7.17892 3.8976 7.273 3.94554C7.37996 4.00004 7.51997 4.00004 7.8 4.00004H9.86527M7 8.5H4M8 6.5H4M10 4.99411V8.6C10 9.44008 10 9.86012 9.83651 10.181C9.6927 10.4632 9.46323 10.6927 9.18099 10.8365C8.86012 11 8.44008 11 7.6 11H4.4C3.55992 11 3.13988 11 2.81901 10.8365C2.53677 10.6927 2.3073 10.4632 2.16349 10.181C2 9.86012 2 9.44008 2 8.6V3.4C2 2.55992 2 2.13988 2.16349 1.81901C2.3073 1.53677 2.53677 1.3073 2.81901 1.16349C3.13988 1 3.55992 1 4.4 1H6.00589C6.37277 1 6.55622 1 6.72885 1.04145C6.8819 1.07819 7.02822 1.1388 7.16243 1.22104C7.3138 1.3138 7.44352 1.44352 7.70294 1.70294L9.29706 3.29706C9.55648 3.55648 9.6862 3.6862 9.77896 3.83757C9.8612 3.97178 9.92181 4.1181 9.95855 4.27115C10 4.44378 10 4.62723 10 4.99411Z" stroke="#6B7280" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?= $contrat_type ?>
                        </span>
                    </div>

                    <div class="flex gap-2 ">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 5H1.5M8 1V3M4 1V3M3.9 11H8.1C8.94008 11 9.36012 11 9.68099 10.8365C9.96323 10.6927 10.1927 10.4632 10.3365 10.181C10.5 9.86012 10.5 9.44008 10.5 8.6V4.4C10.5 3.55992 10.5 3.13988 10.3365 2.81901C10.1927 2.53677 9.96323 2.3073 9.68099 2.16349C9.36012 2 8.94008 2 8.1 2H3.9C3.05992 2 2.63988 2 2.31901 2.16349C2.03677 2.3073 1.8073 2.53677 1.66349 2.81901C1.5 3.13988 1.5 3.55992 1.5 4.4V8.6C1.5 9.44008 1.5 9.86012 1.66349 10.181C1.8073 10.4632 2.03677 10.6927 2.31901 10.8365C2.63988 11 3.05992 11 3.9 11Z" stroke="#6B7280" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <?= get_the_date("d/m/Y") ?>
                    </div>
                </div>

            </div>
            <a href="<?= $file ?>" download class="flex gap-2.5 items-center xl:text-base xl:p-4 text-center font-semibold bg-vert text-white rounded-lg px-3 py-2 text-xs w-fit">
                <span class=""><svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 15.5V16.7C21 18.3802 21 19.2202 20.673 19.862C20.3854 20.4265 19.9265 20.8854 19.362 21.173C18.7202 21.5 17.8802 21.5 16.2 21.5H7.8C6.11984 21.5 5.27976 21.5 4.63803 21.173C4.07354 20.8854 3.6146 20.4265 3.32698 19.862C3 19.2202 3 18.3802 3 16.7V15.5M17 10.5L12 15.5M12 15.5L7 10.5M12 15.5V3.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span> <span class="flex-1"> Télécharger</span>
            </a>
        </div>


    </div>
<?php
}

function project()
{
?>
    <a href="<?= get_the_permalink() ?>" class="rounded-2xl flex flex-col overflow-hidden" style="background-color:<?= get_field("color") ?>;">
        <div class="h-53.75 overflow-hidden">
            <img class="h-full w-full hover:scale-110 transition-transform" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>">
        </div>
        <div class="py-8 px-6">
            <span class="text-xl text-white font-semibold">
                <?= the_title() ?>
            </span>
        </div>
    </a>
<?php
}

function article()
{
?>
    <a href="<?= get_the_permalink() ?>" class="rounded-2xl bg-white flex flex-col overflow-hidden">
        <div class="h-59.5 overflow-hidden">
            <img class="h-full w-full hover:scale-110 transition-transform" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>">
        </div>
        <div class="flex flex-col gap-2.5 p-5">
            <span class="text-xs text-vert font-medium">Actualité </span>
            <b>
                <?= the_title() ?>
            </b>
            <span class="text-xs text-gray-700 font-medium">
                <?= the_date("d M Y") ?>
            </span>
        </div>
    </a>
<?php
}

function ressource()
{
    $type = get_field("type_ressource");
?>
    <a href="<?= get_the_permalink() ?>" class="rounded-3xl p-6 bg-white flex flex-col gap-6 overflow-hidden">
        <div class="h-62.5 rounded-2xl overflow-hidden relative">
            <?php if ($type == "video") : ?>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-[#D92E20] w-15 h-15 flex justify-center items-center rounded-full">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.685 10.2887L7.67898 3.27267C7.37381 3.09544 7.02746 3.00142 6.67455 3.00002C6.32165 2.99861 5.97456 3.08987 5.66798 3.26467C5.36349 3.43561 5.11022 3.68484 4.9344 3.98655C4.75858 4.28825 4.6666 4.63147 4.66798 4.98067V19.0127C4.6666 19.3619 4.75858 19.7051 4.9344 20.0068C5.11022 20.3085 5.36349 20.5577 5.66798 20.7287C5.97445 20.9043 6.32182 20.9961 6.67506 20.9947C7.0283 20.9933 7.37493 20.8988 7.67998 20.7207L19.687 13.7047C19.9861 13.531 20.2344 13.2818 20.4069 12.9821C20.5795 12.6824 20.6703 12.3425 20.6703 11.9967C20.6703 11.6508 20.5795 11.311 20.4069 11.0112C20.2344 10.7115 19.9861 10.4623 19.687 10.2887H19.685Z" fill="white" />
                    </svg>
                </div>
            <?php endif ?>
            <img loading="lazy" class="h-full w-full hover:scale-110 transition-transform" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>">
        </div>
        <div class="flex flex-col gap-8.5">
            <div class="flex flex-col gap-2">
                <span class="text-xs text-gray-500 font-semibold flex items-center capitalize">
                    <?php if ($type !== "video") : ?>
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.49984 12.1875L7.44773 12.1093C7.08593 11.5666 6.90504 11.2953 6.66604 11.0989C6.45445 10.925 6.21065 10.7945 5.94859 10.7149C5.65257 10.625 5.32646 10.625 4.67422 10.625H3.95817C3.37478 10.625 3.08309 10.625 2.86026 10.5115C2.66426 10.4116 2.50491 10.2522 2.40504 10.0562C2.2915 9.83342 2.2915 9.54172 2.2915 8.95833V4.47917C2.2915 3.89578 2.2915 3.60408 2.40504 3.38126C2.50491 3.18526 2.66426 3.0259 2.86026 2.92603C3.08309 2.8125 3.37478 2.8125 3.95817 2.8125H4.1665C5.33328 2.8125 5.91667 2.8125 6.36232 3.03957C6.75432 3.23931 7.07303 3.55802 7.27277 3.95002C7.49984 4.39567 7.49984 4.97906 7.49984 6.14583M7.49984 12.1875V6.14583M7.49984 12.1875L7.55195 12.1093C7.91374 11.5666 8.09464 11.2953 8.33364 11.0989C8.54522 10.925 8.78902 10.7945 9.05108 10.7149C9.3471 10.625 9.67322 10.625 10.3254 10.625H11.0415C11.6249 10.625 11.9166 10.625 12.1394 10.5115C12.3354 10.4116 12.4948 10.2522 12.5946 10.0562C12.7082 9.83342 12.7082 9.54172 12.7082 8.95833V4.47917C12.7082 3.89578 12.7082 3.60408 12.5946 3.38126C12.4948 3.18526 12.3354 3.0259 12.1394 2.92603C11.9166 2.8125 11.6249 2.8125 11.0415 2.8125H10.8332C9.66639 2.8125 9.08301 2.8125 8.63736 3.03957C8.24535 3.23931 7.92664 3.55802 7.72691 3.95002C7.49984 4.39567 7.49984 4.97906 7.49984 6.14583" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    <?php else : ?>
                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.79297 3.11869C3.79297 2.51171 3.79297 2.20822 3.91952 2.04093C4.02978 1.89519 4.19829 1.805 4.38072 1.79411C4.59012 1.7816 4.84263 1.94995 5.34767 2.28664L11.9199 6.66812C12.3372 6.94632 12.5458 7.08543 12.6186 7.26075C12.6821 7.41404 12.6821 7.58631 12.6186 7.73959C12.5458 7.91492 12.3372 8.05402 11.9199 8.33222L5.34767 12.7137C4.84263 13.0504 4.59012 13.2187 4.38072 13.2062C4.19829 13.1953 4.02978 13.1052 3.91952 12.9594C3.79297 12.7921 3.79297 12.4886 3.79297 11.8817V3.11869Z" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    <?php endif ?>
                    <?= $type ?> </span>
                <span class="font-semibold text-xl"><?= the_title() ?></span>
            </div>
            <span class="text-xs text-gray-400 font-medium">
                <?= get_the_date("d M Y") ?> </span>
        </div>
    </a>
<?php
}
