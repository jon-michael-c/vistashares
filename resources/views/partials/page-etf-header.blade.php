@php
    $links = [
        [
            'href' => '#overview',
            'text' => 'ETF Overview',
        ],
        [
            'href' => '#performance',
            'text' => 'Prices & Performance',
        ],
        [
            'href' => '#holdings',
            'text' => 'Holdings & Characteristics',
        ],
        [
            'href' => '#documents',
            'text' => 'ETF Documents',
        ],
        [
            'href' => '#faqs',
            'text' => 'FAQs',
        ],
    ];
    $featureImg = get_the_post_thumbnail_url();
    $title = get_the_title();
    $excerpt = strip_tags(get_the_content());
    $fact_sheet = get_field('fact_sheet');
    $presentation = get_field('presentation');
@endphp
<section class="full-width py-24 sm:py-32 text-silver gradient-bg">
    <div class="sm:flex sm:justify-between sm:items-center">
        <div class="title flex gap-2 pb-5 sm:gap-6 sm:flex-wrap ">
            <img src="{{ $featureImg }}" alt="{{ $title }} icon"
                class="w-[50px] h-auto object-container sm:w-[100px] " />
            <div>
                <h1>{!! $title !!}</h1>
                <h3 class="hidden sm:block">{!! $excerpt !!}</h3>
            </div>
        </div>
        <h3 class="block sm:hidden">{!! $excerpt !!}</h3>
        <div class="grid gap-6 pt-8">
            @if ($fact_sheet)
                <x-download :url="$fact_sheet['url']">
                    Fact Sheet
                </x-download>
            @endif
            @if ($presentation)
                <x-download :url="$presentation['url']">
                    Presentation
                </x-download>
            @endif
        </div>
    </div>
</section>
<section class="full-width bg-indigoLight font-Termina">
    <ul class="flex flex-col gap-3  py-6 sm:py-8 sm:flex-row sm:justify-between sm:gap-0 sm:items-center">
        @foreach ($links as $link)
            <li>
                <a href="{{ $link['href'] }}" class="block font-semibold text-midnight ">{{ $link['text'] }}</a>
            </li>
        @endforeach
    </ul>
</section>
