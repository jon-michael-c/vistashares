@php
    if ($attributes['bg_image']) {
        $bg_image = $attributes['bg_image'];
    }

    if ($attributes['id']) {
        $id = $attributes['id'];
    }
@endphp

<section class="full-width relative overflow-hidden py-8 sm:py-24 {!! $class !!}"
    @if (isset($id)) id="{{ $id }}" @endif>
    @if (isset($bg_image))
        <div class="bg-image inner-full">
            <img src="{{ $bg_image['url'] }}" alt="{{ $bg_image['alt'] }}" class="w-full h-full object-cover" />
        </div>
    @endif
    <div class="grid gap-2  sm:gap-6 items-start content-start">
        {{ $slot }}
    </div>
</section>
