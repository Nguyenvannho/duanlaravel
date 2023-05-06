@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<main class="page-content">

    <section class="wrapper">
        <div class="panel-panel-default">
            <div class="market-updates">
                <div class="container">
                    <div class="page-inner">
                        <header class="page-title-bar">
                            <nav aria-label="breadcrumb">
                                <a href="{{ route('user.index') }}" class="w3-button w3-red">Quay Lại</a>
                            </nav>
                            <h1 class="page-title">Thay đổi thông tin</h1>
                        </header>
                        <div class="page-section">
                            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <legend>Thông tin cơ bản</legend>
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="tf1">Email<abbr name="Trường bắt buộc">*</abbr></label>
                                                    <input name="email" type="text" class="form-control"
                                                        value="{{ $user->email }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('email')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="tf1">Mật Khẩu<abbr
                                                            name="Trường bắt buộc">*</abbr></label>
                                                    <input name="password" type="password" class="form-control"
                                                        value="{{ $user->password }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('password')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <br>
                                                </div>
                                            </div> --}}
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tf1">Họ Và Tên<abbr
                                                            name="Trường bắt buộc">*</abbr></label>
                                                    <input name="name" type="text" class="form-control"
                                                        value="{{ $user->name }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('name')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tf1">Số Điện Thoại<abbr
                                                            name="Trường bắt buộc">*</abbr></label> <input name="phone"
                                                        type="number" class="form-control" value="{{ $user->phone }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('phone')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tf1">Ngày sinh<abbr
                                                            name="Trường bắt buộc">*</abbr></label> <input name="birthday"
                                                        type="date" class="form-control" value="{{ $user->birthday }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('birthday')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label class="control-label" for="flatpickr01">Chức Vụ<abbr
                                                        name="Trường bắt buộc">*</abbr></label>
                                                <select name="group_id" id="" class="form-control">
                                                    <option value="">--Vui lòng chọn--</option>
                                                    {{-- @foreach ($groups as $group)
                                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                    @endforeach --}}
                                                    @foreach ($groups as $group)
                                                    <option
                                                        <?= $group->id == $user->group_id ? 'selected' : '' ?>
                                                        value="{{ $group->id }}">
                                                        {{ $group->name }}</option>
                                                @endforeach
                                                </select>
                                                    <p style="color:red">{{ $errors->first('group_id') }}</p>
                                               
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label class="control-label" for="flatpickr01">Giới Tính<abbr
                                                        name="Trường bắt buộc">*</abbr></label>
                                                <select name="gender" id="" value="{{ $user->gender }}" class="form-control">
                                              
                                                    <option value="Nam" {{ $user->gender == 'Nam' ? 'selected' : ' '}}>Nam</option>
                                                    <option value="Nữ" {{ $user->gender == 'Nữ' ? 'selected' : ' '}}>Nữ</option>
                                                    <option value="Khác" {{ $user->gender == 'Khác' ? 'selected' : ' '}}>Khác</option>
                                                </select>
                                                @if ('gender')
                                                    <p style="color:red">{{ $errors->first('gender') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group has-warning">
                                                <label class="col-lg-3 control-label">image</label>
                                                <div class="col-lg-4">
                                                    <input accept="image/*" type='file' value="{{ $user->image }}" id="inputFile" name="image" /><br>
                                                    <img type="hidden" width="90px" height="90px" id="blah1"
                                                    src="{{ asset('public/assets/images/user/' . $user->image) ?? asset('public/assets/images/user/' . $request->image) }}"
                                                    alt="" />
                                                @if ('image')
                                                    <p style="color:red">{{ $errors->first('image') }}</p>
                                                @endif
                                                        <br>
                                                </div>
                                            </div>

                                            {{-- địa chỉ --}}
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="tf1">Địa chỉ<abbr
                                                            name="Trường bắt buộc">*</abbr></label> <input name="address"
                                                        type="text" class="form-control" value="{{ $user->address }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('address')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <br><br><br><br>
                                            <button class="btn btn-success" type="submit">Lưu thay đổi</button>
                                            <a class="btn btn-danger" href="{{ route('user.index') }}">Hủy bỏ</a>
                                            
                                            
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection