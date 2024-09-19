<section class="financial-professionals full-width py-8 relative">
    @if ($image)
        <div class="bg-image inner-full">
            <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="w-full h-full object-bottom" />
        </div>
    @endif
    <div class="min-h-[400px] sm:flex sm:flex-col sm:justify-center sm:gap-6 ">
        <div class="max-w-[60%]">

            <h3>
                {!! $heading !!}
            </h3>
        </div>
        <div class="max-w-[50%]">
            <p>{!! $description !!}</p>
        </div>
        @if ($cta)
            <div class="wp-buttons">
                <a href="{{ $cta['url'] }}" class="wp-button">{{ $cta['title'] }}</a>
            </div>
        @endif
    </div>
</section>
