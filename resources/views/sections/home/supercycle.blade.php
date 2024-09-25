<x-section class="bg-gradient-6">
    <div class="pb-4">
        <h1 class="leading-[1.5]">VistaShares <span class="font-outline">Supercycle</span> ETFs<sup>TM</sup></h1>
    </div>
    <div class="pb-4">
        <p>{!! $description !!}</p>
    </div>
    <div class="supercycle-etfs grid gap-8 sm:grid-cols-2">
        @if (isset($super_cycle) && is_array($super_cycle))
            @foreach ($super_cycle as $cycle)
                @include('partials.home.supercycle-etf', [
                    'postID' => $cycle['etf'],
                    'etf_description' => $cycle['description'],
                ])
            @endforeach
        @endif
    </div>
</x-section>
