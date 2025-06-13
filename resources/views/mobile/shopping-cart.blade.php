@extends('mobile.layouts.master')

@section('title', __('Padesar'))

@section('header')
   <!-- Header -->
   <header class="header">
        <div class="main-bar">
            <div class="container">
                <div class="header-content">
                    <div class="left-content">
                        <a href="{{route('frontend.index')}}" class="back-btn">
                            <svg height="512" viewBox="0 0 486.65 486.65" width="512"><path d="m202.114 444.648c-8.01-.114-15.65-3.388-21.257-9.11l-171.875-171.572c-11.907-11.81-11.986-31.037-.176-42.945.058-.059.117-.118.176-.176l171.876-171.571c12.738-10.909 31.908-9.426 42.817 3.313 9.736 11.369 9.736 28.136 0 39.504l-150.315 150.315 151.833 150.315c11.774 11.844 11.774 30.973 0 42.817-6.045 6.184-14.439 9.498-23.079 9.11z"/><path d="m456.283 272.773h-425.133c-16.771 0-30.367-13.596-30.367-30.367s13.596-30.367 30.367-30.367h425.133c16.771 0 30.367 13.596 30.367 30.367s-13.596 30.367-30.367 30.367z"/>
                            </svg>
                        </a>
                        <h5 class="title mb-0 text-nowrap">Shopping Cart</h5>
                    </div>
                    <div class="mid-content">
                    </div>
                    <div class="right-content">
                    </div>
                </div>
            </div>
        </div>
    </header>
<!-- Header End -->
@endsection
@section('content')
    <!-- Page Content -->
    <div class="page-content">
        <div class="container bottom-content shop-cart-wrapper">
            <div class="item-list style-2">
                <ul>
                    <li>
                        <div class="item-content">
                            <div class="item-media media media-60">
                                <img src="{{asset('mobile/assets/images/food/food9.png')}}" alt="logo">
                            </div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <h5 class="item-title sub-title"><a href="{{route('frontend.product_detail')}}">4Kg Cylinder</a></h5>
                                    <div class="item-subtitle text-soft">Gas Cylinder</div>
                                </div>
                                <div class="item-footer">
                                    <div class="d-flex align-items-center">
                                        <h6 class="me-2">MMK 10000</h6>
                                        <del class="off-text"><h6>MMK 12000</h6></del>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="dz-stepper border-1 rounded-stepper">
                                            <input readonly class="stepper" type="text" value="0" name="demo3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-media media media-60">
                                <img src="{{asset('mobile/assets/images/food/food10.png')}}" alt="logo">
                            </div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <h5 class="item-title sub-title"><a href="{{route('frontend.product_detail')}}">6Kg Cylinder</a></h5>
                                    <div class="item-subtitle text-soft">Gas Cylinder</div>
                                </div>
                                <div class="item-footer">
                                    <div class="d-flex align-items-center">
                                        <h6 class="me-2">MMK 15000</h6>
                                        <del class="off-text"><h6>MMK 15000</h6></del>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="dz-stepper border-1 rounded-stepper">
                                            <input readonly class="stepper" type="text" value="0" name="demo3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
        <div class="footer fixed ">
            <div class="container">
                <div class="view-title mb-2">
                    <ul>
                        <li>
                            <span class="text-soft">Subtotal</span>
                            <span class="text-soft">MMK 25000</span>
                        </li>
                        <li>
                            <span class="text-soft">TAX (5%)</span>
                            <span class="text-soft">-MMK 1250</span>
                        </li>
                        <li>
                            <h5>Total</h5>
                            <h5>MMK 26250</h5>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="promo-bx">
                                Apply Promotion Code
                                <span>0 Promos</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="footer-btn d-flex align-items-center">
                    <a href="{{route('frontend.checkout')}}" class="btn btn-primary flex-1">CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End-->
@endsection
@section('after-scripts-end')
<script src="{{ asset('mobile/assets/vendor/nouislider/nouislider.min.js')}}"></script>
<script src="{{ asset('mobile/assets/vendor/wnumb/wNumb.js')}}"></script>
<script src="{{ asset('mobile/assets/js/noui-slider.init.js')}}"></script>
<script>
    $(".stepper").TouchSpin();
</script>
@endsection
