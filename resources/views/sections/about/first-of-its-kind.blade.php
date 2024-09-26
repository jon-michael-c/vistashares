<x-section class="bg-gradient-4 -mb-[2rem]  sm:-mb-[6rem]">
    <div class="w-full grid gap-6 md:grid-cols-2 sm:gap-8">
        @if ($cards)
            @foreach ($cards as $card)
                <x-card class="border-indigo border-[1px]" type="default">
                    <div class="lg:p-8">
                        <h3>{!! $card['heading'] !!}</h3>
                        {!! $card['description'] !!}
                    </div>
                </x-card>
            @endforeach
        @endif
    </div>
    <div class="border-b-[1px] border-indigo border-solid w-full pt-8 pb-20">
        <div class="max-w-[950px] mx-auto Termina font-semibold text-cornflower-300">
            {!! $subtext !!}
        </div>
    </div>
</x-section>
