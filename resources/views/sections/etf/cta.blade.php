@php
    $etf_ctas = get_field('etf_ctas');
@endphp

<x-section class="bg-ultramarine">
    @if ($etf_ctas)
        @if (isset($etf_ctas[0]))
            @php($cta = $etf_ctas[0])
            <div class="sm:flex sm:justify-between sm:items-center">
                {!! $cta['text'] !!}
                <a href="{{ $cta['link']['url'] }}" class="btn btn-primary">{!! $cta['link']['title'] !!}</a>
            </div>
        @endif
        <hr class="bg-indigoLight my-6 h-[2px] sm:my-10" />
        @if (isset($etf_ctas[1]))
            @php($cta = $etf_ctas[1])
            <div class="sm:flex sm:justify-between sm:items-center">
                {!! $cta['text'] !!}
                <a href="{{ $cta['link']['url'] }}" class="btn btn-primary">{!! $cta['link']['title'] !!}</a>
            </div>
        @endif
    @endif
</x-section>
