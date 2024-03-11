var currentDate = new Date, targetDate = new Date('2024-03-20'), dev = currentDate < targetDate;
var csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

try {
    window.axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': csrfToken,
    };
} catch (e) {
    dev && console.log(e);
}

if(dev) console.log('DEV MODE ENABLED');
