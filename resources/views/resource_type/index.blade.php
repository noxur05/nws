@extends('layouts.index')

@section('title')
    Resource Types
@endsection
@section('content')
    <div class="bg-white p-3 rounded-3">
        <div class="">
            <div class="h1">{{$resource_type->name}}</div>
            <div class="">{{$resource_type->description}}</div>
        </div>
    </div>
    <div class="row g-3 mt-3">
        @forelse ($resource_type->resourceConfigs as $config)
            @php
                $body = '<ul>';
                foreach (json_decode($config->config, true) as $key => $value) {
                    $val = is_bool($value) ? ($value ? 'Yes' : 'No') : $value;
                    $body .= "<li><strong>" . ucfirst($key) . ":</strong> " . $val . "</li>";
                }
                $body .= '</ul>';
            @endphp
    
            <x-card 
                class="col-12 col-sm-6 col-md-4"
                title="Config ID: {{ $config->id }}" 
                subtitle="Price: {{ $config->price }}"
                :body="$body" 
            />
        @empty
            <div class="col-12">There are no Parameters for this Resource Type</div>
        @endforelse
    </div>
@endsection