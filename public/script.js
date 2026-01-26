$(document).ready(function() {
    $('.gallery-magnific').magnificPopup({
        delegate: 'a', // เลือกตัวที่จะให้คลิก (ในที่นี้คือแท็ก <a>)
        type: 'image',
        gallery: {
            enabled: true, // เปิดใช้งานระบบ Next/Prev
            navigateByImgClick: true,
            preload: [0,1] // โหลดรูปก่อนหน้าและถัดไปรอไว้เลย
        },
        image: {
            verticalFit: true,
            titleSrc: function(item) {
                return item.el.attr('title'); // ดึงคำอธิบายรูปมาแสดง
            }
        },
        removalDelay: 300, // เพิ่มความนุ่มนวลตอนปิด
        mainClass: 'mfp-fade' // ใส่ Animation เฟด
    });
});