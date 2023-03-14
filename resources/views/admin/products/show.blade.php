@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<main id="main" class="main">
    <div class="pagetitle">
        <h1 class="offset-4">Chi tiết sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('product.index')}}">Trang sản phẩm </a></li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="d-flex flex-column justify-content-center">
                        <div style=" margin-top: 24px;" class="main_image"> <img src="{{ asset($productshow->image)}}" id="main_product_image" height="300" width="412">
                        </div><br>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 right-side">
                        <div class="product-info-tabs">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Tên: </td>
                                                <td>{{ $productshow->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Trạng thái: </td>
                                                <td>{{ $productshow->status == 0 ? ' Hoạt động' : 'Không hoạt động' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nổi bật hay không: </td>
                                                <td>{{ $productshow->status == 0 ? 'Nổi bật ' : 'Không nổi bật' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Thể loại: </td>
                                                <td>{{ $productshow->category->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Số lượng: </td>
                                                <td>{{ $productshow->quantity}} Chiếc</td>
                                            </tr>
                                            <tr>
                                                <td>Giá tiền: </td>
                                                <td>{{ number_format($productshow->price)}} VND</td>
                                            </tr>
                                            <tr>
                                                <td>Mô tả: </td>
                                                <td>{{ $productshow->description}}</td>
                                            </tr>
                                            <tr>
                                                <td>Ngày thêm: </td>
                                                <td>{{ $productshow->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td>Ngày sửa: </td>
                                                <td>{{ $productshow->updated_at}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection