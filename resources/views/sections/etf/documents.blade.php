@php
    $etf_docs = get_field('etf_docs');

@endphp
<section id="documents" class="full-width sm:flex relative sm:overflow-hidden">
    <div class="py-16 sm:w-[60%]">
        <h3 class="mb-4 text-white">ETF Documents</h3>
        <div class="border-[1px] border-indigo border-solid px-4 py-10 sm:px-8">

            @if ($etf_docs)
                <ul class="w-full doc-items">
                    @foreach ($etf_docs as $doc)
                        <li class="flex py-2 w-full ">
                            <a href="{{ $doc['etf_doc']['url'] }}" target="_blank"
                                class="flex justify-between items-center gap-2 w-full">
                                <p class="font-semibold font-Termina ">
                                    {{ $doc['title'] }}
                                </p>
                                <span class="underline uppercase text-right text-cornflower">
                                    PDF
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="inner-full sm:w-[40%] sm:absolute sm:top-0 sm:right-0">
        <img src="https://vista.leibowitzdesign.local/wp-content/uploads/2024/08/AIS-ETF.png" />
    </div>
</section>
