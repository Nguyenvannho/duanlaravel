@extends('admin.layouts.master')
@section('content')
<main class="page-content">
<section class="wrapper">
    <div class="panel-panel-default">
        <div class="market-updates">
            <div class="container">
              <form class="navbar-form navbar-left" action="{{route('order.search')}}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search...">
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-info">Tìm kiếm</button>
                    </div>
                </div>
            </form>
<main id="main" class="main">
  <a  class="btn btn-warning" href="{{route('order.xuat')}}">Xuất Excel</a>

    <div class="pagetitle">
      <h1 class="offset-4">Đơn đặt hàng</h1>
      <hr>
    </div>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Khách Hàng</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">SĐT </th>
            <th scope="col">Tùy Chọn</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $key=> $item)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->customer->name}}</td>
            <td>{{$item->customer->address}}</td>
            <td>{{$item->customer->phone}}</td>
            <td>
            <a href="{{ route('order.order_detail', $item->id) }}" class="btn btn-primary">Chi tiết</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{-- {{$items->appends(request()->query())}} --}}

</main>
</div>
</div>
</div>
</section>
</main>
@endsection