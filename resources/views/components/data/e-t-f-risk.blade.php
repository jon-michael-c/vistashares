@if (get_field('etf_risk_display'))
    <div class="etf-risk bg-white p-6 sm:p-10">
        <x-table title="ETF Risk Stats" :output="$output" :download="$download" :disclaimer="$disclaimer" :date="$date" />
    </div>
@endif
