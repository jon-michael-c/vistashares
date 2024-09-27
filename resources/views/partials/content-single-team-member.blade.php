<div class="team-member-single full-width w-full relative py-8 sm:py-24 bg-gradient-10">
    <div class="line-bg">
        <img src="@asset('images/line-logo.svg')" alt="line background" />
    </div>
    <div class="grid gap-4">
        <div class="back-link flex gap-2 uppercase">
            <span><a href="{{ home_url('/about-us#team') }}"
                    class="text-silver opacity-75 hover:text-indigo hover:opacity-100 transition-all light">Team</a> &gt;
                <span class="underline font-bold">BIO</span></span>
        </div>
        <div class="flex flex-col gap-8 sm:flex-row-reverse sm:gap-16">
            <div class="sm:w-[40%]">
                <img src="{!! get_the_post_thumbnail_url() !!}" alt="{!! get_the_title() !!}"
                    class="w-full h-auto sm:max-w-[300px] mx-auto" />
            </div>
            <div class="sm:w-[60%]">
                <h1 class="text-indigo">{!! get_the_title() !!}</h1>
                <h4 class="text-cornflower uppercase font-normal">{!! get_field('title') !!}</h4>
                <div class="grid gap-4 text-silver pt-4">
                    {!! get_the_content() !!}
                </div>
            </div>
        </div>
    </div>

</div>
