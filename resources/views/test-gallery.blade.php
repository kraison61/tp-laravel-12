@extends('layouts.app') 

@section('title', 'หน้าทดสอบระบบ Infinite Scroll')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">Infinite Photo Gallery</h1>
    
    <livewire:photo-gallery />
    
</div>
@endsection