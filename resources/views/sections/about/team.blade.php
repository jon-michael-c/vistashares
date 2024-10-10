@php
    // Get team members ids
    $team = get_posts([
        'numberposts' => -1,
        'post_type' => 'team-member',
        'post_status' => 'publish',
        'fields' => 'ids',
    ]);

    $committee = get_field('investment_committee', 'option');
@endphp
<x-section>
    <div class="pb-4 w-full ">
        <h2 class="text-silver">The VistaShares Investment Committee</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @if ($committee)
            @foreach ($committee as $member)
                @include('partials.team-members.preview', [
                    'id' => $member['member'],
                ])
            @endforeach
        @endif
    </div>
</x-section>
<x-section class="full-width">
    <div class="bg-benefit inner-full">
    </div>
    <div class="benefits relative lg:pr-[12rem]">
        <div>
            <h2 class="text-midnight">Benefits</h2>
            <div
                class="benefits-items flex flex-col lg:flex-row sm:items-center sm:justify-between max-w-[950px] gap-4 lg:gap-28 pt-4">
                @if ($benefits)
                    @foreach ($benefits as $benefit)
                        <div class="benefit">
                            <h3 class="text-ultramarine">{!! $benefit['heading'] !!}</h3>
                            <div class="text-midnight">{!! $benefit['description'] !!}</div>
                        </div>
                        @if ($loop->iteration === 1)
                            <div class="diagonal hidden lg:block"></div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-section>
<x-section class="bg-gradient-11" id="team">
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
