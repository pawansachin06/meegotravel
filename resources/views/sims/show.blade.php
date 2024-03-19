<x-app-layout>
    <div class="container px-3 py-5">
        @if( !empty($operators) )
            @foreach($operators as $operator)
                <div class="container px-3 py-5">
                    <div class="flex flex-wrap -mx-1">
                        <div class="w-full sm:w-6/12 px-1 mb-3">
                            <h2 class="text-3xl md:text-4xl mb-2 font-semibold">{{ $operator['title'] }}</h2>
                            <p class="text-sm text-gray-600">Roaming: {{ $operator['is_roaming'] ? 'Yes' : 'No' }}</p>
                            <p class="text-sm text-gray-600">eSIM Type: {{ $operator['esim_type'] }}</p>
                            <p class="text-sm text-gray-600">Type: {{ $operator['type'] }}</p>
                            @if( !empty($operator['info']) )
                                <ul class="list-inside list-disc">
                                    @foreach($operator['info'] as $info)
                                        <li class="text-sm text-gray-600">{{ $info }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="w-full sm:w-6/12 px-1 self-center">
                            <div class="w-80 max-w-full sm:mx-auto mb-3">
                                <img src="{{ $operator['image']['url'] }}" width="{{ $operator['image']['width'] }}" height="{{ $operator['image']['height'] }}" alt="{{ $operator['title'] }}" class="w-full" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="flex gap-3 flex-wrap">

                        <div class="w-auto mb-3">
                        </div>
                    </div>
                </div>
                @if( !empty($operator['packages']) )
                    <div class="flex flex-wrap -mx-1">
                        @foreach($operator['packages'] as $package)
                            <div class="w-full sm:w-6/12 md:w-4/12 mb-2 px-1">
                                <div class="h-full flex flex-col rounded-md border shadow-sm bg-white">
                                    <div class="px-3 py-3">
                                        <h3 class="text-lg font-semibold">{{ $package['title'] }}</h3>
                                        <p class="text-sm text-gray-500">{{ $package['short_info'] }}</p>
                                        <p>Data: {{ $package['data'] }}</p>
                                        <p>${{ $package['net_price'] }}</p>
                                        <p>eKYC (Identity Verification) {{ $operator['is_kyc_verify'] ? 'Required' : 'Not Required' }}</p>
                                    </div>
                                    <div class="mt-auto rounded-b-md overflow-hidden">
                                        <a href="{{ route('sims.checkout', ['countrySlug' => $countrySlug, 'packageId' => $package['id']])  }}" class="inline-flex px-3 py-2 w-full justify-center bg-primary-500 hover:bg-primary-600 text-white">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{ $operator['other_info'] }}
            @endforeach
        @else

        @endif
    </div>







   <!--  <div class="container px-3 my-8">
        <h1 class="text-2xl md:text-3xl lg:text-4xl !leading-snug font-bold mb-3 text-center">Asia 10 Countries 20 GB eSIM from TSimTech - only $1.35 per GB</h1>
        <div class="max-w-lg mx-auto">
            <x-sims.card />
        </div>
    </div>
 -->

    <div class="container px-3 my-5">
        <div class="flex flex-wrap -mx-1">
            <div class="w-full md:w-7/12 px-1">
                <div class="px-3 py-4 rounded shadow bg-white">
                    <div class="prose">
                        <p>Creating a captivating and effective Software as a Service (SaaS) landing page is crucial for capturing your target audience's attention and converting visitors into customers. To achieve this, you need a meticulously crafted SaaS landing software theme that not only showcases your product's features but also conveys your brand's identity and value proposition.</p>
                        <p>Our SaaS landing software theme is designed to meet these exact needs. With a sleek and modern design, it ensures that your SaaS product shines in the digital landscape. Here's what you can expect from our theme</p>
                        <p>Works on VIETTEL and VINAPHONE in Vietnam, SMART and METFONE in Cambodia, CELCOM and DIGI in Malaysia, XL in Indonesia, STARHUB and M1 in Singapore, SKT in South Korea, DTAC in Thailand, KDDI in Japan, CTM in Macau, and CSL in Hong Kong with 4G speeds.</p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-5/12 px-1">
                <x-accordions.item>
                    Hello there
                </x-accordions.item>
                <x-accordions.item>
                    Lorem, ipsum dolor sit amet, consectetur adipisicing elit. Magnam eum quibusdam id possimus dolorum sapiente dolorem impedit quas omnis quod beatae blanditiis doloremque sit minus voluptatibus, et officiis repudiandae eaque.
                </x-accordions.item>
                <x-accordions.item>
                    Lorem, ipsum dolor sit amet, consectetur adipisicing elit. Magnam eum quibusdam id possimus dolorum sapiente dolorem impedit quas omnis quod beatae blanditiis doloremque sit minus voluptatibus, et officiis repudiandae eaque.
                </x-accordions.item>
                <x-accordions.item>
                    Lorem, ipsum dolor sit amet, consectetur adipisicing elit. Magnam eum quibusdam id possimus dolorum sapiente dolorem impedit quas omnis quod beatae blanditiis doloremque sit minus voluptatibus, et officiis repudiandae eaque.
                </x-accordions.item>
                <x-accordions.item>
                    Lorem, ipsum dolor sit amet, consectetur adipisicing elit. Magnam eum quibusdam id possimus dolorum sapiente dolorem impedit quas omnis quod beatae blanditiis doloremque sit minus voluptatibus, et officiis repudiandae eaque.
                </x-accordions.item>
            </div>
        </div>
    </div>
</x-app-layout>