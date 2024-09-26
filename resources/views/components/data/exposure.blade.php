<div class="exposure bg-white p-6 lg:p-10">
    <h3 class="text-midnight">Exposure</h3>
    <div class="grid items-center lg:grid-cols-2 gap-4">
        <div data-series="{{ json_encode($output) }}" id="exposure-chart" class="top-chart w-full h-[400px] bg-gray-200">
        </div>
        <div class="exposure-list text-midnight">
            <ul class="flex flex-col border-list border-list-light">
                @php($i = 0)
                @foreach ($output as $item)
                    <li class="flex justify-between items-center py-2 gap-4 sm:gap-0" data-index="{{ $i }}">
                        <div class="flex items-center gap-2">
                            <span class="color aspect-square w-[15px] h-[15px] block "
                                style="background: {{ $item['color'] }};"></span>
                            <span class="name">{{ $item['name'] }}</span>
                        </div>
                        <span class="y">{{ $item['y'] }} %</span>
                    </li>
                    @php($i++)
                @endforeach
            </ul>
        </div>
    </div>
    @if ($download != '')
        <div class="flex justify-end items-center my-4 lg:my-8">
            <x-download class="text-indigo light" color="#B269FF" :url="$download">
                Download
            </x-download>
        </div>
    @endif
    @if ($disclaimer)
        <div class="disclaimer text-midnight">
            {!! $disclaimer !!}
        </div>
    @endif

</div>
