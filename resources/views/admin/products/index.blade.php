@extends('admin.layouts.master')
@section('content')
<main class="page-content">
        <h1>Danh sách thể loại</h1>
        <div class="container">
            <table class="table">
                <div class="col-6">
                <a href="{{ route('product.create') }}" class="btn btn-primary">Thêm mới</a>
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
                            <td>{{ $team->amount }}</td>
                            <td>{{ $team->category->name }}</td>
                            <td>{{ $team->price }}</td>
                            <td><img width="90px" height="90px" src="{{ asset($team->image)}}" alt=""></td>

                            <td>
                                <form  action="{{ route('product.destroy', $team->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                     <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có muốn xóa')">Xóa</button>
                                    <a href="{{ route('product.edit', [$team->id]) }}" class="btn btn-primary">Sửa</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </main>
@endsection