<header class="banner bg-none text-navy abso top-0 md:py-10">
  <nav class="navbar">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      @if($siteLogo)
      <a href="{{ $homeUrl }}" class="flex items-center max-w-[70%] space-x-3 rtl:space-x-reverse">
      <img src="{{ $siteLogo }}" class="h-12 w-auto" alt="{{ get_bloginfo('name', 'display') }} logo" />
      </a>
    @endif
      <div class="navbar-collapse w-full md:block md:w-auto" id="navbarBasic">
      </div>
    </div>
  </nav>
</header>