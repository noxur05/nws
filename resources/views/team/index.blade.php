@extends('layouts.index')

@section('title')
    Teams
@endsection
@section('content')
    <div class="bg-white p-3 rounded-3">
        <div class="">
            <div class="h1">{{$justy->name}}</div>
        </div>
    </div>
    @if ($isOwner)
        <div class="row g-3 mt-3">
            <div class="h3 mb-0 pb-0">Users</div>
                @forelse ($justy->users as $user)
                    <x-card 
                        class="col-12 col-sm-6 col-md-4"
                        title="{{ $user->name }}" 
                        subtitle="{{ $user->email }}"
                    />
                @empty
                    {{-- <div class="col-12"></div> --}}
                @endforelse
        </div>
    @endif
    <div class="row g-3 my-5">
        <div class="h3 mb-0 pb-0">Projects</div>
        @forelse ($justy->projects as $project)
            <x-card 
                class="col-12"
                title="{{ $project->name }}" 
                subtitle="Created: {{ $project->created_at }}"
            />
        @empty
            <div class="">This Team Has No Projects</div>
        @endforelse
    </div>

@endsection