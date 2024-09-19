<section class="page-header h-fit full-width relative gradient-bg overflow-hidden">
    <div class="sm:w-[50%] sm:max-w-[450px]">
        <div class="line-bg ">
            <img src="@asset('images/line-logo.svg')" alt="line background" />
        </div>
        <div class="hero-content py-20 sm:py-48 sm:pr-2">
            <div class="pb-4">
                <h1>{!! get_the_title() !!}</h1>
            </div>
            <div class="pb-8">
                {!! get_field('page_excerpt') !!}
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
    <div class="inner-full relative sm:absolute sm:top-0 sm:right-0 sm:w-[50%] sm:max-w-[800px] sm:h-full zig-zag">
        <img src="{{ get_the_post_thumbnail_url(get_the_ID()) }}" alt="{{ get_the_title() }}"
            class="w-full h-full object-cover" />
    </div>
</section>
