<ul class="primaryMenu  ">
    @foreach ($menu as $item)
        <li class="menu-item relative [&:not(:last-child)]:mb-8  {!! $item['classes'] !!}">
            <a target="{{ $item['target'] }}" href="{{ $item['url'] }}"
                class="text-midnight font-semibold block">{{ $item['title'] }}</a>
        </li>
    @endforeach
</ul>
