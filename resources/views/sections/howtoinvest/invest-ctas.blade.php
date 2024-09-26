<section class="full-width relative py-8 sm:py-36">
    @if ($bg_image)
        <div class="inner-full bg-image">
            <img src="{{ $bg_image['url'] }}" alt="{{ $bg_image['alt'] }}" class="object-bottom " />
        </div>
    @endif
    <div class="w-full">
        @if ($investor_ctas)
            @foreach ($investor_ctas as $cta)
                <div
                    class="cta Termina flex flex-col items-start w-full py-4 gap-3 sm:flex-row sm:justify-between sm:gap-6">
                    <div class="font-medium">
                        {!! $cta['description'] !!}
                    </div>
                    <a href="{{ $cta['link']['url'] }}" class="wp-button text-nowrap">{{ $cta['link']['title'] }}</a>
                </div>
                @unless ($loop->last)
                    <hr class="my-4 border-gray-300">
                @endunless
            @endforeach
        @endif
    </div>
</section>
