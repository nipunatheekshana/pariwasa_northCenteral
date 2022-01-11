@extends('layouts.auth')
@section('title','Company login')
@section('head')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

    <script src="{{ url('assets/js/custom/login.js') }}?random=<?php echo uniqid(); ?>"></script>
    <script>
        var user = "{{Auth::user()}}";
    </script>
@endsection
@section('content')


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" id="loginForm" name="New Form">
                <input type="hidden" name="post_id" value="2">
                <input type="hidden" name="form_id" value="f89da2a">
                <input type="hidden" name="queried_id" value="2">
                {{csrf_field()}}
                {{-- @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first()}}
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success mt-2">
                        {{ session()->get('message') }}
                    </div>
                @endif --}}
                <span class="login100-form-title p-b-43">
                    Login to Continue
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="email" name="email" id="form-field-email" autocomplete="off" onkeyup="this.setAttribute('value', this.value);">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" id="form-field-name" autocomplete="off" onkeyup="this.setAttribute('value', this.value);">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                    </div>

                    <div>
                        <a href="#" class="txt1">
                            Forgot Password?
                        </a>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button type="button" id="btnLogIn" class="login100-form-btn">
                        Login
                    </button>
                </div>
                @csrf
            </form>

            <div class="login100-more" style="background-image: url('{{asset('/assets/img/auth/images/bg-01.jpg')}}');">
            </div>
        </div>
    </div>
</div>
@endsection
