@extends('layouts.index')

@section('title')
    Home
@endsection
@section('content')
    <div class="mb-5">
        <div class="bg-white rounded-3 p-2 mb-3 d-flex w-100 justify-content-between h-100 align-items-center">
            <div class="">
                <div class="h1">Projects</div>
            </div>
            <div class="">
                <form class="" role="search" method="GET" action="{{ route('home.index')}}">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control border-primary" placeholder="Search projects" value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row g-3">
            @forelse ($projects as $project )
                @php
                    $stretchedLink = '<a class="stretched-link link-secondary text-decoration-none" href="' . route("project.show", ["id" => $project["id"]]) . '">Created: ' . $project->created_at . '</a>';
                @endphp
                
                    <x-card title="{{ $project->name }}" :subtitle="$stretchedLink" class="col-12 col-sm-6 col-md-4"/>
            @empty
                <div class="">You have no projects</div>
            @endforelse
        </div>
    </div>
@endsection