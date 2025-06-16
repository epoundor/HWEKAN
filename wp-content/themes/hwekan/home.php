<?php get_header() ?>
<?php
$categories = [
    [
        "label" => "Parutions",
        "slug" => "post"
    ],
    [
        "label" => "Portraits",
        "slug" => "portrait"
    ],

    [
        "label" => "Documentations",
        "slug" => "documentation"
    ],
    [
        "label" => "Agenda culturel",
        "slug" => "agenda"
    ],
    [
        "label" => "Opportunités",
        "slug" => "opportunity"
    ],

    [
        "label" => "Interviews",
        "slug" => "interview"
    ],
];

function show_cpt()
{
    $type = get_post_type();
?>
    <div class="item"
        data-aos="fade"
        data-post-type="<?= esc_attr($type) ?>">
        <?php
        switch ($type) {
            case "post":
                article();
                break;
            case "portrait":
                portrait();
                break;
            case "documentation":
                documentation();
                break;
            case "agenda":
                agenda();
                break;
            case "interview":
                interview();
                break;
            case "opportunity":
                opportunity();
                break;
            default:
                echo "";
                break;
        }
        ?>
    </div> <?php
        }
            ?>

<?php
$hero_video = get_field("video", "option");
$hero_video_poster = get_field("poster", "option");


$hero_images = get_field("images", "option");

?>

<section class="container flex flex-col gap-8 lg:gap-10.5 py-12.5 text-center justify-center items-center">
    <div class="flex flex-col gap-4">
        <b class="section-title">Nous faisons la promotion des Industries <br>
            Culturelles et Créatives (ICC) du Bénin</b>
        <span class="text-xl text-white/50">Un projet en cours ou en création ? Construisons ensemble son impact culturel et économique.</span>
    </div>

    <?= button("Lancez-vous maintenant", "http://wa.me/22955145377", "bg-white hover:bg-primary", "arrow-right") ?>

    <div class="relative w-full flex justify-center" data-aos="fade-up">
        <video class="relative hero_video z-10 aspect-video w-full max-w-full rounded-3xl object-cover" style="width: 746px;" poster="<?= $hero_video_poster ?>" autoplay muted loop playsinline preload="metadata" fetchpriority="high">
            <source src="<?= $hero_video["url"] ?>" type="<?= $hero_video["mime_type"] ?>">
        </video>
        <div class="hero_section h-90 -top-22.5 left-0">
            <img class="h-full object-cover object-center " src="<?= $hero_images[0]["image"] ?>" height="360" width="300" alt="">
        </div>
        <div class="hero_section -top-22.5 right-0">
            <img class="h-full object-cover object-center " src="<?= $hero_images[1]["image"] ?>" height="157" width="283" alt="">
        </div>
        <div class="hero_section"></div>
        <div class=" hero_section h-53.75 bottom-11 right-0">
            <img class="h-full object-cover object-center " src="<?= $hero_images[2]["image"] ?>" height="215" width="176" alt="">
        </div>
    </div>
</section>
<section class="container flex flex-col gap-8 py-12.5 lg:py-25" data-aos="fade-up">

    <div class="flex flex-col lg:flex-row lg:gap-12.5 gap-4 items-center">
        <div class="flex flex-col gap-4 flex-1">
            <b class="section-title">Qui sommes-nous</b>
            <p class="text-lg leading-[150%] text-justify">Hwèkan Media est un espace de valorisation, de narration et de documentation des dynamiques créatives béninois. Nous mettons en lumière les talents, les projets et les initiatives qui façonnent nos Industries Culturelles et Créatives (ICC). Ce que nous faisons, c’est de donner à voir tout ce qui mérite mieux qu’un simple coup d’œil.
            </p>
        </div>

        <div class="py-6 lg:p-11.5 lg:px-8.5 px-4 flex flex-col gap-4 border border-white/50 gradient rounded-xl flex-1">
            <div class="flex justify-between">
                <span class="text-xl lg:text-3xl font-medium">Hwèkan média</span>
                <?= icon("paint-deck") ?>
            </div>
            <p class="text-white/70">Création de contenus au service des ICC béninoises : arts visuels et vivants, littérature, cinéma, design, mode, artisanat, gastronomie, patrimoine matériel et immatériel, tourisme culturel et innovation</p>
        </div>
    </div>
</section>
<section class="container py-12.5 lg:py-25" data-aos="fade-up">
    <b class="section-title">Explorez votre scène culturelle en ligne</b>
    <div id="home-filter" class="flex flex-col gap-8 mt-10 lg:flex-row lg:gap-20">
        <div class="flex overflow-x-auto lg:flex-col">
            <?php foreach ($categories as $key => $category) : ?>
                <button class="py-2 px-3 rounded-full text-nowrap text-white/60 filter-btn w-fit <?= $key == 0 ? 'active' : '' ?>" data-slug="<?= $category['slug'] ?>">
                    <?= $category['label'] ?>
                </button>
            <?php endforeach; ?>
        </div>
        <div class="flex flex-col gap-10 lg:flex-1">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 overflow-x-auto lg:gap-10">
                <?php
                foreach ($categories as $key => $category) {
                    $args = array(
                        'post_type' => $category['slug'],
                        'post_status' => 'publish',
                        'posts_per_page' => 3,
                    );

                    $query = new WP_Query($args);
                    if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <?php show_cpt() ?>
                        <?php endwhile; ?>

                <?php
                    endif;
                    wp_reset_postdata();
                }
                ?>

            </div>
            <a id="see-all" href="/media" class="justify-end text-[#D5D5D5] items-center flex gap-1">
                <span>Voir plus</span>
                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.60017 0.914063L13.8445 6.16069L14.7713 7.0863L13.8457 8.0119L8.59902 13.2585L7.67342 12.3318L12.2648 7.74041L0.804687 7.74041L0.804687 6.43104L12.2648 6.43104L7.67227 1.84081L8.59788 0.914063L8.60017 0.914063Z" fill="#D5D5D5" />
                </svg>
            </a>
        </div>

    </div>
</section>
<section class="container flex flex-col gap-15 py-25 lg:py-25" data-aos="fade-up">
    <b class="text-center uppercase">1 an déjà, nos chiffres clés</b>

    <div class="flex flex-col gap-6 lg:flex-row lg:gap-10 items-center">
        <div class="p-4 flex flex-col text-center">
            <b class="text-[80px] stroke uppercase text-primary">+7000</b>
            <span class="text-xl uppercase">Abonnés de part le monde</span>
        </div>
        <div class="h-14 border border-gray-500"></div>
        <div class="p-4 flex flex-col text-center">
            <b class="text-[80px] uppercase text-white">+70000</b>
            <span class="text-xl uppercase">VUES PAR SEMAINE</span>
        </div>
        <div class="h-14 border border-gray-500"></div>
        <div class="p-4 flex flex-col text-center">
            <b class="text-[80px] stroke uppercase text-primary">+12</b>
            <span class="text-xl uppercase">évènements couverts</span>
        </div>
        <div class="h-14 border border-gray-500"></div>
        <div class="p-4 flex flex-col text-center">
            <b class="text-[80px] uppercase text-white">4</b>
            <span class="text-xl uppercase">clients fidèles</span>
        </div>
    </div>
</section>

<?php
$args = array(
    'post_type' => 'partner',
    'post_status' => 'publish',
    'posts_per_page' => -1,
);

$query = new WP_Query($args);
if ($query->have_posts()) : ?>
    <section class="py-25 container flex flex-col gap-15">
        <div class="h-px bg-gray-500 relative">
            <div class="absolute left-1/2 -translate-1/2 text-xl w-fit px-6 bg-black">Ils nous font confiance</div>
        </div>
        <div class="flex justify-center items-center py-1.5 gap-7.5">

            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="py-1 px-7.5 bg-white rounded-xl">
                    <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_post_thumbnail_caption() ?>">
                </div>
            <?php endwhile; ?>

        </div>
    </section>
