@extends('layouts.app')

@section('title', 'Home Page')


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
                <!-- <li data-slider-anima="fade-left" data-time="1000">
                                                                    <div class="section-slide">
                                                                        <div class="bg-cover" style="background-image:url('../images/bg-5.jpg')">
                                                                        </div>
                                                                        <div class="container">
                                                                            <img class="pos-slider pos-bottom pos-right anima anima-fade-bottom hidden-xs" src="../images/mk-1.png" alt="" />
                                                                            <div class="container-middle">
                                                                                <div class="container-inner text-left">
                                                                                    <hr class="space m visible-sm" />
                                                                                    <div class="row">
                                                                                        <div class="col-md-6 anima">
                                                                                            <h1 class="text-l text-normal text-m-xs">Architecture is a visual art and the buildings speak for themselves</h1>
                                                                                            <p class="text-s-xs">
                                                                                                I enjoy art and museums but also churches, anything that gives me insight into the history and soul of the place I'm in.
                                                                                                I can also be a beach bum - I like to laze in the shade of a palm tree with a good book or float in a warm sea at sundown.
                                                                                            </p>
                                                                                            <hr class="space s" />
                                                                                            <a href="#" class="btn btn-lg"><i class="fa fa-gears"></i> Services</a><span class="space"></span>
                                                                                            <a href="#" class="btn btn-lg btn-border"><i class="fa fa-folder-open"></i> Projects</a>
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
                                                                <li data-slider-anima="fade-left" data-time="1000">
                                                                    <div class="section-slide">
                                                                        <div class="bg-cover" style="background-image:url('../images/bg-5.jpg')">
                                                                        </div>
                                                                        <div class="container">
                                                                            <img class="pos-slider pos-bottom pos-right anima anima-fade-bottom hidden-xs" src="../images/mk-1.png" alt="" />
                                                                            <div class="container-middle">
                                                                                <div class="container-inner text-left">
                                                                                    <hr class="space m visible-sm" />
                                                                                    <div class="row">
                                                                                        <div class="col-md-6 anima">
                                                                                            <h1 class="text-l text-normal text-m-xs">Architecture is a visual art and the buildings speak for themselves</h1>
                                                                                            <p class="text-s-xs">
                                                                                                I enjoy art and museums but also churches, anything that gives me insight into the history and soul of the place I'm in.
                                                                                                I can also be a beach bum - I like to laze in the shade of a palm tree with a good book or float in a warm sea at sundown.
                                                                                            </p>
                                                                                            <hr class="space s" />
                                                                                            <a href="#" class="btn btn-lg"><i class="fa fa-gears"></i> Services</a><span class="space"></span>
                                                                                            <a href="#" class="btn btn-lg btn-border"><i class="fa fa-folder-open"></i> Projects</a>
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
                                                                <li data-slider-anima="fade-left" data-time="1000">
                                                                    <div class="section-slide">
                                                                        <div class="bg-cover" style="background-image:url('../images/bg-5.jpg')">
                                                                        </div>
                                                                        <div class="container">
                                                                            <img class="pos-slider pos-bottom pos-right anima anima-fade-bottom hidden-xs" src="../images/mk-1.png" alt="" />
                                                                            <div class="container-middle">
                                                                                <div class="container-inner text-left">
                                                                                    <hr class="space m visible-sm" />
                                                                                    <div class="row">
                                                                                        <div class="col-md-6 anima">
                                                                                            <h1 class="text-l text-normal text-m-xs">Architecture is a visual art and the buildings speak for themselves</h1>
                                                                                            <p class="text-s-xs">
                                                                                                I enjoy art and museums but also churches, anything that gives me insight into the history and soul of the place I'm in.
                                                                                                I can also be a beach bum - I like to laze in the shade of a palm tree with a good book or float in a warm sea at sundown.
                                                                                            </p>
                                                                                            <hr class="space s" />
                                                                                            <a href="#" class="btn btn-lg"><i class="fa fa-gears"></i> Services</a><span class="space"></span>
                                                                                            <a href="#" class="btn btn-lg btn-border"><i class="fa fa-folder-open"></i> Projects</a>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                        </div>
                                                                                    </div>
                                                                                    <hr class="space visible-sm" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li> -->
                @foreach ($headContent as $item)
                <li data-slider-anima="fade-left" data-time="1000">
                    <div class="section-slide">
                        <div class="bg-cover" style="background-image:url('../images/bg-5.jpg')">
                        </div>
                        <div class="container">
                            <!-- <img class="pos-slider pos-bottom pos-right anima anima-fade-bottom hidden-xs" src="{{ asset('images/products/' . $item->image) }}" alt="" /> -->

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

                <!-- @foreach ($services as $item)
                        <li>
                            <div class="advs-box advs-box-top-icon boxed-inverse" data-anima="rotate-20"
                                data-trigger="hover">
                                <i class="fa fa-clone icon circle anima"></i>
                                <h3>{{ Str::limit($item->category->name, 10, '...') }}</h3>
                                <p>
                                    {{ Str::limit($item->title, 80, '...') }}
                                </p>
                            </div>
                        </li>
                    @endforeach -->

                @foreach ($services as $item)
                <li>
                    <a href="{{ route('service.show', $item->category->slug) }}" class="text-decoration-none">
                        <div class="advs-box advs-box-top-icon boxed-inverse" data-anima="rotate-20"
                            data-trigger="hover">
                            <i class="fa fa-clone icon circle anima"></i>
                            <h3>{{ Str::limit($item->category->name, 10, '...') }}</h3>
                            <p>
                                {{ Str::limit($item->title, 80, '...') }}
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
                    <p>ประสบการณ์</p>
                </div>
                <p>
                    เราชี้แจงงบประมาณการก่อสร้างอย่างโปร่งใสและตรงไปตรงมา เพราะงานก่อสร้างเป็นการลงทุนระยะยาวที่ต้องวางแผนให้ดี เราจึงช่วยคุณจัดการงบประมาณอย่างเป็นระบบ บอกทุกขั้นตอนอย่างชัดเจน เพื่อให้คุณเห็นภาพรวมของค่าใช้จ่ายทั้งหมด ตรวจสอบได้ตลอดเวลา และมั่นใจได้ว่าไม่มีค่าใช้จ่ายที่ไม่จำเป็นหรือเกินจริง เราตั้งใจให้ทุกโครงการเป็นไปอย่างราบรื่นและคุ้มค่าที่สุดสำหรับคุณ
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
                                <h3 class="no-margins">฿80.00<small class="text-color"> /m</small></h3>
                            </td>
                            <td>
                                <h5 class="text-color">รั้วก่อฉาบ</h5>
                                <h3 class="no-margins">฿80.00<small class="text-color"> /m</small></h3>
                            </td>
                            <td>
                                <h5 class="text-color">ถมที่ดิน</h5>
                                <h3 class="no-margins">฿350.00<small class="text-color"> /m<sup>2</sup></small></h3>
                            </td>
                            <td>
                                <h5 class="text-color">เทพื้นคอนกรีต</h5>
                                <h3 class="no-margins">฿500.00<small class="text-color"> /m<sup>2</sup></small></h3>
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
                    <p>ประสบการณ์</p>
                </div>
                <p>
                    ด้วยประสบการณ์กว่า 15 ปี เราพร้อมให้คำปรึกษาและช่วยคุณวางแผนงานก่อสร้างอย่างมั่นใจ เราทำงานด้วยความรับผิดชอบ ไม่มีประวัติทิ้งงาน และดูแลงานทุกขั้นตอนด้วยทีมผู้รับเหมามืออาชีพ ไม่ว่าจะเป็นงานกำแพงกันดิน รั้ว พื้นคอนกรีต ถมดิน หรืองานอื่น ๆ คุณจะได้รับคำอธิบายที่เข้าใจง่าย เพื่อช่วยให้ตัดสินใจได้อย่างถูกต้อง เราตั้งใจให้ทุกงานเริ่มต้นราบรื่น จบงานสวยงาม และสร้างความประทับใจ เพื่อให้ลูกค้ามั่นใจและบอกต่อคุณภาพงานของเรา

                </p>
                <hr class="space m" />
                <table class="grid-table border-table text-left">
                    <tbody>
                        <tr>
                            <td>
                                <h5 class="text-color">General</h5>
                                <h3 class="no-margins">$500.00</h3>
                            </td>
                            <td>
                                <h5 class="text-color">Security</h5>
                                <h3 class="no-margins">$1500.00</h3>
                            </td>
                            <td>
                                <h5 class="text-color">Laws</h5>
                                <h3 class="no-margins">$3500.00</h3>
                            </td>
                            <td>
                                <h5 class="text-color">Ensurance</h5>
                                <h3 class="no-margins">$5000.00</h3>
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
                        <li class="current-active active"><a data-filter="maso-item">All projects</a></li>
                        <li><a data-filter="cat1">Renovation</a></li>
                        <li><a data-filter="cat2">Outdoor</a></li>
                        <li><a data-filter="cat3">Architecture</a></li>
                        <li><a data-filter="cat4">Gardening</a></li>
                        <li><a data-filter="cat5" href="#">Interior design</a></li>
                        <li><a class="maso-order" data-sort="asc"><i class="fa fa-arrow-down"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="maso-box row">
                <div data-sort="0" class="maso-item col-md-3 cat1">
                    <div class="img-box adv-img adv-img-down-text boxed-inverse grayscale">
                        <a class="img-box img-scale-up lightbox i-center" href="#">
                            <div class="caption">
                                <i class="fa fa-plus"></i>
                            </div>
                            <img src="../images/gallery/image-4.jpg" alt="" />
                        </a>
                        <div class="caption-bottom">
                            <h2><a href="#">Modern bathroom</a></h2>
                            <p>April 2018</p>
                        </div>
                    </div>
                </div>
                <div data-sort="0" class="maso-item col-md-3  cat2 cat3 cat5">
                    <div class="img-box adv-img adv-img-down-text boxed-inverse grayscale">
                        <a class="img-box img-scale-up lightbox i-center" href="#">
                            <div class="caption">
                                <i class="fa fa-plus"></i>
                            </div>
                            <img src="../images/gallery/image-5.jpg" alt="" />
                        </a>
                        <div class="caption-bottom">
                            <h2><a href="#">Tech building</a></h2>
                            <p>Janaury 2018</p>
                        </div>
                    </div>
                </div>
                <div data-sort="0" class="maso-item col-md-3 cat2 cat4 cat5">
                    <div class="img-box adv-img adv-img-down-text boxed-inverse grayscale">
                        <a class="img-box img-scale-up lightbox i-center" href="#">
                            <div class="caption">
                                <i class="fa fa-plus"></i>
                            </div>
                            <img src="../images/gallery/image-6.jpg" alt="" />
                        </a>
                        <div class="caption-bottom">
                            <h2><a href="#">Lighting rooms</a></h2>
                            <p>Janauray 2018</p>
                        </div>
                    </div>
                </div>
                <div data-sort="0" class="maso-item col-md-3  cat2 cat3 cat4 cat5">
                    <div class="img-box adv-img adv-img-down-text boxed-inverse grayscale">
                        <a class="img-box img-scale-up lightbox i-center" href="#">
                            <div class="caption">
                                <i class="fa fa-plus"></i>
                            </div>
                            <img src="../images/gallery/image-11.jpg" alt="" />
                        </a>
                        <div class="caption-bottom">
                            <h2><a href="#">Interior garden</a></h2>
                            <p>February 2018</p>
                        </div>
                    </div>
                </div>
                <div data-sort="0" class="maso-item col-md-3 cat2 cat3">
                    <div class="img-box adv-img adv-img-down-text boxed-inverse grayscale">
                        <a class="img-box img-scale-up lightbox i-center" href="#">
                            <div class="caption">
                                <i class="fa fa-plus"></i>
                            </div>
                            <img src="../images/gallery/image-8.jpg" alt="" />
                        </a>
                        <div class="caption-bottom">
                            <h2><a href="#">Vertical garden</a></h2>
                            <p>June 2018</p>
                        </div>
                    </div>
                </div>
                <div data-sort="0" class="maso-item col-md-3 cat2 cat3 cat4 cat5">
                    <div class="img-box adv-img adv-img-down-text boxed-inverse grayscale">
                        <a class="img-box img-scale-up lightbox i-center" href="#">
                            <div class="caption">
                                <i class="fa fa-plus"></i>
                            </div>
                            <img src="../images/gallery/image-9.jpg" alt="" />
                        </a>
                        <div class="caption-bottom">
                            <h2><a href="#">Big tower</a></h2>
                            <p>July 2018</p>
                        </div>
                    </div>
                </div>
                <div data-sort="0" class="maso-item col-md-3  cat2 cat3 cat4 cat5">
                    <div class="img-box adv-img adv-img-down-text boxed-inverse grayscale">
                        <a class="img-box img-scale-up lightbox i-center" href="#">
                            <div class="caption">
                                <i class="fa fa-plus"></i>
                            </div>
                            <img src="../images/gallery/image-12.jpg" alt="" />
                        </a>
                        <div class="caption-bottom">
                            <h2><a href="#">Wood apartments</a></h2>
                            <p>July 2018</p>
                        </div>
                    </div>
                </div>
                <div data-sort="0" class="maso-item col-md-3 cat2 cat3 cat4 cat5">
                    <div class="img-box adv-img adv-img-down-text boxed-inverse grayscale">
                        <a class="img-box img-scale-up lightbox i-center" href="#">
                            <div class="caption">
                                <i class="fa fa-plus"></i>
                            </div>
                            <img src="../images/gallery/image-7.jpg" alt="" />
                        </a>
                        <div class="caption-bottom">
                            <h2><a href="#">Tiny homes</a></h2>
                            <p>August 2018</p>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<div class="section-bg-image parallax-window" data-natural-height="1080" data-natural-width="1920"
    data-parallax="scroll" data-image-src="../images/hd-4.jpg">
    <div class="container content">
        <div class="row proporzional-row">
            <div class="col-md-3 boxed-inverse boxed-border white middle-content text-left">
                <p>Auctor orci proin consequat magna natoque mattis nostra eiusmod esse lunga laboriosam luctus pulvinar
                    tenetur fugito similique.</p>
            </div>
            <div class="col-md-3  col-sm-12">
                <a class="img-box lightbox" href="../images/image-1.jpg" data-lightbox-anima="fade-right">
                    <img src="../images/image-1.jpg" alt="">
                </a>
            </div>
            <div class="col-md-3 boxed white middle-content">
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et
                    dolore magna aliqua.</p>
            </div>
            <div class="col-md-3 boxed-inverse middle-content text-left">
                <h4>Services</h4>
                <h2 class="text-color">Awesome</h2>
                <p class="no-margins">Lorem ipsum dolor sit amet consectetur adipo.</p>
            </div>
        </div>
    </div>
