<div class="data-table {{ $type }}">
    <div class="data-table-head flex justify-between items-center flex-wrap gap-2 ">
        <h3>{!! $title !!}</h3>
        <h5>As of {!! $date !!}</h5>
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
            <x-download class="text-indigo" color="#B269FF" :url="$download">
                Download
            </x-download>
        </div>
    @endif
    @if ($holdings)
        <form method="GET" action="{{ home_url() }}/csv/top-holdings">
            <div class="flex justify-end items-center my-4 sm:my-8">
                <input type="hidden" name="etf" value="{{ get_the_title() }}">
                <button type="submit" target="_blank"
                    class="download flex items-center gap-2 cursor-pointer text-indigo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                        fill=" #B269FF">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.904418 16.9496C0.576871 16.8895 0.272786 16.7295 0.130721 16.4303C0.062715 16.287 0.00760899 16.1241 0.00648182 15.9698C-0.00328698 14.6688 0.000804225 13.3677 0.00109645 12.0666C0.00109645 12.047 0.00585561 12.0273 0.00936236 12H2.12569V14.9681H13.8632V12.0001H16V12.1758V15.7525C16 16.2938 15.7684 16.8219 15.1399 16.9525C14.7781 17.0277 7.50387 16.9698 5.97547 16.9698C4.37389 16.9698 2.75594 17.0328 1.15795 16.9768C1.07345 16.9738 0.988163 16.965 0.904418 16.9496Z" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6.49942 7.58215V7.3653C6.49942 5.13233 6.49934 2.89935 6.49946 0.666378C6.4995 0.194373 6.67926 0.000296752 7.11602 0.00012718C7.7045 -4.23932e-05 8.29302 -4.23932e-05 8.8815 0.00012718C9.31959 0.000254359 9.50048 0.193991 9.50052 0.663665C9.50064 2.89664 9.50056 5.12966 9.50056 7.36263V7.58215H9.67851C10.2566 7.58215 10.8347 7.5852 11.4128 7.5807C11.6516 7.57884 11.8474 7.65612 11.952 7.90069C12.0573 8.14678 11.9783 8.35637 11.8218 8.54969C10.6891 9.94887 9.55898 11.3505 8.42661 12.7501C8.1577 13.0824 7.84334 13.0835 7.57529 12.7523C6.44285 11.3528 5.31279 9.95103 4.17995 8.55193C4.02369 8.35892 3.94245 8.14996 4.04691 7.90344C4.15055 7.65888 4.34557 7.57918 4.58476 7.58075C5.21467 7.5849 5.84465 7.58215 6.49942 7.58215Z" />
                    </svg>
                    <p class="font-semibold font-Termina underline transition-all">Download All Holdings</p>
                </button>
            </div>
        </form>
    @endif
    @if ($disclaimer)
        <div class="disclaimer text-midnight">
            {!! $disclaimer !!}
        </div>
    @endif
</div>
