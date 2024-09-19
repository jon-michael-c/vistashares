<x-section :bg_image="$bg_image">
    <div class="w-full sm:flex sm:justify-between sm:items-center">
        @if ($ctas)
            @foreach ($ctas as $cta)
                <a href="{{ $cta['link']['url'] }}" class="wp-button">{{ $cta['link']['title'] }}</a>
            @endforeach
        @endif
    </div>
</x-section>
