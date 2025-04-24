@extends('layouts.index')

@section('title')
    Home
@endsection
@section('content')
    <div class="">
        <div class="bg-white rounded-3 text-center mb-3">
            <div class="">
                <div class="h1">Teams You Have</div>
            </div>
        </div>
        <div class="row g-3">
            @forelse ($owned_teams as $team )
                @php
                    $stretchedLink = '<a class="stretched-link link-secondary text-decoration-none" href="' . route("team.show", ["id" => $team["id"]]) . '">Users: ' . $team->users_count . '</a>';
                @endphp
                <x-card title="{{ $team->name }}" class="col-12 col-sm-6 col-md-4" :subtitle="$stretchedLink"/>
            @empty
                <div class="">You have no teams</div>
            @endforelse
        </div>
    </div>
@endsection