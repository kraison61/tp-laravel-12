@php 
    $menu = [
        'dashboard' => [
            'label' => 'Dashboard',
            'icon' => 'fa fa-dashboard',
            'route' => 'admin.index',
        ],
        'blog' => [
            'label' => 'Blog',
            'icon' => 'fa fa-file-text',
            'route' => 'admin.blog.index',
        ],
        'image' => [
            'label' => 'Image',
            'icon' => 'fa fa-file-text',
            'route' => '#', // Assuming this route exists or will exist
        ],
        'category' => [
            'label' => 'Category',
            'icon' => 'fa fa-tags',
            'route' => 'admin.category.index',
        ],
        'service' => [
            'label' => 'Service',
            'icon' => 'fa fa-image',
            'route' => 'admin.service.index',
        ],
        'faq' => [
            'label' => 'FAQ',
            'icon' => 'fa fa-question-circle', // Updated icon to be more relevant
            'route' => 'admin.faq.index',
        ],
        'price' => [
            'label' => 'Price',
            'icon' => 'fa fa-image',
            'route' => 'admin.service.index',
        ],
        'review' => [
            'label' => 'Review',
            'icon' => 'fa fa-image',
            'route' => 'admin.service.index',
        ],
        'user' => [
            'label' => 'User',
            'icon' => 'fa fa-users',
            'route' => '#',
        ],
        'setting' => [
            'label' => 'Setting',
            'icon' => 'fa fa-cog',
            'route' => '#',
        ],
    ];
@endphp


<ul class="nav nav-pills nav-stacked" style="margin: 0; padding: 0; list-style: none;">
    @foreach ($menu as $key => $item)
        <li class="{{ $item['route'] !== '#' && request()->routeIs($item['route']) ? 'active' : '' }}">
            <a href="{{ $item['route'] !== '#' ? route($item['route']) : '#' }}">
                <i class="{{ $item['icon'] }}"></i> {{ $item['label'] }}
            </a>
        </li>
    @endforeach
</ul>
