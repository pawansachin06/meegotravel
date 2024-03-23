(function(){
    var simsOrderForm = document.getElementById('sims-order-form');
    if(simsOrderForm){
        var ajaxUrl = simsOrderForm.getAttribute('action');
        simsOrderForm.addEventListener('submit', function(e){
            e.preventDefault();
            let form = this;
            let data = new FormData(form);
            let submitBtn = form.querySelector('[data-js="sims-order-form-btn"]');
            let submitBtnLoader = submitBtn.querySelector('[data-js="btn-loader"]');
            submitBtn.disabled = true;
            submitBtnLoader.classList.remove('hidden');
            axios.post(ajaxUrl, data).then(function(res){
                if(res.data.redirect){
                    window.location.href = res.data.redirect;
                }
            }).catch(function(err){
                let msg = getAxiosError(err);
                Toastify({
                    text: msg,
                    className: 'toast-error',
                    position: 'center',
                }).showToast();
                dev && console.log(err);
            }).finally(function(){
                submitBtn.disabled = false;
                submitBtnLoader.classList.add('hidden');
            });
        });
    }

})();