<?php
    $count = $allServices->count();
    $leftCount = ceil($count / 2); // คำนวณจำนวนรายการในคอลัมน์ซ้าย

    $columnLeft = $allServices->take($leftCount);
    $columnRight = $allServices->skip($leftCount);
?>
<footer class="footer-base">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-center text-left">
                    <img width="120" src="{{ asset('storage/images/img-tp-logo.png') }}" alt="theeraphong-service-logo" />
                    <hr class="space m" />
                    <p class="text-s">14 หมู่ 5 ต.บางกร่าง อ.เมืองนนทบุรี จ.นนทบุรี 11000</p>
                    <div class="tag-row text-s">
                        <span>theeraphong.services@gmail.com</span>
                        <span>062-718-8847</span>
                    </div>
                    <hr class="space m" />
                    <div class="btn-group social-group btn-group-icons">
                        <a target="_blank" href="https://www.facebook.com/TheeraphongRetainingwall" data-social="share-facebook">
                            <i class="fa fa-facebook text-xs circle"></i>
                        </a>
                        <a target="_blank" href="https://www.youtube.com/@ธีรพงษ์รับเหมา" data-social="share-twitter">
                            <i class="fa fa-youtube text-xs circle"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-8 footer-left text-left">
                    <div class="row">
                        <div class="col-md-4 text-s">
                            <h3>เมนู</h3>
                            <a href="/">Home</a><br />
                            <a href="{{ route('services.index') }}">บริการ</a><br />
                            <a href="{{ route('gallery.index') }}">ภาพ & วิดีโอ</a><br />
                            <a href="{{ route('blog.index') }}">บทความ</a><br />
                            <a href="{{ route('contact') }}">ติดต่อเรา</a><br />

                        </div>
                        <div class="col-md-8 text-s">
                            <h3>บริการ</h3>
                            <div class="row">
                                {{-- คอลัมน์ซ้าย (6/12) --}}
                                <div class="col-md-6 col-12 column-left">
                                    @foreach ($columnLeft as $service)
                                        <div class="service-item mb-3">
                                            <a href="{{ route('service.show',$service->category->slug) }}"> {{ $service->category->name ?? 'บริการ' }}</a>
                                        </div>
                                    @endforeach
                                </div>

                                {{-- คอลัมน์ขวา (6/12) --}}
                                <div class="col-md-6 col-12 column-right">
                                    @foreach ($columnRight as $service)
                                        <div class="service-item mb-3">
                                            <a href="{{ route('service.show',$service->category->slug) }}"> {{ $service->category->name ?? 'บริการ' }}</a>
                                        </div>
                                    @endforeach
                                    <div class="service-item mb-3">
                                        <a href="{{ route('calculate') }}">คำนวณปริมาณดินถม</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row copy-row">
            <div class="col-md-12 copy-text">
                © 2025 theeraphongservices Co.,Ltd. | บริษัท ธีรพงษ์เซอร์วิส จำกัด
            </div>
        </div>
    </div>

</footer>
