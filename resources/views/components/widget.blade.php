<div class="col-md-3 col-sm-12 widget">
    <!-- <div class="input-group search-blog list-blog">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div> -->
    <hr class="space s" />
    <div class="list-group list-blog">
        <p class="list-group-item active">หมวดหมู่</p>
        @foreach( $blogs as $item )
        <a href="{{ route('blog.filter',$item->serviceCategory->id) }}" class="list-group-item">{{ $item->serviceCategory->name }}</a>
        @endforeach
        <!-- <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item">Morbi leo risus</a>
                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item">Vestibulum at eros</a> -->
    </div>
    <x-blog-latest />
    <div class="list-group latest-post-list list-blog">
        <p class="list-group-item active">Latest posts</p>
        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    <a class="img-box circle">
                        <img src="../images/gallery/square-1.jpg" alt="">
                    </a>
                </div>
                <div class="col-md-8">
                    <a href="#">
                        <h5>Return to the future day</h5>
                    </a>
                    <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>02.06.2018</span></div>
                </div>
            </div>
        </div>
        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    <a class="img-box circle">
                        <img src="../images/gallery/square-2.jpg" alt="">
                    </a>
                </div>
                <div class="col-md-8">
                    <a href="#">
                        <h5>We can do</h5>
                    </a>
                    <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>02.06.2018</span></div>
                </div>
            </div>
        </div>
        <div class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    <a class="img-box circle">
                        <img src="../images/gallery/square-3.jpg" alt="">
                    </a>
                </div>
                <div class="col-md-8">
                    <a href="#">
                        <h5>Hacking team 24</h5>
                    </a>
                    <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>02.06.2018</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="list-group list-blog">
        <p class="list-group-item active">Tags</p>
        <div class="tagbox">
            <span>Hello!</span><span>Big deal</span><span>A new happy time</span><span>Food</span><span>Cheese</span><span>Food</span>
            <div class="clear"></div>
        </div>
    </div>
</div>