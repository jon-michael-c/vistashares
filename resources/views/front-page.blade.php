@extends('layouts.app')



@section('content')
    @include('sections.home.hero')
    @php
        $image = [
            'url' => 'https://vista.leibowitzdesign.local/wp-content/uploads/2024/08/Home_Supercycle.png',
            'alt' => 'Placeholder image',
        ];
    @endphp
    <x-two-thirds :image="$image">
        <p>
            Harness the power of suprcyclesTM: the catalyzing levers for future innovations that are poised to drive
            massive, lasting impact across the globe. Early access to these innovations is crucial.
        </p>
        <h3>Join VistaShares at the forefront</h3>
    </x-two-thirds>
    @php(the_content())
@endsection
