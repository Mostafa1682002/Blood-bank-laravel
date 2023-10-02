@extends('Front.layouts.master')
@section('title')
    بنك الدم - تسجيل الدخول
@endsection
@section('content')
    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                <form action="{{ route('client.login') }}" method="POST" id="form_login">
                    @csrf
                    <div class="logo">
                        <img src="{{ asset('assets/front/imgs/logo.png') }}">
                    </div>
                    @if (session('invalid-data'))
                        <div class="alert  alert-danger" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>{{ session('invalid-data') }}</p>
                        </div>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="الجوال" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="كلمة المرور">
                    </div>
                    <div class="row options">
                        <div class="col-md-6 remember">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember_me"
                                    value="1">
                                <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot">
                            <img src="{{ asset('assets/front/imgs/complain.png') }}">
                            <a href="{{ route('client.reset_passwod_form') }}">هل نسيت كلمة المرور</a>
                        </div>
                    </div>
                    <div class="row buttons">
                        <div class="col-md-6 right">
                            <a href="#"
                                onclick="event.preventDefault();document.querySelector('#form_login').submit()">دخول</a>
                        </div>
                        <div class="col-md-6 left">
                            <a href="{{ route('client.create_account') }}">انشاء حساب جديد</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
