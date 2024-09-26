<div class="data-table {{ $type }}">
    <div class="data-table-head flex justify-between items-center flex-wrap gap-2 ">
        <h3>{!! $title !!}</h3>
        <h5>As of 31/12/2021</h5>
    </div>
    <div class="table-wrapper">
        <div class="table-container overflow-x-auto">
            <table class="mt-4 w-full border-collapse">
                @if ($output['head'])
                    <thead>
                        <tr>
                            @foreach ($output['head'] as $head)
                                <th class="text-midnight font-medium py-4">{{ $head }}</th>
                            @endforeach
                        </tr>
                    </thead>
                @endif
                @if ($output['body'])
                    @foreach ($output['body'] as $key => $value)
                        <tr>
                            <td>{!! $key !!}</td>
                            @foreach ($value as $val)
                                <td>{!! $val !!}</td>
                            @endforeach
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>

    </div>
    @if ($type == 'long')
        <div class="table-scroll mb-2 text-right text-ultramarine sm:hidden">
            <p>Swipe to view more</p>
        </div>
    @endif
    @if ($download != '')
        <div class="flex justify-end items-center my-4 sm:my-8">
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
