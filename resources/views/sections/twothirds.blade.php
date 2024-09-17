<section class="bg-gradient-1 full-width sm:relative sm:overflow-hidden">
    <div class="py-16 sm:py-36 sm:pr-16 sm:w-2/3">
        <div>
            {{ $slot }}
        </div>
    </div>
    <div class="inner-full sm:w-1/3 sm:absolute sm:right-0 sm:top-0 sm:h-full">
        @if ($image)
            <img class="w-full h-[350px] sm:h-full object-cover" src={{ $image['url'] }} alt={{ $image['alt'] }} />
        @endif
    </div>
</section>
