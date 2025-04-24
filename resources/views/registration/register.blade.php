@extends('layouts.index')

@section('title')
    Registration
@endsection
@section('content')
        <div class="row justify-content-center align-items-center" style="height: calc(100% - 56px)">
            <div class="card col-11 col-sm-9 col-md-7 col-lg-5 col-xl-3">
              <div class="card-body">
                <h5 class="card-title text-center">Register</h5>
                <div class="text-center small mb-3">
                  Or <a class="link-primary text-decoration-none" href="{{ route('registration.login')}}">Login</a>
                </div>
                <form action="{{ route('registration.register') }}" method="POST">
                  @csrf
                  <x--form-text-input name="name" type="text" value="{{old('name')}}" id="name" placeholder="Name"/>
                  <x--form-text-input name="email" type="email" value="{{old('email')}}" id="email" placeholder="Email"/>
                  <x--form-text-input name="password" type="password" value="{{old('password')}}" id="password" placeholder="Password"/>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
@endsection