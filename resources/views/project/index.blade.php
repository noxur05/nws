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
    <div class="row g-3 mt-3 mb-5">
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
                    :title=" '<span class=\'d-flex justify-content-between w-100\'>' . $resource->config->type->name . ($resource->active ? '<i class=\'bi bi-toggle-on\'></i>' : '<i class=\'bi bi-toggle-off\'></i>') . '</span>'"
                    subtitle="{{ $resource->created_at }}"
                    :body="$body"
                />
            @empty
                    <div class="">There is no resources in this Project</div>
            @endforelse
    </div>
@else
    <div class="">You are not member of Team</div>
@endif

@endsection