(function () {

    var paymentForm = document.getElementById('stripe-payment-form');
    if (paymentForm) {
        var elements;
        var stripe = Stripe(stripeKey);
        elements = stripe.elements({
            clientSecret: clientSecret,
            appearance: {
                theme: 'stripe',
                variables: {
                    colorPrimary: '#bb6083',
                    // colorBackground: '#ffffff',
                    // colorText: '#30313d',
                    // colorDanger: '#df1b41',
                    fontFamily: 'Rubik,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji"',
                }
            },
            fonts: [
                { cssSrc: 'https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap' }
            ],
        });

        var paymentElement = elements.create('payment', {
            layout: 'tabs',
        });
        paymentElement.mount('#stripe-payment-element');

        paymentForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var submitBtn = paymentForm.querySelector('[data-js="submit-btn"]');
            submitBtn.disabled = true;
            var submitBtnText = submitBtn.querySelector('[data-js="submit-btn-text"]');
            var submitBtnTextContent = submitBtnText.textContent;
            submitBtnText.textContent = 'Please wait...';
            var submitBtnLoader = submitBtn.querySelector('[data-js="btn-loader"]');
            submitBtnLoader.classList.remove('hidden');

            stripe.confirmPayment({
                elements,
                confirmParams: {
                    // Make sure to change this to your payment completion page
                    return_url: "http://localhost:8000/",
                },
            }).then(function (res) {
                // This point will only be reached if there is an immediate error when
                // confirming the payment. Otherwise, your customer will be redirected to
                // your `return_url`. For some payment methods like iDEAL, your customer will
                // be redirected to an intermediate site first to authorize the payment, then
                // redirected to the `return_url`.
                // if (error.type === "card_error" || error.type === "validation_error") {
                //     showMessage(error.message);
                // } else {
                //     showMessage("An unexpected error occurred.");
                // }

                if(res?.error?.message) {
                    Toastify({
                        text: res.error.message,
                        className: 'toast-error',
                        position: 'center',
                    }).showToast();
                }
                dev && console.log(res);
            }).catch(function (err) {
                if(res?.message) {
                    Toastify({
                        text: err?.message ?? 'An error occurred',
                        className: 'toast-error',
                        position: 'center',
                    }).showToast();
                }
                console.log(err);
            }).finally(function () {
                submitBtn.disabled = false;
                submitBtnText.textContent = submitBtnTextContent;
                submitBtnLoader.classList.add('hidden');
            });
        });
    }


    // Fetches the payment intent status after payment submission
    async function checkStatus() {
        const clientSecret = new URLSearchParams(window.location.search).get(
            "payment_intent_client_secret"
        );

        if (!clientSecret) {
            return;
        }

        const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

        switch (paymentIntent.status) {
            case "succeeded":
                showMessage("Payment succeeded!");
                break;
            case "processing":
                showMessage("Your payment is processing.");
                break;
            case "requires_payment_method":
                showMessage("Your payment was not successful, please try again.");
                break;
            default:
                showMessage("Something went wrong.");
                break;
        }
    }
})();