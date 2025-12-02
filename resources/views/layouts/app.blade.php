    @extends('layouts.clean')

@section('child-content')

    @include('layouts.partials.header')
    @yield('content')
    @include('layouts.partials.footer')

@endsection



