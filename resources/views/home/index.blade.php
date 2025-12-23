@extends('layouts.app')

@section('title', 'หน้าแรก')


@php
    $headContent = [
        (object) [
            'heading' =>
                'รับเหมาก่อสร้าง กำแพงกันดิน รั้ว เทพื้นคอนกรีต ถมที่ดิน และอื่น ๆ ครบวงจร ด้วยประสบการณ์มากกว่า 15 ปี',
            'paragraph' => 'คุณกำลังมองหาผู้รับเหมาที่ไว้ใจได้ เข้าใจงาน และส่งมอบงานตรงเวลาใช่ไหม?
ไว้ใจได้ เข้าใจงาน และส่งมอบงานตรงเวลา.
เรามีความเชี่ยวชาญเฉพาะทางด้านงานโครงสร้างพื้นฐาน ตั้งแต่กำแพงกันดิน งานรั้ว เทพื้นคอนกรีต ไปจนถึงงานถมที่ดิน เราเข้าใจว่าทุกโครงการของคุณมีความสำคัญ และต้องการผู้เชี่ยวชาญที่คำนึงถึงความปลอดภัย ความแข็งแรง และความคุ้มค่าในระยะยาว',
            'image' => 'img_landing_1.png',
        ],
        (object) [
            'heading' => 'ลูกค้าให้ความไว้ใจ ดูแลงานก่อสร้าง',
            'paragraph' =>
                'สำหรับเจ้าของบ้าน งานอย่าง กำแพงกันดิน รั้ว และพื้นคอนกรีต ไม่ใช่แค่สร้างให้เสร็จ แต่เป็นงานโครงสร้างที่ส่งผลต่อความปลอดภัยของบ้านในระยะยาว เราให้ความสำคัญกับมาตรฐานวิศวกรรม การเลือกใช้วัสดุ และในระหว่างขั้นตอนการก่อสร้าง มีการควบคุมดูแลหน้างานตลอดเวลา',
            'image' => 'img_landing_2.png',
        ],
        (object) [
            'heading' => 'พร้อมให้คำปรึกษา และประเมินหน้างานจริง',
            'paragraph' =>
                'หากกำลังมองหาผู้รับเหมาที่เชื่อถือได้ ตรงต่อเวลา ทำงานมาตรฐาน และที่สำคัญมีความรับผิดชอบ ไม่ทิ้งงาน เราพร้อมให้บริการตั้งแต่การให้คำปรึกษา ประเมินหน้างาน ไปจนถึงการเสนอราคาที่ชัดเจน โปร่งใส ไม่มีค่าใช้จ่ายแฝง',
            'image' => 'img_landing_1.png',
        ],
    ];
@endphp

