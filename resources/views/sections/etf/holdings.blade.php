<x-section id="holdings">
    <h2 class="pb-4">Holdings & Characteristics</h2>
    <div class="grid gap-6">
        {{--         <x-top-holdings />
 --}}
        <x-exposure />
        <div class="grid gap-6 sm:grid-cols-2 sm:gap-6">
            <x-e-t-f-characteristics />
            <x-e-t-f-risk />
        </div>
    </div>
    @if (get_field('disclosure'))
        <div class="discloures pt-8">
            <h3 class="text-white mb-4 font-semibold">Disclosure</h3>
            <div class="text-white">
                {!! get_field('disclosure') !!}
            </div>
        </div>
    @endif
</x-section>
