@extends('admin.layouts.master')
@section('content')
<table class="table" style="text-align: center;" >
    <h1 style="text-align: center; color: black;">Thùng rác</h1>
    <thead>
        <tr>
            <th scope="col">Số thứ tự</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thể loại</th>
            <th scope="col">Giá tiền</th>
            <th scope="col">Ảnh</th>
            <th adta-breakpoints="xs">Quản lí</th>

    </thead>
    <tbody>
        @foreach($softs as $key => $soft)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $soft->name }}</td>
            <td>{{ $soft->amount }}</td>
            <td>{{ $soft->category->name }}</td>
            <td>{{number_format( $soft->price).' VND'}}</td>
            <td>
                <img src="{{ asset($soft->image)}}" alt="" width="90px" height="90px">
            </td>
            <td>
                <a href="{{route('product.restore',[$soft->id])}}" class="btn btn-warning">Khôi phục</a>
                <a href="{{route('product.deleteforever',[$soft->id])}}" onclick="return confirm('Bạn có chắc chắn xóa vĩnh viễn không?');" class="btn btn-secondary">Xóa vĩnh viễn</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>
<a href="{{ route('product.index') }}" class="btn btn-info">Trở lại</a> <br>
@endsection