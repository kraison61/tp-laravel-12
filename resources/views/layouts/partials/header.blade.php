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
                    <span><i class="fa fa-envelope"></i><a
                            href="mailto:theeraphong.services@gmail.com?subject=สอบถามข้อมูล&body=สวัสดี">theeraphong.services@gmail.com</a>
                    </span>
                    <hr />
                    <span><i class="fa fa-calendar"></i>Mon - Sat: 8.00 - 19:00</span>
                    <br />
                    <span> <i class="fa fa-map-marker"></i><a target="_blank"
                            href="https://maps.app.goo.gl/PDdQwoC1tNFMiKnu6">14 หมู่ 5 ต.บางกร่าง อ.เมืองนนทบุรี
                            จ.นนทบุรี 11000</a></span>

                </div>
                <div class="nav navbar-nav navbar-right">
                    <div class="minisocial-group">
                        <a target="_blank" href="https://www.facebook.com/TheeraphongRetainingwall"><i
                                class="fa fa-facebook first"></i></a>
                        <a target="_blank" href="https://www.youtube.com/@ธีรพงษ์รับเหมา"><i
                                class="fa fa-youtube"></i></a>
                    </div>

                <ul class="nav">
                    @auth
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" style="padding: 15px; min-width: 200px;">
                                <li><a href="#"><i class="fa fa-pencil"></i> Edit Profile</a></li>
                                <li class="divider"></li>
                                <li>
                                    <form class="form" role="form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-default btn-block">Sign Out</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="fa fa-user" aria-hidden="true"></i> Login <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" style="padding: 15px; min-width: 250px;">
                                <li>
                                    <form class="form" role="form" id="nav-login-form" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="sr-only" for="navLoginEmail">Email address</label>
                                            <input type="email" name="email" class="form-control" id="navLoginEmail" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="navLoginPassword">Password</label>
                                            <input type="password" name="password" class="form-control" id="navLoginPassword" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default btn-block">Sign In</button>
                                        </div>
                                        <div class="checkbox" style="margin-bottom: 0;">
                                            <label style="font-weight: normal; font-size: 13px;">
                                                <input type="checkbox" name="remember"> Remember me
                                            </label>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
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
                        <img class="logo-default" src="{{ Storage::disk('s3')->url('images/tp-logo.svg') }}"
                            alt="logo" />
                        <img class="logo-retina" src="{{ Storage::disk('s3')->url('images/logo-retina.png') }}"
                            alt="logo" />
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
                                                <a
                                                    href="/{{ $item->category->slug }}">{{ Str::limit($item->category->name, 20, '...') }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="fa-ul no-icons text-s">
                                        @foreach ($columnRight as $item)
                                            <li>
                                                <a
                                                    href="/{{ $item->category->slug }}">{{ Str::limit($item->category->name, 20, '...') }}</a>
                                            </li>
                                        @endforeach
                                        <li><a href="{{ route('calculate') }}">คำนวณปริมาณดินถม</a></li>
                                    </ul>
                                </div>
                            </div>

                        </li>
                        <li class="dropdown">
                            <a href="{{ route('gallery.index') }}" class="" data-toggle="dropdown"
                                role="button">ภาพ & วิดีโอ
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('blog.index') }}" class="" data-toggle="dropdown"
                                role="button">บทความ </a>
                        </li>
                        <li class="dropdown mega-dropdown mega-tabs">
                            <a class="" data-toggle="dropdown" href="{{ route('contact') }}">ติดต่อเรา</a>
                        </li>
                        <li class="dropdown mega-dropdown mega-tabs">
                            <a class="" data-toggle="dropdown" href="{{ route('about') }}">เกี่ยวกับเรา</a>
                        </li>
                        @auth
                            <li class="dropdown mega-dropdown mega-tabs">
                                <a class="" data-toggle="dropdown" href="{{ route('users.index') }}">งวดงาน</a>
                            </li>
                        @endauth
                    </ul>

                    {{-- Admin  --}}

                    @if (request()->is('admin*'))
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

@push('scripts')
    <script>
        // Prevent dropdown from closing when clicking inside the form
        $('.user-menu .dropdown-menu').on('click', function(e) {
            e.stopPropagation();
        });
    </script>
@endpush