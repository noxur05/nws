@extends('layouts.index')

@section('title')
    Home
@endsection
@section('content')
    <div class="mb-5">
        <div class="bg-white rounded-3 p-2 mb-3">
            <div class="">
                <div class="h1">Projects</div>
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