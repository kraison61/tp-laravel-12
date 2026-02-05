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
                    <span><i class="fa fa-calendar"></i> <a href="#">{{ $blog->updated_at->format('d M Y') }}</a></span>
                    <span><i class="fa fa-bookmark"></i> <a href="#">{{ $blog->serviceCategory->name }}</a></span>
                    <span><i class="fa fa-pencil"></i><a href="#">Admin</a></span>
                </div>
                <hr class="space m" />
                <a class="img-box" href="#">
                    <img src="{{ asset('storage/'.$blog->image) }}" alt="">
                </a>
                <hr class="space m" />
                <p>
                    {!! $blog->content !!}
                </p>
                <hr class="space visible-sm" />
            </div>
            <x-blog-sidebar />
        </div>
    </div>
</div>
<i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection
