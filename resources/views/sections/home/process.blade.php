<section class="py-8">
    <h1>
        Investment Process and Approach
    </h1>
    <p>
        Our unique investment process is built on the foundation of four key weighting mechanisms that ensure high
        quality, and pure exposure to supercycles
    </p>
    <h3 class="text-indigo leading-[1.44] font-semibold pb-4 border-b-2 border-solid border-indigo">
        VISTASHARES INVESTMENT METHODOLOGY
    </h3>
    <div class="pt-4">
        @foreach ($categories as $category)
            <h3>{!! $category['category-name'] !!}</h3>
            <div class="grid gap-6 py-6">
                @foreach ($category['items'] as $item)
                    <x-card type="alt">
                        <div class="grid gap-2">
                            @if ($item['icon'])
                                <img src="{{ $item['icon']['url'] }}" alt="{{ $item['icon']['alt'] }}"
                                    class="w-[37px] h-[32px]" />
                            @endif
                            @if ($item['heading'])
                                <p class="font-semibold font-Termina">{!! $item['heading'] !!}</p>
                            @endif
                            @if ($item['description'])
                                <p>
                                    {!! $item['description'] !!}
                                </p>
                            @endif
                        </div>
                    </x-card>
                @endforeach
            </div>
        @endforeach
    </div>

</section>
