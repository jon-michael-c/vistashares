@php
    $output = [
        'head' => [],
        'body' => [
            'Lorem Ispum' => ['10%', '10%', '10%', '10%', '10%'],
            'Lorem Ipsum' => ['10%', '10%', '10%', '10%', '10%'],
        ],
    ];
@endphp
<section id="performance" class="bg-gradient-3 full-width py-8">
    <h3 class="text-white pb-4">Prices & Performance</h3>
    <div class="grid gap-6">
        <div class="bg-white p-6">
            <x-table title="ETF Prices" type="long" :output="$output" />
        </div>
        <div class="bg-white p-6">
            <x-table title="Performance History" type="long" :output="$output" />
        </div>
    </div>
</section>
