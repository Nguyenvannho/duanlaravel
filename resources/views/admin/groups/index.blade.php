@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')

<main class="page-content">
    <div class="container">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel-panel-default">
                <header class="page-title-bar">

                </header>
                <hr>
                <div class="panel-heading">
                    <h2 class="offset-4">Danh Sách Nhóm Nhân Viên</h2>
                </div>
                <nav aria-label="breadcrumb">
                    @if (Auth::user()->hasPermission('Group_create'))
                     <a href="{{ route('group.create') }}" class="btn btn-success">Tạo nhóm nhân viên</a>
                    @endif
                     
                </nav>
                <div>
                    <table class="table" ui-jq="footable"
                        ui-options='{
                "paging": {
                "enabled": true
                },
                "filtering": {
                "enabled": true
                },
                "sorting": {
                "enabled": true
                }}'>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Người đảm nhận</th>
                                <th data-breakpoints="xs">Tùy Chỉnh</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($groups as $key => $group)
                                <tr data-expanded="true" class="item-{{ $group->id }}">
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $group->name }} </td>
                                    <td>Hiện có {{ count($group->users) }} người</td>
                                    <td>
                                        <form action="{{ route('group.destroy', $group->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            @if (Auth::user()->hasPermission('Group_update'))
                                            <a class="btn btn-primary " href="{{route('group.detail', $group->id)}}">Cấp Quyền</a>
                                            @endif
                                            @if (Auth::user()->hasPermission('Group_edit'))
                                            <a href="{{ route('group.edit', $group->id) }}"
                                                class="btn btn-warning">Sửa</a>
                                            @endif
                                            @if (Auth::user()->hasPermission('Group_edit'))

                                                <a href="{{ route('group.destroy', $group->id) }}"
                                                    id="{{ $group->id }}" class="btn btn-danger sm deleteIcon">Xóa</a>
                                                    @endif
                                            
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $groups->appends(request()->query()) }}
                </div>
            </div>
    </section>
    </div>
</main>
@endsection