@extends('layouts.app')

@section('title', 'Image-TheeraphongServices')

@section('content')
    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Multimedia gallery</h1>
                        <p>When words become unclear, I shall focus with photographs. When images become inadequate, I shall
                            be content with silence.</p>
                    </div>
                </div>
                <x-breadcrumb>
                    ภาพ & วิดีโอ
                </x-breadcrumb>
            </div>
        </div>
    </div>
    <div class="section-empty">
        <div class="container content">
            <div class="flexslider carousel gallery white visible-dir-nav nav-inner"
                data-options="minWidth:200,itemMargin:15,numItems:3,controlNav:true,directionNav:true">
                <ul class="slides">
                    <li>
                        <a class="img-box lightbox" data-lightbox-anima="fade-top" href="../images/gallery/image-1.jpg">
                            <img src="../images/gallery/image-8.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-box lightbox" data-lightbox-anima="fade-top" href="../images/gallery/image-1.jpg">
                            <img src="../images/gallery/image-3.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-box lightbox" data-lightbox-anima="fade-top" href="../images/gallery/image-1.jpg">
                            <img src="../images/gallery/image-4.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-box lightbox" data-lightbox-anima="fade-top" href="../images/gallery/image-1.jpg">
                            <img src="../images/gallery/image-5.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-box lightbox" data-lightbox-anima="fade-top" href="../images/gallery/image-1.jpg">
                            <img src="../images/gallery/image-6.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-box lightbox" data-lightbox-anima="fade-top" href="../images/gallery/image-1.jpg">
                            <img src="../images/gallery/image-7.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-box lightbox" data-lightbox-anima="fade-top" href="../images/gallery/image-1.jpg">
                            <img src="../images/gallery/image-9.jpg" alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <hr class="space" />
            <div class="maso-list gallery">
                <div class="navbar navbar-inner">
                    <div class="navbar-toggle"><i class="fa fa-bars"></i><span>Menu</span><i class="fa fa-angle-down"></i>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav over ms-minimal inner maso-filters">
                            <li class="current-active active"><a data-filter="maso-item" data-service-id="all">All</a></li>
                            @foreach ($allServices as $item)
                                <li><a data-filter="{{ $item->service_category_id }}" data-service-id="{{ $item->service_category_id }}">{{ Str::limit($item->category->name, 10, '...') }}
                                    </a>
                                </li>
                            @endforeach
                            <li><a class="maso-order" data-sort="asc"><i class="fa fa-arrow-down"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="maso-box row" id="image-container" data-lightbox-anima="fade-top">
                    {{-- @foreach ($images as $image)
                <div data-sort="1" class="maso-item col-md-4 {{ $image->service_id }}">
                    <a class="img-box" href="{{ asset($image->img_url) }}" data-lightbox-anima="fade-top">
                        <img src="{{ asset($image->img_url) }}" alt="Image description" loading="lazy" />
                    </a>
                </div>
                @endforeach --}}
                    <div class="clear"></div>
                </div>
                {{-- <div class="list-nav">
                <a href="#" class="btn-sm btn load-more-maso" data-page-items="9">Load More <i
                        class="fa fa-arrow-down"></i></a>
            </div> --}}

                <div class="list-nav">
                    <a href="javascript:void(0)" class="btn-sm btn" id="btn-load-more">Load More <i
                            class="fa fa-arrow-down"></i></a>
                </div>

            </div>
        </div>
    </div>
    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection


