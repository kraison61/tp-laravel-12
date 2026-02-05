<div class="col-md-3 col-sm-12 widget">
    <hr class="space s" />
    <div class="list-group list-blog">
        <p class="list-group-item active">หมวดหมู่</p>
        @foreach ($blogs as $item)
            <a href="{{ route('blog.filter', $item->serviceCategory->id) }}"
                class="list-group-item">{{ $item->serviceCategory->name }}</a>
        @endforeach
    </div>
    <div class="list-group list-blog">
        <p class="list-group-item active">Latest posts</p>

        @foreach ($blogs as $item)
            <div class="list-group-item">
                <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>{{ $item->updated_at->format('d-M-Y') }}</span></div>
                <a href="#">
                    <h5>{{ Str::limit($item->title,20) }}</h5>
                </a>
                <p>
                    {{ Str::limit($item->description, 40) }}
                </p>
            </div>
        @endforeach
    </div>
</div>
