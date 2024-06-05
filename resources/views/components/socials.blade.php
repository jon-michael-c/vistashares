<div class="flex space-x-4 justify-center">
    @foreach ($socialLinks as $link)
        <a href="{{ $link['url']['url'] }}" target="_blank" rel="noopener noreferrer"
            class="text-gray-500 hover:text-gray-700 transition-colors duration-300">
            <img src="{{ $link['icon'] }}" alt="{{ $link['name'] }}" class="icon w-6 h-6" />
            <span class="sr-only">{{ $link['name'] }}</span>
        </a>
    @endforeach
</div>