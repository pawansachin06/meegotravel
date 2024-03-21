(function(){
    var artisanCommandForms = document.querySelectorAll('.artisan-command-form');
    if(artisanCommandForms){
        for (var i = 0; i < artisanCommandForms.length; i++) {
            artisanCommandForms[i].addEventListener('submit', function(e){
                e.preventDefault();
                let form = this;
                let data = new FormData(form);
                let url = form.getAttribute('action');
                let submitBtn = form.querySelector('[data-js="artisan-command-form-btn"]');
                let submitBtnLoader = submitBtn.querySelector('[data-js="btn-loader"]');
                submitBtn.disabled = true;
                submitBtnLoader.classList.remove('hidden');
                axios.post(url, data).then(function (res) {
                    let msg = (res.data?.message) ? res.data.message : 'No Response Message';
                    Toastify({
                        text: msg,
                        className: (res.data?.success) ? 'toast-success' : 'toast-error',
                        position: 'center',
                    }).showToast();
                }).catch(function (err) {
                    let msg = getAxiosError(err);
                    Toastify({
                        text: msg,
                        className: 'toast-error',
                        position: 'center',
                    }).showToast();
                    dev && console.log(err);
                }).finally(function () {
                    submitBtn.disabled = false;
                    submitBtnLoader.classList.add('hidden');
                });
            });
        }
    }
})();