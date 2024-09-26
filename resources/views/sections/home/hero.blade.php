<section class="hero h-fit full-width relative gradient-bg">
    <div class="h-[400px] flex items-center md:h-full md:w-[50%] md:max-w-[550px] ">
        <div class="line-bg ">
            <img src="@asset('images/line-logo.svg')" alt="line background" />
        </div>
        <div class="hero-content py-20 my-auto md:py-0 md:pr-2 z-10">
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
    <div class="inner-full relative md:absolute md:top-0 md:right-0 md:w-[55%] md:h-full z-10">
        @include('partials.home.etf-slider', [
            'etfs' => $hero_etfs,
            'bg_img' => $hero_img,
        ])
    </div>
</section>
