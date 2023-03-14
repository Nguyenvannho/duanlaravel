@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')

<main class="page-content">
    <h2 class="offset-5">Thêm mới sản phẩm</h2>
<div class="container">

<div class="col-12 col-lg-12 d-flex">
    <div class="card border shadow-none w-100">
      <div class="card-body">
        <form class="row g-3" action="{{route('product.store')}}" method = 'post' enctype="multipart/form-data">
            @csrf
          <div class="col-12">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" placeholder="Tên">
            @error('name')
            <div class="text text-danger">{{ $message }}</div>

        @enderror
          </div >
          <div class="col-12">
          <label class="form-label">Thể loại</label>
          <select name="category_id" id="" class="form-control">
            <option value="">--Vui lòng chọn--</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="text text-danger">{{ $message }}</div>

         @enderror
        </div >
          <div class="col-12">
            <label class="form-label">Giá tiền</label>
            <input type="text" class="form-control" name="price" placeholder="Giá tiền" >
            @error('price')
            <div class="text text-danger">{{ $message }}</div>

        @enderror
          </div >
          <div class="col-12">
            <label class="form-label">Số lượng</label>
            <input type="text" class="form-control" name="quantity" placeholder="số lượng" >
            @error('quantity')
            <div class="text text-danger">{{ $message }}</div>
            
          @enderror
          </div >
          <div class="col-12">
            <label class="form-label">Mô tả</label>
            <input type="text" class="form-control" name="description" placeholder="Mô tả" >
            @error('description')
            <div class="text text-danger">{{ $message }}</div>
            
        @enderror
          </div>
          <div class="col-12">
            <label class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="image" placeholder="Ảnh" >
            @error('image')
            <div class="text text-danger">{{ $message }}</div>
            
        @enderror
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
