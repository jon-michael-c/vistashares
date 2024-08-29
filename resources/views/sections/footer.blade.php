<footer class="bg-indigoLight w-full">
    <div class="max-w-screen-2xl pt-12 pb-8 px-[24px] w-full">
        <div class="mx-auto flex flex-col gap-2 justify-center text-center">
            <div class="site-branding max-w-[240px] mx-auto">
                <a href="{{ home_url() }}" class="flex itms">
                    <img src="{{ $footerLogo }}" class="h-10 md:h-10" alt="{{ $siteName }} logo" />
                </a>
            </div>
            <div class="footer-menu pt-8 pb-4">
                @if ($footerMenu && is_array($footerMenu) && count($footerMenu) > 0)
                    @include('components.menus.footer', ['menu' => $footerMenu])
                @endif
            </div>
            <div class="footer-newsletter text-midnight pb-4">
                <p>Subscribe to Newsletter</p>
                <input placeholder="Email Address" />
                <button>Subscribe</button>

            </div>
            <div class="footer-socials ">
                @include('components.socials', ['socialLinks' => $socialLinks])
            </div>
        </div>
    </div>
    <div class="bg-midnight w-full ">
        <div class="mx-auto w-full max-w-screen-2xl px-[24px]   py-6 lg:py-8">
            <div class="text-center  mb-8  border-b-[1px] border-indigo py-4 md:flex md:justify-between">
                <div class="mb-6 md:flex">
                    <p class="font-Termina font-[500]">{{ $copyright }} {{ $siteName }}</p>
                </div>
                @include('components.menus.legal', ['menu' => $legalMenu])
            </div>
            <div class="legal">
                {!! $disclaimer !!}
            </div>

        </div>
    </div>

</footer>
