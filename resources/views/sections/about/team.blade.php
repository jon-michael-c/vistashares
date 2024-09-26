@php
    // Get team members ids
    $team = get_posts([
        'numberposts' => -1,
        'post_type' => 'team-member',
        'post_status' => 'publish',
        'fields' => 'ids',
    ]);

    $committee = get_posts([
        'numberposts' => -1,
        'post_type' => 'team-member',
        'post_status' => 'publish',
        'tax_query' => [
            [
                'taxonomy' => 'locations',
                'field' => 'slug',
                'terms' => 'committee',
            ],
        ],
        'fields' => 'ids',
    ]);
@endphp
<x-section>
    <div class="pb-4 w-full ">
        <h2 class="text-silver">The VistaShares Investment Committee</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @if ($committee)
            @foreach ($committee as $member)
                @include('partials.team-members.preview', [
                    'id' => $member,
                ])
            @endforeach
        @endif
    </div>
</x-section>
<x-section class="full-width">
    <div class="bg-image inner-full">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 366" fill="none">
            <path d="M1440 0H-4V366H1221.5L1440 0Z" fill="url(#paint0_linear_16909_6337)" />
            <defs>
                <linearGradient id="paint0_linear_16909_6337" x1="347" y1="-74.5" x2="1268.5" y2="297"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#B269FF" />
                    <stop offset="1" stop-color="#A2BDFF" />
                </linearGradient>
            </defs>
        </svg>
    </div>
    <div class="benefits relative mb-8 sm:mb-12">
        <div class="sm:max-w-[1100px]">
            <h2 class="text-midnight">Benefits</h2>
            <div class="sm:flex pt-4">
                @if ($benefits)
                    @foreach ($benefits as $benefit)
                        <div class="benefit">
                            <h3 class="text-ultramarine">{!! $benefit['heading'] !!}</h3>
                            <div class="text-midnight">{!! $benefit['description'] !!}</div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-section>
<x-section class="bg-gradient-11">
    <div class="pb-4 flex justify-center items-center gap-8">
        <h2 class="text-silver">Team</h2>
        <hr class="border-indigo  w-full" />
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @if ($team)
            @foreach ($team as $member)
                @include('partials.team-members.preview', [
                    'id' => $member,
                ])
            @endforeach
        @endif
    </div>
</x-section>
