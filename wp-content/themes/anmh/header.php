<!DOCTYPE html>

<html <?= language_attributes() ?> class="mt-0">

<head>
    <meta charset="<?= bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100..900&display=swap" rel="stylesheet">
    <?= wp_head() ?>
</head>

<body>
    <header id="header" class="lg:border-b-3 border-gray-100 top-0 w-full bg-white z-50 fixed">
        <div class="py-3.5 flex items-center container justify-between">
            <a href="/" class="h-10 max-w-35 w-35 lg:h-13.75 lg:min-w-51.5 flex-1 block">
                <img class="w-full h-full" src="<?= get_field("header_logo", "option") ?>" alt="Logo ANMH">
            </a>
            <?php
            if (has_nav_menu('primary-menu')) {
                wp_nav_menu(array(
                    "theme_location" => 'primary-menu',
                    "container" => "",
                    "items_wrap" => '<div class="lg:flex gap-5 hidden header-nav uppercase">%3$s</div>'
                ));
            }
            ?>

            <div class="flex gap-5 items-center">
                <input type="checkbox" class="peer hidden" name="menu" id="menu">
                <?= get_search_form() ?>
                <label for="menu" class="lg:hidden block text-2xl">
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
    <main class="mt-17 lg:mt-21.5">

</body>

</html>