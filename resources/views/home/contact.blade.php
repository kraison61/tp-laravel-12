@extends('layouts.app')

@section('title', 'หน้าแรก')

@section('content')
    <div class="section-empty">
        <div class="container content">
            <div class="row">
                <div class="col-md-8 col-center text-center">
                    <!-- <div class="google-map" data-marker-pos-left="15" data-coords="13.836929,100.443791" data-skin="gray" data-marker="http://templates.framework-y.com/yellowbusiness/images/marker-map.png"></div> -->
                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.035051832031!2d100.44121577456009!3d13.836933795317872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29bca7908e447%3A0xc1935f1371184218!2z4LiY4Li14Lij4Lie4LiH4Lip4LmMIOC5gOC4i-C4reC4o-C5jOC4p-C4tOC4qg!5e0!3m2!1sen!2sth!4v1769777548963!5m2!1sen!2sth" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <hr class="space" />
                    <h2 class="">ติดต่อเรา</h2>
                    <p class="text-color no-margins">หากกำลังหาผู้รับเหมาที่คุยง่าย ตรงไปตรงมา ใส่ใจในรายละเอียดงานทุกขั้นตอน คุมงานเอง ไม่เคยทิ้งงาน ไม่ว่าจะเป็นงานกำแพงกันดิน ก่อสร้างรั้ว เทพื้นคอนกรีต ถมดิน และงานรับเหมาอื่น ๆ เรายินดีให้คำปรึกษา จาก "ช่างรัก" ผู้ก่อตั้งบริษัทโดยตรง </p>

                    <a href="https://line.me/ti/p/h9SHumuTEB">
                    <p>ไลน์ไอดี : 0627188847</p>
                    <img class="img-rounded" width="30%" height="auto" src="{{asset('images/lineid.webp')}}" alt="lineID" />
                    </a>
                    
                    <p>
                        บริษัท ธีรพงษ์เซอร์วิส ยินดีให้บริการ
                    </p>
                    <hr class="space s" />
                   <p class="">14 หมู่ 5 ต.บางกร่าง อ.เมืองนนทบุรี จ.นนทบุรี 11000<br />062-718-8847 หรือ 087-700-7463<br />theeraphong.services@gmail.com</p> 
                    <hr class="space m" />
                </div>
            </div>
        </div>
    </div>
@endsection