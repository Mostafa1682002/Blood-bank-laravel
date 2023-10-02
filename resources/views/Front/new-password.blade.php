@extends('Front.layouts.master')
@section('title')
    بنك الدم - كلمة مرور جديده
@endsection
@section('content')
    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">كلمة مرور جديده</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                <form action="{{ route('client.new_passwod') }}" method="POST" id="form_login">
                    @csrf
                    <div class="logo">
                        <img src="{{ asset('assets/front/imgs/logo.png') }}">
                    </div>
                    @if ($errors->any())
                        <div class="alert  alert-danger" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p class="text-danger text-center"> لم يتم حفظ البيانات</p>
                        </div>
                        @foreach ($errors->all() as $error)
                            <p class="text-danger text-center">{{ $error }}</p>
                        @endforeach
                    @endif
                    @if (session('invalid-data'))
                        <div class="alert  alert-danger" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>{{ session('invalid-data') }}</p>
                        </div>
                    @endif
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="phone" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="الجوال" value="{{ $phone }}">
                        <input type="text" class="form-control" name="pin_code" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="كود التحقق" value="{{ old('pin_code') }}">
                        @error('pin_code')
                            <div class="alert  alert-danger" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <p>{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="كلمة المرور">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1"
                            placeholder=" تاكيد كلمة المرور">
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
