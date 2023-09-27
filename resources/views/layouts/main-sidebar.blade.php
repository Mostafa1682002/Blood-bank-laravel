<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Home-->
                    <li>
                        <a href="{{ route('home') }}"><i class="ti-home"></i><span class="right-nav-text">الرئيسيه
                            </span></a>
                    </li>
                    <!-- menu item Govenoraes-->
                    <li>
                        <a href="{{ route('governorates.index') }}"><i class="ti-menu-alt"></i><span
                                class="right-nav-text">قائمة المحافظات
                            </span> </a>
                    </li>
                    <!-- menu item Cities-->
                    <li>
                        <a href="{{ route('cities.index') }}"><i class="ti-location-pin"></i><span
                                class="right-nav-text"> قائمة المدن
                            </span> </a>
                    </li>
                    <!-- menu item Categories-->
                    <li>
                        <a href="{{ route('categories.index') }}"><i class="ti-file"></i><span class="right-nav-text">
                                قائمة الاقسام
                            </span> </a>
                    </li>
                    <!-- menu item Articales-->
                    <li>
                        <a href="{{ route('articles.index') }}"><i class="ti-comments"></i><span class="right-nav-text">
                                قائمة المقالات</span></a>
                    </li>
                    <!-- menu item Clients-->
                    <li>
                        <a href="{{ route('clients.index') }}"><i class="fas fa-users"></i><span class="right-nav-text">
                                قائمة العملاء</span></a>
                    </li>
                    <!-- menu item -->
                    <li>
                        <a href="{{ route('donations.index') }}"><i class="ti-menu-alt"></i><span
                                class="right-nav-text"> قائمة طلبات التبرع
                            </span> </a>
                    </li>
                    <!-- menu item Contacts-->
                    <li>
                        <a href="{{ route('contacts.index') }}"><i class="fas fa-comments"></i><span
                                class="right-nav-text"> قائمة الرسائل</span></a>
                    </li>
                    <!-- menu item Settings-->
                    <li>
                        <a href="{{ route('settings.index') }}"><i class="fas fa-cogs"></i><span
                                class="right-nav-text">الاعدادات</span></a>
                    </li>
                    <!-- menu item Settings-->
                    <li>
                        <a href="{{ route('password.index') }}"><i class="fas fa-key"></i><span
                                class="right-nav-text">تغير الباسورد</span></a>
                    </li>
                    <!-- menu item Users-->
                    <li>
                        <a href="{{ route('users.index') }}"><i class="fas fa-user"></i><span class="right-nav-text">
                                قائمة المستخدمين</span></a>
                    </li>
                    <!-- menu item Roles-->
                    <li>
                        <a href="{{ route('roles.index') }}"><i class="fas fa-tasks"></i><span class="right-nav-text">
                                قائمة الرتب</span></a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