<?php
endif;
wp_reset_postdata();
?>
<section class="py-25 bg-[#F1E9D5] max-lg:px-4">
    <div class="container bg-black rounded-[40px] flex flex-col items-center py-15 !px-7 lg:!px-20 gap-10">
        <svg width="230" height="54" viewBox="0 0 230 54" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_2333_6669)">
                <path d="M27.367 0.599609C12.8785 0.599609 1.08525 12.3618 1.07911 26.8185C1.07757 31.4397 2.2884 35.9505 4.58866 39.9264L0.859375 53.5156L14.7946 49.8693C18.6346 51.9584 22.957 53.0589 27.3562 53.0604H27.367C41.8539 53.0604 53.6471 41.2967 53.6533 26.84C53.6563 19.8339 50.9243 13.2462 45.9611 8.29086C40.998 3.334 34.3984 0.602675 27.367 0.599609ZM27.367 48.6323H27.3577C23.4379 48.6323 19.5919 47.5794 16.2375 45.5945L15.44 45.1224L7.17166 47.2866L9.37819 39.2444L8.85882 38.4198C6.67227 34.9497 5.51676 30.9385 5.51829 26.8216C5.5229 14.805 15.3248 5.0292 27.3762 5.0292C33.2121 5.03074 38.6977 7.30071 42.8219 11.4207C46.9476 15.5391 49.2172 21.0156 49.2156 26.8384C49.211 38.8551 39.4091 48.6323 27.367 48.6323ZM39.3508 32.3103C38.6946 31.9823 35.4647 30.3974 34.8624 30.1783C34.2601 29.9591 33.8221 29.8503 33.3842 30.5063C32.9463 31.1623 31.6878 32.6383 31.3052 33.0751C30.9226 33.5135 30.5385 33.5671 29.8823 33.2391C29.2262 32.9111 27.1088 32.2183 24.6011 29.9867C22.6481 28.2501 21.3297 26.1043 20.9471 25.4482C20.5645 24.7922 20.9056 24.4382 21.236 24.1117C21.531 23.819 21.8921 23.3469 22.2209 22.9637C22.5498 22.5805 22.6589 22.3077 22.8771 21.8693C23.0953 21.4325 22.9862 21.0493 22.8217 20.7213C22.6573 20.3933 21.3436 17.1684 20.7965 15.8564C20.2633 14.5797 19.7225 14.7513 19.3183 14.7314C18.9357 14.7115 18.4978 14.7084 18.0599 14.7084C17.622 14.7084 16.9105 14.8724 16.3082 15.5284C15.7058 16.1844 14.0094 17.7693 14.0094 20.9941C14.0094 24.219 16.3635 27.335 16.6908 27.7719C17.0196 28.2087 21.322 34.827 27.9109 37.6641C29.4782 38.3385 30.7013 38.7416 31.6556 39.0436C33.229 39.5417 34.6611 39.4712 35.792 39.3026C37.0536 39.1141 39.6781 37.7178 40.2251 36.1866C40.7721 34.6569 40.7721 33.3449 40.6077 33.0705C40.4433 32.7977 40.0053 32.6337 39.3492 32.3057L39.3508 32.3103ZM85.8539 31.9102H85.7832L81.4255 14.3727H76.1734L71.7435 31.6957H71.6728L67.6362 14.3727H62.0276L68.7794 39.8237H74.4601L78.7103 22.4993H78.7825L83.1049 39.8237H88.6781L95.5374 14.3727H90.0365L85.8554 31.9102H85.8539ZM112.647 22.9806C112.148 22.3276 111.463 21.8172 110.594 21.4478C109.725 21.0815 108.611 20.8976 107.254 20.8976C106.301 20.8976 105.325 21.1397 104.324 21.6287C103.323 22.1146 102.503 22.8932 101.859 23.963H101.751V14.3727H96.6791V39.8222H101.751V30.1629C101.751 28.2853 102.06 26.9381 102.681 26.1165C103.3 25.298 104.301 24.8873 105.682 24.8873C106.896 24.8873 107.741 25.2613 108.219 26.0108C108.695 26.7587 108.933 27.893 108.933 29.4134V39.8222H114.007V28.4877C114.007 27.3473 113.904 26.3081 113.703 25.3685C113.5 24.4321 113.15 23.635 112.649 22.9806H112.647ZM133.546 35.7237V26.1364C133.546 25.0176 133.297 24.1209 132.795 23.445C132.296 22.7675 131.653 22.2387 130.868 21.8586C130.081 21.4785 129.212 21.2225 128.259 21.0922C127.306 20.9619 126.366 20.896 125.438 20.896C124.414 20.896 123.396 20.9957 122.385 21.1995C121.37 21.4018 120.461 21.7406 119.651 22.2157C118.841 22.6909 118.173 23.3208 117.652 24.104C117.126 24.8888 116.828 25.8743 116.758 27.0637H121.83C121.925 26.0659 122.26 25.3517 122.832 24.9241C123.403 24.4964 124.189 24.2834 125.189 24.2834C125.641 24.2834 126.063 24.3125 126.457 24.3723C126.848 24.4321 127.194 24.5485 127.492 24.7279C127.79 24.9057 128.028 25.1555 128.207 25.4774C128.385 25.7977 128.474 26.233 128.474 26.7771C128.497 27.3013 128.342 27.6968 128.01 27.9711C127.675 28.2455 127.223 28.4539 126.652 28.5949C126.08 28.739 125.425 28.8463 124.686 28.9153C123.947 28.9889 123.197 29.0854 122.437 29.2019C121.673 29.3215 120.917 29.4809 120.169 29.6832C119.419 29.884 118.749 30.189 118.167 30.5906C117.583 30.9967 117.106 31.5363 116.736 32.2137C116.367 32.8912 116.183 33.7541 116.183 34.7979C116.183 35.7482 116.344 36.5682 116.665 37.2564C116.987 37.9477 117.434 38.5163 118.005 38.9685C118.577 39.4206 119.244 39.7532 120.006 39.9678C120.767 40.1809 121.59 40.2882 122.471 40.2882C123.614 40.2882 124.734 40.1211 125.828 39.79C126.924 39.4543 127.878 38.875 128.688 38.0412C128.711 38.3508 128.752 38.6543 128.812 38.9501C128.872 39.2459 128.949 39.5386 129.044 39.8222H134.189C133.95 39.4436 133.783 38.8734 133.688 38.1117C133.591 37.3514 133.543 36.5575 133.543 35.7237H133.546ZM128.474 32.6935C128.474 32.9816 128.445 33.3617 128.385 33.8354C128.327 34.312 128.165 34.7795 127.902 35.2439C127.64 35.7068 127.234 36.1069 126.687 36.4379C126.14 36.7721 125.366 36.9376 124.364 36.9376C123.96 36.9376 123.566 36.9024 123.185 36.8288C122.804 36.7583 122.471 36.6326 122.185 36.4548C121.899 36.277 121.673 36.0333 121.506 35.7237C121.34 35.4141 121.255 35.0355 121.255 34.5849C121.255 34.1097 121.34 33.7158 121.506 33.4077C121.673 33.0996 121.893 32.8437 122.168 32.6414C122.44 32.439 122.763 32.2796 123.131 32.1601C123.5 32.0421 123.875 31.947 124.258 31.875C124.662 31.8045 125.067 31.7432 125.472 31.6972C125.879 31.6512 126.264 31.5899 126.633 31.5194C127.004 31.4474 127.348 31.3585 127.67 31.2512C127.992 31.1439 128.259 30.9983 128.474 30.8067V32.695V32.6935ZM143.015 15.8702H137.941V21.3942H134.869V24.78H137.941V35.6532C137.941 36.5805 138.098 37.3285 138.407 37.8986C138.717 38.4688 139.139 38.9102 139.674 39.2183C140.21 39.5279 140.83 39.7348 141.533 39.8406C142.234 39.9464 142.981 40.0015 143.766 40.0015C144.269 40.0015 144.779 39.9893 145.304 39.9678C145.827 39.9433 146.303 39.8973 146.733 39.8237V35.903C146.494 35.9505 146.245 35.9888 145.982 36.0103C145.721 36.0348 145.447 36.0471 145.161 36.0471C144.305 36.0471 143.732 35.903 143.447 35.6179C143.162 35.3328 143.019 34.7627 143.019 33.9059V24.78H146.735V21.3942H143.019V15.8702H143.015ZM163.983 31.7508C163.65 31.1684 163.209 30.681 162.661 30.2886C162.114 29.8978 161.488 29.582 160.787 29.3429C160.083 29.1069 159.362 28.9061 158.625 28.739C157.91 28.572 157.21 28.4172 156.518 28.2746C155.827 28.1321 155.214 27.9711 154.677 27.7949C154.143 27.6155 153.709 27.3856 153.376 27.099C153.041 26.8139 152.877 26.4476 152.877 25.9939C152.877 25.6138 152.969 25.3103 153.161 25.085C153.351 24.8597 153.585 24.688 153.858 24.5669C154.133 24.4489 154.435 24.3723 154.768 24.3355C155.102 24.3002 155.412 24.2834 155.696 24.2834C156.601 24.2834 157.388 24.455 158.056 24.7999C158.722 25.1448 159.092 25.8038 159.161 26.7771H163.984C163.889 25.6368 163.597 24.6926 163.109 23.9431C162.622 23.1951 162.007 22.5958 161.269 22.1437C160.532 21.6915 159.693 21.3712 158.749 21.1811C157.809 20.9911 156.839 20.896 155.841 20.896C154.842 20.896 153.861 20.9849 152.912 21.1612C151.958 21.3405 151.1 21.6501 150.34 22.09C149.576 22.5299 148.964 23.1292 148.499 23.8895C148.033 24.6497 147.801 25.6245 147.801 26.8124C147.801 27.6201 147.969 28.3053 148.304 28.8632C148.634 29.4226 149.077 29.884 149.622 30.2534C150.172 30.6212 150.798 30.9201 151.5 31.1439C152.202 31.3723 152.923 31.5669 153.66 31.734C155.472 32.1141 156.884 32.4942 157.895 32.8759C158.908 33.256 159.413 33.8262 159.413 34.5864C159.413 35.0386 159.307 35.4095 159.092 35.7068C158.877 36.0057 158.61 36.2417 158.288 36.4195C157.966 36.5989 157.608 36.7307 157.216 36.8119C156.822 36.8962 156.446 36.9376 156.09 36.9376C155.589 36.9376 155.108 36.8778 154.644 36.7598C154.178 36.6403 153.768 36.4563 153.41 36.2065C153.053 35.9567 152.76 35.6363 152.534 35.2439C152.31 34.8516 152.194 34.3841 152.194 33.8354H147.372C147.422 35.0707 147.7 36.0992 148.213 36.9192C148.723 37.7392 149.378 38.3983 150.177 38.898C150.974 39.3961 151.887 39.7532 152.912 39.9678C153.934 40.1809 154.982 40.2882 156.053 40.2882C157.124 40.2882 158.132 40.187 159.144 39.9862C160.157 39.7839 161.056 39.4329 161.841 38.9332C162.629 38.4351 163.262 37.776 163.752 36.956C164.24 36.1345 164.484 35.1198 164.484 33.9074C164.484 33.0506 164.318 32.3333 163.984 31.7524L163.983 31.7508ZM174.057 14.3727L164.412 39.8237H170.056L172.055 34.1557H181.594L183.521 39.8237H189.346L179.808 14.3727H174.055H174.057ZM173.522 29.9867L176.844 20.6477H176.915L180.131 29.9867H173.522ZM206.887 23.891C206.197 22.9882 205.328 22.2632 204.28 21.7176C203.232 21.1704 201.983 20.8976 200.531 20.8976C199.386 20.8976 198.339 21.1229 197.387 21.5735C196.431 22.0257 195.647 22.7506 195.03 23.7485H194.957V21.3942H190.133V46.2765H195.209V37.543H195.279C195.898 38.4473 196.691 39.1294 197.657 39.5908C198.619 40.0536 199.675 40.2866 200.818 40.2866C202.176 40.2866 203.361 40.023 204.372 39.5019C205.385 38.9792 206.23 38.2772 206.909 37.3974C207.588 36.5176 208.092 35.5091 208.429 34.3687C208.759 33.2269 208.928 32.039 208.928 30.8036C208.928 29.4962 208.759 28.244 208.429 27.0423C208.092 25.8437 207.582 24.7907 206.89 23.8879L206.887 23.891ZM203.638 32.8375C203.493 33.5518 203.249 34.1741 202.905 34.709C202.559 35.2439 202.107 35.6792 201.545 36.0103C200.987 36.3429 200.289 36.5115 199.456 36.5115C198.624 36.5115 197.958 36.3444 197.387 36.0103C196.815 35.6792 196.356 35.2439 196.01 34.709C195.664 34.1741 195.415 33.5518 195.26 32.8375C195.105 32.1248 195.03 31.3998 195.03 30.6657C195.03 29.9315 195.099 29.1667 195.242 28.4555C195.386 27.7428 195.629 27.1128 195.976 26.5641C196.319 26.0184 196.774 25.5739 197.334 25.2291C197.894 24.8842 198.588 24.7095 199.423 24.7095C200.257 24.7095 200.919 24.8842 201.477 25.2291C202.036 25.5724 202.496 26.023 202.852 26.5825C203.209 27.1419 203.464 27.778 203.621 28.4892C203.777 29.2019 203.851 29.9284 203.851 30.6657C203.851 31.4029 203.782 32.1264 203.639 32.8375H203.638ZM228.642 27.0454C228.309 25.8468 227.797 24.7938 227.106 23.891C226.414 22.9882 225.548 22.2632 224.5 21.7176C223.45 21.1704 222.199 20.8976 220.747 20.8976C219.606 20.8976 218.556 21.1229 217.605 21.5735C216.652 22.0257 215.866 22.7506 215.246 23.7485H215.177V21.3942H210.354V46.2765H215.426V37.543H215.498C216.118 38.4473 216.911 39.1294 217.874 39.5908C218.837 40.0536 219.893 40.2866 221.036 40.2866C222.393 40.2866 223.576 40.023 224.59 39.5019C225.601 38.9792 226.448 38.2772 227.126 37.3974C227.806 36.5176 228.31 35.5091 228.644 34.3687C228.979 33.2269 229.145 32.039 229.145 30.8036C229.145 29.4962 228.979 28.244 228.644 27.0423L228.642 27.0454ZM223.854 32.8375C223.713 33.5518 223.469 34.1741 223.123 34.709C222.776 35.2439 222.324 35.6792 221.765 36.0103C221.205 36.3429 220.509 36.5115 219.675 36.5115C218.84 36.5115 218.174 36.3444 217.602 36.0103C217.029 35.6792 216.572 35.2439 216.225 34.709C215.881 34.1741 215.631 33.5518 215.475 32.8375C215.32 32.1248 215.243 31.3998 215.243 30.6657C215.243 29.9315 215.316 29.1667 215.458 28.4555C215.601 27.7428 215.846 27.1128 216.191 26.5641C216.536 26.0184 216.989 25.5739 217.55 25.2291C218.108 24.8842 218.805 24.7095 219.639 24.7095C220.474 24.7095 221.133 24.8842 221.692 25.2291C222.253 25.5724 222.711 26.023 223.069 26.5825C223.427 27.1419 223.684 27.778 223.837 28.4892C223.994 29.2019 224.069 29.9284 224.069 30.6657C224.069 31.4029 223.997 32.1264 223.854 32.8375Z" fill="#FF9500" />
            </g>
            <defs>
                <clipPath id="clip0_2333_6669">
                    <rect width="228.284" height="52.916" fill="white" transform="translate(0.859375 0.599609)" />
                </clipPath>
            </defs>
        </svg>
        <span class="text-2xl lg:text-3xl text-center font-medium leading-120">
            Une question, une idée ou juste envie de papoter culture ? <br> Nous sommes là pour ça 👋
        </span>
        <?php button("Nous sommes à un clic", "http://wa.me/22955145377", "bg-white hover:bg-primary w-full md:w-fit", "arrow-right") ?>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const seeAllButton = document.querySelector('#see-all');
        const items = document.querySelectorAll('.item');

        filterButtons.forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();
                const slug = btn.dataset.slug;
                items.forEach(item => {
                    const categories = item.dataset.postType.split(' ');
                    const match = categories.includes(slug);
                    item.style.display = match ? 'block' : 'none';
                });
                filterButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                seeAllButton.href = `${window.location.origin}/media?type=${slug}`;
            });
        });
        items.forEach(item => {
            const categories = item.dataset.postType.split(' ');
            const match = categories.includes("post");
            item.style.display = match ? 'block' : 'none';
        });
    });
</script>
<script>
    const images = document.querySelectorAll('.hero_section');
    const video = document.querySelector('.hero_video');
    window.addEventListener('scroll', () => {
        const sc = window.scrollY;

        if (video.scrollHeight > sc)
            video.style.width = `${757 + sc}px`;
        images.forEach((image, index) => {
            const speed = 0.5 * ((-1) ** index)
            const offset = sc * speed;
            image.style.transform = `translateX(${-offset}px)`;
        });
    });
</script>
<?php get_footer() ?>