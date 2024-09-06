<div data-series="{{ json_encode($output) }}" id="exposure-chart" class="top-chart w-full h-[400px] bg-gray-200"></div>
<div class="exposure-list text-midnight">
    <ul class="flex flex-col border-list border-list-light">
        @php($i = 0)
        @foreach ($output as $item)
            <li class="flex justify-between items-center py-2" data-index="{{ $i }}">
                <div class="flex items-center gap-2">
                    <span class="w-[15px] h-[15px] block " style="background: {{ $item['color'] }};"></span>
                    <span>{{ $item['name'] }}</span>
                </div>
                <span>{{ $item['y'] }}</span>
            </li>
            @php($i++)
        @endforeach
    </ul>
</div>


<script src="@asset('js/highchart.js')" defer></script>
