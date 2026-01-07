    @extends('layouts.clean')

    @section('child-title')
        @yield('title')
    @endsection
    @section('child-description')
        @yield('description')
    @endsection

    @section('child-content')
        @include('layouts.partials.header')
        @yield('content')
        @include('layouts.partials.footer')
    @endsection
