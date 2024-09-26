@php
    $etf_ctas = get_field('etf_ctas');
@endphp

<x-section class="bg-ultramarine">
    @if ($etf_ctas)
        @if (isset($etf_ctas[0]))
            @php($cta = $etf_ctas[0])
            <div class="lg:flex lg:justify-between lg:items-center">
                {!! $cta['text'] !!}
                <a href="{{ $cta['link']['url'] }}"
                    class="btn btn-primary block w-fit mt-4 lg:mt-0">{!! $cta['link']['title'] !!}</a>
            </div>
        @endif
        <hr class="bg-indigoLight my-6 h-[2px] lg:my-10" />
        @if (isset($etf_ctas[1]))
            @php($cta = $etf_ctas[1])
            <div class="lg:flex lg:justify-between lg:items-center">
                {!! $cta['text'] !!}
                <a href="{{ $cta['link']['url'] }}"
                    class="btn btn-primary block w-fit mt-4 lg:mt-0">{!! $cta['link']['title'] !!}</a>
            </div>
        @endif
    @endif
</x-section>
