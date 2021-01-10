@extends('layouts.auth_layout')

@section('title', 'Login')

@section('page-style-plugins')
<link href="{{ asset('metronic/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('metronic/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet"
    type="text/css" />
@endsection

@section('page-level-styles')
<link href="{{ asset('metronic/assets/pages/css/login-3-rtl.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('theme-layout-styles')
@endsection

@section('extra-css')
@endsection

@section('content')

<div class="logo"></div>
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{ route('login') }}" method="post">
        @csrf
        <h3 class="form-title">تسجيل الدخول</h3>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">البريد الإلكتروني</label>
            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix" type="email" placeholder="Email"
                    name="email" /> </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">كلمة المرور</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" placeholder="Password"
                    name="password" /> </div>
        </div>
        <div class="form-actions">
            <label class="rememberme mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1" /> تذكرني
                <span></span>
            </label>
            <button type="submit" class="btn green pull-right"> دخول </button>
        </div>
    </form>
    <!-- END LOGIN FORM -->
</div>

@endsection

@section('page-script-plugins')
<script src="{{ asset('metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('metronic/assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"
    type="text/javascript"></script>
{{-- <script src="{{ asset('metronic/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script> --}}
@endsection

@section('page-level-scripts')
{{-- <script src="{{ asset('metronic/assets/pages/scripts/login.min.js') }}" type="text/javascript"></script> --}}
@endsection

@section('theme-layout-scripts')
@endsection

@section('extra-js')
@endsection