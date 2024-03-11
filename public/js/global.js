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
    }


    var appForms = document.querySelectorAll('[data-js="app-form"]');
    if (appForms) {
        for (var i = 0; i < appForms.length; i++) {
            appForms[i].addEventListener('submit', function (e) {
                e.preventDefault();
                let form = this;
                let data = new FormData(form);
                let url = form.getAttribute('action');
                let submitBtn = form.querySelector('[data-js="app-form-btn"]');
                let submitStatus = form.querySelector('[data-js="app-form-status"]');
                let submitBtnLoader = submitBtn.querySelector('[data-js="btn-loader"]');
                submitBtn.disabled = true;
                submitBtnLoader.classList.remove('hidden');
                submitStatus.textContent = 'Please wait...';
                submitStatus.classList.remove('hidden');
                axios.post(url, data).then(function (res) {
                    if (res.data?.redirect) {
                        window.location.href = res.data.redirect;
                    }
                    let msg = (res.data?.message) ? res.data.message : 'Success';
                    submitStatus.textContent = msg;
                    Toastify({
                        text: msg,
                        className: (res.data?.success) ? 'toast-success' : 'toast-error',
                        position: 'center',
                    }).showToast();
                    dev && console.log('appForms: ', res.data);
                }).catch(function (err) {
                    let msg = getAxiosError(err);
                    Toastify({
                        text: msg,
                        className: 'toast-error',
                        position: 'center',
                    }).showToast();
                    submitStatus.textContent = msg;
                    dev && console.log(err);
                }).finally(function () {
                    submitBtn.disabled = false;
                    submitBtnLoader.classList.add('hidden');
                });
            });
        }
    }




})();