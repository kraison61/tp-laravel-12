@props(['data', 'headers'])

<style>
    /* ปรับแต่งพิเศษสำหรับ Bootstrap 3 ให้ดูเป็น Admin Panel สมัยใหม่ */
    .admin-table {
        background-color: #ffffff;
        border-radius: 4px;
        overflow: hidden;
    }
    .admin-table thead tr {
        background-color: #f9f9f9;
        color: #333;
    }
    .admin-table tbody td {
        vertical-align: middle !important; /* บังคับให้เนื้อหากึ่งกลางแนวตั้ง */
        padding: 12px 8px !important;
    }
    .img-thumbnail-custom {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid #ddd;
    }
    .btn-action-group {
        white-space: nowrap; /* ป้องกันปุ่มตัดบรรทัด */
    }
</style>

<div class="table-responsive"> {{-- สำคัญมากสำหรับ Bootstrap 3 เพื่อให้เลื่อนซ้ายขวาในมือถือได้ --}}
    <table class="table table-hover admin-table">
        <thead>
            <tr>
                <th class="text-center" style="width: 50px;">#</th>
                @foreach ($headers as $key => $label)
                    <th>{{ $label }}</th>
                @endforeach
                <th class="text-center" style="width: 140px;">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $index => $row)
                <tr>
                    <td class="text-center text-muted">{{ $index + 1 }}</td>

                    @foreach ($headers as $key => $label)
                        <td>
                            @if($key == 'img_1' || $key == 'img_2' || $key == 'image')
                                @if($row->$key)
                                    <img src="{{ asset('storage/' . $row->$key) }}" class="img-thumbnail-custom">
                                @else
                                    <span class="label label-default">No Image</span>
                                @endif

                            @elseif($key == 'category')
                                <span class="label label-info">
                                    {{ $row->category->name ?? 'ทั่วไป' }}
                                </span>

                            @elseif($key == 'description' || $key == 'content_1')
                                {{-- ตัวอย่างการตัดคำกรณีเนื้อหายาวเกินไป --}}
                                <span title="{{ $row->$key }}">
                                    {{ Str::limit(strip_tags($row->$key), 50) }}
                                </span>

                            @else
                                {{ $row->$key }}
                            @endif
                        </td>
                    @endforeach

                    <td class="text-center btn-action-group">
                        {{-- <a href="{{ route('admin.services.edit', $row->id) }}" class="btn btn-xs btn-primary" title="แก้ไข"> --}}
                        <a href="#" class="btn btn-xs btn-primary" title="แก้ไข">
                            <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                        </a>
                        {{-- <form action="{{ route('admin.services.destroy', $row->id) }}" method="POST" style="display:inline-block;"> --}}
                        <form action="#" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('ยืนยันการลบข้อมูล?')" title="ลบ">
                                <i class="glyphicon glyphicon-trash"></i> ลบ
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers) + 2 }}" class="text-center text-muted">ไม่พบข้อมูล</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
