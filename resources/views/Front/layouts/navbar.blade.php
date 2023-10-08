    <!--upper-bar-->
    <div class="upper-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="language">
                        <a href="#" class="ar active">عربى</a>
                        <a href="#" class="en inactive">EN</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="social">
                        <div class="icons">
                            <a href="{{ $settings->f_link }}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $settings->i_link }}" class="instagram"><i class="fab fa-instagram"></i></a>
                            <a href="{{ $settings->t_link }}" class="twitter"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $settings->w_link }}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    @if (auth()->guard('front')->check())
                        <!--I'm a member -->
                        <div class="member">
                            <p class="welcome">مرحباً بك</p>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->guard('front')->user()->name }}
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('client.index') }}">
                                        <i class="fas fa-home"></i>
                                        الرئيسية
                                    </a>
                                    <a class="dropdown-item" href="{{ route('client.profile') }}">
                                        <i class="far fa-user"></i>
                                        معلوماتى
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-bell"></i>
                                        اعدادات الاشعارات
                                    </a>
                                    <a class="dropdown-item" href="{{ route('client.favorite') }}">
                                        <i class="far fa-heart"></i>
                                        المفضلة
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-comments"></i>
                                        ابلاغ
                                    </a>
                                    <a class="dropdown-item" href="{{ route('client.contact_us_form') }}">
                                        <i class="fas fa-phone-alt"></i>
                                        تواصل معنا
                                    </a>
                                    <form action="{{ route('client.logout') }}" method="post">
                                        @csrf
                                        <button class="dropdown-item" type="submit">
                                            <i class="fas fa-sign-out-alt"></i>
                                            تسجيل الخروج
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- not a member-->
                        <div class="info" dir="ltr">
                            <div class="phone">
                                <i class="fas fa-phone-alt"></i>
                                <p>{{ $settings->phone }}</p>
                            </div>
                            <div class="e-mail">
                                <i class="far fa-envelope"></i>
                                <p>{{ $settings->email }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <!--nav-->
    <div class="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('client.index') }}">
                    <img src="{{ asset('assets/front/imgs/logo.png') }}" class="d-inline-block align-top"
                        alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item  {{ checkActive('client.index') }}">
                            <a class="nav-link" href="{{ route('client.index') }}">الرئيسية <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ checkActive('client.about_us') }}">
                            <a class="nav-link" href="{{ route('client.about_us') }}">عن بنك الدم</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">المقالات</a>
                        </li>
                        <li
                            class="nav-item {{ checkActive('client.inside_request') }}
                            {{ checkActive('client.donation_requests') }}">
                            <a class="nav-link" href="{{ route('client.donation_requests') }}">طلبات التبرع</a>
                        </li>
                        <li class="nav-item {{ checkActive('client.contact_us_form') }}">
                            <a class="nav-link" href="{{ route('client.contact_us_form') }}">اتصل بنا</a>
                        </li>
                    </ul>


                    @if (auth()->guard('front')->check())
                        <!--I'm a member-->
                        <a href="{{ route('client.create_donation_request_form') }}" class="donate">
                            <img src="{{ asset('assets/front/imgs/transfusion.svg') }}">
                            <p>طلب تبرع</p>
                        </a>
                    @else
                        <!--not a member-->
                        <div class="accounts">
                            <a href="{{ route('client.create_account') }}" class="create">إنشاء حساب جديد</a>
                            <a href="{{ route('client.login_form') }}" class="signin">الدخول</a>
                        </div>
                    @endif


                </div>
            </div>
        </nav>
    </div>
