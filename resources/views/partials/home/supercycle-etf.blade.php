@php
    $title = get_the_title($postID);
    $featured_img = get_the_post_thumbnail_url($postID, 'medium');

@endphp
<x-card type="default" class="supercycle-etf">
    <div class="flex">
        <div class="flex">
            <img src="{{ $featured_img }}" alt="{{ $title }}" class="w-16 h-16" />
            <h3>{!! $title !!}</h3>
        </div>
        <div>
            <p>as of 12/31/2020</p>
        </div>
    </div>
</x-card>
