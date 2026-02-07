<?php
$count = $allServices->count();
$leftCount = ceil($count / 2); // คำนวณจำนวนรายการในคอลัมน์ซ้าย

$columnLeft = $allServices->take($leftCount);
$columnRight = $allServices->skip($leftCount);
?>

<header class="fixed-top scroll-change" data-menu-anima="fade-in">
    <div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top" role="navigation">
        <div class="navbar-mini scroll-hide">
            <div class="container">
                <div class="nav navbar-nav navbar-left">
                    <span><i class="fa fa-phone"></i><a href="tel:0627188847">062-718-8847</a></span>
                    <hr />
                    <span><i class="fa fa-envelope"></i><a href="mailto:theeraphong.services@gmail.com?subject=สอบถามข้อมูล&body=สวัสดี">theeraphong.services@gmail.com</a> </span>
                    <hr />
                    <span><i class="fa fa-calendar"></i>Mon - Sat: 8.00 - 19:00</span>
                    <br />
                    <span> <i class="fa fa-map-marker"></i><a target="_blank" href="https://maps.app.goo.gl/PDdQwoC1tNFMiKnu6">14 หมู่ 5 ต.บางกร่าง อ.เมืองนนทบุรี จ.นนทบุรี 11000</a></span>

                </div>
                <div class="nav navbar-nav navbar-right">
                    <div class="minisocial-group">
                        <a target="_blank" href="https://www.facebook.com/TheeraphongRetainingwall"><i
                                class="fa fa-facebook first"></i></a>
                        <a target="_blank" href="https://www.youtube.com/@ธีรพงษ์รับเหมา"><i
                                class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-main">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{ route('home') }}" style="height:110px">
                        <!-- <img class="logo-default" src="../images/logo.png" alt="logo" /> -->
                        <img class="logo-default" src="{{ asset('storage/images/tp-logo.svg') }}" alt="logo" />
                        <img class="logo-retina" src="{{ asset('storage/images/logo-retina.png') }}" alt="logo" />
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="dropdown-toggle" data-toggle="dropdown"
                                role="button">หน้าหลัก</a>
                        </li>
                        <li class="dropdown {{ request()->routeIs('service.index') ? 'active' : '' }}">
                            <a href="#" class="" data-toggle="dropdown" role="button">บริการ
                                <span class="caret"></span></a>
                            <div class="mega-menu dropdown-menu multi-level row bg-menu">
                                <div class="col">
                                    <ul class="fa-ul no-icons text-s">
                                        @foreach ($columnLeft as $item)
                                        <li>
                                            <a target="_blank" href="/{{ $item->category->slug }}">{{ Str::limit($item->category->name, 20, '...') }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="fa-ul no-icons text-s">
                                        @foreach ($columnRight as $item)
                                        <li>
                                            <a target="_blank" href="/{{ $item->category->slug }}">{{ Str::limit($item->category->name, 20, '...') }}</a>
                                        </li>
                                        @endforeach
                                        <li><a href="{{ route('calculate') }}">คำนวณปริมาณดินถม</a></li>
                                    </ul>
                                </div>
                            </div>

                        </li>
                        <li class="dropdown">
                            <a href="{{ route('gallery.index') }}" class="" data-toggle="dropdown" role="button">ภาพ & วิดีโอ
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('blog.index')}}" class="" data-toggle="dropdown" role="button">บทความ </a>
                        </li>
                        <li class="dropdown mega-dropdown mega-tabs">
                            <a class="" data-toggle="dropdown" href="{{route('contact')}}">ติดต่อเรา</a>
                        </li>
                        <li class="dropdown mega-dropdown mega-tabs">
                            <a class="" data-toggle="dropdown" href="{{route('about')}}">เกี่ยวกับเรา</a>
                        </li>
                    </ul>

                    {{-- Admin  --}}

                    @if(request()->is('admin*'))
                        <div class="collapse navbar-collapse" id="admin-navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-user"></i> Admin <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="#">Change Password</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</header>
