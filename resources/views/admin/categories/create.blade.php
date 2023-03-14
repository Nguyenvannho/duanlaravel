@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')

<main class="page-content">
    <h2 class="offset-5">Thêm mới thể loại</h2>
<div class="container">

<div class="col-12 col-lg-12 d-flex">
    <div class="card border shadow-none w-100">
      <div class="card-body">
        <form class="row g-3" action="{{route('category.store')}}" method = 'post'>
            @csrf
          <div class="col-12">
            <label class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" name="name" placeholder="Nhập" >
            @error('name')
            <div style="color: red">{{ $message }}</div>
            @enderror
     
          </div >
         <div class="col-12">
           <div class="d-grid">

            <br>
             <button class="btn btn-primary" type="submit">Thêm</button>
        <a href="{{ route('category.index') }}" class="btn btn-primary">Quay lại</a>

           </div>
         </div>
        </form>

      </div>
    </div>
  </div>
</div>
</main>
@endsection
