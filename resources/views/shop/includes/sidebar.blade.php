<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
            
        </div>
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span></h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="index.html" class="nav-item nav-link active"></a>
                        <a href="shop.html" class="nav-item nav-link"></a>
                        <a href="detail.html" class="nav-item nav-link"></a>
                        {{-- <div class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown"></a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="cart.html" class="dropdown-item"></a>
                                <a href="checkout.html" class="dropdown-item"></a>
                            </div>
                        </div> --}}
                        <a href="contact.html" class="nav-item nav-link"></a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        
                        @if (isset(Auth()->guard('customers')->user()->name))
                        Chào &nbsp{{ Auth()->guard('customers')->user()->name }}&nbsp &nbsp
                        
                        <form method="POST" action="{{ route('shop.logout') }}">
                                @csrf
                        <a href="#"onclick="event.preventDefault();
                                this.closest('form').submit();"
                            class="header-cart-link icon button circle is-outline is-small">Đăng xuất</a>
                        </form>
            @else
                <a href="{{ route('shop.login') }}" title="Đăng nhập"
                    class="header-cart-link icon button circle is-outline is-small">
                   <h4 class="btn-btn bg-primary">Đăng nhập</h4>
                </a> 
               
            @endif

                    </div>
                </div>
            </nav>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" >
                    <div class="offset-4"></div>
                    <div class="carousel-item active" style="height: 500px;">
                        <img class="img-fluid" src="{{asset('shop/img/hihi.jpg')}}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">GIẢM 10%  ĐƠN HÀNG ĐẦU TIÊN </h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Uy tín làm nên thương hiệu</h3>
                                <a href="" class="btn btn-light py-2 px-3">Mua Ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 500px;">
                        <img class="img-fluid" src="{{asset('shop/img/hehe1.jpg')}}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">GIẢM 10% ĐƠN HÀNG ĐẦU TIÊN</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Thiên đường thời trang</h3>
                                <a href="" class="btn btn-light py-2 px-3">Mua Ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 500px;">
                        <img class="img-fluid" src="{{asset('shop/img/kaka.jpg')}}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">GIẢM 10% ĐƠN HÀNG ĐẦU TIÊN</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Thời trang đánh bay thời tiết</h3>
                                <a href="" class="btn btn-light py-2 px-3">Mua Ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>