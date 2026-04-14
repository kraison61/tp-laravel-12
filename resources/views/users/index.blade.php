@extends('layouts.app')

@section('title', 'เกี่ยวกับเรา | บริษัทธีรพงษ์เซอร์วิส จำกัด ผู้เชี่ยวชาญงานฐานรากและงานรับเหมาก่อสร้างอย่างมืออาชีพ')
@section('description',
    'รู้จักกับบริษัทธีรพงษ์เซอร์วิส จำกัด ทีมช่างผู้ชำนาญการด้านงานกดเสาเข็ม ถมดิน และงานกำแพงกันดิน
    ด้วยประสบการณ์ตรงจากหน้างานจริงและเครื่องจักรที่ทันสมัย มุ่งมั่นส่งมอบงานคุณภาพที่แข็งแรงและได้มาตรฐาน')

@section('content')
<div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Timeline</h1>
                        <p>This template come with lot of innovative features and an awesome and extensive documentation.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <ol class="breadcrumb b white">
                        <li><a href="#">Home</a></li>
                        <li class="active">Features</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="section-empty">
        <div class="container content">
            <ul class="timeline">
                <li>
                    <div class="timeline-badge"></div>
                    <div class="timeline-label"><h4>1940</h4><p>Company foundation</p></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Company foundation</h4>
                        </div>
                        <div class="timeline-body">
                            <p>
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non proidento.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge"></div>
                    <div class="timeline-label"><h4>1948</h4><p>Company aquisition</p></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Company aquisition</h4>
                        </div>
                        <div class="timeline-body">
                            <p>
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge"></div>
                    <div class="timeline-label"><h4>2002</h4><p>Become the leading</p></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Become the leading</h4>
                            <p><small class="text-muted">The begin of a great adventure</small></p>
                        </div>
                        <div class="timeline-body">
                            <p>
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge"></div>
                    <div class="timeline-label"><h4>2018</h4><p>We are wordlwide leader</p></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">We are wordlwide leader</h4>
                            <p><small class="text-muted">The begin of a great adventure</small></p>
                        </div>
                        <div class="timeline-body">
                            <p>
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="section-empty text-center section-doc">
        <div class="container content">
            <h4 class="text-normal">Documentation</h4>
            <p>This template is built with HTWF and more variants<br /> are available, check the official documentation for more details.</p>
            <hr class="space xs" />
            <a href="http://html.framework-y.com/components/#timeline" target="_blank" class="circle-button btn btn-sm">Go to documentation</a>
        </div>
    </div>
@endsection
