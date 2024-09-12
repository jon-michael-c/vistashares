@php
    $output = [
        'head' => [],
        'body' => [
            'Lorem Ispum' => ['10%', '10%', '10%', '10%', '10%'],
            'Lorem Ipsum' => ['10%', '10%', '10%', '10%', '10%'],
        ],
    ];
@endphp

<section id="holdings" class="py-8">
    <h2 class="pb-4">Holdings & Characteristics</h2>
    <div class="grid gap-6">
        <div class="top-holdings bg-white p-6">
            <x-table title="Top Holdings" type="long" :output="$output" />
        </div>
        <div class="exposure bg-white p-6">
            <h3 class="text-midnight">Exposure</h3>
            <div class="grid items-center sm:grid-cols-2 gap-4">
                <x-exposure />
            </div>
        </div>
        <div class="sm:grid sm:grid-cols-2 sm:gap-6">
            <div class="etf-characteristics bg-white p-6">
                <x-table title="ETF Characteristics" />
            </div>
            <div class="etf-risk bg-white p-6">
                <x-table title="ETF Risk Stats" />
            </div>
        </div>
    </div>
    <div class="discloures pt-8">
        <h3 class="text-white mb-4 font-semibold">Disclosure</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis sapien ac nulla bibendum rutrum vitae
            nec erat. Nunc eget metus quis sapien facilisis rutrum quis et diam. Duis congue sodales ultricies. Sed
            ornare ultrices rutrum. In augue odio, mollis eget pellentesque nec, scelerisque non purus. Quisque velit
            mi, euismod rutrum semper eu, lobortis eu diam. Quisque vitae facilisis urna. Praesent facilisis lectus
            orci, vitae sodales libero sagittis vel. Vestibulum maximus et tellus ac egestas. Pellentesque a lacinia
            mauris, iaculis aliquet leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
            inceptos himenaeos. Vivamus augue neque, pretium sit amet libero non, commodo pharetra erat. Curabitur
            maximus pulvinar tortor, nec posuere metus.</p>
        <p>
            Suspendisse potenti. Fusce ullamcorper nisi in luctus porttitor. Suspendisse ac turpis scelerisque, placerat
            arcu nec, ultrices dui. Fusce nibh lectus, pellentesque quis pulvinar vel, vestibulum iaculis enim. Integer
            eros justo, elementum ut malesuada vel, scelerisque in purus. In aliquam ac ligula sit amet ornare. Sed et
            turpis imperdiet, hendrerit mi nec, faucibus eros. Cras molestie facilisis convallis. Mauris cursus sodales
            ultrices. Donec eu pellentesque neque.
        </p>
    </div>
</section>
