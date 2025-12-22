@foreach($images as $image)
    <div class="maso-item col-md-4 {{ $image->category_slug }}">
        <a class="img-box lightbox" href="{{ asset($image->img_url) }}">
            <img src="{{ asset($image->img_url) }}" alt="{{ $image->title }}">
        </a>
    </div>
@endforeach