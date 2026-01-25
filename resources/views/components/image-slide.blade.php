<div class="flexslider carousel gallery white visible-dir-nav nav-inner" data-options="minWidth:200,itemMargin:15,numItems:3,controlNav:true,directionNav:true">
    <ul class="slides">
        @foreach ($images as $item)
            <li>
                <a class="img-box lightbox" data-lightbox-anima="fade-top" href="{{ asset($item->img_url) }}">
                    <img class="ratio-16-9" src="{{ asset($item->img_url) }}" alt="">
                </a>
            </li>
        @endforeach
    </ul>
</div>
