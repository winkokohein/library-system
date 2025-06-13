@extends('mobile.layouts.master')

@section('title', __('Padesar'))

@section('header')
   <!-- Header -->
	<header class="header transparent">
		<div class="main-bar">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="{{route('frontend.product')}}" class="back-btn">
							<svg height="512" viewBox="0 0 486.65 486.65" width="512"><path d="m202.114 444.648c-8.01-.114-15.65-3.388-21.257-9.11l-171.875-171.572c-11.907-11.81-11.986-31.037-.176-42.945.058-.059.117-.118.176-.176l171.876-171.571c12.738-10.909 31.908-9.426 42.817 3.313 9.736 11.369 9.736 28.136 0 39.504l-150.315 150.315 151.833 150.315c11.774 11.844 11.774 30.973 0 42.817-6.045 6.184-14.439 9.498-23.079 9.11z"/><path d="m456.283 272.773h-425.133c-16.771 0-30.367-13.596-30.367-30.367s13.596-30.367 30.367-30.367h425.133c16.771 0 30.367 13.596 30.367 30.367s-13.596 30.367-30.367 30.367z"/>
							</svg>
						</a>
						<h5 class="title mb-0 text-nowrap">Product Detail</h5>
					</div>
					<div class="mid-content">
					</div>
					<div class="right-content">
						<a href="javascript:void(0);" class="item-bookmark">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M16.785 2.04751C15.9489 2.04694 15.1209 2.21163 14.3486 2.53212C13.5764 2.85261 12.8751 3.32258 12.285 3.91501L12 4.18501L11.73 3.91501C11.1492 3.2681 10.4424 2.74652 9.65306 2.3822C8.86367 2.01787 8.00824 1.81847 7.13912 1.79618C6.27 1.7739 5.40547 1.9292 4.59845 2.25259C3.79143 2.57599 3.05889 3.06066 2.44566 3.67695C1.83243 4.29325 1.35142 5.02819 1.03206 5.83682C0.712696 6.64544 0.561704 7.51073 0.588323 8.37973C0.614942 9.24873 0.818613 10.1032 1.18687 10.8907C1.55513 11.6783 2.08022 12.3824 2.73002 12.96L12 22.2675L21.3075 12.96C22.2015 12.0677 22.8109 10.9304 23.0589 9.6919C23.3068 8.45338 23.1822 7.16915 22.7006 6.00144C22.2191 4.83373 21.4023 3.83492 20.3534 3.13118C19.3045 2.42744 18.0706 2.05034 16.8075 2.04751H16.785Z" fill="white"></path>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>
    <!-- Header End -->
