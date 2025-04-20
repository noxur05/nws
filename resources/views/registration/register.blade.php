@extends('layouts.index')

@section('title')
    Registration
@endsection
@section('content')
        <div class="row justify-content-center align-items-center h-100">
            <div class="card col-11 col-sm-9 col-md-7 col-lg-5 col-xl-3">
              <div class="card-body">
                <h5 class="card-title text-center">Register</h5>
                <form >
                  <x--form-text-input name="name" type="text" value="{{old('name')}}" id="name" placeholder="Name"/>
                  <x--form-text-input name="email" type="email" value="{{old('email')}}" id="email" placeholder="Email"/>
                  <x--form-text-input name="password" type="password" value="{{old('password')}}" id="password" placeholder="Password"/>
                </form>
              </div>
            </div>
        </div>
@endsection