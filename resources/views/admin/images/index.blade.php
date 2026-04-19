@extends('layouts.clean')

@section('child-title', $title ?? 'Admin Panel')

@section('child-content')



    <!-- TOP BAR -->
    <div class="admin-topbar">
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <i class="fa fa-cogs"></i> Admin Panel
        </a>
        <div class="topbar-right">
            <a href="{{ route('home') }}" class="topbar-text" style="color:rgba(255,255,255,0.7); text-decoration:none;">
                <i class="fa fa-globe"></i> ดูหน้าเว็บ
            </a>
            <div class="admin-avatar">A</div>
        </div>
    </div>

    <!-- SIDEBAR -->
    <div class="admin-sidebar">
        @include('admin.layouts.partials.sidebar')
    </div>

    <!-- MAIN CONTENT WRAPPER -->
    <div class="admin-content-wrapper">

        <!-- PAGE HEADER -->
        <div class="admin-page-header">
            <div>
                <h2 class="page-title">
                    <i class="fa fa-list-alt"></i> {{ $title ?? 'Dashboard' }}
                </h2>
                <p class="page-subtitle">จัดการข้อมูลในระบบ</p>
            </div>
            @if(isset($createRoute))
                <x-admin.admin-button :route="$createRoute" :label="'เพิ่ม ' . str_replace('Admin - ', ' ', $title)" />
            @endif
        </div>

        <!-- DATA TABLE CARD -->

        <div class="section-empty">
            <div class="container content">

                <hr class="space" />
                <div class="maso-list gallery">
                    <div class="navbar navbar-inner">
                        <div class="navbar-toggle"><i class="fa fa-bars"></i><span>Menu</span><i
                                class="fa fa-angle-down"></i>
                        </div>
                        <!-- <x-media-service /> -->
                    </div>
                    <livewire:photo-gallery :id="$id" :isAdmin="true" />
                </div>
            </div>
        </div>

    </div>

@endsection