@props(['route', 'label' => null])
<div>
    <a href="{{ route($route) }}" class="btn-add-new">
        <i class="fa fa-plus"></i> {{ $label ?? 'เพิ่มข้อมูลใหม่' }}
    </a>
</div>