@extends('admin.layouts.master')
@section('content')
<main class="page-content">
<h2>Sửa thể loại</h2>


<div class="container">

    <div class="col-12 col-lg-12 d-flex">
        <div class="card border shadow-none w-100">
          <div class="card-body">
            <form class="row g-3" action="{{route('category.update',[$products->id])}}" method="POST">
                @method('put')
                @csrf
              <div class="col-12">
                <label class="form-label">Tên</label>
                <input type="text" class="form-control" value="{{$products->name}}" name="name" >
            
              </div >
             <div class="col-12">
               <div class="d-grid">
                 <button class="btn btn-primary" type="submit">Thêm thể loại</button>

               </div>
             </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</main>
@endsection
