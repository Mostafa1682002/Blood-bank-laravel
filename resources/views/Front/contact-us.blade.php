@extends('Front.layouts.master')
@section('title')
    بنك الدم - اتصل بنا
@endsection
@section('content')
    <!--contact-us-->
    <div class="contact-now">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                    </ol>
                </nav>
            </div>
            @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            <div class="row methods">
                <div class="col-md-6">
                    <div class="call">
                        <div class="title">
                            <h4>اتصل بنا</h4>
                        </div>
                        <div class="content">
                            <div class="logo">
                                <img src="{{ asset('assets/front/imgs/logo.png') }}">
                            </div>
                            <div class="details">
                                <ul>
                                    <li><span>الجوال : </span>{{ $settings->phone }}</li>
                                    <li><span>فاكس:</span> 234234234</li>
                                    <li><span>البريد الإلكترونى : </span>{{ $settings->email }}</li>
                                </ul>
                            </div>
                            <div class="social">
                                <h4>تواصل معنا</h4>
                                <div class="icons" dir="ltr">
                                    <div class="out-icon">
                                        <a href="{{ $settings->f_link }}"><img
                                                src="{{ asset('assets/front/imgs/001-facebook.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $settings->t_link }}"><img
                                                src="{{ asset('assets/front/imgs/002-twitter.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $settings->y_link }}"><img
                                                src="{{ asset('assets/front/imgs/003-youtube.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $settings->i_link }}"><img
                                                src="{{ asset('assets/front/imgs/004-instagram.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $settings->w_link }}"><img
                                                src="{{ asset('assets/front/imgs/005-whatsapp.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $settings->g_link }}"><img
                                                src="{{ asset('assets/front/imgs/006-google-plus.svg') }}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="title">
                            <h4>تواصل معنا</h4>
                        </div>
                        <div class="fields">
                            <form action="{{ route('client.contact_us') }}" method="POST">
                                @csrf
                                {{-- <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الإسم"
                                    name="name">
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="البريد الإلكترونى" name="email">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="الجوال" name="phone"> --}}
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="عنوان الرسالة" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <textarea placeholder="نص الرسالة" class="form-control" id="exampleFormControlTextarea1" rows="3" name="message">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <button type="submit">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
