@extends('Front.layouts.master')
@section('title')
    بنك الدم - استعادة كلمة المرور
@endsection
@section('content')
    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">استعادة كلمة المرور</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                <form action="{{ route('client.reset_passwod') }}" method="POST" id="form_login">
                    @csrf
                    <div class="logo">
                        <img src="{{ asset('assets/front/imgs/logo.png') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="الجوال" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="alert  alert-danger" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <p>{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="row buttons">
                        <div class="col-md-4 right m-auto">
                            <a href="#"
                                onclick="event.preventDefault();document.querySelector('#form_login').submit()">ارسال</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
