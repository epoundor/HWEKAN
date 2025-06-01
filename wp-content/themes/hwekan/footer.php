<?php
$option_info_email = get_field('email', 'option');
$option_info_facebook = get_field('facebook', 'option');
$option_info_linkedin = get_field('linkedin', 'option');
$option_info_youtube = get_field('youtube', 'option');


?>
</main>
<footer>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <?= wp_footer() ?>
</footer>