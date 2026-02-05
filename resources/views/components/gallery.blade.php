<div class="maso-box row" data-lightbox-anima="fade-top">
    @foreach ($images as $item)
    <div class="maso-item col-md-4">
        <a class="img-box" href="{{ asset('storage/'.$item->img_url) }}" data-lightbox-anima="fade-top">
            <img class="ratio-16-9" src="{{ asset('storage/'.$item->img_url) }}" alt="" />
        </a>
    </div>
    @endforeach
    <div class="clear"></div>
</div>
