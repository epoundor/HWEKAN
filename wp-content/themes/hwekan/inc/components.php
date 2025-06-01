<?php
function button($texte, $lien, $classes = '', $icon = null)
{
?>
    <a href="<?= esc_url($lien) ?>" class="flex gap-2.5 items-center rounded-lg py-3 px-3.5 text-sm xl:text-base xl:p-4 text-center font-semibold text-black <?= $classes ?>">
        <?php if ($texte): ?>
            <span class="flex-1"> <?= $texte ?></span>
        <?php endif ?>
        <?= $icon ? icon($icon) : "" ?>
    </a>
<?php
}

function icon($nom_icone, $classes = '')
{
    $chemin_icone = get_template_directory() . '/assets/icons/' . $nom_icone . '.svg';
    $icone = '<span class="' . esc_attr($classes) . '">';
    $icone .= file_get_contents($chemin_icone);
    $icone .= '</span>';
    return $icone;
}


function input($label, $name, $classes = "")
{
?>
    <label class='flex flex-col gap-2 <?= $classes ?>'>
        <span class='font-semibold'><?= $label ?></span>
        <input required type='text' class='border focus-visible:outline-none border-functionnal-gray p-4 bg-white rounded-lg appearance-none' name=<?= $name ?> />
    </label>
<?php
}

function pagination(string $classes = ""): string
{
    return "
            <div class='absolute bottom-3.5 lg:bottom-5 left-1/2 -translate-x-1/2 bg-white rounded-40 pagination  $classes'>
                <div class='flex cursor-pointer z-30 bg-gray-200 p-2 md:p-3 gap-1 md:gap-4 rounded-full'>
                    <div class='swiper-pagination-prev'>
                        <svg width='8' height='14' viewBox='0 0 8 14' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M7 13L1 7L7 1' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                        </svg>

                    </div>
                    <div class='swiper-pagination-next'>
                        <svg width='8' height='14' viewBox='0 0 8 14' class='rotate-180' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M7 13L1 7L7 1' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                        </svg>

                    </div>
                </div>
            </div>

        ";
}

function video(string $url, string $classes = ""): string
{
    return "<video preload='none' class='{$classes}' muted loop>
                                <source src='<?php echo esc_url($url); ?>' type='video/mp4'>
                                Votre navigateur ne supporte pas les vidéos.
                            </video>";
}

function select(string $label, string $name, array $options, string $classes = "")
{
    $selected = $_GET[$name] ?? '';

?>
    <label class='flex flex-col gap-2 <?= $classes ?>'>
        <select name='<?= $name ?>' class='border-2 focus-visible:outline-none border-gray-200 px-6 py-4 bg-gray-100 rounded-lg appearance-none'>
            <option value=""><?= $label ?></option>
            <?php
            foreach ($options as $value => $text) : ?>
                <option <?= $selected === $value ? ' selected' : '' ?> value='<?= $value ?>'><?= $text ?></option>
            <?php endforeach; ?>
        </select>
    </label>
<?php
}
