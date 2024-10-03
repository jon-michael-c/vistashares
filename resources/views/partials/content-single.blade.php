<article @php(post_class('h-entry'))>
    <div class="py-8 sm:py-16">
        <header class="sm:max-w-[50%] pb-4 sm:pb-8">
            <h3 class="font-Termina font-normal text-cornflower uppercase">{{ get_the_date('d M Y') }} </h3>
            <h1 class="p-name text-indigo sm:text-[32px]">
                {!! $title !!}
            </h1>
            <h3 class="font-Termina font-normal text-cornflower">{!! get_the_author() !!}</h3>
        </header>
        <div class="flex flex-col gap-8 sm:flex-row-reverse sm:gap-16 ">
            <div class="sm:w-[40%]">
                <img src="{!! get_the_post_thumbnail_url() !!}" alt="{!! get_the_title() !!}" class="w-full h-auto mx-auto" />
            </div>
            <div class="e-content sm:w-[60%]">

                <div class="text-silver grid gap-4">
                    @php(the_content())
                </div>
            </div>
        </div>
    </div>
</article>
