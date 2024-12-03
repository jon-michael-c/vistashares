@if (isset($id))
    <a href="{{ get_the_permalink($id) }}" class="insight-preview">
        <div class="w-full  aspect-video">
            <img src="{{ get_the_post_thumbnail_url($id, 'medium-large') }}" alt="{{ get_the_title($id) }}"
                class="w-full h-full object-cover m-auto" />
        </div>
        <div class="pt-4 grid gap-1">
            <p class="font-Termina text-cornflower uppercase font-normal">{{ get_the_date('d M Y', $id) }}</p>
            <h5 class="text-white text-preview font-bold">{{ get_the_title($id) }}</h5>
            @if (get_field('show_author', $id))
                <p class="uppercase font-Termina text-indigo">{{ get_field('author', $id) }}</p>
            @endif
        </div>
    </a>
@endif
