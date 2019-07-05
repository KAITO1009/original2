@extends('layouts.layout')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Mental Trainer</h1>
            {!! link_to_route("trainning", "Attention Trainning") !!}
            {!! link_to_route("meditation", "Meditation") !!}
            {!! link_to_route("exw", "Expressive Writing") !!}
        </div>
    </div>
@endsection