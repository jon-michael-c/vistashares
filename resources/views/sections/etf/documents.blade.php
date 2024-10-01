@php
    $etf_docs = get_field('etf_docs');
    $doc_img = get_field('doc_image');

@endphp
<section id="documents" class="full-width sm:flex relative sm:overflow-hidden">
    <div class="py-16 sm:py-28 sm:w-[60%]">
        <h3 class="mb-4 text-white">ETF Documents</h3>
        <div class="border-[1px] border-indigo border-solid px-4 py-10 sm:px-8 max-w-[558px]">

            @if ($etf_docs)
                <ul class="w-full doc-items">
                    @foreach ($etf_docs as $doc)
                        @if ($doc['etf_doc'])
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
                        @endif
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="inner-full sm:w-[40%] sm:absolute sm:top-0 sm:right-0">
        @if ($doc_img)
            <img src="{{ $doc_img['url'] }}" alt="{{ $doc_img['alt'] }}" class="w-full h-full object-cover" />
        @endif
    </div>
</section>
