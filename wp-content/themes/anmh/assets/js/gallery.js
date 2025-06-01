document.addEventListener("DOMContentLoaded", function () {
    const hero_content = new Swiper(".swiper.gallery", {
        slidesPerView: 1,
        loop: true,
        effect: "fade",
        autoplay: {
            delay: 5000
        },
        navigation: {
            nextEl: ".swiper-pagination-next",
            prevEl: ".swiper-pagination-prev",
        },
    })
})