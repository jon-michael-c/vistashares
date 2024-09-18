<div class="hero-etf-slider  zig-zag content-grid sm:pl-[12rem]">
    <div class="pt-20 pb-10 sm:py-0 sm:flex sm:justify-center sm:items-center">
        <div class="bg-image">
            <img src="https://vista.leibowitzdesign.local/wp-content/uploads/2024/09/hero.png" />
        </div>
        <div class="bg-overlay"></div>
        @if ($etfs)
            @foreach ($etfs as $etf)
                <div class="hero-etf-slider-slide">
                    <div class="flex items-center gap-2 sm:gap-4 pb-4">
                        <img class="w-[45px] h-[45px] sm:w-[60px] sm:h-[60px]"
                            src="{{ get_the_post_thumbnail_url($etf['etf']) }}" />
                        <h2>{{ get_the_title($etf['etf']) }}</h2>
                    </div>
                    {!! $etf['etf_description'] !!}
                    <div class="wp-buttons">
                        <a href="{{ get_the_permalink($etf['etf']) }}" class="wp-button">Learn More</a>
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
