@extends('layouts.index')

@section('title')
    Hello World
@endsection
@section('content')
  <div class="row justify-content-center align-items-center" style="height: calc(100% - 56px)">
      <div class="card col-11 col-sm-9 col-md-7 col-lg-5 col-xl-3">
        <div class="card-body">
          <h5 class="card-title text-center">Login</h5>
          <form action="{{ route('registration.login') }}" method="POST">
            @csrf
            <x--form-text-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" type="email" value="{{old('email')}}" id="email" placeholder="Email"/>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <x--form-text-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}"  name="password" type="password" value="{{old('password')}}" id="password" placeholder="Password"/>
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
  </div>
@endsection