@push('scripts')
<script>
$(document).ready(function() {
    // --- 1. การตั้งค่าเริ่มต้น ---
    let currentPage = 1;
    let currentServiceId = 'all';

    // เลือก Container ที่จะใส่รูป (ใน Blade ของคุณคือ id="image-container")
    // และตั้งค่า Isotope
    var $grid = $('#image-container').isotope({
        itemSelector: '.maso-item',
        percentPosition: true,
        masonry: {
            columnWidth: '.maso-item'
        }
    });

    // --- 2. ฟังก์ชันหลักในการโหลดข้อมูล ---
    function loadGallery(page, serviceId, isAppend = false) {
        // แสดง Loading ที่ปุ่ม Load More
        const $loadMoreBtn = $('#btn-load-more');
        const originalBtnText = $loadMoreBtn.html();
        $loadMoreBtn.html('Loading... <i class="fa fa-spinner fa-spin"></i>');

        $.ajax({
            url: `/api/gallery-images?service_id=${serviceId}&page=${page}`,
            method: 'GET',
            success: function(response) {
                let html = '';

                // ตรวจสอบว่ามีข้อมูลส่งกลับมาไหม
                if (response.data && response.data.length > 0) {
                    response.data.forEach(item => {
                        // การจัดการ Path รูปภาพ:
                        // เนื่องจากไฟล์อยู่ที่ public/images/services/xxx.webp
                        // และใน DB เก็บ images/services/xxx.webp
                        // เราจึงเติม / ข้างหน้าเพื่อให้เรียกจาก Root ของเว็บไซต์
                        let imgUrl = '/' + item.img_url;

                        html += `
                        <div class="maso-item col-md-4 cat${item.service_id}">
                            <a class="img-box lightbox" href="${imgUrl}">
                                <img src="${imgUrl}" alt="Gallery Image" />
                            </a>
                        </div>`;
                    });

                    let $items = $(html);

                    if (isAppend) {
                        // กรณีโหลดเพิ่ม (Load More)
                        $grid.append($items).isotope('appended', $items);
                    } else {
                        // กรณีโหลดใหม่ (เปลี่ยน Filter) ล้างของเดิมออกก่อน
                        $grid.isotope('remove', $grid.find('.maso-item')).isotope('layout');
                        $grid.append($items).isotope('appended', $items);
                    }

                    // --- 3. แก้ไขปัญหารูปซ้อน (สำคัญมาก) ---
                    // รอให้รูปภาพโหลดเสร็จก่อน แล้วค่อยให้ Isotope จัดตำแหน่ง
                    $grid.imagesLoaded().progress(function() {
                        $grid.isotope('layout');
                    });

                    // --- 4. ผูกระบบ Lightbox ใหม่ ---
                    // เพื่อให้รูปภาพที่โหลดมาใหม่สามารถคลิกขยายได้
                    if ($.fn.magnificPopup) {
                        $('.lightbox').magnificPopup({
                            type: 'image',
                            gallery: {
                                enabled: true
                            },
                            mainClass: 'mfp-fade'
                        });
                    }
                }

                // --- 5. การจัดการปุ่ม Load More ---
                if (response.next_page_url) {
                    $loadMoreBtn.show().html(originalBtnText);
                } else {
                    $loadMoreBtn.hide(); // ซ่อนปุ่มถ้าไม่มีหน้าถัดไปแล้ว
                }
            },
            error: function(xhr) {
                console.error("Error loading gallery:", xhr);
                $loadMoreBtn.html(originalBtnText);
                alert("เกิดข้อผิดพลาดในการโหลดข้อมูล");
            }
        });
    }

    // --- 6. Event Listeners (การดักจับเหตุการณ์คลิก) ---

    // คลิกปุ่ม Load More
    $('#btn-load-more').on('click', function(e) {
        e.preventDefault();
        currentPage++;
        loadGallery(currentPage, currentServiceId, true);
    });

    // คลิก Filter (All, หมวดหมู่ต่างๆ)
    $('.maso-filters a').on('click', function(e) {
        e.preventDefault();

        // สลับสถานะ Active ของปุ่ม
        $('.maso-filters li').removeClass('active current-active');
        $(this).parent().addClass('active current-active');

        // ดึงค่า ID จาก data-service-id ที่เราใส่ไว้ใน Blade
        currentServiceId = $(this).data('service-id');

        // รีเซ็ตกลับไปหน้า 1
        currentPage = 1;

        // เรียกฟังก์ชันโหลดข้อมูลใหม่ (isAppend = false)
        loadGallery(currentPage, currentServiceId, false);
    });

    // --- 7. เริ่มทำงานครั้งแรก ---
    loadGallery(currentPage, currentServiceId);
});
</script>
@endpush
