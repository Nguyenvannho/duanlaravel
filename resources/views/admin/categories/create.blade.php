@extends('admin.layouts.master')
@section('content')
<main class="page-content">
    <h2>Thêm thể loại</h2>
<div class="container">

<div class="col-12 col-lg-12 d-flex">
    <div class="card border shadow-none w-100">
      <div class="card-body">
        <form class="row g-3" action="{{route('category.store')}}" method = 'post'>
            @csrf
          <div class="col-12">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" placeholder="Category name" >
     
          </div >
         <div class="col-12">
           <div class="d-grid">

            
             <button class="btn btn-primary" type="submit">Add Category</button>
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
