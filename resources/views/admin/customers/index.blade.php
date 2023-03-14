@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')

<main class="page-content">
        <h1 class="offset-4">Danh sách khách hàng</h1>
        <div class="container">
            <table class="table">
                <div class="col-6">
                    <form class="navbar-form navbar-left" action="{{route('customer.search')}}" method="GET">
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
                    </form>
                </div>
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Email</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Địa chỉ</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($customers as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->email }}</td>
                            <td>{{ $team->gender}}</td>
                            <td>{{ $team->phone }}</td>
                            <td>{{ $team->address }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$customers->appends(request()->query())}}
        </div>
    </main>
@endsection