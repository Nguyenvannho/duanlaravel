@extends('admin.layouts.master')
@section('content')
    <style>
        img#avtshow {
            border: 3px solid rgb(150, 0, 0);
            padding: 10px;
            height: 250px;
            width: 250px;
            border-radius: 50%;

        }
    </style>
    <div class="card">
        <div class="card-body">
            <br>
            <h4 class="offset-4">
                Thông tin chi tiết
            </h4>
            <div class="row">
                <div class="col-sm-3">
                    <div class="gallery-grid">
                        <br>
                        <a class="example-image-link" href="{{ asset('storage/images/' . $user->image) }}" data-lightbox="example-set"
                        data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
                        <img src="{{asset(Auth()->user()->image)}}" id="avtshow">
                        <div class="captn">
                            {{-- <h4>Xem Avt</h4> --}}
                            </div>
                        </a>
                    </div>
                    <div class="panel-body">
                        <hr>
                        <h5 style="color: red">{{ $user->name }}</h5>
                        <ul class="nav nav-pills nav-stacked labels-info ">
                            <li>
                                <h6>{{ $user->group->name }}</h6>
                            </li>
                        </ul>
                        <hr>
                        <a href="{{ route('user.index') }}" class="btn btn-primary">Quay Lại</a>
                    </div>
                    <!-- <div class="text-center">
                        <a class="btn mini btn-default" href="#">
                            <i class="fa fa-cog"> Mật Khẩu </i>
                        </a>
                        <a class="btn mini btn-default" href="#">
                            <i class="fa fa-cog">Mật khẩu*</i>
                        </a>
                    </div> -->
                </div>
                
                <div class="col-sm-9">
                    
                    
                    
                    
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        
                                <p class="text-success"><i class="fa fa-check" aria-hidden="true"></i>
                                    {{ Session::get('success') }}
                                </p>
                          
                                <p class="text-danger"><i class="bi bi-x-circle"></i>
                                    {{ Session::get('error') }}
                                </p>
                        
                            <div class="row">
                                <div class="col-sm-3">
                                    <p>Họ Tên:</p>
                                </div>
                                <div class="col-sm-9">
                                    <b>{{ $user->name }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p>Email:</p>
                                </div>
                                <div class="col-sm-9">
                                    <b>{{ $user->email }}</b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p>Số Điện Thoại:</p>
                                </div>
                                <div class="col-sm-9">
                                    <b>{{ $user->phone }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p>Giới Tính:</p>
                                </div>
                                <div class="col-sm-9">
                                    <b>{{ $user->gender }}</b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p>Ngày Sinh:</p>
                                </div>
                                <div class="col-sm-9">
                                    <b>{{ $user->birthday }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p>Địa chỉ:</p>
                                </div>
                                <div class="col-sm-9">
                                    <b>{{ $user->address }}</b>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content pt-2">
                        <div class="tab-pane profile-edit" id="profile-edit">
                                <p class="text-success"><i class="fa fa-check" aria-hidden="true"></i>
                                </p>
                                <p class="text-danger"><i class="bi bi-x-circle"></i>
                                </p>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Mã số {{ $user->group->name }}</h5>
                                </div>
                                <div class="col-sm-9">
                                    <h3>#0068{{ $user->id }}</h3>
                                </div>
                            </div>
                            <hr>

                            <!-- <div class="row">
                                <div class="col-sm-3">
                                    <h5>Gia nhập TPNShop</h3>
                                </div>
                                <div class="col-sm-9">
                                    <small id="" class="form-text text-muted">Năm-Tháng-Ngày Giờ-Phút-Giây</small>
                                    <h3>{{ $user->created_at }}</h3>
                                </div>
                                <hr>
                            </div> -->
                        </div>
                    </div>
                    {{-- ================================ --}}

                  

                </div>
            </div>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
           
        </script>
        @endsection