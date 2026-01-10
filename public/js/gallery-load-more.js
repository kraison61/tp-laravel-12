

let loadMoreBtn = document.getElementById('loadMore');
let images = document.querySelectorAll('#gallery img');
    let lastImage = images[images.length - 1];
    let lastId = lastImage.getAttribute('data-id');
    console.log(images);

loadMoreBtn.addEventListener('click', function () {

    // หา id ของรูปสุดท้าย
    let images = document.querySelectorAll('#gallery img');
    let lastImage = images[images.length - 1];
    let lastId = lastImage.getAttribute('data-id');
    console.log(images);

    fetch(`/gallery/load-more?last_id=${lastId}`)
        .then(res => res.json())
        .then(data => {

            // ถ้าไม่มีข้อมูลแล้ว
            if (data.length === 0) {
                loadMoreBtn.style.display = 'none';
                return;
            }

            data.forEach(img => {
                let image = document.createElement('img');
                image.src = `/${img.path}`;
                image.setAttribute('data-id', img.id);
                document.getElementById('gallery').appendChild(image);
            });
        });
});
