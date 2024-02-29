(function () {
    if (typeof Swiper !== 'undefined') {

        new Swiper('#home-country-slider', {
            loop: true,
            slidesPerView: 2,
            spaceBetween: 5,
            breakpoints: {
                320: { slidesPerView: 3 },
                370: { slidesPerView: 4 },
                400: { slidesPerView: 5 },
                480: { slidesPerView: 6 },
                570: { slidesPerView: 7 },
                680: { slidesPerView: 8 },
                1024: { slidesPerView: 10 },
                1280: { slidesPerView: 12 },
                1535: { slidesPerView: 15 },
            },
            // navigation: {
            //     nextEl: '.swiper-button-next',
            //     prevEl: '.swiper-button-prev',
            // },
        });

        new Swiper('#home-offer-slider', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 10,
            breakpoints: {
                768: { slidesPerView: 2 },
            },
        });

    }



    if (typeof AOS !== 'undefined') {
        AOS.init();
        console.log({AOS});
    }

})();