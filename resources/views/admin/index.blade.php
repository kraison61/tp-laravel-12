@extends('layouts.app')

@section('title', 'ข่าว และบทความ')\

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-sm-3 col-md-2">
                <ul class="nav nav-pills nav-stacked text-left">
                    <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="#"><i class="fa fa-file-text"></i> Articles</a></li>
                    <li><a href="#"><i class="fa fa-file-text"></i> Images</a></li>
                    <li><a href="#"><i class="fa fa-tags"></i> Categories</a></li>
                    <li><a href="#"><i class="fa fa-image"></i> Page</a></li>
                    <li><a href="#"><i class="fa fa-users"></i> Users</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                </ul>
            </div>


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
