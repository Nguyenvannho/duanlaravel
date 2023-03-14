@extends('shop.layouts.master')
@section('content')

@include('sweetalert::alert')
<style>
    .highlighted-content h4{
  color: red;
}
h3 {
    color:red;
}
h5 {
    color: rgb(0, 0, 0);
    text-decoration: underline;
}


</style>
    <table>
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Địa chỉ
                            Giao hàng</span></h5>
                    <form class="checkout-form" method="POST" action="{{ route('order') }}">
                        @csrf
                        @if (isset(Auth()->guard('customers')->user()->name))
                            <div class="bg-light p-30">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Họ và tên</label>
                                        <input name="name" class="form-control" type="text" placeholder="John"
                                            value="{{ Auth()->guard('customers')->user()->name }}" id="full_name"
                                            >
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Email</label>
                                        <input name="email" class="form-control" type="text"
                                            placeholder="example@email.com"
                                            value="{{ Auth()->guard('customers')->user()->email }}" id="user_city">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Số điện thoại</label>
                                        <input name="phone" class="form-control" type="text" placeholder="+123 456 789"
                                            value="{{ Auth()->guard('customers')->user()->phone }}" id="user_post_code">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Địa chỉ </label>
                                        <input name="address" class="form-control" type="text" placeholder="123 Street"
                                            value="{{ Auth()->guard('customers')->user()->address }}" id="user_address"
                                            >
                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Đặt
                                        hàng</button>
                                @else
                                    <h3>Vui lòng đăng nhập trước khi thanh toán!</h3>
                                    <a href="{{ route('shop.login') }}" class="btn btn-danger">Đăng Nhập</a>
                        @endif
                        @php

                            $totalAll = 0;

                        @endphp

                        <div class="block">

                            <h3 class="widget-title">Tóm Tắt: </h3>
                            <div class="bg-light p-30 mb-5">
                                <div class="border-bottom">
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            @php
                                                $total = $details['price'] * $details['quantity'];
                                                $totalAll += $total;

                                            @endphp
                                            <div>
                                                <h5 class="mb-3">Sản phẩm :</h5>
                                                <div class="d-flex justify-content-between">
                                                    <h4> <p> <input type="hidden" value="{{ $id }}" name="product_id[]"> {{ $details['nameVi'] ?? '' }} x <input type="hidden" value="{{ $id }}" name="quantity[]"> {{ $details['quantity'] ?? '' }}</p></h4>


                                                    <input type="hidden" value="{{ $total }}" name="total[]">{{ $details['total'] ?? '' }}

                                                </div>
                                            </div>
                                            </div>
                                            <div class="pt-2">
                                                <div class="d-flex justify-content-between mt-2">
                                                    <h5>Tổng tiền :</h5>
                                                    <h5>{{ number_format($total) }} VNĐ </h5>
                                                </div>
                                            </div>
                                            <h5>Thuế VAT: 10%</h5>
                                </div>
                                <div class="discount-code">
                                    @endforeach
                                    @endif
                                    <div class="pt-2">
                                        <div class="d-flex justify-content-between mt-2">
                                            <h5>Số tiền cần thanh toán : {{ number_format($totalAll) }} VNĐ </h5>
                                        </div>
                                        <div class="highlighted-content">
                                            <h4>Cảm ơn bạn đã mua hàng tại cửa hàng của chúng tôi. Chúc bạn có một ngày tốt lành!</h4>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </table>
@endsection