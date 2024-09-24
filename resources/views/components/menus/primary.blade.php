<ul
    class="primaryMenu  text-white flex flex-col gap-2 items-center pt-8 pb-2 lg:py-0 lg:flex-row  lg:space-x-8 rtl:space-x-reverse lg:mt-0 lg:border-0  lg:ml-auto lg:justify-end">
    @foreach ($menu as $item)
        <li class="menu-item relative @if ($item['children']) has-children @endif {!! $item['classes'] !!}">
            @if ($item['children'])
                <span class="text-white  hover:cursor-pointer text-center sm:text-left">
                    {{ $item['title'] }}
                    <img src="@asset('images/submenu-arrow.svg')" alt="arrow down" class="sub-menu-arrow w-4 inline ml-1" />
                </span>
                <ul class="sub-menu">
                    @foreach ($item['children'] as $child)
                        <li
                            class="menu-item sub-menu-item px-4 py-2 hover:bg-gray transition-all {!! $item['classes'] !!}">
                            <a href="{{ $child['url'] }}" class="text-white block ">{!! $child['title'] !!}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <a href="{{ $item['url'] }}" class="font-semibold text-white block">{!! $item['title'] !!}</a>
            @endif
        </li>
    @endforeach
</ul>
