<div class="collapse navbar-collapse">
    <ul class="nav navbar-nav over ms-minimal inner maso-filters">
        <li class="{{ (request()->routeIs('gallery.index') && empty(request()->route('id'))) ? 'current-active active' : '' }}">
            <a href="{{ route('gallery.index') }}">All</a>
        </li>
        @foreach ($allServices as $item)
        <li class="{{ (request()->routeIs('gallery.index') && request()->route('id') == $item->category->id) ? 'current-active active' : '' }}">
            <a href="{{ route('gallery.index', $item->category->id) }}">{{ $item->category->name }}</a>
        </li>
        @endforeach
        <li><a class="maso-order" data-sort="asc"><i class="fa fa-arrow-down"></i></a></li>
    </ul>
</div>
