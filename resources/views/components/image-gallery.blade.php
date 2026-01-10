<div class="maso-box row" id="image-container" data-lightbox-anima="fade-top">
    @foreach ($images as $image)
    <div data-sort="1" class="maso-item col-md-4 {{ $image->service_id }}">
        <a class="img-box" href="{{ asset($image->img_url) }}" data-lightbox-anima="fade-top">
            <img src="{{ asset($image->img_url) }}" alt="Image description" loading="lazy" />
        </a>
    </div>
    @endforeach
    <div class="clear"></div>
</div>