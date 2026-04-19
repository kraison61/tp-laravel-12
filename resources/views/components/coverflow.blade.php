<div class="row">
    <div class="col-md-12">
        @if($photos->isNotEmpty())
            <div class="coverflow-slider" data-width="60">
                <ul>
                    @foreach ($photos as $photo)
                        <li>
                            <a class="coverflow-lightbox" href="{{ Storage::url($photo->img_url) }}?width=400&format=webp">
                                <img alt="{{ $photo->category->name ?? 'ภาพงาน' }} ที่ {{ $photo->location ?? '' }}"
                                    src="{{ Storage::url($photo->img_url) }}?width=400&format=webp" loading="lazy" />
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="text-center" style="padding: 40px 0;">
                <p class="text-muted"><i class="fa fa-image fa-2x"></i><br>ยังไม่มีรูปภาพในขณะนี้</p>
            </div>
        @endif
    </div>
</div>