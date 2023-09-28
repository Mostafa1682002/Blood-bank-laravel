<!doctype html>
<html lang="en" dir="rtl">

@include('Front.layouts.head')

<body class="create signin-account donation-requests who-are-us contact-us inside-request">
    <!--Navbar-->
    @include('Front.layouts.navbar')

    <!--Contant-->
    @yield('content')

    <!--footer-->
    @include('Front.layouts.footer')
    <!-- Optional JavaScript -->
    @include('Front.layouts.script')

</body>

</html>
