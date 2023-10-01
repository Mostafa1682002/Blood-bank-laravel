@extends('Front.layouts.master')
@section('title')
    بنك الدم - تفاصيل المقال
@endsection
@section('content')
    <div class="inside-article">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="#">المقالات</a></li>
                        <li class="breadcrumb-item active" aria-current="page">الوقاية من الأمراض</li>
                    </ol>
                </nav>
            </div>
            <div class="article-image">
                <img src="{{ $article->image }}">
            </div>
            <div class="article-title col-12">
                <div class="h-text col-6">
                    <h4>{{ $article->title }}</h4>
                </div>
                <div class="icon col-6">
                    <button type="button"><i class="far fa-heart"></i></button>
                </div>
            </div>

            <!--text-->
            <div class="text">
                <p>{{ $article->content }}</p>
            </div>

            <!--articles-->
            <div class="articles">
                <div class="title">
                    <div class="head-text">
                        <h2>مقالات ذات صلة</h2>
                    </div>
                </div>
                <div class="view">
                    <div class="row">
                        <!-- Set up your HTML -->
                        <div class="owl-carousel articles-carousel">
                            @foreach ($articles as $article)
                                <div class="card">
                                    <div class="photo">
                                        <img src="{{ $article->image }}" class="card-img-top" alt="...">
                                        <a href="{{ route('client.article_details', $article->id) }}"
                                            class="click">المزيد</a>
                                    </div>
                                    <a href="{{ route('client.article_toggle', $article->id) }}"
                                        class="favourite {{ in_array($article->id, $favorites) ? 'active' : '' }}">
                                        <i class="far fa-heart"></i>
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $article->title }}</h5>
                                        <p class="card-text">
                                            {{ $article->content }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
