<x-section class="about-cta" :bg_image="$bg_image">
    <div
        class="about-cta-items py-4 max-w-screen-md mx-auto w-full text-center flex flex-col justify-center items-center gap-6 sm:text-left sm:flex-row sm:justify-between sm:items-center sm:py-0">
        @if ($ctas)
            @foreach ($ctas as $cta)
                <a href="{{ $cta['link']['url'] }}" class="block w-fit wp-button">{{ $cta['link']['title'] }}</a>
            @endforeach
        @endif
    </div>
</x-section>
