const loadMoreBtn = document.getElementById("loadMore");

loadMoreBtn.addEventListener("click", function (e) {
    e.preventDefault();

    const images = document.querySelectorAll("#gallery img");
    const lastImage = images[images.length - 1];
    if (!lastImage) return;

    const lastId = lastImage.dataset.id;

    fetch(`/images/load-more?last_id=${lastId}`)
        .then(res => res.text())
        .then(html => {

            if (!html.trim()) {
                loadMoreBtn.innerText = "No More Images";
                loadMoreBtn.style.pointerEvents = "none";
                return;
            }

            const gallery = document.getElementById("gallery");

            // 1️⃣ append HTML
            gallery.insertAdjacentHTML("beforeend", html);

            // 2️⃣ รอ browser render DOM ให้เสร็จจริง ๆ
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {

                    if ($.fn.isotope) {
                        gallery.style.height = "auto";
                        $('.maso-box').isotope('destroy');
                        $('.maso-box').isotope();
                    }

                });
            });

        });
});
