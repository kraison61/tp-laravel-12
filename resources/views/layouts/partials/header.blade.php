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
                    <span><i class="fa fa-phone"></i>062-718-8847</span>
                    <hr />
                    <span><i class="fa fa-envelope"></i>theeraphong.services@gmail.com</span>
                    <hr />
                    <span><i class="fa fa-calendar"></i>Mon - Sat: 8.00 - 19:00</span>
                    <br />
                    <span> <i class="fa fa-map-marker"></i>14 หมู่ 5 ต.บางกร่าง อ.เมืองนนทบุรี จ.นนทบุรี 11000</span>

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
                        <img class="logo-default" src="../images/tp-logo.svg" alt="logo" />
                        <img class="logo-retina" src="../images/logo-retina.png" alt="logo" />
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="dropdown-toggle" data-toggle="dropdown"
                                role="button">หน้าหลัก</a>
                        </li>
                        <li class="dropdown {{ request()->routeIs('service.index') ? 'active' : '' }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">บริการ
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
                                    </ul>
                                </div>
                            </div>

                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">ภาพ & วิดีโอ
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">บทความ </a>
                        </li>
                        <li class="dropdown mega-dropdown mega-tabs">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">ติดต่อเรา</a>
                        </li>
                    </ul>
                    <div class="nav navbar-nav navbar-right">
                        <div class="search-box-menu">
                            <div class="search-box scrolldown">
                                <input type="text" class="form-control" placeholder="Search for...">
                            </div>
                            <button type="button" class="btn btn-default btn-search">
                                <span class="fa fa-search"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
