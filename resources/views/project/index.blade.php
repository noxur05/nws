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
    <div class="row g-3 mt-3">
        <div class="h3 mb-0 pb-0">Resources</div>
            @forelse ($project->resources as $resource)
                @php
                    $body = '<ul>';
                    foreach (json_decode($resource->config->config, true) as $key => $value) {
                        $val = is_bool($value) ? ($value ? 'Yes' : 'No') : $value;
                        $body .= "<li><strong>" . ucfirst($key) . ":</strong> " . $val . "</li>";
                    }
                    $body .= '</ul>';
                @endphp
                <x-card 
                    class='col-12 col-sm-6 col-md-4'
                    title="Resource ID: {{$resource->id}}"
                    subtitle="{{ $resource->created_at }}"
                    :body="$body"
                />
                {{-- {{$resource->config}} --}}
            @empty
            @endforelse
    </div>
@else
    <div class="">You are not member of Team</div>
@endif

@endsection