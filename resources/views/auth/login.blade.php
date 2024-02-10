<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin Login</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/animate.css/animate.css')}}">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('admin/stylesheets/css/style.css')}}">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h2 class="text-center">ADMIN LOGIN</h2>
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email"  value="{{ old('email') }}" autocomplete="email" autofocus>
                                <i class="fa fa-envelope"></i>
                            </span>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password" id="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input  class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="check form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </div>
                        <div class="form-group text-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <hr/>
                            <span>Don't have an account?</span>
                                @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="href="{{ asset('admin/endor/jquery/jquery-1.12.3.min.js')}}"></script>
<script src="href="{{ asset('admin/endor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="href="{{ asset('admin/endor/nano-scroller/nano-scroller.js')}}"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="href="{{ asset('admin/avascripts/template-script.min.js')}}"></script>
<script src="href="{{ asset('admin/avascripts/template-init.min.js')}}"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>
</html>

