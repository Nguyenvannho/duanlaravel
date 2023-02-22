@extends('admin.layouts.master')
@section('content')
<main class="page-content">
        <h1>Danh sách thể loại</h1>
        <div class="container">
            <table class="table">
                <div class="col-6">
                <a href="{{ route('category.edit') }}" class="btn btn-primary">Thêm mới</a>
                    </form>
                </div>
                <thead>
                    <tr>
                        <th scope="col">Số thứ tự</th>
                        <th scope="col">Tên</th>
                        <th adta-breakpoints="xs">Quản lí</th>
                    </tr>
                </thead>
                <tbody id="myTable">

                    @foreach ($categories as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>
                                <form  action="{{ route('category.destroy', $team->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                     <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có muốn xóa')">Xóa</button>
                                    <a href="{{ route('category.edit', [$team->id]) }}" class="btn btn-primary">Sửa</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </main>
@endsection