<?php get_header() ?>

<section class="container flex flex-col gap-8 py-12.5 text-center justify-center items-center" data-aos="fade-up">
    <b class="section-title">Nous faisons la promotion des Industries
        Culturelles et Créatives (ICC) du Bénin</b>
    <span class="text-xl text-white/50">Un projet en cours ou en création ? Construisons ensemble son impact culturel et économique.</span>
    <?= button("Lancez-vous maintenant", "", "bg-white", "arrow-right") ?>
</section>
<section class="container flex flex-col gap-8 py-12.5 lg:py-13.5" data-aos="fade-up">
    <b class="section-title">Qui nous sommes ? Ce que nous faisons...</b>
    <p class="text-lg">Hwèkan est une plateforme dédiée à la promotion des Industries
        Culturelles et Créatives (ICC) du Bénin. Face au manque de visibilité des artistes,
        de leurs créations et des projets culturels, nous créons un espace pour mettre en lumière,
        valoriser et accompagner les efforts des acteurs respectifs afin de mieux développer les ICC au Bénin.
        <br>
        <br>
        La plateforme Hwèkan aujourd’hui est constituée de :
    </p>
    <div class="flex flex-col lg:flex-row lg:gap-12.5 gap-4">
        <div class="py-6 lg:p-11.5 lg:px-8.5 px-4 flex flex-col gap-4 border border-white/50 gradient rounded-xl">
            <div class="flex justify-between"><span class="text-xl font-medium">Hwèkan média</span>
                <?= icon("paint-deck") ?></div>
            <p class="text-white/70">Création de contenus au service des ICC béninoises : arts visuels et vivants, littérature, tourisme culturel...</p>
        </div>
        <div class="py-6 lg:p-11.5 lg:px-8.5 px-4 flex flex-col gap-4 border border-white/50 gradient rounded-xl">
            <div class="flex justify-between"><span class="text-xl font-medium">Hwèkan studio services</span>
                <?= icon("paint-deck") ?></div>
            <p class="text-white/70">Accompagnement stratégique des acteurs culturels à travers des services de communications.</p>
        </div>
    </div>
</section>

<?php get_footer() ?>