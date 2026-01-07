    @extends('layouts.clean')

    @section('child-title')
        @yield('title')
    @endsection

   @section('child-description', $__env->yieldContent('description'))

    @section('child-content')
        @include('layouts.partials.header')
        @yield('content')
        @include('layouts.partials.footer')
    @endsection