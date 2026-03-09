<div class="col-md-3">
    <ol class="breadcrumb b white">
        <li><a href="/">หน้าแรก</a></li>

        {{-- เช็คแบบ Array: ถ้าเป็นหน้า filter หรือหน้า show ให้แสดงเมนูนี้ --}}
        @if (request()->routeIs(['blog.filter', 'blog.show']))
            <li><a href="{{ route('blog.index') }}">ข่าวสารและบทความ</a></li>

        {{-- เช็คแบบ Array: ถ้าเป็นหน้าบริการเดี่ยว หรือหน้าคำนวณ ให้แสดงเมนูนี้ --}}
        @elseif (request()->routeIs(['service.show', 'calculate']))
            <li><a href="{{ route('services.index') }}">บริการ</a></li>
        @endif

        <li class="active">{{ Str::limit($slot, 20)  }}</li>
    </ol>
</div>
