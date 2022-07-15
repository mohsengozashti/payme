@extends('layouts.auth')

@section('content')
    <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid"
             style="background-image: url({{asset('assets/media/bg/bg-2.jpg')}});">
            <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                <!--begin::Login Header-->
                <div class="d-flex flex-center mb-15">
                    <a href="#">
                        <img src="{{asset('assets/media/svg/flags/004-indonesia.svg')}}" class="max-h-75px" alt=""/>
                    </a>
                </div>
                <!--end::Login Header-->
                <!--begin::Login Sign in form-->
                <div class="login-signin">
                    <div class="mb-20">
                        <h3 class="opacity-40 font-weight-normal">Thailand Administration Dashboard</h3>
                        <p class="opacity-40">Enter your details to login to your account:</p>
                    </div>
                    <form class="form" action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8"
                                   type="text" placeholder="username" name="username" autocomplete="off"/>
                            @error('username')
                            <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8"
                                   type="password" placeholder="Password" name="password"/>
                            @error('password')
                            <p class="text-danger mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div
                            class="form-group d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                                    <input type="checkbox" name="remember"/>
                                    <span></span>Remember me</label>
                            </div>
                        </div>
                        <div class="form-group text-center mt-10">
                            <button type="submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
                <!--end::Login Sign in form-->
            </div>
        </div>
    </div>
@endsection

