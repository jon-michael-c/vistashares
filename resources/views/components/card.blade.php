@if ($type == 'default')
    <div class=" p-[1.75rem] sm:p-10  rounded-tl-lg rounded-br-lg {!! $class !!}">
        {{ $slot }}
    </div>
@elseif ($type == 'alt')
    <div class="p-[1.75rem] border-indigo border-[1px] border-solid rounded-tr-lg rounded-bl-lg">
        {{ $slot }}
    </div>
@endif
