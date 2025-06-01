<?php get_header() ?>
<section class="container py-4 lg:py-10 page">
    <h1 class="section-title"><?= the_title() ?></h1>
    <div class="flex flex-col gap-15 mt-15">
        <img class="w-full bg-white rounded-3xl" src="<?= get_field("organigramme_image", 'option') ?>" alt="image de l'organigramme">
    </div>

    <ul class="p-6 text-lg gap-4 flex flex-col">
        <b class="text-2xl text-vert">Notes:</b>
        <li><b>DMII: </b>Direction de la maintenance immobilière et des investissements</li>
        <li><b>DIB :</b> Direction informatique et biomédicale</li>
        <li><b>DL :</b> Direction de la Logistique</li>
        <li><b>DAF :</b> Direction de l’administration et des finances</li>
        <li><b>PRMP :</b> Personne responsable des marchés publics</li>
        <li><b>CCMP :</b> Cellule de contrôle des marchés publics</li>
    </ul>

</section>
<?php get_footer() ?>