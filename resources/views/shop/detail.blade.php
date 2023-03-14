@extends('shop.layouts.master')
@section('content')
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
                        <img class="w-100 h-100" src="{{asset($product->image)}}" alt="Image">
        </div>
        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">Tên sản phẩm:<br>
            <?php echo ($product['name']);?></h3>
            <h3 class="font-weight-semi-bold mb-4">Giá tiền: <br>
                <?php echo number_format($product['price']);?> VNĐ</h3>
            <h2 class="mb-4"><h2>Mô tả:</h2><?php echo ($product['description']);?></h2>
                    
            <div class="d-flex align-items-center mb-4 pt-2">
             
                <button id="noluon" class="btn btn-green px-3" >
                    <a class="fa fa-shopping-cart mr-1" href="{{route('shop.store',$product->id)}}"id="{{$product->id}}">Thêm vào giỏ hàng</a></button> 
            </div>
            
</div>
</div>
@endsection