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
    ];
    $featureImg = get_the_post_thumbnail_url();
    $title = get_the_title();
    $excerpt = get_the_content();
@endphp



<section class="full-width py-8 sm:py-16">
    <div class="title flex gap-2 sm:gap-6 sm:flex-wrap">
        <img src="{{ $featureImg }}" alt="{{ $title }} icon"
            class="w-[50px] h-auto object-container sm:w-[100px] " />
        <div>
            <h1>{!! $title !!}</h1>
            <h3 class="hidden sm:block">{!! $excerpt !!}</h3>
        </div>
    </div>
    <h3 class="block sm:hidden">{!! $excerpt !!}</h3>
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
