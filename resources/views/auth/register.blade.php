@extends('layouts.auth-header')
@section('title')Register @endsection
    @section('content')
        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(https://via.placeholder.com/800x950.png);"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Create <br>your account</h2>
                        @if ($errors->any())

                            <div class="alert alert-danger" role="alert">
                                <ul class="list-disc list-inside text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                <input type="text" name="name" required class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input type="text" name="email" required class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Email Address" value="{{ old('email') }}">
                            </div>
                            <div class="form-group icon-input mb-3">
                                <input type="password" required autocomplete="new-password" name="password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Password">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>
                            {{-- <div class="form-group icon-input mb-1">
                                <input  type="password"
                                name="password_confirmation" required class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Confirm Password">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div> --}}
                            <div class="form-group icon-input mb-3">
                                <input type="date" name="dob" placeholder="Select date" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" required>

                            </div>
                            <div class="form-group icon-input mb-3 text-red-700">
                                <select name="gender" class="style2-input ps-5 form-control text-red-700 font-xss ls-3" required>
                                    <option disabled selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>

                            </div>
                            <div class="form-group icon-input mb-3 text-red-700" required>
                                <select name="city" class="style2-input ps-5 form-control text-red-700 font-xss ls-3">
                                    <option disabled selected>Select city</option>
                                    <option value="Noida">Noida</option>
                                    <option value="Delhi">Delhi</option>
                                </select>

                            </div>

                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1">
                                    <button type="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Register</button>
                            </div>

                        </form>
                        <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have account <a href="{{ route('login') }}" class="fw-700 ms-1">Login</a></h6>

                    </div>
                </div>
            </div>
        </div>
 @endsection
