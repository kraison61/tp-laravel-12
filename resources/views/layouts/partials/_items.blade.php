@foreach ($images as $image)
    <div data-sort="1" class="maso-item col-md-4">
        <a class="img-box"
           href="{{ asset($image->img_url) }}"
           data-lightbox-anima="fade-top">
            <img src="{{ asset($image->img_url) }}"
                 alt="" loading="lazy"
                 data-id="{{ $image->id }} ">
        </a>
    </div>
@endforeach
