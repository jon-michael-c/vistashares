<x-section class="financial-professionals">
    @if ($image)
        <div class="bg-image inner-full">
            <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="w-full h-full object-bottom" />
        </div>
    @endif
    <div class="min-h-[400px] flex flex-col gap-4 justify-center sm:gap-6 ">
        <div class="sm:max-w-[800px]">
            <h2>
                {!! $heading !!}
            </h2>
        </div>
        <div class="max-w-[500px]">
            <p>{!! $description !!}</p>
        </div>
        @if ($cta)
            <div class="wp-buttons">
                <a href="{{ $cta['url'] }}" class="wp-button">{{ $cta['title'] }}</a>
            </div>
        @endif
    </div>
</x-section>
