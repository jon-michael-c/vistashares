@php
    $reasons = get_field('reasons');
    $etf_summary = get_field('etf_summary');
    $eft_objective = get_field('etf_objective');
@endphp
<x-section id="overview">
    <h2 class="pb-4">ETF Overview</h2>
    <div class="grid gap-6">
        <div class="reasons">
            <x-card class="bg-white">
                <h3 class="text-ultramarine">Reasons to consider {!! get_the_title() !!}</h3>
                @if ($reasons)
                    <div class="grid gap-4 py-3 sm:py-6 sm:grid-cols-3 sm:gap-8">
                        @foreach ($reasons as $reason)
                            <div class="grid gap-2 sm:gap-4">
                                <img src="{{ $reason['icon']['url'] }}" alt="{{ $reason['icon']['alt'] }}"
                                    class="w-[48px] h-[48px]" />
                                <div class="text-midnight">
                                    {!! $reason['text'] !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </x-card>
        </div>
        <div class="grid sm:grid-cols-2 gap-6">
            <div class="etf-summary">
                <x-card class="bg-gradient-2 sm:h-full">
                    <h3 class="text-white">ETF Summary</h3>
                    {!! $etf_summary !!}
                </x-card>
            </div>
            <div class="etf-objective">
                <x-card class="bg-gradient-2 sm:h-full">
                    <h3 class="text-white">ETF Objective</h3>
                    {!! $eft_objective !!}
                </x-card>
            </div>
        </div>
        <div class="grid  gap-6 sm:grid-cols-2">
            <div class="key-info">
                <div class="bg-white p-6">
                    <x-table title="Key Information" />
                </div>
            </div>
            <div class="trading-details">
                <div class="bg-white p-6">
                    <x-table title="Trading Details" />
                </div>
            </div>
            <div class="distributions">
                <div class="bg-white p-6">
                    <x-table title="Distributions" />
                </div>
            </div>

        </div>
    </div>
</x-section>
