@extends('layouts.auth-header')
@section('title')Reset password @endsection
    @section('content')

        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(https://via.placeholder.com/800x950.png);"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">

                        <h2 class="fw-700 display1-size display2-md-size mb-3">Reset<br>your password</h2>

                            @if ($errors->any())

                                <div class="alert alert-danger" role="alert">
                                    <ul class="list-disc list-inside text-sm text-red-600">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <input id="email" class="block mt-1 w-full" type="hidden" name="email" value="{{ $request->email }}" required autofocus />

                                <div class="form-group icon-input mb-1">
                                    <input class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Password" type="password"
                                    name="password"
                                    required autocomplete="current-password">
                                    <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                                </div>

                                <div class="form-group icon-input mb-1">
                                    <input class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Confirm Password" type="password"
                                    name="password_confirmation"
                                    required>
                                    <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                                </div>

                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1">
                                    <button type="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Reset password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
