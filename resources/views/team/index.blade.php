@extends('layouts.index')

@section('title')
    Teams
@endsection
@section('content')
    <div class="bg-white p-3 rounded-3">
        <div class="">
            <div class="h1">{{$team->name}}</div>
        </div>
    </div>
    <div class="row g-3 mt-3">
        <div class="h3 mb-0 pb-0">Users</div>
        @forelse ($team->users as $user)
            {{-- @php
                $body = '<ul>';
                foreach (json_decode($config->config, true) as $key => $value) {
                    $val = is_bool($value) ? ($value ? 'Yes' : 'No') : $value;
                    $body .= "<li><strong>" . ucfirst($key) . ":</strong> " . $val . "</li>";
                }
                $body .= '</ul>';
            @endphp --}}
    
            <x-card 
                class="col-12 col-sm-6 col-md-4"
                title="{{ $user->name }}" 
                subtitle="{{ $user->email }}"
                {{-- :body="$body"  --}}
            />
        @empty
            {{-- <div class="col-12"></div> --}}
        @endforelse
    </div>
    {{$team}}
@endsection