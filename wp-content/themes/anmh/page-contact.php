<?php get_header();

$jsonData = file_get_contents('lib/countries.json', true);
// Décoder le contenu JSON en un tableau associatif
$countries = json_decode($jsonData, true);

function afficherEmojiPays($codePays = 'BJ')
{
    $pays = strtoupper($codePays);
    $drapeauUnicode = "";

    if (preg_match('/^[A-Z]{2}$/', $pays)) {
        $drapeauUnicode = strtoupper(str_replace(array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'), array('🇦', '🇧', '🇨', '🇩', '🇪', '🇫', '🇬', '🇭', '🇮', '🇯', '🇰', '🇱', '🇲', '🇳', '🇴', '🇵', '🇶', '🇷', '🇸', '🇹', '🇺', '🇻', '🇼', '🇽', '🇾', '🇿'), $pays));
    }

    return $drapeauUnicode;
}
?>
<section class="container py-10 md:py-15">
    <h3 class="section-title mb-8.75">Contact</h3>

    <div class="flex flex-col gap-6 lg:grid grid-cols-3">
        <div class="flex flex-col gap-12 p-10 rounded-xl text-white bg-[#07516A] ">
            <div class="flex flex-col gap-4">
                <b class="text-2xl">Rendez-nous visite</b>
                <span class="font-medium text-sm">Notre équipe se tient à votre disposition pour vous recevoir à tout moment et répondre à vos questions.</span>
            </div>
            <div class="flex gap-4">
                <div class="w-12 h-12 rounded-full bg-[#0A7599] flex justify-center items-center">
                    <?= icon("telephone") ?>
                </div>
                <div class="flex flex-col gap-2">
                    <b class="text-xl">Téléphone</b>
                    <span class="font-medium"> <a href="tel:+229 01 66 39 22 22">+229 01 66 39 22 22 </a> </span>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="w-12 h-12 rounded-full bg-[#0A7599] flex justify-center items-center">
                    <?= icon("mail") ?>
                </div>
                <div class="flex flex-col gap-2">
                    <b class="text-xl">Email</b>
                    <span class="font-medium"> <a href="mailto:Contact@anmh.bj">Contact@anmh.bj </a> </span>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="w-12 h-12 min-w-12 rounded-full bg-[#0A7599] flex justify-center items-center">
                    <?= icon("marker") ?>
                </div>
                <div class="flex flex-col gap-2">
                    <b class="text-xl">Adresse</b>
                    <span class="font-medium"> 🇧🇯 Bénin : Cotonou, Cadjèhoun - Immeuble ANMH </span>
                </div>
            </div>
        </div>
        <div class="max-md:aspect-[16/15] overflow-hidden rounded-2xl col-span-2">
            <div style="text-decoration:none; overflow:hidden;max-width:100%;height:100%">
                <div id="display-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/search?q=EIG+BENIN&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="googlecoder" href="https://www.bootstrapskins.com/themes" id="enable-map-data">premium bootstrap themes</a>
                <style>
                    #display-google-map img {
                        max-width: none !important;
                        background: none !important;
                        font-size: inherit;
                        font-weight: inherit;
                    }
                </style>
            </div>
        </div>
    </div>
    <div class="py-10 px-4 rounded-xl bg-functionnal-gray flex flex-col lg:flex-row mt-10 gap-12.5">
        <div class="flex flex-col gap-4 flex-1">
            <b class="text-2xl lg:text-5xl">Contactez-nous</b>
            <span class="font-medium text-sm lg:text-base">Vous pouvez nous écrire sur tout
                sujet qui vous intéresse.</span>
        </div>
        <div class="flex flex-col gap-4 flex-1">
            <?= input("Nom et prénom(s)", "fullname") ?>
            <label class="flex flex-col gap-2">
                <span class="font-semibold">Téléphone</span>
                <div class="flex gap-2">
                    <select class="bg-white border border-functionnal-gray rounded-lg p-4 w-20.5 appearance-none" name="pays">
                        <?php foreach ($countries as $country_) {
                            echo "<option ";
                            echo $country == (afficherEmojiPays(strtoupper($country_['code'])) . ';' . $country_['name']) ? 'selected=true ' : '';
                            echo $country_['code'] == "bj" ? 'selected ' : '';
                            echo "value='{$country_['dialCode']}'>";
                            echo afficherEmojiPays(strtoupper($country_['code'])) . " " . $country_['name'] . "( " . $country_['dialCode'] . " )" . ' ';
                            echo "</option>";
                        } ?>
                    </select>
                    <input autocomplete="tel-national" required type='text' class='border flex-1 focus-visible:outline-none border-functionnal-gray p-4 bg-white rounded-lg appearance-none' name="phone" />
                </div>
            </label>
            <?= input("Email", "email") ?>
            <label class='flex flex-col gap-2'>
                <span class='font-semibold'>Votre message</span>
                <textarea required class='border focus-visible:outline-none border-functionnal-gray p-4 bg-white rounded-lg appearance-none' placeholder="Posez-nous toutes vos questions sur nos formations !" name="message" rows="5"></textarea>
            </label>
        </div>
    </div>
</section>
<?php get_footer() ?>