<div class="maso-item col-md-3 cat1">
    <div class="img-box adv-img adv-img-down-text boxed-inverse grayscale">
        <a class="img-box img-scale-up i-center" target="_blank" href="{{ route('service.show', $service->category->slug) }}" >
            <img src="{{ asset('storage/'.$service->img_1) }}" alt="{{ $service->top_alt }} ">
        </a>
        <div class="caption-bottom">
            <h2>
                    {{ Str::limit($service->category->name, 20) }}
            </h2>
        </div>
    </div>
</div>
