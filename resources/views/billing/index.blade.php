@extends('layouts.index')

@section('title')
    Billling
@endsection
@section('content')
    <div class="mb-5">
        <div class="bg-white rounded-3 p-2 mb-3 d-flex w-100 justify-content-between h-100 align-items-center">
            <div class="">
                <div class="h1">Billings</div>
                <div class="text-muted fs-5">
                    Total Price: {{ number_format($totalBilling, 2) }}$
                </div>
            </div>
            <div class="">
                <form class="" role="search" method="GET" action="{{ route('home.index')}}">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control border-primary" placeholder="Search" value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row g-3">
            @forelse ($billings as $billing )
                <x-card 
                    class='col-12 col-sm-6 col-md-4'
                    title="{{ $billing->name }}"
                    subtitle="Price: {{ $billing->totalBilling() }}$"
                />
            @empty
                <div class="">You have no projects</div>
            @endforelse
        </div>
    </div>
@endsection