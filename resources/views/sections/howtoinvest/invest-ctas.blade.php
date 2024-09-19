<section class="full-width relative py-8 sm:py-36">
    @if ($bg_image)
        <div class="inner-full bg-image">
            <img src="{{ $bg_image['url'] }}" alt="{{ $bg_image['alt'] }}" class="object-bottom " />
        </div>
    @endif
    <div class="w-full">
        @if ($investor_ctas)
            @foreach ($investor_ctas as $cta)
                <div class="cta flex flex-col items-start w-full py-4 gap-2 sm:flex-row sm:justify-between ">
                    <div>
                        <p>{!! $cta['description'] !!}</p>
                    </div>
                    <a href="{{ $cta['link']['url'] }}" class="wp-button">{{ $cta['link']['title'] }}</a>
                </div>
                @unless ($loop->last)
                    <hr class="my-4 border-gray-300">
                @endunless
            @endforeach
        @endif
    </div>
</section>
