@extends('layouts.auth-header')
@section('title')Verify email @endsection
    @section('content')

        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(https://via.placeholder.com/800x950.png);"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-3">Verify <br>your account</h2>
                        <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                          <!-- Session Status -->
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600" style="color:green">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1">
                                    <button type="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Resend verification link</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="mb-0 d-inline-block bg-white fw-500 font-xsss text-grey-500 mb-3">Or, wants to logout </h6>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1">
                                    <button type="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Logout</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
   @endsection
