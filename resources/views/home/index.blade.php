@extends('layouts.index')

@section('title')
    Home
@endsection
@section('content')
    <div class="text-center h1">Teams You Have</div>
    <div class="row g-3">
        @forelse ($teams as $team )
            <x-card title="{{ $team->name }}" class="col-3" subtitle="Card subtitle" body="Some quick example text to build on the card title and make up the bulk of the card's content." />
        @empty
            <div class="">No Teams Are Available</div>
        @endforelse
    </div>
@endsection