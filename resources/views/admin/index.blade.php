@extends('layouts.app')

@section('title', 'Admin Content Management')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('admin.layouts.partials.sidebar')

            <!-- Main Content -->
            <div class="col-sm-9 col-md-10">
                <h1>{{$title}}</h1>
                @if (isset($data) && isset($headers))
                <div class="row text-left">
                    <x-table-component :data="$data" :headers="$headers" />
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
