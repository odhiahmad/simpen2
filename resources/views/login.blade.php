<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>
        Login | PLN Wilayah Pekanbaru
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://cdn.bootcss.com/webfont/1.6.16/webfontloader.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
    <!--end::Web font -->
    <!--begin::Base Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/base/vendors.bundle.css')}}"/>
    <link href="{{asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{{asset('assets/demo/default/media/img/logo/favicon.ico')}}"/>
</head>
<!-- end::Head -->
<!-- end::Body -->
<body
    class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div
        class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--singin"
        id="m_login">
        <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
            <div class="m-stack m-stack--hor m-stack--desktop">
                <div class="m-stack__item m-stack__item--fluid">
                    <div class="m-login__wrapper">
                        <div class="m-login__logo">
                            <a href="#">
                                <img style="width: 80px;height: 100px;" alt="" src="{{asset('logo_pln.png')}}"/>
                            </a>
                        </div>
                        <div class="m-login__signin">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    Sign In To Application
                                </h3>
                            </div>
                            <form class="m-login__form m-form">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="Username" id="username"
                                           name="username" autocomplete="off">
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" id="password"
                                           type="password" placeholder="Password" name="password">
                                </div>
                                <div class="row m-login__form-sub">
                                    <div class="col m--align-left">
                                        <label class="m-checkbox m-checkbox--focus">
                                            <input type="checkbox" name="remember">
                                            Remember me
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col m--align-right">
                                        {{--                                        <a href="javascript:;" id="m_login_forget_password" class="m-link">--}}
                                        {{--                                            Forget Password ?--}}
                                        {{--                                        </a>--}}
                                    </div>
                                </div>
                                <div class="m-login__form-action">
                                    <button id="m_login_signin_submit"
                                            class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                                        Sign In
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="m-stack__item m-stack__item--center">
                    <div class="m-login__account">
								<span class="m-login__account-msg">

								</span>
                        &nbsp;&nbsp;
                        <a href="javascript:;" id="m_login_signup" class="m-link m-link--focus m-login__account-link">

                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content"
            style="background-image: url({{asset('assets/app/media/img//bg/bg-4.jpg')}})">
            <div class="m-grid__item m-grid__item--middle">
                <h3 class="m-login__welcome">
                    Selamat Datang
                </h3>
                <p class="m-login__msg">
                    Di Sistem Manajemen Pengadaan UPDK Pekanbaru

                </p>
            </div>
        </div>
    </div>
</div>
<!-- end:: Page -->
<!--begin::Base Scripts -->

<!--end::Base Scripts -->
<!--begin::Page Snippets -->
<script src="{{asset('assets/snippets/pages/user/login.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        $("#m_login_signin_submit").click(function () {

            var username = $("#username").val();
            var password = $("#password").val();
            var token = $("meta[name='csrf-token']").attr("content");

            if (username.length == "") {
                toastr.error("Username wajib di isi!");
            } else if (password.length == "") {
                toastr.error("Password wajib di isi!");
            } else {
                $.ajax({
                    url: "{{ route('login.check_login') }}",
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        "username": username,
                        "password": password,
                        "_token": token
                    },

                    success: function (response) {

                        if (response.success) {

                            toastr.success("Anda berhasil login, akan diarahkan dalam 3 detik!")
                            window.location.href = "{{ route('redirect') }}";

                        } else {
                            toastr.error("Login Gagal!, silahkan coba lagi");
                        }


                    },

                    error: function (response) {
                        toastr.error(response);
                    }

                });

            }

        });

    });
</script>

</body>
<!-- end::Body -->
</html>
