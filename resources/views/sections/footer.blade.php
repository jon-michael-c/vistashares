<footer class="bg-indigoLight w-full">
    <div class="max-w-screen-xl mx-auto pt-12 pb-8 px-[24px] w-full">
        <div class="mx-auto flex flex-col gap-2 justify-center text-center sm:text-left sm:flex-row sm:justify-between">
            <div
                class="site-branding max-w-[240px] mx-auto sm:mx-0 sm:flex sm:flex-col sm:justify-between sm:items-start">
                <a href="{{ home_url() }}" class="flex itms">
                    <img src="{{ $footerLogo }}" class="h-10 md:h-10" alt="{{ $siteName }} logo" />
                </a>
                <div class="footer-socials hidden sm:block">
                    @include('components.socials', ['socialLinks' => $socialLinks])
                </div>
            </div>

            <div class="footer-menu pt-8 pb-4 sm:pt-0 sm:pb-0">
                @if ($footerMenu && is_array($footerMenu) && count($footerMenu) > 0)
                    @include('components.menus.footer', ['menu' => $footerMenu])
                @endif
            </div>
            <div class="footer-newsletter text-midnight pb-4 sm:pb-0">
                <p class="text-midnight font-semibold font-Termina">Subscribe to Newsletter</p>
                <div class="newsletter-footer">
                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
                    <script>
                        hbspt.forms.create({
                            portalId: "45890113",
                            formId: "f95d9ab9-242b-47ce-8221-dae55d9ea484"
                        });
                    </script>
                </div>
            </div>
            <div class="footer-socials block sm:hidden">
                @include('components.socials', ['socialLinks' => $socialLinks])
            </div>
        </div>
    </div>
    <div class="bg-midnight w-full ">
        <div class="mx-auto w-full max-w-screen-xl px-[24px]   py-6 lg:py-8">
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
