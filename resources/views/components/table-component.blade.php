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
        vertical-align: middle !important;
        /* บังคับให้เนื้อหากึ่งกลางแนวตั้ง */
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
        white-space: nowrap;
        /* ป้องกันปุ่มตัดบรรทัด */
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
                                    @php
                                        /** @var \Illuminate\Filesystem\FilesystemAdapter $disk */
                                        $disk = Storage::disk('s3');
                                    @endphp
                                    <img src="{{ $disk->url($row->$key) }}" class="img-thumbnail-custom">
                                @else
                                    <span class="label label-default">No Image</span>
                                @endif

                            @elseif($key == 'category')
                                <span class="label label-info">
                                    {{ $row->category->name ?? 'ทั่วไป' }}
                                </span>

                            @elseif($key == 'description' || $key == 'content_1' || $key == 'answer')
                                {{-- ตัวอย่างการตัดคำกรณีเนื้อหายาวเกินไป --}}
                                <span title="{{ $row->$key }}">
                                    {{ Str::limit(strip_tags($row->$key), 60) }}
                                </span>

                            @elseif($key == 'status' || $key == 'is_active')
                                @if($row->$key == 'Active' || $row->$key == '1' || $row->$key === true)
                                    <span class="label label-success" style="padding: 5px 10px; border-radius: 12px;"><i
                                            class="fa fa-check-circle"></i> เปิดใช้งาน</span>
                                @else
                                    <span class="label label-warning" style="padding: 5px 10px; border-radius: 12px;"><i
                                            class="fa fa-times-circle"></i> ปิดใช้งาน</span>
                                @endif

                            @elseif($key == 'question')
                                <strong class="text-primary" style="font-size: 1.05em;">{{ $row->$key }}</strong>

                            @elseif($key == 'sort_order')
                                <span class="badge" style="background-color: #5bc0de;">{{ $row->$key }}</span>

                            @else
                                {{ $row->$key }}
                            @endif
                        </td>
                    @endforeach

                    <td class="text-center btn-action-group">
                        {{-- <a href="{{ route('admin.services.edit', $row->id) }}" class="btn btn-xs btn-primary"
                            title="แก้ไข"> --}}
                            <a href="#" class="btn btn-xs btn-primary" title="แก้ไข">
                                <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                            </a>
                            {{-- <form action="{{ route('admin.services.destroy', $row->id) }}" method="POST"
                                style="display:inline-block;"> --}}
                                <form action="#" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger"
                                        onclick="return confirm('ยืนยันการลบข้อมูล?')" title="ลบ">
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