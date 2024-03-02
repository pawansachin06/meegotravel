<x-app-layout>
    <x-page-banner :$breadcrumbs title="FAQs" />

    <div class="container px-3 py-8">
        <div class="flex flex-wrap -mx-1">
            <div class="w-full md:w-7/12 px-1 mb-8">
                <h2 class="text-2xl mb-4 text-center font-semibold">Frequently asked questions</h2>
                <x-accordions.item>
                    <x-slot name="title">What is eSIM?</x-slot>
                    <p>An eSIM profile contains carrier and network subscription information, just like a normal SIM card. However, instead of coming in the form of a physical chip, the operator profile information is downloaded directly into the eSIM chip in your phone.</p>
                    <p>This means your phone has to support eSIM if you want to use it.</p>
                </x-accordions.item>
                <x-accordions.item>
                    <x-slot name="title">What is an eSIM QR Code?</x-slot>
                    <p>A QR code is simply a representation of a download link plus activation code for your eSIM profile. It is used to easily connect to the eSIM server and download the eSIM profile to your phone.</p>
                    <p>It is easier to scan a QR code than typing a long string of text, but if for some reason you are unable to scan the QR code, you will have the option to activate your eSIM by entering the required information manually.</p>
                    <p>Please note that QR codes can be used only once. Once a QR code is scanned and an eSIM profile is downloaded, it cannot be used to download the same eSIM again, whether it is on the same or another device.</p>
                </x-accordions.item>
                <x-accordions.item>
                    <x-slot name="title">Is my phone eSIM capable?</x-slot>
                    <p>As the eSIM technology advances, it becomes more prominent and you can find many phone models supporting it. We tried to summarize it and compile a single list that contains most phone models.</p>
                </x-accordions.item>
                <x-accordions.item>
                    <x-slot name="title">I already have an eSIM in my phone, can I add another one?</x-slot>
                    <p><strong>Yes, you can.</strong> You can store several eSIM profiles in your phone, but you need to choose only one that will be active along with your primary physical SIM.</p>
                </x-accordions.item>
                <x-accordions.item>
                    <x-slot name="title">Shall I buy before or after I reach my destination?</x-slot>
                    <p><strong>It is up to you.</strong></p>
                    <p>We recommend buying and setting up the eSIM shortly before travel so you can start using it as soon as you land. You can keep the eSIM off until you arrive at your destination.</p>
                </x-accordions.item>
            </div>
            <div class="w-full md:w-5/12 px-1">
                <h2 class="text-2xl mb-4 text-center font-semibold">Have Asked Questions?</h2>
                <form action="" method="post">
                    <div class="px-3">
                        <div class="relative mb-4">
                            <input id="contact-name" type="text" name="name" required autocomplete="off" spellcheck="false" placeholder="Full Name" class="form-float-input peer block w-full rounded caret-primary-500 focus:border-primary-500 focus:ring-primary-200 placeholder-transparent placeholder:select-none" />
                            <label for="contact-name" class="inline-block rounded select-none pointer-events-none transition-all bg-white tracking-wide font-semibold px-1 absolute -top-3 left-3 text-sm peer-focus:text-sm peer-focus:text-primary-500 peer-focus:font-semibold peer-focus:-top-3 peer-placeholder-shown:text-lg peer-placeholder-shown:text-gray-700 peer-placeholder-shown:font-normal peer-placeholder-shown:top-2">Full Name</label>
                        </div>
                        <div class="relative mb-4">
                            <input id="contact-email" type="email" name="email" required autocomplete="off" spellcheck="false" placeholder="Email Address" class="form-float-input peer block w-full rounded caret-primary-500 focus:border-primary-500 focus:ring-primary-200 placeholder-transparent placeholder:select-none" />
                            <label for="contact-email" class="inline-block rounded select-none pointer-events-none transition-all bg-white tracking-wide font-semibold px-1 absolute -top-3 left-3 text-sm peer-focus:text-sm peer-focus:text-primary-500 peer-focus:font-semibold peer-focus:-top-3 peer-placeholder-shown:text-lg peer-placeholder-shown:text-gray-700 peer-placeholder-shown:font-normal peer-placeholder-shown:top-2">Email Address</label>
                        </div>
                        <div class="relative mb-4">
                            <input id="contact-phone" type="text" name="phone" required autocomplete="off" spellcheck="false" placeholder="Phone" class="form-float-input peer block w-full rounded caret-primary-500 focus:border-primary-500 focus:ring-primary-200 placeholder-transparent placeholder:select-none" />
                            <label for="contact-phone" class="inline-block rounded select-none pointer-events-none transition-all bg-white tracking-wide font-semibold px-1 absolute -top-3 left-3 text-sm peer-focus:text-sm peer-focus:text-primary-500 peer-focus:font-semibold peer-focus:-top-3 peer-placeholder-shown:text-lg peer-placeholder-shown:text-gray-700 peer-placeholder-shown:font-normal peer-placeholder-shown:top-2">Phone</label>
                        </div>
                        <div class="relative mb-3">
                            <textarea id="contact-message" name="message" rows="3" placeholder="Message" class="form-float-input peer block w-full rounded caret-primary-500 focus:border-primary-500 focus:ring-primary-200 placeholder-transparent placeholder:select-none"></textarea>
                            <label for="contact-message" class="inline-block rounded select-none pointer-events-none transition-all bg-white tracking-wide font-semibold px-1 absolute -top-3 left-3 text-sm peer-focus:text-sm peer-focus:text-primary-500 peer-focus:font-semibold peer-focus:-top-3 peer-placeholder-shown:text-lg peer-placeholder-shown:text-gray-700 peer-placeholder-shown:font-normal peer-placeholder-shown:top-2">Message</label>
                        </div>
                        <div class="px-3 py-2 mb-2 leading-snug font-semibold rounded bg-red-100 text-red-800">
                            Currently form not connected with logic.
                        </div>
                        <div class="">
                            <x-button type="submit" class="w-full">Send Message</x-button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>