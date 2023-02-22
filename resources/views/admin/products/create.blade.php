@extends('admin.layouts.master')
@section('content')
<main class="page-content">
    <h2>Thêm thể loại</h2>
<div class="container">

<div class="col-12 col-lg-12 d-flex">
    <div class="card border shadow-none w-100">
      <div class="card-body">
        <form class="row g-3" action="{{route('product.store')}}" method = 'post' enctype="multipart/form-data">
            @csrf
          <div class="col-12">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" placeholder="Tên" >
          </div >
          <div class="col-12">
          <label class="form-label">Thể loại</label>
          <select name="category_id" id="" class="form-control">
            <option value="">--Vui lòng chọn--</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        </div >
          <div class="col-12">
            <label class="form-label">Giá tiền</label>
            <input type="text" class="form-control" name="price" placeholder="Giá tiền" >
          </div >
          <div class="col-12">
            <label class="form-label">Kích cỡ</label>
            <input type="text" class="form-control" name="size" placeholder="Kích cỡ" >
          </div >
          <div class="col-12">
            <label class="form-label">Số lượng</label>
            <input type="text" class="form-control" name="amount" placeholder="Kích cỡ" >
          </div >
          <div class="col-12">
            <label class="form-label">Màu sắc</label>
            <input type="text" class="form-control" name="color" placeholder="Màu sắc" >
          </div>
          <div class="col-12">
            <label class="form-label">Mô tả</label>
            <input type="text" class="form-control" name="description" placeholder="Mô tả" >
          </div>
          <div class="col-12">
            <label class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="image" placeholder="Ảnh" >
          </div >
         <div class="col-12">
           <div class="d-grid"> <br>
             <button class="btn btn-primary" type="submit">Thêm</button>
        <a href="{{ route('product.index') }}" class="btn btn-primary">Quay lại</a>

           </div>
         </div>
        </form>

      </div>
    </div>
  </div>
</div>
</main>
@endsection
