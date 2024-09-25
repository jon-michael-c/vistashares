<div class="exposure bg-white p-6 sm:p-10">
    <h3 class="text-midnight">Exposure</h3>
    <div class="grid items-center sm:grid-cols-2 gap-4">
        <div data-series="{{ json_encode($output) }}" id="exposure-chart" class="top-chart w-full h-[400px] bg-gray-200">
        </div>
        <div class="exposure-list text-midnight">
            <ul class="flex flex-col border-list border-list-light">
                @php($i = 0)
                @foreach ($output as $item)
                    <li class="flex justify-between items-center py-2" data-index="{{ $i }}">
                        <div class="flex items-center gap-2">
                            <span class="w-[15px] h-[15px] block " style="background: {{ $item['color'] }};"></span>
                            <span>{{ $item['name'] }}</span>
                        </div>
                        <span>{{ $item['y'] }} %</span>
                    </li>
                    @php($i++)
                @endforeach
            </ul>
        </div>
    </div>
    @if ($download != '')
        <div class="flex justify-end items-center mb-2">
            <x-download class="text-indigo" color="#B269FF" :url="$download">
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
