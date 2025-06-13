@extends('mobile.layouts.master')

@section('title', __('Padesar'))


@section('content')
 <!-- Page Content -->
 <div class="page-content">
    <!-- Banner -->
    <div class="banner-wrapper mb-0 py-3">
        <div class="container inner-wrapper">
            <a href="{{route('frontend.index')}}" class="side-menu-logo">
                <img src="{{asset('mobile/assets/images/svg/padesar-light-green-logo.png')}}" alt="/">
            </a>
        </div>
    </div>
    <!-- Banner End -->
    <div class="container">
        <div class="card dz-form-group">
            <div class="card-header">
                <h2 class="title">Change Password</h2>
                <p class="mb-0">Please enter your new password</p>
            </div>
            <div class="card-body">
                <div class="mb-3 input-group input-group-icon">
                    <div class="input-group-text">
                        <div class="input-icon">
                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 6H12V3C12 2.20435 11.6839 1.44129 11.1213 0.87868C10.5587 0.316071 9.79565 0 9 0H5C4.20435 0 3.44129 0.316071 2.87868 0.87868C2.31607 1.44129 2 2.20435 2 3V6H1C0.734784 6 0.48043 6.10536 0.292893 6.29289C0.105357 6.48043 0 6.73478 0 7V15C0 16.3261 0.526784 17.5979 1.46447 18.5355C2.40215 19.4732 3.67392 20 5 20H9C10.3261 20 11.5979 19.4732 12.5355 18.5355C13.4732 17.5979 14 16.3261 14 15V7C14 6.73478 13.8946 6.48043 13.7071 6.29289C13.5196 6.10536 13.2652 6 13 6ZM4 3C4 2.73478 4.10536 2.48043 4.29289 2.29289C4.48043 2.10536 4.73478 2 5 2H9C9.26522 2 9.51957 2.10536 9.70711 2.29289C9.89464 2.48043 10 2.73478 10 3V6H4V3ZM8 13.72V15C8 15.2652 7.89464 15.5196 7.70711 15.7071C7.51957 15.8946 7.26522 16 7 16C6.73478 16 6.48043 15.8946 6.29289 15.7071C6.10536 15.5196 6 15.2652 6 15V13.72C5.69772 13.5455 5.44638 13.2949 5.27095 12.9932C5.09552 12.6914 5.00211 12.349 5 12C5 11.4696 5.21071 10.9609 5.58579 10.5858C5.96086 10.2107 6.46957 10 7 10C7.53043 10 8.03914 10.2107 8.41421 10.5858C8.78929 10.9609 9 11.4696 9 12C8.99789 12.349 8.90448 12.6914 8.72905 12.9932C8.55362 13.2949 8.30228 13.5455 8 13.72Z" fill="#7D8FAB"/>
                            </svg>
                        </div>
                    </div>
                    <input type="password" class="form-control dz-password" placeholder="New Password">
                    <span class="input-group-text show-pass">
                        <i class="fa fa-eye-slash text-primary"></i>
                        <i class="fa fa-eye text-primary"></i>
                    </span>
                </div>
                <div class="mb-3 input-group input-group-icon">
                    <div class="input-group-text">
                        <div class="input-icon">
                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 6H12V3C12 2.20435 11.6839 1.44129 11.1213 0.87868C10.5587 0.316071 9.79565 0 9 0H5C4.20435 0 3.44129 0.316071 2.87868 0.87868C2.31607 1.44129 2 2.20435 2 3V6H1C0.734784 6 0.48043 6.10536 0.292893 6.29289C0.105357 6.48043 0 6.73478 0 7V15C0 16.3261 0.526784 17.5979 1.46447 18.5355C2.40215 19.4732 3.67392 20 5 20H9C10.3261 20 11.5979 19.4732 12.5355 18.5355C13.4732 17.5979 14 16.3261 14 15V7C14 6.73478 13.8946 6.48043 13.7071 6.29289C13.5196 6.10536 13.2652 6 13 6ZM4 3C4 2.73478 4.10536 2.48043 4.29289 2.29289C4.48043 2.10536 4.73478 2 5 2H9C9.26522 2 9.51957 2.10536 9.70711 2.29289C9.89464 2.48043 10 2.73478 10 3V6H4V3ZM8 13.72V15C8 15.2652 7.89464 15.5196 7.70711 15.7071C7.51957 15.8946 7.26522 16 7 16C6.73478 16 6.48043 15.8946 6.29289 15.7071C6.10536 15.5196 6 15.2652 6 15V13.72C5.69772 13.5455 5.44638 13.2949 5.27095 12.9932C5.09552 12.6914 5.00211 12.349 5 12C5 11.4696 5.21071 10.9609 5.58579 10.5858C5.96086 10.2107 6.46957 10 7 10C7.53043 10 8.03914 10.2107 8.41421 10.5858C8.78929 10.9609 9 11.4696 9 12C8.99789 12.349 8.90448 12.6914 8.72905 12.9932C8.55362 13.2949 8.30228 13.5455 8 13.72Z" fill="#7D8FAB"/>
                            </svg>
                        </div>
                    </div>
                    <input type="password" class="form-control dz-password" placeholder="Confirm Password">
                    <span class="input-group-text show-pass">
                        <i class="fa fa-eye-slash text-primary"></i>
                        <i class="fa fa-eye text-primary"></i>
                    </span>
                </div>
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <a href="{{route('frontend.auth.register')}}" class="text-light text-center d-block">Don’t have an account?</a>
                    <a href="{{route('frontend.auth.register')}}" class="btn-link d-block ms-2 text-underline">SignUp here</a>
                </div>
                <a href="{{route('frontend.auth.login')}}" class="btn btn-primary d-block">SUBMIT</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End -->
@endsection
