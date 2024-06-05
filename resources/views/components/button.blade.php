<a {{ $attributes->merge(['class' => $type_class . 'bg-red-100 text-white text-lg type-' . $type]) }}>
    {{ $slot }}
</a>