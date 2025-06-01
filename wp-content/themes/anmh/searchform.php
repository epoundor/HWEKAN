<input type="checkbox" class="hidden peer/search" id="search-form">
<label for="search-form">
    <?= icon('search', 'cursor-pointer') ?>
</label>
<div class="bg-black/50 inset-0 w-screen h-screen hidden fixed z-50 peer-checked/search:block">
    <div class="bg-white">
        <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="container py-6 px-4 flex flex-col gap-6">
            <label for="search-form lg:hidden">
                <?= icon('close', 'cursor-pointer lg:hidden absolute top-6 right-4') ?>
            </label>
            <div class="flex flex-col lg:flex-row gap-6 items-center">
                <label class='border-b border-[#DADEE3] pb-2 relative block flex-1'>
                    <input required type='text' placeholder="Saisissez votre recherche" class="w-full h-full focus-visible:outline-none" name="s" oninput='this.classList.toggle("active", this.value !== "")' value="<?php echo get_search_query(); ?>" />
                </label>
                <button type="submit" class="flex gap-2.5 items-center rounded-lg py-3 px-3.5 text-sm xl:text-base xl:p-4 text-center font-semibold bg-vert text-white">
                    <span class="flex-1"> Rechercher</span>
                </button>
                <label for="search-form">
                    <?= icon('close', 'cursor-pointer lg:block hidden') ?>
                </label>

            </div>


        </form>

    </div>
</div>
<?php
?>