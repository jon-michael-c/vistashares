<x-section class="contact bg-gradient-9">
    <div class="grid gap-8 sm:grid-cols-2 sm:gap-16">
        <div>
            <div class="pb-4">
                <h3>Contact VistaShares</h3>
            </div>
            <div class="grid gap-4">
                @if ($contact_info)
                    @foreach ($contact_info as $info)
                        <a href="{{ $info['url'] }}" class="flex items-center gap-4">
                            <img src="{{ $info['icon']['url'] }}" alt="{{ $info['icon']['alt'] }}" class="w-8 h-8" />
                            <p class="font-Termina uppercase">{{ $info['url'] }}</p>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
        <div>
            <div class="pb-4">
                <h3>Connect with VistaShares</h3>
            </div>
            @include('partials.contact.form')
        </div>
    </div>
    <div class="line-bg">

        <img src="@asset('images/line-logo.svg')" alt="line background" />
    </div>
</x-section>
