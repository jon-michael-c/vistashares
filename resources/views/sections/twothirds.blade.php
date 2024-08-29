<section class="bg-gradient-1 full-width">
    <div class="py-16">
        <div>
            {{ $slot }}
        </div>
    </div>
    <div class="inner-full">
        @if ($image)
            <img src={{ $image['url'] }} alt={{ $image['alt'] }} />
        @endif
    </div>
</section>
