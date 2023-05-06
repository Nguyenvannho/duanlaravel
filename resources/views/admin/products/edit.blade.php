@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')

<main class="page-content">
<h2 class="offset-5">Chỉnh sửa sản phẩm</h2>
<div class="container">

    <div class="col-12 col-lg-12 d-flex">
        <div class="card border shadow-none w-100">
          <div class="card-body">
            <form class="row g-3" action="{{route('product.update',[$products->id])}}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
              <div class="col-12">
                <label class="form-label">Tên</label>
                <input type="text" class="form-control" value="{{$products->name}}" name="name" >
              </div >
              <div class="col-12">
          <label class="form-label">Thể loại</label>
          <select name="category_id" id="" class="form-control">
            <option value="">--Vui lòng chọn--</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select> 
              <div class="col-12">
                <label class="form-label">Giá tiền</label>
                <input type="text" class="form-control" value="{{$products->price}}" name="price" >
              </div >
              <div class="col-12">
                <label class="form-label">Số lượng</label>
                <input type="text" class="form-control" value="{{$products->quantity}}" name="quantity" >
              </div >
              <div class="col-12">
                <label class="form-label">Mô tả</label>
                <input type="text" class="form-control" value="{{$products->description}}" name="description" >
              </div >
              <div class="col-12">
                <label class="form-label">Ảnh</label>
                <input type="file" class="form-control" value="{{$products->image}}" name="image" >
              </div >
             <div class="col-12">
               <div class="d-grid">  <br>
                 <button class="btn btn-primary" type="submit">Cập nhật</button>
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
