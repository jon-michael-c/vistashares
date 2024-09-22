<section class="hero h-fit full-width relative gradient-bg">
    <div class="sm:w-[50%] sm:max-w-[550px] flex">
        <div class="line-bg ">
            <img src="@asset('images/line-logo.svg')" alt="line background" />
        </div>
        <div class="hero-content py-20 my-auto sm:py-0 sm:pr-2">
            <div class="pb-4">
                {!! $hero_header !!}
            </div>
            <div class="pb-8 max-w-[450px]">
                {!! $hero_text !!}
            </div>
            <div>
                <a href="{{ $hero_cta['url'] }}" class="wp-button">{{ $hero_cta['title'] }}</a>
            </div>

        </div>
        <div class="">
            <svg width="0" height="0" viewBox="0 0 708 443" preserveAspectRatio="none">
                <defs>
                    <clipPath id="zig" clipPathUnits="objectBoundingBox">
                        <path d="M1,0H0.323s-0.124-0.002-0.197,0.184S0.033,0.443,0.033,0.443h0.178L0,1h1s0-1,0-1Z" />
                    </clipPath>
                </defs>
            </svg>
        </div>
    </div>
    <div class="inner-full relative sm:absolute sm:top-0 sm:right-0 sm:w-[55%] sm:h-full ">
        @include('partials.home.etf-slider', [
            'etfs' => $hero_etfs,
        ])
    </div>
</section>
