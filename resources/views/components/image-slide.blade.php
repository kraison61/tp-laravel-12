<div class="flexslider carousel gallery white visible-dir-nav nav-inner"
    data-options="minWidth:200,itemMargin:15,numItems:3,controlNav:true,directionNav:true">
    <ul class="slides gallery-magnific"> {{-- เพิ่ม Class สำหรับเรียกใช้ Magnific --}}
        @foreach ($images as $item)
            <li>
                {{-- href คือรูปใหญ่ที่จะเด้งขึ้นมา --}}
                <a href="{{ asset('storage/'.$item->img_url) }}" data-lightbox-anima="show-scale">
                    <img class="ratio-16-9" src="{{ asset('storage/'.$item->img_url) }}" alt="{{ $item->category->name.'-'.$item->id }}">
                </a>
            </li>
        @endforeach
    </ul>
</div>
