@extends('layouts.index')

@section('title')
    Home
@endsection
@section('content')
    <div class="">
        <div class="text-center h1">Teams You Have</div>
        <div class="row g-3">
            @forelse ($owned_teams as $team )
                <x-card title="{{ $team->name }}" class="col-12 col-sm-6 col-md-3" subtitle="Users: {{$team->users_count}}"/>
            @empty
                <div class="">You have no teams</div>
            @endforelse
        </div>
    </div>
    <div class="my-5">
        <div class="text-center h1">
            Teams You Are In
        </div>
        <div class="row g-3">
            @forelse ($teams as $team )
                <x-card title="{{ $team->name }}" class="col-12 col-sm-6 col-md-3" subtitle="Users: {{$team->users_count}}"/>
            @empty
                <div class="">You are in no other teams</div>
            @endforelse
        </div>
    </div>
@endsection