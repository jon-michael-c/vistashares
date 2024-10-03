<x-section class="bg-gradient-4">
    <div class="pb-8 grid gap-2">
        <h2>{!! $title !!}</h2>
        <p>{!! $description !!}</p>
        <div class="wp-buttons">
            @if (isset($cta) && isset($cta['url']) && isset($cta['title']))
                <a href="{{ $cta['url'] }}" class="wp-button">{{ $cta['title'] }}</a>
            @endif
        </div>
    </div>
    <div class="featured-posts grid gap-8 sm:grid-cols-2 md:grid-cols-3">
        @foreach ($feature_posts as $postID)
            @include('components.posts.preview', [
                'permalink' => get_the_permalink($postID),
                'date' => get_the_date('F j, Y', $postID),
                'title' => get_the_title($postID),
            ])
        @endforeach
    </div>
</x-section>
