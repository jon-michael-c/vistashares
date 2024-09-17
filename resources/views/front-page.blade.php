@extends('layouts.app')



@section('content')
    @include('sections.home.hero')
    @php(the_content())
@endsection
