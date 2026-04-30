$(document).on('click', '.flexslider .lightbox', function () {
    console.log('clicked');
  });

document.addEventListener('DOMContentLoaded', function() {
    var dropdownMenu = document.querySelector('.keep-open .dropdown-menu');
    if(dropdownMenu) {
        dropdownMenu.addEventListener('click', function(e) {
            e.stopPropagation(); // หยุดการทำงานที่จะทำให้ Dropdown ปิด
        });
    }
});