@endsection
@section('content')
<!-- Header End -->
    <div class="page-content">
        <div class="content-body bottom-content">
            <div class="swiper-btn-center-lr1 my-0">
                <div class="swiper demo-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="dz-banner-heading">
                                <div class="overlay-black-light">
                                    <img src="{{asset('mobile/assets/images/eff/eff3.png')}}" class="bnr-img" alt="bg-image">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="dz-banner-heading">
                                <div class="overlay-black-light">
                                    <img src="{{asset('mobile/assets/images/eff/eff3.png')}}" class="bnr-img" alt="bg-image">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="dz-banner-heading">
                                <div class="overlay-black-light">
                                    <img src="{{asset('mobile/assets/images/eff/eff3.png')}}" class="bnr-img" alt="bg-image">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="dz-banner-heading">
                                <div class="overlay-black-light">
                                    <img src="{{asset('mobile/assets/images/eff/eff3.png')}}" class="bnr-img" alt="bg-image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-btn">
                        <div class="swiper-pagination style-2 flex-1"></div>
                    </div>
                </div>
            </div>
            <div class="account-box style-1">
                <div class="container">
                    <div class="company-detail">
                        <div class="detail-content">
                            <div class="flex-1">
                                <h6 class="text-secondary sub-title">Cylinder</h6>
                                <h4>4Kg Cylinder</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <ul class="item-inner">
                            <li>
                                <div class="reviews-info">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21.3899 11.6C21.6646 11.3192 21.8559 10.9676 21.9424 10.5845C22.029 10.2013 22.0073 9.80162 21.8799 9.43003C21.7604 9.05734 21.5386 8.7257 21.2398 8.47289C20.941 8.22007 20.5773 8.05623 20.1899 8.00003L15.8999 7.34003C15.8799 7.33423 15.8615 7.32404 15.8459 7.3102C15.8303 7.29636 15.818 7.27922 15.8099 7.26003L13.9299 3.26003C13.7651 2.88547 13.4949 2.56693 13.1522 2.34321C12.8095 2.1195 12.4092 2.00026 11.9999 2.00003C11.5954 1.99835 11.1991 2.11354 10.8585 2.33174C10.5179 2.54994 10.2475 2.86187 10.0799 3.23003L8.19994 7.23003C8.18968 7.24953 8.1755 7.2667 8.15829 7.28047C8.14108 7.29423 8.12122 7.3043 8.09994 7.31003L3.81994 8.00003C3.43203 8.05782 3.06776 8.22207 2.76764 8.47453C2.46751 8.72699 2.2433 9.05775 2.11994 9.43003C1.99723 9.80291 1.97896 10.2023 2.0671 10.5848C2.15524 10.9673 2.34643 11.3184 2.61994 11.6L5.77994 14.85C5.78903 14.8705 5.79373 14.8926 5.79373 14.915C5.79373 14.9374 5.78903 14.9596 5.77994 14.98L5.03994 19.52C4.97114 19.9154 5.01599 20.3222 5.16926 20.6931C5.32253 21.064 5.57794 21.3838 5.90577 21.6152C6.23361 21.8467 6.62042 21.9804 7.02122 22.0007C7.42203 22.021 7.82037 21.9272 8.16994 21.73L11.8999 19.66C11.9185 19.6504 11.939 19.6453 11.9599 19.6453C11.9808 19.6453 12.0014 19.6504 12.0199 19.66L15.7499 21.73C16.1 21.9229 16.4972 22.0135 16.8963 21.9913C17.2953 21.9691 17.6801 21.8351 18.0065 21.6045C18.333 21.374 18.5881 21.0563 18.7425 20.6877C18.897 20.3191 18.9446 19.9144 18.8799 19.52L18.1899 15C18.1794 14.9818 18.1739 14.9611 18.1739 14.94C18.1739 14.919 18.1794 14.8983 18.1899 14.88L21.3899 11.6Z" fill="#FFA902"/>
                                    </svg>
                                    <h6 class="reviews">4.6 (89 reviews)</h6>
                                </div>
                            </li>
                            <li>
                                <a class="d-flex delivery" href="javascript:void(0);">
                                    <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.415 5H15.81V2.51C15.7935 1.39475 14.8853 0.5 13.77 0.5H2.79C1.67475 0.5 0.7665 1.39475 0.75 2.51V11.99C0.7665 13.1052 1.67475 14 2.79 14H5.415C5.83875 15.1678 7.1295 15.7715 8.298 15.347C8.92425 15.1198 9.41775 14.6263 9.645 14H16.335C16.7588 15.1678 18.0495 15.7715 19.218 15.347C19.8442 15.1198 20.3377 14.6263 20.565 14H21.525C22.4775 14 23.25 13.2275 23.25 12.275V10.865C23.2628 7.6385 20.6565 5.01275 17.43 5C17.4247 5 17.4202 5 17.415 5ZM7.5 9.17C7.35975 9.28625 7.19175 9.36425 7.0125 9.395C6.63525 9.46475 6.249 9.3275 6 9.035L5.175 8C4.914 7.6895 4.947 7.2275 5.25 6.9575C5.568 6.692 6.04125 6.7355 6.306 7.0535L6.3075 7.055L6.8775 7.73L9.8775 5.2625C10.1798 4.97975 10.6545 4.9955 10.9373 5.29775C11.22 5.6 11.2043 6.07475 10.902 6.3575C10.8795 6.3785 10.8555 6.39875 10.83 6.41675L7.5 9.17ZM7.5 14C7.086 14 6.75 13.664 6.75 13.25C6.75 12.836 7.086 12.5 7.5 12.5C7.914 12.5 8.25 12.836 8.25 13.25C8.25 13.664 7.914 14 7.5 14ZM18.45 14C18.036 14 17.7 13.664 17.7 13.25C17.7 12.836 18.036 12.5 18.45 12.5C18.864 12.5 19.2 12.836 19.2 13.25C19.2 13.664 18.864 14 18.45 14ZM16.3275 12.5H15.81V6.5H17.415C19.809 6.5 21.75 8.441 21.75 10.835V10.865V12.275C21.7545 12.395 21.66 12.4955 21.54 12.5C21.5347 12.5 21.5295 12.5 21.525 12.5H20.5725C20.2358 11.6322 19.4048 11.0533 18.4792 11.0413C17.5335 11.0293 16.6718 11.612 16.3275 12.5Z" fill="var(--primary)"/>
                                    </svg>
                                    <h6 class="mb-0 ms-2">FREE DELIVERY</h6>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="item-list-2">
                        <div class="price">
                            <span class="text-style text-soft">Price</span>
                            <h3 class="sub-title">MMK 25000 <del>MMK 20000</del></h3>
                        </div>
                        <div class="dz-stepper border-1 rounded-stepper">
                            <input readonly class="stepper" type="text" value="0" name="demo3">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="badge bg-accent badge-lg badge-warning font-w400 px-3">20% OFF DISCOUNT</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <div class="footer fixed">
            <div class="container">
                <a href="#" class="btn btn-primary text-start w-100">
                    <svg class="cart me-4" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.1776 17.8443C16.6362 17.8428 15.3854 19.0912 15.3839 20.6326C15.3824 22.1739 16.6308 23.4247 18.1722 23.4262C19.7136 23.4277 20.9643 22.1794 20.9658 20.638C20.9658 20.6371 20.9658 20.6362 20.9658 20.6353C20.9644 19.0955 19.7173 17.8473 18.1776 17.8443Z" fill="white"/>
                        <path d="M23.1278 4.47973C23.061 4.4668 22.9932 4.46023 22.9251 4.46012H5.93181L5.66267 2.65958C5.49499 1.46381 4.47216 0.574129 3.26466 0.573761H1.07655C0.481978 0.573761 0 1.05574 0 1.65031C0 2.24489 0.481978 2.72686 1.07655 2.72686H3.26734C3.40423 2.72586 3.52008 2.82779 3.53648 2.96373L5.19436 14.3267C5.42166 15.7706 6.66363 16.8358 8.12528 16.8405H19.3241C20.7313 16.8423 21.9454 15.8533 22.2281 14.4747L23.9802 5.74121C24.0931 5.15746 23.7115 4.59269 23.1278 4.47973Z" fill="white"/>
                        <path d="M11.3404 20.5158C11.2749 19.0196 10.0401 17.8418 8.54244 17.847C7.0023 17.9092 5.80422 19.2082 5.86645 20.7484C5.92617 22.2262 7.1283 23.4008 8.60704 23.4262H8.67432C10.2142 23.3587 11.4079 22.0557 11.3404 20.5158Z" fill="white"/>
                    </svg>
                    ADD TO CART
                </a>
            </div>
        </div>
    </div>
<!-- Page Content End -->
@endsection
@section('after-scripts-end')
<script>
    $(".stepper").TouchSpin();
</script>
@endsection
