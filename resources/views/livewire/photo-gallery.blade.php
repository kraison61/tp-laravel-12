<div>
<div class="row gallery-magnific" data-lightbox-anima="fade-top">
    @foreach ($photos as $item)
    <div class="col-md-4">
        <a class="img-box light-box" href="{{ asset('storage/'.$item->img_url) }}" data-lightbox-anima="fade-top">
            <img class="ratio-16-9" src="{{ asset('storage/'.$item->img_url) }}" alt="" />
        </a>
    </div>
    @endforeach
    <div class="clear"></div>
</div>
<div x-intersect.margin.200px="$wire.loadMore()" class="text-center" style="min-height: 100px; margin-top: 20px;">
    <div wire:loading>
        <p><i class="fa fa-spinner fa-spin fa-2x"></i> กำลังโหลดเพิ่ม...</p>
    </div>
</div>
</div>
