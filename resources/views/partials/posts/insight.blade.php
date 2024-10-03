@if (isset($id))
    <a href="{{ get_the_permalink($id) }}" class="insight-preview">
        <div class="w-full">
            <img src="{{ get_the_post_thumbnail_url($id, 'medium') }}" alt="{{ get_the_title($id) }}"
                class="w-full h-auto m-auto" />
        </div>
        <div class="pt-4 grid gap-1">
            <p class="font-Termina text-cornflower uppercase font-normal">{{ get_the_date('d M Y', $id) }}</p>
            <h5 class="text-white font-bold">{{ get_the_title($id) }}</h5>
            <p class="uppercase font-Termina text-indigo">{{ get_the_author($id) }}</p>
        </div>
    </a>
@endif
