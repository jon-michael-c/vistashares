<header class="banner bg-beige text-white sticky z-[999] top-0 left-0 drop-shadow-sm ">
    <nav class="navbar">
        <div class="max-w-screen-xl flex flex-wrap items-end justify-between mx-auto py-4 px-[24px] gap-2 ">
            @if ($siteLogo)
                <a href="{{ $homeUrl }}" class="flex items-center max-w-[70%] space-x-3 rtl:space-x-reverse">
                    <img src="{{ $siteLogo }}" class="h-9 md:h-10" alt="{{ get_bloginfo('name', 'display') }} logo" />
                </a>
            @endif
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden "
                aria-controls="navbar-default" aria-expanded="false" id="navbar-toggler">
                <span class="sr-only">Open main menu</span>
                <div class="hamburger-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="navbar-collapse flex flex-col-reverse w-full lg:block lg:w-auto" id="navbarBasic">
                @include('components.menus.secondary', ['menu' => $secondaryMenu])
                @if ($primaryMenu && is_array($primaryMenu) && count($primaryMenu) > 0)
                    @include('components.menus.primary', ['menu' => $primaryMenu])
                @endif
            </div>
        </div>
    </nav>
</header>
