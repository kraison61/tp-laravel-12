@extends('layouts.clean')

@section('child-title', 'เข้าสู่ระบบ Admin')

@section('child-content')

<div style="display: flex; justify-content: center; align-items: center; min-height: 80vh;">
    <div style="background: #ffffff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); width: 100%; max-width: 400px;">

        <div style="text-align: center; margin-bottom: 30px;">
            <i class="fa fa-lock" style="font-size: 40px; color: #4f46e5; margin-bottom: 10px;"></i>
            <h2 style="margin: 0; color: #333;">Admin Login</h2>
            <p style="color: #666; font-size: 14px; margin-top: 5px;">กรุณาเข้าสู่ระบบเพื่อจัดการเว็บไซต์</p>
        </div>

        @if ($errors->any())
            <div style="background-color: #fee2e2; color: #dc2626; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 14px; text-align: center;">
                อีเมลหรือรหัสผ่านไม่ถูกต้อง!
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #444;">อีเมล (Email)</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; outline: none;">
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #444;">รหัสผ่าน (Password)</label>
                <input type="password" name="password" required
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; outline: none;">
            </div>

            <button type="submit"
                style="width: 100%; background: #4f46e5; color: white; padding: 12px; border: none; border-radius: 6px; font-size: 16px; font-weight: bold; cursor: pointer; transition: 0.3s;">
                เข้าสู่ระบบ
            </button>
        </form>

    </div>
</div>

@endsection
