@php
    $featured_posts = [];
    // If no featured posts are selected, return the latest 3 posts
    if (empty(get_field('featured_posts'))) {
        $featured_posts = get_posts([
            'numberposts' => 3,
            'post_type' => 'post',
            'post_status' => 'publish',
            'fields' => 'ids',
        ]);
    } else {
        foreach (get_field('featured_posts') as $post) {
            array_push($featured_posts, $post['post']);
        }
    }

@endphp
@include('sections.home.forefront', [
    'title' => get_field('title'),
    'description' => get_field('description'),
    'cta' => get_field('cta'),
    'feature_posts' => $featured_posts,
])