@section('content')
    <div class="section-empty no-paddings">
        <div class="section-slider row-18">
            <div class="flexslider advanced-slider slider" data-options="animation:fade">
                <ul class="slides">
                    @foreach ($headContent as $item)
                        <li data-slider-anima="fade-left" data-time="1000">
                            <div class="section-slide">
                                <div class="bg-cover" style="background-image:url('../images/bg-5.jpg')">
                                </div>
                                <div class="container">
                                    @if ($item->image)
                                        <img class="pos-slider pos-bottom pos-right anima anima-fade-bottom hidden-xs"
                                            src="{{ asset('images/' . $item->image) }}" alt="" />
                                    @else
                                        <!-- ใช้ภาพ default -->
                                        <img class="pos-slider pos-bottom pos-right anima anima-fade-bottom hidden-xs"
                                            src="{{ asset('images/img_landing_1.png') }}" alt="No image available" />
                                    @endif

                                    <div class="container-middle">
                                        <div class="container-inner text-left">
                                            <hr class="space m visible-sm" />
                                            <div class="row">
                                                <div class="col-md-6 anima">
                                                    <h1 class="text-l text-normal text-m-xs">{{ $item->heading }}</h1>
                                                    <p class="text-s-xs">
                                                        {{ $item->paragraph }}
                                                    </p>
                                                    <hr class="space s" />
                                                    <a href="#" class="btn btn-lg"><i class="fa fa-gears"></i>
                                                        บริการ</a><span class="space"></span>
                                                    <a href="#" class="btn btn-lg btn-border"><i
                                                            class="fa fa-folder-open"></i> ผลงาน</a>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                            <hr class="space visible-sm" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="section-empty">
        <div class="container content">
            <div class="flexslider carousel outer-navs"
                data-options="minWidth:200,itemMargin:30,numItems:4,controlNav:false">
                <ul class="slides">
                    @foreach ($allServices as $item)
                        <li>
                            <a href="{{ route('service.show', $item->category->slug) }}" class="text-decoration-none">
                                <div class="advs-box advs-box-top-icon boxed-inverse" data-anima="rotate-20"
                                    data-trigger="hover">
                                    <i class="fa fa-clone icon circle anima"></i>
                                    <h3>{{ Str::limit($item->category->name, 12, '...') }}</h3>
                                    <p>
                                        {{ Str::limit($item->title, 30, '...') }}
                                    </p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <hr class="space" />
            <div class="row vefrtical-row">
                <div class="col-md-4">
                    <div class="title-base  text-left">
                        <hr />
                        <h2>ให้บริการรับเหมาก่อสร้าง</h2>
                        <p>รายละเอียด</p>
                    </div>
                    <p class="text-color">
                        เราคือผู้เชี่ยวชาญด้านงานกำแพงกันดิน รั้ว และพื้นคอนกรีต ที่มีประสบการณ์มากกว่า 15 ปี
                        ให้บริการลูกค้าทั้งบ้านพักอาศัยและโครงการขนาดเล็กถึงขนาดกลางอย่างมีมาตรฐาน
                    </p>
                    <p>
                        ทุกโครงการของเราเริ่มจากการสำรวจพื้นที่จริง วิเคราะห์สภาพดิน และวางแผนงานอย่างละเอียด
                        เพื่อให้ได้ผลงานที่แข็งแรง ปลอดภัย และรองรับการใช้งานในระยะยาว
                    </p>
                </div>
                <div class="col-md-4">
                    <p>
                        เรามีผลงานจริงในพื้นที่กรุงเทพ ปริมณฑล และหลายจังหวัด
                        พร้อมทีมช่างมืออาชีพที่ควบคุมงานอย่างใกล้ชิดในทุกขั้นตอน เพื่อให้คุณมั่นใจในคุณภาพที่ได้รับ
                    </p>
                    <p>
                        เราให้ความสำคัญกับความซื่อสัตย์ ความโปร่งใส และการสื่อสารที่ชัดเจน พร้อมแจ้งรายละเอียดงบประมาณ
                        ระยะเวลาการทำงาน และขั้นตอนต่าง ๆ อย่างตรงไปตรงมาเสมอ
                    </p>
                    <p>
                        หากคุณกำลังมองหาผู้รับเหมาที่เชื่อถือได้ เราพร้อมให้คำปรึกษาฟรี ประเมินหน้างานจริง
                        และเสนอแนวทางที่เหมาะสม เพื่อช่วยให้โครงการของคุณสำเร็จอย่างมั่นใจ
                    </p>
                </div>
                <x-service_activity />
            </div>
        </div>
    </div>
    <x-site_location />
    <div class="section-empty no-paddings-y">
        <div class="container content">
            <hr class="space" />
            <div class="row">
                <div class="col-md-4 hidden-sm visible-xs">
                    <img data-anima="fade-bottom" data-time="700" src="../images/mk-3.png" alt="" />
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="title-base text-left">
                        <hr />
                        <h2>งบประมาณการก่อสร้าง</h2>
                        <p>Proven experience</p>
                    </div>
                    <p>
                        เราชี้แจงงบประมาณการก่อสร้างอย่างโปร่งใสและตรงไปตรงมา
                        เพราะงานก่อสร้างเป็นการลงทุนระยะยาวที่ต้องวางแผนให้ดี เราจึงช่วยคุณจัดการงบประมาณอย่างเป็นระบบ
                        บอกทุกขั้นตอนอย่างชัดเจน เพื่อให้คุณเห็นภาพรวมของค่าใช้จ่ายทั้งหมด ตรวจสอบได้ตลอดเวลา
                        และมั่นใจได้ว่าไม่มีค่าใช้จ่ายที่ไม่จำเป็นหรือเกินจริง
                        เราตั้งใจให้ทุกโครงการเป็นไปอย่างราบรื่นและคุ้มค่าที่สุดสำหรับคุณ
                    </p>
                    <hr class="space m" />
                    <p>
                        ราคาเริ่มต้น
                    </p>
                    <table class="grid-table border-table text-left">
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="text-color">กำแพงกันดิน</h5>
                                    <h4 class="no-margins">฿6,500.00<small class="text-color"> /m</small></h4>
                                </td>
                                <td>
                                    <h5 class="text-color">รั้ว</h5>
                                    <h4 class="no-margins">฿1,000.00<small class="text-color"> /m</small></h4>
                                </td>
                                <td>
                                    <h5 class="text-color">ถมที่ดิน</h5>
                                    <h4 class="no-margins">฿250.00<small class="text-color"> /คิว</small></h4>
                                </td>
                                <td>
                                    <h5 class="text-color">เทพื้นคอนกรีต</h5>
                                    <h4 class="no-margins">฿500.00<small class="text-color"> /m<sup>2</sup></small></h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="space visible-sm" />
                </div>
            </div>
        </div>
    </div>
    <div class="section-bg-color no-paddings-y">
        <div class="container content">
            <hr class="space" />
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="title-base text-left">
                        <hr />
                        <h2>ให้คำปรึกษาโดยผู้เชี่ยวชาญ</h2>
                        <p>Proven experience</p>
                    </div>
                    <p>
                        ด้วยประสบการณ์กว่า 15 ปี เราพร้อมให้คำปรึกษาและช่วยคุณวางแผนงานก่อสร้างอย่างมั่นใจ
                        เราทำงานด้วยความรับผิดชอบ ไม่มีประวัติทิ้งงาน และดูแลงานทุกขั้นตอนด้วยทีมผู้รับเหมามืออาชีพ
                        ไม่ว่าจะเป็นงานกำแพงกันดิน รั้ว พื้นคอนกรีต ถมดิน หรืองานอื่น ๆ คุณจะได้รับคำอธิบายที่เข้าใจง่าย
                        เพื่อช่วยให้ตัดสินใจได้อย่างถูกต้อง เราตั้งใจให้ทุกงานเริ่มต้นราบรื่น จบงานสวยงาม
                        และสร้างความประทับใจ เพื่อให้ลูกค้ามั่นใจและบอกต่อคุณภาพงานของเรา

                    </p>
                    <hr class="space m" />
                    <table class="grid-table border-table text-left">
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="text-color">ประสบการณ์</h5>
                                    <h5 class="no-margins">มากกว่า 15 ปี</h5>
                                </td>
                                <td>
                                    <h5 class="text-color">ควบคุมงาน</h5>
                                    <h5 class="no-margins">โดยผู้เชี่ยวชาญทุกงาน</h5>
                                </td>
                                <td>
                                    <h5 class="text-color">รับประกันผลงาน</h5>
                                    <h5 class="no-margins">ตามประเภทของงาน</h5>
                                </td>
                                <td>
                                    <h5 class="text-color">มาตรฐานวัสดุ</h5>
                                    <h5 class="no-margins">มอก.</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="space visible-sm" />
                </div>
                <div class="col-md-4 text-right hidden-sm visible-xs">
                    <img data-anima="fade-bottom" data-time="700" src="../images/mk-4.png" alt="" />
                </div>
            </div>
        </div>
    </div>
    <div class="section-empty">
        <div class="container content">
            <div class="maso-list">
                <div class="navbar navbar-inner">
                    <div class="navbar-toggle"><i class="fa fa-bars"></i><span>Menu</span><i
                            class="fa fa-angle-down"></i></div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav over ms-minimal inner maso-filters nav-center">
                            <li class="current-active active"><a data-filter="maso-item">บริการทั้งหมด</a></li>
                        </ul>
                    </div>
                </div>
                <div class="maso-box row">
                    @foreach ($allServices->take(12) as $service)
                    <!-- <a href="/services/{{ $service->id }}"> -->
                        <x-card :service="$service" />
                    <!-- </a> -->
                    @endforeach
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-bg-color">
        <div class="container content">
            <div class="row vertical-row">
                <div class="col-md-4 col-sm-12">
                    <div class="title-base text-left">
                        <hr />
                        <h2>ติดต่อเรา</h2>
                        <p>Get in touch</p>
                    </div>
                    <p class="text-color">
                        หากต้องการคำปรึกษา หรือหาผุู้รับเหมาที่มีประสบการณ์ และความรับผิดในงาน ไม่ทิ้งงาน
                        อย่าลังเลที่จะติดต่อมาหาเรา เราพร้อมที่จะให้คำแนะนำให้คำปรึกษา
                    </p>
                    <p>
                        สามารถติดต่อเราได้ที่ข้อมูลที่ให้มา หรือว่าสแกนคิวอาร์โค้ด (QR-Code) เพื่อเพิ่มเพื่อนในไลน์
                        สำหรับส่งรูปถ่าย วิดีโอ หรืออืน ๆ ประกอบ
                    </p>
                    <hr class="space s" />
                    <div class="row vertical-row">
                        {{-- <div class="col-md-4">
                            <img src="../images/sign-3.png" alt="" />
                        </div> --}}
                        <div class="col-md-12">
                            <h1 class="text-m text-bold no-margins">Mr.Theeraphong Sarsuk</h1>
                            <h2 class="text-m text-normal no-margins">ช่างรัก</h2>
                            <h4 class="text-xs">Founder</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 boxed white">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="fa-ul text-light">
                                <li>Line ID : <a href="https://line.me/ti/p/h9SHumuTEB">0627188847</a></li>
                                <li>
                                    <img src="{{ asset('images/lineid.webp') }}" style="width:50%;" />
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="fa-ul text-light">
                                <li><i class="fa-li fa fa-map-marker"></i> 14 ต.บางกร่าง อ.บางกรวย จ.นนทบุรี 11000</li>
                                <li><i class="fa-li fa fa-calendar "></i> 24 ชม.</li>
                                <li><i class="fa-li fa fa-envelope-o"></i> theeraphong.services@gmail.com</li>
                                <li><i class="fa-li fa fa-phone "></i> 062-718-8847 หรือ 087-700-7463</li>
                            </ul>
                        </div>
                    </div>
                    <hr class="space m" />
                </div>
            </div>
        </div>
    </div>
    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection
