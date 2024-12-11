@php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $category = get_query_var('category_name') ? get_query_var('category_name') : '';
    $query = new WP_Query([
        'posts_per_page' => 9,
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $paged,
        'category_name' => $category,
    ]);
@endphp

<x-section class="bg-gradient-12">
    <div class="flex items-center justify-start gap-4 sm:gap-8 pb-8 sm:pb-16 flex-wrap">
        <a href="{{ add_query_arg('category_name', '', get_permalink()) }}"
            class="btn btn-secondary {{ $category == '' ? 'active' : '' }}">All News and Insights</a>
        <a href="{{ add_query_arg('category_name', 'insights', get_permalink()) }}"
            class="btn btn-secondary {{ $category == 'insights' ? 'active' : '' }}">Insights</a>
        <a href="{{ add_query_arg('category_name', 'news', get_permalink()) }}"
            class="btn btn-secondary {{ $category == 'news' ? 'active' : '' }}">News</a>
        <a href="{{ add_query_arg('category_name', 'press-releases', get_permalink()) }}"
            class="btn btn-secondary {{ $category == 'press-releases' ? 'active' : '' }}">Press Releases</a>
    </div>
    @if ($query->have_posts())

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 sm:gap-12">
            @while ($query->have_posts())
                @php $query->the_post(); @endphp
                @include('partials.posts.insight', [
                    'id' => get_the_ID(),
                ])
            @endwhile

        </div>
    @else
        <div class="text-left">
            <h3 class="text-white">No posts found</h3>
        </div>
    @endif

    @include('components.pagination', [
        'query' => $query,
    ])

    @php wp_reset_postdata(); @endphp
</x-section>
