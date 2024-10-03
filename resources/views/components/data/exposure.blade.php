<div class="exposure bg-white p-6 lg:p-10">
    <div class="flex justify-between items-center w-full mb-8">
        <h3 class="text-midnight">Exposure</h3>
        <h5 class="text-ultramarine font-normal">AS OF {{ $date }}</h5>
    </div>
    <div class="exposure-tabs w-full max-w-[300px] flex justify-between items-center gap-2 mb-8">
        @php($i = 0)
        @foreach ($output as $item)
            <div class="exposure-tab @if ($i == 0) active @endif" data-tab="{{ $i }}">
                {{ $item['type'] }}</div>
            @php($i++)
        @endforeach
    </div>
    @php($i = 0)
    @foreach ($output as $data)
        <div class="exposure-table @if ($i == 0) active @endif grid items-center lg:grid-cols-2 gap-4"
            data-tab-index={{ $i }}>
            <div data-series="{{ json_encode($data['items']) }}" id="exposure-chart-{{ $data['type'] }}"
                class="exposure-chart  top-chart w-full h-[400px] bg-gray-200">
            </div>
            <div class="exposure-list text-midnight">
                <ul class="flex flex-col border-list border-list-light">
                    @php($i = 0)
                    @foreach ($data['items'] as $item)
                        <li class="flex justify-between items-center py-2 gap-4 sm:gap-0"
                            data-index="{{ $i }}">
                            <div class="flex items-center gap-2">
                                <span class="color aspect-square w-[15px] h-[15px] block "
                                    style="background: {{ $item['color'] }};"></span>
                                <span class="font-Termina font-[500] text-ultramarine name">{{ $item['name'] }}</span>
                            </div>
                            <span class="font-Grotesk y">{{ $item['y'] }} %</span>
                        </li>
                        @php($i++)
                    @endforeach
                </ul>
            </div>
        </div>
        @php($i++)
    @endforeach
    @if ($download != '')
        <div class="flex justify-end items-center my-4 lg:my-8">
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
