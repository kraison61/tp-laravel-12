@extends('layouts.app')

@section('title', 'Admin Page Management')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('admin.layouts.partials.sidebar')


            <!-- Main Content -->
            <div class="col-sm-9 col-md-10">
                <h1>Dashboard</h1>
                <div class="row text-left">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4>Total Articles</h4>
                                <h2>120</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4>Total Users</h4>
                                <h2>45</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4>Draft Content</h4>
                                <h2>8</h2>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    @endsection
