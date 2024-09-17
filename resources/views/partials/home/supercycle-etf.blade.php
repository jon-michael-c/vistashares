@php
    $title = get_the_title($postID);
    $featured_img = get_the_post_thumbnail_url($postID, 'medium');
    $permalink = get_the_permalink($postID);
    $asOf = '12/31/2020';
    $items = [
        'Exchange' => 'NYSE',
        'Inception date' => '12/31/2020',
        'Expense Ratio' => '0.75%',
        'YTD Return' => '12.5%',
        '5 yr return' => '12.5%',
    ];

@endphp
@if ($postID && get_the_title())
    <x-card type="default" class="supercycle-etf bg-gradient-5 grid gap-4">
        <div class="flex justify-between items-center">
            <div class="flex gap-1 items-center">
                <img src="{{ $featured_img }}" alt="{{ $title }}" class="w-[35px] h-[35px]" />
                <h3>{!! $title !!}</h3>
            </div>
            <div class="font-Termina">
                <p class="text-cornflower">as of {!! $asOf !!}</p>
            </div>
        </div>
        <div>
            <ul class="border-list border-list-silver">
                @if ($items)
                    @foreach ($items as $key => $value)
                        <li class="py-2">
                            <p>{{ $key }}</p>
                            <p>{{ $value }}</p>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div>
            <p class="font-Termina">Drive your portfolio growth with next-generation, clean automotive technology</p>
        </div>
        <div>
            <a href="{{ $permalink }}" class="wp-button">Discover</a>
        </div>
    </x-card>
@endif
