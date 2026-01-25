@extends('layouts.app')

@section('title', 'ข่าว และบทความ')

@section('content')
<div class="section-empty section-item">
    <div class="container content">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <h1>{{ $blog->title }}</h1>
                <hr class="space xs" />
                <div class="tag-row">
                    <span><i class="fa fa-calendar"></i> <a href="#">25 / 05 / 2025</a></span>
                    <span><i class="fa fa-bookmark"></i> <a href="#">{{ $blog->serviceCategory->name }}</a></span>
                    <span><i class="fa fa-pencil"></i><a href="#">Admin</a></span>
                </div>
                <hr class="space m" />
                <a class="img-box" href="#">
                    <img src="{{ asset($blog->image) }}" alt="">
                </a>
                <hr class="space m" />
                <p>
                    {!! $blog->content !!}
                </p>
                <hr class="space visible-sm" />
            </div>
            <div class="col-md-4 col-sm-12 boxed-inverse shadow-2">
                <div class="list-group latest-post-list list-blog">
                    <div class="list-group list-blog">
                        <p class="list-group-item active">Categories</p>
                        <a href="#" class="list-group-item">Consutrction</a>
                        <a href="#" class="list-group-item">Buildings</a>
                        <a href="#" class="list-group-item">Interior design</a>
                        <a href="#" class="list-group-item">Outdoor and gardening</a>
                    </div>
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
                    <hr class="space m" />
                    <div class="btn-group social-group">
                        <a target="_blank" href="#" data-social="share-facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook text-s circle"></i></a>
                        <a target="_blank" href="#" data-social="share-twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter text-s circle"></i></a>
                        <a target="_blank" href="#" data-social="share-google" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus text-s circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection
