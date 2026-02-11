<div class="col-sm-3 col-md-2">
    <ul class="nav nav-pills nav-stacked text-left">
        <li class="{{ request()->routeIs('admin.index') ? 'active' : '' }}"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="{{ request()->routeIs('admin.blog.index') ? 'active' : '' }}"><a href="{{route('admin.blog.index')}}"><i class="fa fa-file-text"></i> Blogs</a></li>
        <li><a href="#"><i class="fa fa-file-text"></i> Images</a></li>
        <li class="{{ request()->routeIs('admin.service.index') ? 'active' : '' }}"><a href="#"><i class="fa fa-tags"></i> Categories</a></li>
        <li><a href="{{route('admin.service.index')}}"><i class="fa fa-image"></i> Services</a></li>
        <li><a href="#"><i class="fa fa-users"></i> Users</a></li>
        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
    </ul>
</div>
