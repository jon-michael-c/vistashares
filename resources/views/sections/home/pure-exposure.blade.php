<section class="py-16 sm:py-36 full-width relative">
    <h1>Pure Exposure <sup>TM</sup> <span class="font-outline">is</span></h1>
    <div class="sm:w-1/3 ">
        <div class="pure-exposures grid gap-4 pt-6">
            @if ($pure_exposures)
                @foreach ($pure_exposures as $pure_exposure)
                    <div class="pure-exposure">
                        <h3 class="font-bold text-indigo">{{ $pure_exposure['heading'] }}</h3>
                        <p class="text-silver">{{ $pure_exposure['description'] }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="inner-full sm:absolute  sm:w-1/2 sm:right-0 sm:top-[25%] sm:translate-y-[-25%]">
        <img src="@asset('images/motion.svg')" alt="Pure Exposure" class="w-full h-full object-cover relative  sm:max-w-[650px] " />
    </div>
    <div class="pt-4 sm:pt-16">
        <x-card type="alt">
            <div class="sm:flex sm:justify-between sm:items-center sm:p-4">
                <p class="font-Termina">
                    {!! $cta_text !!}
                </p>
                <a href="{{ $cta['url'] }}" class="wp-button inline-block mt-4 sm:mt-0">{{ $cta['title'] }}</a>
            </div>
        </x-card>
    </div>
</section>