</div>
<div class="section-map box-middle-container row-19 box-transparent">
    <div class="google-map" data-coords="40.741895,-73.989308" data-zoom="15" data-marker-pos="col-md-6-right"
        data-skin="gray" data-marker="http://templates.framework-y.com/yellowbusiness/images/marker-map.png"></div>
    <div class="overlaybox overlaybox-side">
        <div class="container content">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 overlaybox-inner box-middle">
                    <h2 class="text-color text-normal">Contact.</h2>
                    <h2 class="text-normal">Collins Street<br />8007, San Francisco<br />United states</h2>
                    <hr class="space m" />
                    <p class="text-normal">
                        1-800-405-377<br />info@company.com<br />Mon - Sat: 8.00 - 19:00
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="row vertical-row">
            <div class="col-md-4 col-sm-12">
                <div class="title-base text-left">
                    <hr />
                    <h2>Contact us now</h2>
                    <p>Get in touch</p>
                </div>
                <p class="text-color">
                    Aercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit
                    in voluptate velit esse cillum dolore.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et
                    dolore magna aliqua.
                    Utenim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>
                <hr class="space s" />
                <div class="row vertical-row">
                    <div class="col-md-4">
                        <img src="../images/sign-3.png" alt="" />
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-s text-normal no-margins">Mark Ferdinand</h1>
                        <h4 class="text-xs">Founder</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-8 boxed white">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="fa-ul text-light">
                            <li><i class="fa-li fa fa-map-marker"></i> 184 Main Collins Street, 8007</li>
                            <li><i class="fa-li fa fa-calendar "></i> Mon - Sat 8.00 - 18.00</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="fa-ul text-light">
                            <li><i class="fa-li fa fa-envelope-o"></i> info@company.com</li>
                            <li><i class="fa-li fa fa-phone "></i> +1 322-55889664 or +1 55889665</li>
                        </ul>
                    </div>
                </div>
                <hr class="space m" />
                <form action="http://www.framework-y.com/scripts/php/contact-form.php" class="form-box form-ajax"
                    method="post" data-email="federico@pixor.it">
                    <div class="row">
                        <div class="col-md-6">
                            <input id="name" name="name" placeholder="name" type="text"
                                class="form-control form-value" required>
                        </div>
                        <div class="col-md-6">
                            <input id="email" name="email" placeholder="email" type="email"
                                class="form-control form-value" required>
                        </div>
                    </div>
                    <hr class="space xs" />
                    <div class="row">
                        <div class="col-md-12">
                            <textarea id="messagge" name="messagge" placeholder="Write your message" class="form-control form-value" required></textarea>
                            <hr class="space s" />
                            <button class="btn-sm btn" type="submit"><i class="fa fa-envelope-o"></i>Send
                                messagge</button>
                        </div>
                    </div>
                    <div class="success-box">
                        <div class="alert alert-success">Congratulations. Your message has been sent successfully</div>
                    </div>
                    <div class="error-box">
                        <div class="alert alert-warning">Error, please retry. Your message has not been sent</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="section-bg-color">
    <div class="container content">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="advs-box niche-box-team" data-anima="scale-up" data-trigger="hover">
                            <a class="img-box">
                                <img class="anima" src="../images/users/user-16.jpg" alt="" />
                            </a>
                            <div class="content-box">
                                <h2>Jessica Larry</h2>
                                <h4>Founder</h4>
                                <hr class="e" />
                                <div class="btn-group social-group">
                                    <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                                    <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                                    <a target="_blank" href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                                <p>Nibh atque suspendisse netus veritatis eveniet pariaturo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="advs-box niche-box-team" data-anima="scale-up" data-trigger="hover">
                            <a class="img-box">
                                <img class="anima" src="../images/users/user-17.jpg" alt="" />
                            </a>
                            <div class="content-box">
                                <h2>Casey Neistat</h2>
                                <h4>Project manager</h4>
                                <hr class="e" />
                                <div class="btn-group social-group">
                                    <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                                    <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                                    <a target="_blank" href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                                <p>Nibh atque suspendisse netus veritatis eveniet pariaturo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="advs-box niche-box-team" data-anima="scale-up" data-trigger="hover">
                            <a class="img-box">
                                <img class="anima" src="../images/users/user-15.jpg" alt="" />
                            </a>
                            <div class="content-box">
                                <h2>Sarah Rodrigo</h2>
                                <h4>Administration</h4>
                                <hr class="e" />
                                <div class="btn-group social-group">
                                    <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                                    <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                                    <a target="_blank" href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                                <p>Nibh atque suspendisse netus veritatis eveniet pariaturo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="title-base text-left">
                    <hr />
                    <h2>Funny people</h2>
                    <p>People behind the company</p>
                </div>
                <p>
                    Tincidunt integer eu augue augue nunc elit dolor, luctus placerat scelerisque euismod, iaculis eu
                    lacus nunc mi elito
                    vehicula ut laoreet ac, aliquam sit amet justo nunc tempor, metus velo atque suspendisse netus
                    verita.
                </p>
                <hr class="space s" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="icon-box icon-box-top-bottom counter-box-icon text-left">
                            <div class="icon-box-cell">
                                <b><label class="counter text-l" data-speed="2000" data-to="60">60</label></b>
                                <p class="text-s">Team memebers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon-box icon-box-top-bottom counter-box-icon text-left">
                            <div class="icon-box-cell">
                                <b><label class="counter text-l" data-speed="2000" data-to="2000">2000</label></b>
                                <p class="text-s">Monthly clients</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="space m" />
                <a href="#" class="btn btn-lg">View all members</a>
            </div>
        </div>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="flexslider carousel outer-navs png-over text-center"
            data-options="numItems:6,minWidth:100,itemMargin:30,controlNav:false,directionNav:true">
            <ul class="slides">
                <li>
                    <a class="img-box" href="#">
                        <img src="../images/logos/logo_1.png" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box" href="#">
                        <img src="../images/logos/logo_2.png" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box" href="#">
                        <img src="../images/logos/logo_3.png" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box" href="#">
                        <img src="../images/logos/logo_4.png" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box" href="#">
                        <img src="../images/logos/logo_5.png" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box" href="#">
                        <img src="../images/logos/logo_6.png" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box" href="#">
                        <img src="../images/logos/logo_7.png" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box" href="#">
                        <img src="../images/logos/logo_8.png" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box" href="#">
                        <img src="../images/logos/logo_1.png" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box" href="#">
                        <img src="../images/logos/logo_2.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection