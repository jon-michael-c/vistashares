@if ($type == 'default')
    <div class="{!! $class !!} p-[1.75rem]  rounded-tl-lg rounded-br-lg">
        {{ $slot }}
    </div>
@elseif ($type == 'alt')
    <div class="p-[1.75rem] border-indigo border-[1px] border-solid rounded-tr-lg rounded-bl-lg">
        {{ $slot }}
    </div>
@endif
