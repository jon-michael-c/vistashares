<x-section class="retail-investors bg-gradient-7">
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-16">
        <div class="grid gap-4 sm:gap-6 sm:content-start">
            <div>
                <h2>{!! $heading !!}</h2>
            </div>
            <div>
                <h3 class="text-cornflower">{!! $sub_heading !!}</h3>
            </div>
            <div class="grid gap-4">
                {!! $description !!}
            </div>
            @if ($cta)
                <div class="wp-buttons">
                    <a href="{{ $cta['url'] }}" class="wp-button">{{ $cta['title'] }}</a>
                </div>
            @endif
        </div>
        <div class="pt-4 sm:pt-0">
            <x-card type="default" class="bg-gradient-8 sm:p-12">
                @if ($investors)
                    <ul class="retail-investor border-list border-list-ultramarine">
                        @foreach ($investors as $investor)
                            <li class=""><a href="{{ $investor['link']['url'] }}" target="_blank"
                                    class="py-3 inline-flex justify-between items-center w-full">
                                    <p class="text-midnight font-Termina font-bold leading-[1.15]">
                                        {{ $investor['link']['title'] }}</p>
                                    <div class="w-[8px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="18"
                                            viewBox="0 0 11 18" fill="none">
                                            <path d="M1 1L9 9L1 17" stroke="#3E2BA5" stroke-width="2"
                                                stroke-linecap="round" />
                                        </svg>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </x-card>
        </div>
    </div>
</x-section>
