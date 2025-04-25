@extends('layouts.index')

@section('title')
    Teams
@endsection
@section('content')
@if ($isMember || $isOwner)
    <div class="bg-white p-3 rounded-3">
        <div class="d-flex justify-content-between h-100 align-items-center">
            <div class="h1">{{$team->name}}</div>
            <form class="" role="search" method="GET" action="{{ route('team.show', ['id' => $team->id])}}">
                <div class="input-group">
                    <input name="search" type="text" class="form-control border-primary" placeholder="Search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    @if ($isOwner)
        <div class="row g-3 mt-3">
            <div class="">
                <div class="h3 mb-0 pb-0">Users</div>
            </div>
                @forelse ($users as $user)
                    <x-card 
                        class='col-12 col-sm-6 col-md-4'
                        :title=" '<span class=\'d-flex justify-content-between w-100\'>' . $user->name . ($user->pivot->role ? '<i class=\'bi bi-person-fill\'></i>' : '') . '</span>'"
                        subtitle="{{ $user->email }}"
                    />
                @empty
                @endforelse
        </div>
    @endif
    <div class="row g-3 my-5">
        <div class="">
            <div class="h3 mb-0 pb-0">Projects</div>
        </div>
        @forelse ($projects as $project)
            <x-card 
                class="col-12"
                :title="'<a class=\'link-secondary stretched-link text-decoration-none\' href=\'' . route('project.show', ['id' => $project->id]) . '\'>' . e($project->name) . '</a>'" 
                subtitle="Created: {{ $project->created_at }}"
            />
        @empty
                <div class="">This Team Has No Projects</div>
        @endforelse
    </div>
    @else
        <div class="">You are not a member to this Team</div>
    @endif
@endsection