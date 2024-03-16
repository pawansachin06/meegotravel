(function(){
    var selectSwitches = document.querySelectorAll('[data-js="select-switch"]');
    if(selectSwitches){
        for (var i = 0; i < selectSwitches.length; i++) {
            selectSwitches[i].addEventListener('change', function(e){
                var el = e.target;
                var route = el.getAttribute('data-route');
                var loaderId = el.getAttribute('data-loader');
                var loader = document.getElementById(loaderId);
                var id = el.getAttribute('data-id');
                el.disabled = true;
                loader.classList.remove('hidden');
                var data = new FormData();
                data.append('id', id);
                data.append('key', el.name);
                data.append('value', el.value);
                console.log(axios);
                axios.post(route, data).then(function(res){
                    let msg = (res.data?.message) ? res.data.message : 'No Response';
                    Toastify({
                        text: msg,
                        className: (res.data?.success) ? 'toast-success' : 'toast-error',
                        position: 'center',
                    }).showToast();
                }).catch(function(err){
                    let msg = getAxiosError(err);
                    Toastify({
                        text: msg,
                        className: 'toast-error',
                        position: 'center',
                    }).showToast();
                    submitStatus.textContent = msg;
                    dev && console.log(err);
                }).finally(function(){
                    loader.classList.add('hidden');
                    el.disabled = false;
                })
            });
        }
    }
})();