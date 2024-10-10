@if (get_field('etf_characteristics_display'))
    <div class="etf-characteristics bg-white p-6 sm:p-10">
        <x-table title="ETF Characteristics" :output="$output" :download="$download" :disclaimer="$disclaimer" />
    </div>
@endif
