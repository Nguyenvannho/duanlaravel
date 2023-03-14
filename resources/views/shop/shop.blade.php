@extends('shop.masterShop')
@section('content')

<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản Phẩm</span></h2>
    <div class="row px-xl-5 pb-3">

        @foreach ( $product as $product )
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{ asset('public/uploads/product/'.$product->image) }}" alt="">
                    <div class="product-action">
                        {{-- <a href="{{ route('shop.showProduct' , $product->id) }}"><i class="tf-ion-ios-search-strong"></i></a> --}}
                        <a class="btn btn-outline-dark btn-square" href="{{route('shop.store',$product->id)}}" id="{{ $product->id }}"><i class="fa fa-shopping-cart"></i></a>
                        <a class="btn btn-outline-dark btn-square" href="{{ route('shop.showProduct' , $product->id) }}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div class="text-center py-4" style="font-family: Arial">
                    <p>Thể loại : {{ $product->category->name }}</p>
                    <a class="font-family" href="{{ route('shop.showProduct' , $product->id) }}" > {{ $product->name }}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5  class="text-muted ml-2">Giá : Vnd {{number_format($product->price) }} </h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small>(99)</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection