<div>
    <!-- Be present above all else. - Naval Ravikant -->
</div>
@extends('layouts.app')

@section('title', 'Image-TheeraphongServices')

@section('content')
<div class="header-base">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="title-base text-left">
                    <h1>Multimedia gallery</h1>
                    <p>When words become unclear, I shall focus with photographs. When images become inadequate, I shall
                        be content with silence.</p>
                </div>
            </div>
            <x-breadcrumb>
                ภาพ & วิดีโอ
            </x-breadcrumb>
        </div>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <hr class="space" />
        <div class="maso-list gallery">
            <div class="navbar navbar-inner">
                <div class="navbar-toggle"><i class="fa fa-bars"></i><span>Menu</span><i class="fa fa-angle-down"></i>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav over ms-minimal inner maso-filters">
                        <li class="current-active active"><a data-filter="maso-item" data-service-id="all">All</a></li>
                        @foreach ($allServices as $item)
                        <li><a 
                                >{{ Str::limit($item->category->name, 10, '...') }}
                            </a>
                        </li>
                        @endforeach
                        <li><a class="maso-order" data-sort="asc"><i class="fa fa-arrow-down"></i></a></li>
                    </ul>
                </div>
            </div>

            // Show Image
            
            <x-image>
                
            </x-image>


            <div class="list-nav">
                <a href="#" class="btn-sm btn load-more-maso" data-page-items="9">Load More <i
                        class="fa fa-arrow-down"></i></a>
            </div>
        </div>
    </div>
</div>
<i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection