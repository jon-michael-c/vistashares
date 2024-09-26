<a href="{{ get_the_permalink($id) }}" class="team-member-preview">
    <div class="w-full">
        <img src="{{ get_the_post_thumbnail_url($id, 'medium') }}" alt="{{ get_the_title($id) }}"
            class="w-full h-auto max-w-[250px] m-auto" />
    </div>
    <div class="pt-4 text-center">
        <h5 class="text-indigoLight font-bold">{{ get_the_title($id) }}</h5>
        <p class="uppercase font-Termina text-cornflower">{{ get_field('title', $id) }}</p>
    </div>
</a>
