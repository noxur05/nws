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
    <div class="">
        {{ $resource_type }}
    </div>
@endsection