<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
    </style>
</head>
<body class="bg-secondary-subtle">
    <div class="bg-primary-subtle">
        <div class="container-xxl">
            @include('layouts.header')
        </div>
    </div>
    @auth
        <div class="container-xxl mt-5">
            <div class="">
                
            </div>
            <div class="row">
                <div class="col-3 d-none d-lg-block">
                    @include('components.teams.table')
                    @include('components.resource_types.table')
                </div>
                <div class="col">
                    @yield('content')
                </div>
            </div>
        </div>
    @else
        @yield('content')
    @endauth
    </body>
</html>