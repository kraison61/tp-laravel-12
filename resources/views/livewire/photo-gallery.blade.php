<div>
    <div class="row gallery-magnific" data-lightbox-anima="fade-top">
        @foreach ($photos as $item)
            <div class="col-md-4" style="position: relative;">
                @auth
                    @if($isAdmin)
                        <form action="{{ route('admin.photo.destroy', $item->id) }}" method="POST"
                            onsubmit="return confirm('ยืนยันการลบรูปภาพนี้ใช่หรือไม่?');"
                            style="position: absolute; top: 15px; right: 30px; z-index: 10;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="background: rgba(220, 38, 38, 0.9); border: none; color: white; width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 2px 4px rgba(0,0,0,0.2); transition: all 0.2s;"
                                onmouseover="this.style.background='rgba(220, 38, 38, 1)'; this.style.transform='scale(1.1)';"
                                onmouseout="this.style.background='rgba(220, 38, 38, 0.9)'; this.style.transform='scale(1)';">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    @endif
                @endauth
                <a class="img-box light-box" href="{{ Storage::url($item->img_url) }}?width=400&format=webp"
                    data-lightbox-anima="fade-top">
                    <img class="ratio-16-9" src="{{ Storage::url($item->img_url) }}"
                        alt="{{ optional($item->category)->name }} ที่ {{ $item->location }} ลำดับที่ {{ $item->id }}" />
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