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
                if(typeof tinyMCE == 'object'){
                    var myContentEl = tinyMCE?.get('my-tinymce-editor');
                    if(myContentEl){
                        data.append('content', myContentEl.getContent());
                    }
                }
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


    var appCreateForms = document.querySelectorAll('[data-js="app-create-form"]');
    if (appCreateForms) {
        for (var i = 0; i < appCreateForms.length; i++) {
            appCreateForms[i].addEventListener('submit', function (e) {
                e.preventDefault();
                let form = this;
                let submitBtn = form.querySelector('[data-js="app-form-btn"]');
                submitBtn.disabled = true;
                let submitBtnLoader = submitBtn.querySelector('[data-js="btn-loader"]');
                submitBtnLoader?.classList.remove('hidden');
                let url = form.getAttribute('action');
                let data = new FormData(form);
                axios.post(url, data).then(function (res) {
                    Toastify({
                        text: (res.data?.message) ? res.data.message : 'An error occurred',
                        className: (res.data?.success) ? 'toast-success' : 'toast-error',
                        position: 'center',
                    }).showToast();
                    if (res.data.redirect) {
                        window.location.href = res.data.redirect;
                    }
                    dev && console.log('appCreateForms: ', res.data);
                }).catch(function (err) {
                    let errMsg = getAxiosError(err);
                    Toastify({
                        text: errMsg,
                        className: 'toast-error',
                        position: 'center',
                    }).showToast();
                    dev && console.log(err);
                }).finally(function () {
                    submitBtn.disabled = false;
                    submitBtnLoader?.classList.add('hidden');
                });
            });
        }
    }


    var appDeleteForms = document.querySelectorAll('[data-js="app-delete-form"]');
    if(appDeleteForms){
        for (var i = 0; i < appDeleteForms.length; i++) {
            appDeleteForms[i].addEventListener('submit', function(e){
                e.preventDefault();
                if (typeof Swal !== 'function') {
                    Toastify({
                        text: 'Sweet Alert library not connected',
                        className: 'toast-error',
                        position: 'center',
                    }).showToast();
                    return false;
                }
                var _appDeleteForm = this;
                Swal.fire({
                    title: 'Are you sure to delete?',
                    text: 'This action can not be undone.',
                    showCancelButton: true,
                    cancelButtonText: 'Close',
                    confirmButtonText: 'Yes, Delete',
                    showLoaderOnConfirm: true,
                    reverseButtons: true,
                    preConfirm: function () {
                        return new Promise(function (resolve, reject) {
                            Swal.disableButtons();
                            axios.delete(_appDeleteForm.getAttribute('action')).then(function (res) {
                                Toastify({
                                    text: res.data.message ? res.data.message : 'Deleted successfully',
                                    className: (res.data?.success) ? 'toast-success' : 'toast-error',
                                    position: 'center',
                                }).showToast();
                                if(res.data.reload){
                                    window.location.reload();
                                }
                            }).catch(function (err) {
                                dev && console.log(err);
                                var msg = 'An error occurred, try later';
                                if (err?.response?.data?.message) {
                                    msg = err.response.data.message;
                                } else if (err?.message) {
                                    msg = err.message;
                                }
                                Toastify({
                                    text: msg,
                                    className: 'toast-error',
                                    position: 'center',
                                }).showToast();
                            }).finally(function () {
                                resolve(true);
                            });
                        });
                    },
                    allowOutsideClick: function () {
                        return !Swal.isLoading();
                    },
                }).then(function (result) {
                    if (result.isConfirmed) {
                        Swal.showLoading();
                    }
                });
            });
        }
    }

})();