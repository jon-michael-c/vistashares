<x-section>
    <div class="pb-4">
        <h1>
            Investment Process <span class="font-outline"> and Approach</span>
        </h1>
    </div>
    <div class="pb-4">
        {!! $process_description !!}
    </div>
    <div class="pb-4">
        <h3 class="text-indigo leading-[1.44] font-semibold pb-4 border-b-2 border-solid border-indigo">
            VISTASHARES INVESTMENT METHODOLOGY
        </h3>
    </div>
    <div class="pt-4 sm:flex sm:gap-16 process-slider">
        <div class="process-controls-container">
            <div class="process-controls">
                <div class="process-arrow up">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9"
                        fill="none">
                        <path d="M13 1L7.15865 7L1 1" stroke="#F2F2F2" stroke-width="2" />
                    </svg>
                </div>
                <div class="process-scrollbar">
                    <div class="bar"></div>
                </div>
                <div class="process-arrow down">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9"
                        fill="none">
                        <path d="M13 1L7.15865 7L1 1" stroke="#F2F2F2" stroke-width="2" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="process-categories">
            @foreach ($categories as $category)
                <div class="process-category">
                    <div class="category-name">
                        <h3>{!! $category['category-name'] !!}</h3>
                    </div>
                    <div class="process-category-items grid gap-6 py-6 sm:grid-cols-2">
                        @foreach ($category['items'] as $item)
                            <x-card type="alt">
                                <div class="grid gap-2">
                                    @if ($item['icon'])
                                        <img src="{{ $item['icon']['url'] }}" alt="{{ $item['icon']['alt'] }}"
                                            class="w-[37px] h-[32px]" />
                                    @endif
                                    @if ($item['heading'])
                                        <p class=" font-semibold font-Termina ">
                                            {!! $item['heading'] !!}</p>
                                    @endif
                                    @if ($item['description'])
                                        {!! $item['description'] !!}
                                    @endif
                                </div>
                            </x-card>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-section>
