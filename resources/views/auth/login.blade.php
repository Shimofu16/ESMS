<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />

    {{-- Title Section --}}
    <title>{{ config('app.name') }} | Login</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $page_description ?? '')" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('media/logos/capellan_logo.png') }}" />

    {{-- Fonts --}}
    {{ Metronic::getGoogleFontsInclude() }}

    {{-- Global Theme Styles (used by all pages) --}}
    @foreach (config('layout.resources.css') as $style)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}"
            rel="stylesheet" type="text/css" />
    @endforeach

    {{-- Layout Themes (used by all pages) --}}
    @foreach (Metronic::initThemes() as $theme)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}"
            rel="stylesheet" type="text/css" />
    @endforeach

    {{-- Includable CSS --}}
    @yield('styles')

</head>
<!--end::Head-->

<!--begin::Body-->

<body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white"
            id="kt_login">
            <!--begin::Aside-->
            <div
                class="login-aside order-2 order-lg-1 d-flex flex-column-fluid flex-lg-row-auto bgi-size-cover bgi-no-repeat p-7 p-lg-10 border border-secondary">
                <!--begin: Aside Container-->
                <div class="d-flex flex-row-fluid flex-column justify-content-between">
                    <!--begin::Aside body-->
                    <div class="d-flex flex-column-fluid flex-column flex-center mt-5 mt-lg-0">
                        <a href="#" class="mb-15 text-center">
                            <img src="{{ asset('media/logos/capellan_logo.png') }}" class="max-h-75px" alt="" />
                        </a>

                        <!--begin::Signin-->
                        <div class="login-form login-signin">
                            <div class="text-center mb-10 mb-lg-20">
                                <h2 class="font-weight-bold">Sign In</h2>
                                <p class="text-muted font-weight-bold">Enter your username and password</p>
                            </div>

                            <form method="POST" action="{{ route('login') }}" class="form" novalidate="novalidate">
                                @csrf
                                <!--begin::Form-->
                                <div class="form-group py-3 m-0">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text"
                                        placeholder="Username" name="username" value="{{ old('username') }}"
                                        autocomplete="off" />
                                    {{-- <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus> --}}

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group py-3 border-top m-0 d-flex align-items-center">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password"
                                        placeholder="Password" name="password" id="password">
                                    <i class="fas fa-eye ml-2 text-muted" id="togglePassword"></i>
                                </div>


                                {{-- <div
                                    class="form-group d-flex flex-wrap justify-content-between align-items-center mt-3">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-outline m-0 text-muted">
                                            <input type="checkbox" name="remember" />
                                            <span></span>
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="javascript:;" id="kt_login_forgot"
                                        class="text-muted text-hover-primary">Forgot Password ?</a>
                                </div> --}}

                                <div
                                    class="form-group d-flex flex-wrap justify-content-between align-items-center mt-2">
                                    {{-- <div class="my-3 mr-2">
                                        <a href="{{ url('/register') }}" id="kt_login_signup" class="font-weight-bold">
                                            Register
                                        </a>
                                    </div> --}}
                                    <button class="btn btn-primary font-weight-bold px-9 py-4 my-3" type="submit">Sign
                                        In</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Signin-->

                        <!--begin::Signup-->
                        {{-- <div class="login-form login-signup">
                            <div class="text-center mb-10 mb-lg-20">
                                <h3 class="">Sign Up</h3>
                                <p class="text-muted font-weight-bold">Enter your details to create your account</p>
                            </div>

                            <!--begin::Form-->
                            <form class="form" novalidate="novalidate" id="kt_login_signup_form">
                                <div class="form-group py-3 m-0">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text"
                                        placeholder="Fullname" name="fullname" autocomplete="off" />
                                </div>
                                <div class="form-group py-3 border-top m-0">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password"
                                        placeholder="username" name="email" autocomplete="off" />
                                </div>
                                <div class="form-group py-3 border-top m-0">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password"
                                        placeholder="Password" name="password" autocomplete="off" />
                                </div>
                                <div class="form-group py-3 border-top m-0">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password"
                                        placeholder="Confirm password" name="cpassword" autocomplete="off" />
                                </div>
                                <div class="form-group mt-5">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-outline">
                                            <input type="checkbox" name="agree" />
                                            <span></span>
                                            I Agree the <a href="#" class="ml-1">terms and conditions</a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex flex-wrap flex-center">
                                    <button id="kt_login_signup_submit"
                                        class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
                                    <button id="kt_login_signup_cancel"
                                        class="btn btn-outline-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div> --}}
                        <!--end::Signup-->

                        <!--begin::Forgot-->
                        {{-- <div class="login-form login-forgot">
                            <div class="text-center mb-10 mb-lg-20">
                                <h3 class="">Forgotten Password ?</h3>
                                <p class="text-muted font-weight-bold">Enter your email to reset your password</p>
                            </div>

                            <!--begin::Form-->
                            <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
                                <div class="form-group py-3 border-bottom mb-10">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="email"
                                        placeholder="Email" name="email" autocomplete="off" />
                                </div>
                                <div class="form-group d-flex flex-wrap flex-center">
                                    <button id="kt_login_forgot_submit"
                                        class="btn btn-primary  font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
                                    <button id="kt_login_forgot_cancel"
                                        class="btn btn-light-primary  font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div> --}}
                        <!--end::Forgot-->
                    </div>
                    <!--end::Aside body-->

                    <!--begin: Aside footer for desktop-->
                    <div class="d-flex flex-column-auto justify-content-between mt-15">
                        <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">
                            &copy; 2022 CIT San Pablo
                        </div>
                        {{-- <div class="d-flex order-1 order-sm-2 my-2">
                            <a href="#" class="text-muted text-hover-primary">Privacy</a>
                            <a href="#" class="text-muted text-hover-primary ml-4">Legal</a>
                            <a href="#" class="text-muted text-hover-primary ml-4">Contact</a>
                        </div> --}}
                    </div>
                    <!--end: Aside footer for desktop-->
                </div>
                <!--end: Aside Container-->
            </div>
            <!--begin::Aside-->

            <!--begin::Content-->
            <div class="order-1 order-lg-2 flex-column-auto flex-lg-row-fluid d-flex flex-column p-7"
                style="background-image: url({{ asset('media/capellan/capellan-new-building-cropped.jpg') }}); background-size: cover; background-repeat: no-repeat;">
                <!--begin::Content body-->
                {{-- <div class="d-flex flex-column-fluid flex-lg-center">
                    <div class="d-flex flex-column justify-content-center">
                        <h3 class="display-3 font-weight-bold my-7 text-dark">Welcome to Metronic!</h3>
                        <p class="font-weight-bold font-size-lg text-white opacity-80">
                            The ultimate Bootstrap, Angular 8, React & VueJS admin theme<br />framework for next
                            generation web apps.
                        </p>
                    </div>
                </div> --}}
                <!--end::Content body-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('#togglePassword').click(function() {
                const passwordInput = $('#password');
                const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';

                passwordInput.attr('type', type);
                $(this).toggleClass('fa-eye-slash'); // Use jQuery for class toggle
            });
        });
    </script>
    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->
    {{-- Global Config (global config for global JS scripts) --}}
    <script>
        var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!};
    </script>

    {{-- Global Theme JS Bundle (used by all pages) --}}
    @foreach (config('layout.resources.js') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach

    {{-- added by me JS from login page --}}
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('js/pages/custom/login/login-general.js') }}"></script>

    {{-- Includable JS --}}
    @yield('scripts')
</body>
<!--end::Body-->

</html>



{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
