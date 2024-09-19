<x-section class="bg-gradient-4">
    <div class="w-full sm:grid sm:grid-cols-2 sm:gap-8">
        @if ($cards)
            @foreach ($cards as $card)
                <x-card type="alt">
                    <div class="sm:p-8">
                        <h3>{!! $card['heading'] !!}</h3>
                        {!! $card['description'] !!}
                    </div>
                </x-card>
            @endforeach
        @endif
    </div>
    <div class="border-b-[1px] border-indigo border-solid w-full pt-8 pb-12">
        <div class="max-w-[950px] mx-auto text-cornflower">
            {!! $subtext !!}
        </div>
    </div>
</x-section>
