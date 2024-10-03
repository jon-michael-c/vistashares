<div class="pagination flex justify-between items-center gap-4 w-fit max-w-[500px] mx-auto">
    {!! paginate_links([
        'total' => $query->max_num_pages,
        'prev_text' => '<div class="arrow left"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="17" viewBox="0 0 12 17" fill="none">
                      <path d="M1 16L10 8.5L1 1" stroke="#7DA2FF" stroke-width="2"/>
                    </svg></div>',
        'next_text' => '<div class="arrow right"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="17" viewBox="0 0 12 17" fill="none">
                      <path d="M1 16L10 8.5L1 1" stroke="#7DA2FF" stroke-width="2"/>
                    </svg></div>',
    ]) !!}
</div>
