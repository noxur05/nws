@extends('layouts.index')

@section('title')
    Porject
@endsection
@section('content')
@if ($isMember || $isOwner)
    <div class="bg-white p-3 rounded-3">
        <div class="">
            <div class="h1">{{$project->name}}</div>
        </div>
    </div>
@else
    <div class="">You are not member of Team</div>
@endif
{{-- @if ($isOwner)
    <div class="row g-3 mt-3">
        <div class="h3 mb-0 pb-0">Users</div>
            @forelse ($team->users as $user)
                <x-card 
                    class='col-12 col-sm-6 col-md-4'
                    :title=" '<span class=\'d-flex justify-content-between w-100\'>' . $user->name . ($user->pivot->role ? '<i class=\'bi bi-star-fill\'></i>' : '') . '</span>'"
                    subtitle="{{ $user->email }}"
                />
            @empty
            @endforelse
    </div>
@endif
<div class="row g-3 my-5">
    <div class="h3 mb-0 pb-0">Projects</div>
    @forelse ($team->projects as $project)
        <x-card 
            class="col-12"
            title="{{ $project->name }}" 
            subtitle="Created: {{ $project->created_at }}"
        />
    @empty
        <div class="">This Team Has No Projects</div>
    @endforelse --}}
</div>

@endsection