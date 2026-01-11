// ✅ รอให้ DOM และ jQuery พร้อม
$(document).ready(function() {
    console.log("🚀 Gallery Load More Script Ready!");

    let loadMoreBtn = document.getElementById("loadMore");

    if (!loadMoreBtn) {
        console.error("❌ ไม่พบปุ่ม Load More!");
        return;
    }

    console.log("✅ พบปุ่ม Load More แล้ว");

    let isLoading = false;

    loadMoreBtn.addEventListener("click", function(e) {
        e.preventDefault();

        if (isLoading) {
            console.log("⏳ กำลังโหลดอยู่...");
            return;
        }

        isLoading = true;
        console.log("🖱️ คลิก Load More!");

        // 1. หา ID ของรูปสุดท้าย
        let imagesInGallery = document.querySelectorAll("#gallery img[data-id]");
        console.log("📸 จำนวนรูปปัจจุบัน:", imagesInGallery.length);

        let lastImage = imagesInGallery[imagesInGallery.length - 1];

        if (!lastImage) {
            console.error("❌ ไม่พบรูปในแกลเลอรี");
            isLoading = false;
            return;
        }

        let lastId = lastImage.getAttribute("data-id");
        console.log("🔢 ID รูปล่าสุด:", lastId);

        // แสดงสถานะกำลังโหลด
        loadMoreBtn.innerHTML = 'Loading... <i class="fa fa-spinner fa-spin"></i>';
        loadMoreBtn.disabled = true;

        // 2. ส่ง Request
        let url = `/images/load-more?last_id=${lastId}`;
        console.log("🌐 กำลังส่ง Request:", url);

        fetch(url)
            .then(res => {
                console.log("📡 Response Status:", res.status);
                if (!res.ok) throw new Error(`HTTP error! status: ${res.status}`);
                return res.json();
            })
            .then(data => {
                console.log("📦 ได้รับข้อมูล:", data);
                console.log("📊 จำนวนรูป:", data.length);

                if (data.length === 0) {
                    console.log("✋ ไม่มีรูปเพิ่มแล้ว");
                    loadMoreBtn.innerHTML = 'No More Images';
                    loadMoreBtn.style.pointerEvents = "none";
                    isLoading = false;
                    return;
                }

                let gallery = document.querySelector("#gallery");
                let $gallery = $('.maso-box');

                let newElements = [];
                let imagesToLoad = [];

                // สร้าง Elements
                data.forEach((image, idx) => {
                    console.log(`🏗️ [${idx + 1}] สร้าง element สำหรับ ID ${image.id}`);

                    let item = document.createElement("div");
                    item.className = `maso-item col-md-4 ${image.class}`;
                    item.setAttribute("data-sort", "1");
                    item.style.opacity = "0";

                    let link = document.createElement("a");
                    link.className = "img-box lightbox";
                    link.href = image.img_url;
                    link.setAttribute("data-lightbox-anima", "fade-top");

                    let img = document.createElement("img");
                    img.alt = "";
                    img.setAttribute("data-id", image.id);

                    link.appendChild(img);
                    item.appendChild(link);

                    newElements.push(item);
                    imagesToLoad.push({
                        img: img,
                        url: image.img_url,
                        id: image.id,
                        element: item,
                        index: idx
                    });
                });

                // เพิ่มเข้า DOM
                console.log("➕ เพิ่ม elements เข้า DOM");
                newElements.forEach(el => gallery.appendChild(el));

                // โหลดรูป
                let loadedCount = 0;
                let totalImages = imagesToLoad.length;

                imagesToLoad.forEach((imgData) => {
                    imgData.img.onload = function() {
                        loadedCount++;
                        console.log(`✅ [${loadedCount}/${totalImages}] รูป ID ${imgData.id} โหลดเสร็จ`);

                        // แสดงรูป
                        imgData.element.style.opacity = "1";
                        imgData.element.style.transition = "opacity 0.4s ease";

                        // เมื่อโหลดครบทั้งหมด
                        if (loadedCount === totalImages) {
                            console.log("🎉 โหลดรูปครบทั้งหมดแล้ว!");

                            setTimeout(() => {
                                refreshIsotopeLayout($gallery, newElements);

                                // คืนค่าปุ่ม
                                loadMoreBtn.innerHTML = 'Load More <i class="fa fa-arrow-down"></i>';
                                loadMoreBtn.disabled = false;
                                isLoading = false;

                                console.log("🔄 พร้อมโหลดรอบถัดไป");
                            }, 300);
                        }
                    };

                    imgData.img.onerror = function() {
                        console.error(`❌ โหลดรูป ID ${imgData.id} ไม่สำเร็จ:`, imgData.url);
                        loadedCount++;

                        if (loadedCount === totalImages) {
                            setTimeout(() => {
                                refreshIsotopeLayout($gallery, newElements);
                                loadMoreBtn.innerHTML = 'Load More <i class="fa fa-arrow-down"></i>';
                                loadMoreBtn.disabled = false;
                                isLoading = false;
                            }, 300);
                        }
                    };

                    // เริ่มโหลดรูป
                    console.log(`🔽 เริ่มโหลด: ${imgData.url}`);
                    imgData.img.src = imgData.url;
                });
            })
            .catch(err => {
                console.error("💥 Error:", err);
                loadMoreBtn.innerHTML = 'Error, try again <i class="fa fa-exclamation-triangle"></i>';
                loadMoreBtn.disabled = false;
                isLoading = false;
            });
    });
});

// ฟังก์ชันจัด Layout ด้วย Isotope
function refreshIsotopeLayout($gallery, newElements) {
    console.log("📐 เริ่มจัด Isotope Layout...");

    // ตรวจสอบว่ามี Isotope หรือไม่
    if (typeof $.fn.isotope === 'undefined') {
        console.error("❌ Isotope ไม่พร้อมใช้งาน");
        return;
    }

    let $newElements = $(newElements);

    // ✅ วิธีที่ถูกต้อง: ใช้ imagesLoaded ก่อน append
    $newElements.imagesLoaded(function() {
        console.log("   → รูปใหม่โหลดเสร็จทั้งหมด");

        // Append elements ใหม่
        $gallery.append($newElements).isotope('appended', $newElements);

        // Layout ใหม่
        setTimeout(() => {
            $gallery.isotope('layout');
            console.log("✨ Isotope Layout เสร็จสิ้น");
        }, 100);
    });
}
