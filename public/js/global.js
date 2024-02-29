(function () {
    if (typeof Swiper !== 'undefined') {

        new Swiper('#home-country-slider', {
            loop: true,
            slidesPerView: 2,
            spaceBetween: 10,
            breakpoints: {
                480: { slidesPerView: 3 },
                768: { slidesPerView: 4 },
                1024: { slidesPerView: 5 },
                1280: { slidesPerView: 6 },
                1535: { slidesPerView: 7 },
            },
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