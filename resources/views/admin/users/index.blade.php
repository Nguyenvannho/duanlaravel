@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')

<style>
    img#avt {
width: 80px;
height: 80px;
border-radius:50%;
-moz-border-radius:50%;
-webkit-border-radius:50%;
}
</style>
<main class="page-content">

<section class="wrapper">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel-panel-default">
                    <header class="page-title-bar">
                        <h1 class="offset-4">Nhân sự</h1>
                        @if(Auth::user()->hasPermission('User_create'))
                        <a href="{{ route('user.create') }}" class="btn btn-info">Đăng ký tài khoản nhân sự</a>
                        @endif
                    </header>
                    <hr>
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
                                    <th data-breakpoints="xs">STT</th>
                                    <th>Avatar</th>
                                    <th>Tên</th>
                                    <th>Phone</th>
                                    <th>Chức vụ</th>
                                    <th data-breakpoints="xs">Tùy Chỉnh</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($users as $key => $user)
                                    <tr data-expanded="true" class="item-{{ $user->id }}">
                                        <td>{{  ++$key }}</td>
                                        <td><a href=""><img id="avt" src="{{asset($user->image)}}" alt=""></a></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->group->name }}</td>
                                        <td>
                                            @if (Auth::user()->hasPermission('User_update'))
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-warning">Sửa</a>
                                            @endif    
                                            @if (Auth::user()->hasPermission('User_forceDelete'))
                                            <a data-href="{{ route('user.destroy', $user->id) }}" id="{{ $user->id }}" class="btn btn-info delete-button">Xóa</a>

                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).on('click', '.delete-button', function(e) {
                e.preventDefault();
                
                let id = $(this).attr('id');
                let href = $(this).data('href');
                let csrf = '{{ csrf_token() }}';
        
                Swal.fire({
                    title: 'Bạn có chắc không?',
                    text: "Bạn sẽ không thể hoàn nguyên điều này!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có, xóa!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: href,
                            method: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: csrf
                            },
                            success: function(res) {
                                Swal.fire(
                                    'Xóa Thành Công',
                                    'Tệp của bạn đã bị xóa!',
                                    'success'
                                )
                                $('.item-' + id).remove();
                            }
                        }).done(function() {
                            // Xử lý sau khi xóa thành công (nếu cần)
                        }).fail(function() {
                            // Xử lý khi xóa thất bại (nếu cần)
                        });
                    }
                });
            });
        </script>
        
        @endsection