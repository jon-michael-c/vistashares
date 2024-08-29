@php
    $faqs = get_field('faqs', 'option');
@endphp
<section id="faqs" class="faqs bg-gradient-1 full-width">
    <div class="py-16">
        <h2 class="pb-4">FAQs</h2>
        @if ($faqs)
            <div class="faqs-container">
                @foreach ($faqs as $faq)
                    <div class="faq-item  text-white">
                        <div class="faq-q">
                            <p class="faq-q-title font-Termina font-semibold">{!! $faq['question'] !!}</p>
                            <div class="faq-q-icon">
                                <img src="@asset('images/faq-icon.svg')" alt="faq icon" />
                            </div>
                        </div>
                        <div class="faq-a">
                            {!! $faq['answer'] !!}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
