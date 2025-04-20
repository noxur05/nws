@extends('layouts.index')

@section('title')
    Hello World
@endsection
@section('content')
    <x--form-text-input name="email" type="email" value="{{old('email')}}" id="email" placeholder="Email"/>
@endsection