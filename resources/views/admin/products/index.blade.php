@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<h1 class="offset-4">Danh sách sản phẩm</h1>
<main class="page-content">
        <div class="container">
            <table class="table">
                <div class="col-6">
                    <form class="navbar-form navbar-left" action="{{route('product.search')}}" method="GET">
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
                        <a class="btn btn-warning" href="{{route('product.xuat')}}">Xuất Excel</a> &nbsp &nbsp
                    </form>
                    @if (Auth::user()->hasPermission('Product_update')) 
                <a href="{{ route('product.create') }}" class="btn btn-primary">Thêm mới</a>
                @endif

                    </form>
                </div>
                <thead>
                    <tr>
                        <th scope="col">Số thứ tự</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Ảnh</th>

                        <th adta-breakpoints="xs">Quản lí</th>
                    </tr>
                </thead>
                <tbody id="myTable">

                    @foreach ($products as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->quantity }}</td>
                            <td>{{ $team->category->name }}</td>
                            <td>{{number_format( $team->price).' VND'}}</td>
                            
                            <td><img width="90px" height="90px" src="{{ asset($team->image)}}" alt=""></td>

                            <td>
                                
                                <form  action="{{ route('product.destroy', $team->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    @if (Auth::user()->hasPermission('Product_update'))
                                    <a class="btn btn-success" href="{{ route('product.edit', $team->id) }}" class="btn btn-primary">Sửa</a>
                                    @endif
                                    @if (Auth::user()->hasPermission('Product_view'))
                                    <a class="btn btn-success" href="{{ route('product.show',$team->id) }}"class="btn btn-primary">Chi tiết</a>
                                    @endif
                                    @if (Auth::user()->hasPermission('Product_delete'))
                                     <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có muốn xóa')">Xóa</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                   
                    

                </tbody>
            </table>
            {{$products->appends(request()->query())}}
        </div>
    </main>
@endsection