<!DOCTYPE html>

<html <?= language_attributes() ?> class="mt-0">

<head>

    <meta charset="<?= bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <?= wp_head() ?>
</head>

<body>
    <header id="header">
        <div class="py-2.5 flex items-center container justify-between">
            <a href="/" class="block">
                <img class="w-full h-7 lg:h-13.75 !object-contain" src="<?= get_field("header_logo", "option") ?>" alt="Logo hwekan">
            </a>
            <ul class="lg:flex hidden header-nav">
                <?php foreach ($GLOBALS['menus'] as $key => $menu) : ?>
                    <a class="menu-item hover:text-primary hover:underline truncate" href="/media?type=<?= $menu['slug'] ?>"><?= $menu['label'] ?></a>
                <?php endforeach; ?>
            </ul>

            <?= button("Contactez-nous", "mailto:" . get_field('email', 'option'), "bg-primary hover:bg-white hidden lg:flex") ?>

            <div class="flex gap-5 items-center lg:hidden ">

                <label for="menu" class="block text-2xl">

                    <?= icon('menu-burger', '') ?>
                </label>

                <!-- Menu -->
                <div class="peer-checked:block hidden absolute overflow-auto w-full bg-gray-100 h-screen top-full inset-x-0 z-50 py-10 px-4">
                    <?php
                    if (has_nav_menu('primary-menu')) {
                        wp_nav_menu(array(
                            "theme_location" => 'primary-menu',
                            "container" => "",
                            "items_wrap" => '<div class="flex flex-col gap-6 menu-burger">%3$s</div>'
                        ));
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>
    <!-- <div class="fixed hidden md:flex py-3 px-6  flex-col gap-4 bg-white right-0 top-175 text-[#CA390B] z-20">
            <?= icon("linkedin") ?>
            <?= icon("instagram") ?>
            <?= icon("facebook") ?>
        </div> -->
    <main>

</body>

</html>