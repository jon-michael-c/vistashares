<section class=" full-width bg-gradient-6 pb-8 sm:pb-16">
    <div class="pb-4">
        <h1 class="leading-[1.5]">VistaShares <span class="font-outline">Supercycle</span> ETFs<sup>TM</sup></h1>
    </div>
    <div class="pb-4">
        <p>{!! $description !!}</p>
    </div>
    <div class="supercycle-etfs grid gap-8 sm:grid-cols-2">
        @include('partials.home.supercycle-etf', [
            'postID' => 35,
        ])
        @include('partials.home.supercycle-etf', [
            'postID' => 33,
        ])
    </div>
</section>
