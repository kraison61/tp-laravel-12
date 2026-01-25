@extends('layouts.app')

@section('title', 'ข่าว และบทความ')

@section('content')
<div class="header-title ken-burn-center white" data-parallax="scroll" data-position="top" data-natural-height="650" data-natural-width="1920" data-image-src="../images/bg-10.jpg">
        <div class="container">
            <div class="title-base">
                <hr class="anima" />
                <h1>News</h1>
                <p>News and interesting news from our world.</p>
            </div>
        </div>
    </div>
    <div class="section-bg-color">
        <div class="container content">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div class="grid-list grid-layout grid-15">
                        <div class="grid-box row">

                            @foreach($images as $item)
                                <div class="grid-item col-md-6">
                                <div class="advs-box advs-box-top-icon-img niche-box-post boxed-inverse" data-anima="scale-rotate" data-trigger="hover">
                                    <div class="block-infos">
                                        <div class="block-data">
                                            <p class="bd-day">{{ $item->created_at->format('j-M-y') }}</p>
                                        </div>
                                        <a class="block-comment" href="#">2 <i class="fa fa-comment-o"></i></a>
                                    </div>
                                    <a class="img-box ratio-16-9" href="{{ route('blog.show',$item->id)}}"><img class="anima" src="{{ $item->image }}" alt="{{ $item->title }}" /></a>
                                    <div class="advs-box-content">
                                        <h2 class="text-m"><a href="#">{{ Str::limit($item->title, 30) }}</a></h2>
                                        <div class="tag-row">
                                            <span><i class="fa fa-bookmark"></i> <a href="#">Travel</a></span>
                                            <span><i class="fa fa-pencil"></i><a href="#">Admin</a></span>
                                        </div>
                                        <p class="niche-box-content">
                                            {{ Str::limit($item->description, 45) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                        <div class="list-nav">
                            <ul class="pagination pagination-grid" data-page-items="8" data-pagination-anima="show-scale"></ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 widget">
                    <div class="input-group search-blog list-blog">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                    <hr class="space s" />
                    <div class="list-group list-blog">
                        <p class="list-group-item active">Categories</p>
                        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item">Morbi leo risus</a>
                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item">Vestibulum at eros</a>
                    </div>
                    <div class="list-group list-blog">
                        <p class="list-group-item active">Latest posts</p>
                        <div class="list-group-item">
                            <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>26.05.2018</span></div>
                            <a href="#">
                                <h5>Return to the future day</h5>
                            </a>
                            <p>
                                Lorem ipsum dolor sit amet, conse adipisicing elit, sed do eiusmod tempor incididunt ...
                            </p>
                        </div>
                        <div class="list-group-item">
                            <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>28.05.2018</span></div>
                            <a href="#">
                                <h5>The web 3.0 vision</h5>
                            </a>
                            <p>
                                Lorem ipsum dolor sit amet, conse adipisicing elit, sed do eiusmod tempor incididunt ...
                            </p>
                        </div>
                        <div class="list-group-item">
                            <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>02.06.2018</span></div>
                            <a href="#">
                                <h5>Where to go on holiday ?</h5>
                            </a>
                            <p>
                                Lorem ipsum dolor sit amet, conse adipisicing elit, sed do eiusmod tempor incididunt ...
                            </p>
                        </div>
                    </div>
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
            </div>
        </div>
    </div>
    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection
