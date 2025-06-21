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
                <input type="checkbox" id="menu" class="peer hidden" />
                <!-- Burger Menu -->
                <div class="fixed w-screen bg-white inset-0 peer-checked:block hidden z-50">
                    <div class="bg-black ">
                        <div class="container py-3.5 px-2.5 flex justify-between">
                            <a href="/">
                                <img src="<?= get_field("header_logo", "option") ?>" class="h-6 md:h-7.5 lg:h-auto">
                            </a>
                            <label for="menu">
                                <?= icon('cross', '') ?>
                            </label>
                        </div>
                        <div class="container pb-4 flex justify-between">
                            <div class="text-white">
                                <span class="text-xs">Un projet en vue?</span>
                                <h3 class="font-semibold">Discutons-en !</h3>
                            </div>
                            <?= button("Contactez-nous", "mailto:" . get_field('email', 'option'), "bg-primary hover:bg-white flex") ?>

                        </div>
                    </div>

                    <div class="py-4 container flex flex-col">
                        <?php foreach ($GLOBALS['menus'] as $key => $menu) : ?>
                            <a class="menu-item hover:text-primary hover:underline truncate text-black py-2 font-semibold text-sm" href="/media?type=<?= $menu['slug'] ?>"><?= $menu['label'] ?></a>
                        <?php endforeach; ?>
                    </div>

                </div>
                <!-- Burger Menu end -->
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