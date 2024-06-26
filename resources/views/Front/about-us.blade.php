@extends('Front.layouts.master')
@section('title')
    بنك الدم - عن بنك الدم
@endsection
@section('content')
    <!--inside-article-->
    <div class="about-us">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">عن بنك الدم</li>
                    </ol>
                </nav>
            </div>
            <div class="details">
                <div class="logo">
                    <img src="{{ asset('assets/front/imgs/logo.png') }}">
                </div>
                <div class="text">
                    <p>{{ $settings->about_app }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
