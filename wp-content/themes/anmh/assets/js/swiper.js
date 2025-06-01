document.addEventListener("DOMContentLoaded", function () {
    const swiperHeroOptions = {
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
    }
    const hero = new Swiper("#hero", {
        ...swiperHeroOptions,
    })

    const partenaires = new Swiper("#partenaires", {
        autoplay: {
            delay: 3000
        },
        loop: true,
        spaceBetween: 36,
        slidesPerView: "auto",
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 5,
            },
        },
    })

})