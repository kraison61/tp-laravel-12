let loadMoreBtn = document.getElementById("loadMore");

loadMoreBtn.addEventListener("click", function (e) {
    e.preventDefault(); // ป้องกันไม่ให้ปุ่ม Refresh หน้าเว็บ

    // 1. หา ID ของรูปสุดท้ายที่แสดงอยู่ในปัจจุบัน
    let imagesInGallery = document.querySelectorAll("#gallery img");
    let lastImage = imagesInGallery[imagesInGallery.length - 1];

    
    
    // ถ้าไม่มีรูปเลย ให้หยุดการทำงาน
    if (!lastImage) return;

    let lastId = lastImage.getAttribute("data-id");

    console.log("--- เริ่มการโหลดข้อมูล ---");
    console.log("ส่ง Request ด้วย ID ล่าสุด:", lastId);

    // แสดงสถานะว่ากำลังโหลด (Optional)
    loadMoreBtn.innerText = "Loading...";

    // 2. ส่ง request ไปหา Laravel Controller
    fetch(`/images/load-more?last_id=${lastId}`)
        .then((res) => res.json())
        .then((data) => {
            
            // 3. ตรวจสอบว่ามีข้อมูลส่งกลับมาไหม
            if (data.length === 0) {
                loadMoreBtn.innerText = "No More Images"; // เปลี่ยนข้อความปุ่ม
                loadMoreBtn.style.pointerEvents = "none"; // ปิดการกดปุ่ม
                return;
            }

            // 4. อ้างอิงพื้นที่ที่จะนำรูปไปวาง (Container)
            let gallery = document.querySelector("#gallery");

            // 5. วนลูปข้อมูล JSON ที่ได้มาจาก Laravel
            data.forEach((image) => {
                // สร้างกล่องใส่รูป (div.maso-item)
                let item = document.createElement("div");
                item.className = `maso-item col-md-4 ${image.class}`;
                item.setAttribute("data-sort", "1");

                // สร้างลิงก์ครอบรูป (a.img-box)
                let link = document.createElement("a");
                link.className = "img-box";
                link.href = image.img_url;
                link.setAttribute("data-lightbox-anima", "fade-top");

                // สร้างตัวรูปภาพ (img)
                let img = document.createElement("img");
                img.src = image.img_url;
                img.alt = "";
                img.setAttribute("data-id", image.id); // สำคัญมาก! เก็บ ID ไว้ใช้อ้างอิงรอบถัดไป

                // 6. ประกอบชิ้นส่วนเข้าด้วยกัน
                link.appendChild(img);
                item.appendChild(link);
                
                // นำไปวางต่อท้ายรูปเดิมใน Gallery
                // ใช้ insertBefore เพื่อให้ตัว 'clear' div อยู่ท้ายสุดเสมอ (ถ้ามี)
                gallery.appendChild(item);
            });

            // คืนค่าปุ่มให้กลับมาเป็นปกติ
            loadMoreBtn.innerHTML = 'Load More <i class="fa fa-arrow-down"></i>';
        })
        .catch(err => {
            console.error("Error:", err);
            loadMoreBtn.innerText = "Error, try again";
        });
});