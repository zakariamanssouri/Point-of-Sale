<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>POS</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/favicon/apple-touch-icon-152x152.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/favicon/favicon-32x32.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/animate-css/animate.css')}}">

    <!-- END: VENDOR CSS-->

    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/css/themes/vertical-modern-menu-template/materialize.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/css/themes/vertical-modern-menu-template/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/vendors.min.css') }}">


    {{--css for login  page only--}}
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/login.css')}}">
</head>
<body>
<img class="wave" src="{{asset('app-assets/images/login_images/wave.png')}}">
<div class="container">
    <div class="img">
        <img src="{{asset('app-assets/images/login_images/bg.svg')}}">
    </div>


    <div class="login-content">
        <form action="{{route('login')}}" method="POST" class="animated bounceInRight">
            @csrf

            <div class="row">
                <img src="{{asset('app-assets/images/login_images/avatar.svg')}}">
                <h2 class="title font-weight-bold animated shake" style="animation-delay: 0.5s"><strong> Bonjour
                        !</strong></h2>
            </div>

            {{--email--}}
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="email" type="email"
                           class="@error('name') is-invalid @enderror" name="email"
                           value="{{old('email')}}">
                    <label for="email">Email</label>
                </div>
            </div>
            {{--errors--}}
            <div class="row">
                <div class="col s12">
                    @error('email')
                    <span class="red-text">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            {{--password--}}
            <div class="row mt-0">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="password" type="password"
                           class="@error('name') is-invalid @enderror" name="password">
                    <label for="password">Mot de pass</label>
                </div>
            </div>
            {{--errors--}}
            <div class="row">
                <div class="col s12">
                    @error('password')
                    <span class="red-text">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            {{--remember me--}}
            <div class="row mb-5">
                <div class="input-field col s12">
                    <label class=" " style="top: -25px;left: 27px;">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>Remeber me</span>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <button type="submit" class="btn waves-light gradient-45deg-purple-deep-orange border-round "><span
                                class="uppercase login"> login</span></button>
                </div>
            </div>


        </form>


    </div>
</div>

<!-- END: Page Main-->


<!-- BEGIN VENDOR JS-->
<script src=" {{ asset('app-assets/js/vendors.min.js')}}"></script>
<!-- BEGIN VENDOR JS-->


<!-- BEGIN THEME  JS-->
<script src=" {{ asset('app-assets/js/plugins.js')}}"></script>
<script src=" {{ asset('app-assets/js/search.js')}} "></script>
<script src=" {{ asset('app-assets/js/custom/custom-script.js') }}"></script>
<!-- END THEME  JS-->

<!-- BEGIN PAGE LEVEL JS-->


{{--forms--}}
<script src="{{ asset('app-assets/js/scripts/form-elements.js') }}"></script>
<script src="{{asset('app-assets/vendors/formatter/jquery.formatter.min.js')}}"></script>
<script src="{{ asset('app-assets/js/scripts/form-masks.js') }}"></script>
<!-- END PAGE LEVEL JS-->

{{--animations--}}
<script src="{{ asset('app-assets/js/scripts/css-animation.js') }}"></script>

</body>

</html>




