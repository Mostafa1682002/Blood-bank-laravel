@extends('Front.layouts.master')
@section('title')
    بنك الدم - المفضله
@endsection
@section('content')
    <!--inside-article-->
    <div class="about-us">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">المفضله</li>
                    </ol>
                </nav>
            </div>
            <!--articles-->
            <div class="articles" style="padding: 50px">
                <div class="container title">
                    <div class="head-text">
                        <h2> المقالات</h2>
                    </div>
                </div>
                <div class="view">
                    <div class="container">
                        <div class="row">
                            <!-- Set up your HTML -->
                            <div class="owl-carousel articles-carousel">
                                @foreach ($articles->all() as $article)
                                    <div class="card">
                                        <div class="photo">
                                            <img src="{{ $article->image }}" class="card-img-top" alt="...">
                                            <a href="{{ route('client.article_details', $article->id) }}"
                                                class="click">المزيد</a>
                                        </div>
                                        <a href="{{ route('client.article_toggle', $article->id) }}"
                                            class="favourite active">
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
            {{-- <div class="details">
                <div class="logo">
                    <img src="{{ asset('assets/front/imgs/logo.png') }}">
                </div>
                <div class="text">
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث
                        يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                        التطبيق. العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                    </p>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث
                        يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                        التطبيق. العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                    </p>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث
                        يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                        التطبيق. العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                    </p>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
