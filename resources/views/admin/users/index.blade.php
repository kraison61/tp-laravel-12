@extends('layouts.clean')

@section('child-title', isset($user->id) ? 'Edit User' : (isset($user) ? 'Create User' : 'Users Management'))

@section('child-content')

    <!-- TOP BAR -->
    <div class="admin-topbar">
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <i class="fa fa-cogs"></i> Admin Panel
        </a>
    </div>

    <!-- SIDEBAR -->
    <div class="admin-sidebar">
        @include('admin.layouts.partials.sidebar')
    </div>

    <!-- MAIN CONTENT -->
    <div class="admin-content-wrapper">
        
        @if(session('success'))
            <div style="background-color: #d1fae5; color: #065f46; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <i class="fa fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div style="background-color: #fee2e2; color: #dc2626; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        @if(isset($user))
            <!-- CREATE / EDIT FORM -->
            <div class="form-card">
                <div class="form-header">
                    <i class="fa fa-user"></i>
                    <h2>{{ $user->exists ? 'แก้ไขผู้ใช้งาน' : 'สร้างผู้ใช้งานใหม่' }}</h2>
                </div>

                @php
                    $isEdit = $user->exists;
                    $actionUrl = $isEdit ? route('admin.users.update', $user->id) : route('admin.users.store');
                @endphp

                <form action="{{ $actionUrl }}" method="POST">
                    @csrf
                    @if($isEdit)
                        @method('PUT')
                    @endif

                    @if (isset($errors) && (is_object($errors) ? $errors->any() : count($errors) > 0))
                        <div style="background-color: #fee2e2; color: #dc2626; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                            <strong style="display:block; margin-bottom: 10px;">พบข้อผิดพลาด:</strong>
                            <ul style="margin: 0; padding-left: 20px;">
                                @php $errorList = is_object($errors) ? $errors->all() : $errors; @endphp
                                @foreach ($errorList as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @include('admin.users.form')

                    <div style="text-align: right; margin-top: 30px; border-top: 1px solid #f0f0f0; padding-top: 20px;">
                        <a href="{{ route('admin.users.index') }}" class="btn-submit" style="background:#f3f4f6; color:#4b5563 !important; margin-right: 10px; display: inline-block; text-decoration: none;">
                            ยกเลิก
                        </a>

                        <button type="submit" class="btn-submit">
                            <i class="fa fa-save"></i> บันทึกข้อมูล
                        </button>
                    </div>
                </form>
            </div>
        @else
            <!-- LIST VIEW -->
            <div class="form-card">
                <div class="form-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <i class="fa fa-users"></i>
                        <h2>จัดการผู้ใช้งาน (Users)</h2>
                    </div>
                    <a href="{{ route('admin.users.create') }}" class="btn-submit" style="display: inline-block; text-decoration: none;">
                        <i class="fa fa-plus"></i> เพิ่มผู้ใช้งาน
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                        <thead>
                            <tr style="border-bottom: 2px solid #ddd; text-align: left;">
                                <th style="padding: 12px 15px;">ID</th>
                                <th style="padding: 12px 15px;">ชื่อ</th>
                                <th style="padding: 12px 15px;">อีเมล</th>
                                <th style="padding: 12px 15px;">เบอร์โทร</th>
                                <th style="padding: 12px 15px;">บทบาท</th>
                                <th style="padding: 12px 15px; text-align: right;">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $u)
                                <tr style="border-bottom: 1px solid #eee;">
                                    <td style="padding: 12px 15px;">{{ $u->id }}</td>
                                    <td style="padding: 12px 15px;">{{ $u->name }}</td>
                                    <td style="padding: 12px 15px;">{{ $u->email }}</td>
                                    <td style="padding: 12px 15px;">{{ $u->phone ?? '-' }}</td>
                                    <td style="padding: 12px 15px;">
                                        @if($u->role === 'admin')
                                            <span style="background-color: #fef3c7; color: #92400e; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold;">{{ ucfirst($u->role) }}</span>
                                        @else
                                            <span style="background-color: #e0f2fe; color: #0369a1; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold;">{{ ucfirst($u->role ?? 'User') }}</span>
                                        @endif
                                    </td>
                                    <td style="padding: 12px 15px; text-align: right;">
                                        <a href="{{ route('admin.users.edit', $u->id) }}" class="btn btn-sm btn-info" style="margin-right: 5px;">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @if(auth()->id() !== $u->id)
                                        <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('ยืนยันการลบผู้ใช้งานนี้?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" style="background:#ef4444; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="padding: 20px; text-align: center; color: #6b7280;">
                                        <i class="fa fa-folder-open-o" style="font-size: 24px; margin-bottom: 10px; display: block;"></i>
                                        ยังไม่มีข้อมูลผู้ใช้งาน
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if(isset($users) && $users->hasPages())
                    <div style="margin-top: 20px;">
                        {{ $users->links() }}
                    </div>
                @endif
            </div>
        @endif
    </div>

@endsection
