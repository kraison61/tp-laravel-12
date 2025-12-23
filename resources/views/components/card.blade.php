<div class="maso-item col-md-3 cat1">
    <div class="img-box adv-img adv-img-down-text boxed-inverse grayscale">
        <a class="img-box img-scale-up lightbox i-center" href="{{ route('service.show',['service' => $service->category->slug]) }}" >
            <img src="{{ asset($service->img_1) }}" alt="{{ $service->name }}">
        </a>
        <div class="caption-bottom">
            <h2>
                    {{ Str::limit($service->category->name, 20) }}
            </h2>
        </div>
    </div>
</div>
