<div class="hero-etf-slider  zig-zag content-grid md:pl-[12rem]">
    <div class="min-h-[420px] md:min-h-full pt-20 pb-10 md:py-0 md:flex md:justify-center md:items-center">
        <div class="bg-image">
            @if ($bg_img)
                <img src="{{ $bg_img['url'] }}" alt="{{ $bg_img['alt'] }}" />
            @endif
        </div>
        <div class="bg-overlay"></div>
        @if ($etfs)
            @foreach ($etfs as $etf)
                <div class="hero-etf-slider-slide">
                    <div class="flex items-center gap-2 md:gap-4 pb-4">
                        <img class="w-[45px] h-[45px] md:w-[60px] md:h-[60px]"
                            src="{{ get_the_post_thumbnail_url($etf['etf']) }}" />
                        <h2>{{ get_the_title($etf['etf']) }}</h2>
                    </div>
                    {!! $etf['etf_description'] !!}
                    <div class="wp-buttons">
                        <div class="font-outline font-outline-md font-Termina">
                            <h2 class="font-semibold uppercase">COMING SOON</h2>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="etf-slider-controls-container pt-4">
            <div class="etf-slider-controls">
                <div class="etf-slider-arrow up">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9"
                        fill="none">
                        <path d="M13 1L7.15865 7L1 1" stroke="#F2F2F2" stroke-width="2" />
                    </svg>
                </div>
                <div class="etf-slider-scrollbar">
                    <div class="bar"></div>
                </div>
                <div class="etf-slider-arrow down">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9"
                        fill="none">
                        <path d="M13 1L7.15865 7L1 1" stroke="#F2F2F2" stroke-width="2" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
