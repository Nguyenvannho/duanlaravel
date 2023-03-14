@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')

<main class="page-content">
        <h1 class="offset-4">Danh sách thể loại</h1>
        <div class="container">
            <table class="table">
                <div class="col-6">
                    <form class="navbar-form navbar-left" action="{{route('category.search')}}" method="GET">
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
                    @if (Auth::user()->hasPermission('Category_create'))
                <a href="{{ route('category.create') }}" class="btn btn-primary">Thêm mới</a>
                @endif
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
                                    @if (Auth::user()->hasPermission('Category_update'))
                                    <a href="{{ route('category.edit', $team->id) }}" class="btn btn-primary">Sửa</a>
                                    @endif
                                     
                                    @if (Auth::user()->hasPermission('Category_delete'))
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Bạn có muốn xóa')">Xóa</button>
                                    @endif
                                    @method('DELETE')
                                    @csrf
                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{$categories->appends(request()->query())}}
        </div>
    </main>
@endsection