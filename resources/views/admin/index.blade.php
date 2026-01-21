@extends('layouts.app')

@section('title', 'Image Gallery')

@section('content')

<div class="container service-category-list">
  <div class="">
    <h2>รายการที่ให้บริการ</h2>
  </div>
  <div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Slug</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($servicecategories as $item)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->slug}}</td>
          <td>
            <a href=""><button class="btn btn-primary">แก้ไข</button></a>
            <a href=""><button class="btn btn-danger">ลบ</button></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection