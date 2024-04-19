@inject('clients', 'App\Models\Client')
@inject('contacts', 'App\Models\Contact')
@inject('donations', 'App\Models\DonationRequest')
@inject('categories', 'App\Models\Category')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @section('title')
        الرئيسيه
    @endsection
    @include('layouts.head')
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{ asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0">لوحة التحكم</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">الاقسام</p>
                                    <h4>{{ $categories->count() }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                {{-- <a href="{{ route('admin.products.index') }}">المزيد</a> --}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fas fa-users highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">العملاء</p>
                                    <h4>{{ $clients->count() }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                {{-- <a href="{{ route('admin.users.index') }}">المزيد</a> --}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">الطلبات</p>
                                    <h4>{{ $donations->count() }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                {{-- <a href="{{ route('admin.orders.index') }}">المزيد</a> --}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-comments highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">الرسائل</p>
                                    <h4>{{ $contacts->count() }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Status widgets-->
            <div class="row">
                <div style="min-height: 400px;" class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title">
                                            اخر العمليات علي النظام
                                        </h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                    href="#students" role="tab" aria-controls="students"
                                                    aria-selected="true">الاقسام</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="teachers-tab" data-toggle="tab"
                                                    href="#teachers" role="tab" aria-controls="teachers"
                                                    aria-selected="false">العملاء
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab"
                                                    href="#parents" role="tab" aria-controls="parents"
                                                    aria-selected="false">الطلبات
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="students" role="tabpanel"
                                        aria-labelledby="students-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center"
                                                class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-dark text-white">
                                                        <th>#</th>
                                                        <th>اسم القسم</th>
                                                        <th>تاريخ الانشاء</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($categories->latest()->paginate(5) as $categorie)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $categorie->name }}</td>
                                                            <td>{{ $categorie->created_at }}</td>
                                                        @empty
                                                            <td colspan="8">
                                                                <h4 class="text-danger">
                                                                    لا يوجد بيانات
                                                                </h4>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="teachers" role="tabpanel"
                                        aria-labelledby="teachers-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center"
                                                class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-dark text-white">
                                                        <th>#</th>
                                                        <th>اسم العميل</th>
                                                        <th>البريد الالكتروني</th>
                                                        <th>الهاتف</th>
                                                        <th>فصيلة الدم</th>
                                                        <th>المحافظه</th>
                                                        <th>المدينه</th>
                                                        <th>الحاله</th>
                                                    </tr>
                                                </thead>
                                                @forelse($clients->orderBy('id','DESC')->paginate(5) as $client)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $client->name }}</td>
                                                            <td>{{ $client->email }}</td>
                                                            <td>{{ $client->phone }}</td>
                                                            <td>{{ $client->bloodType->name }}</td>
                                                            <td>{{ $client->city->governorate->name }}</td>
                                                            <td>{{ $client->city->name }}</td>
                                                            <td>
                                                                @if ($client->active)
                                                                    <p class="text-success">مفعل</p>
                                                                @else
                                                                    <p class="text-danger">غير مفعل</p>
                                                                @endif
                                                            </td>
                                                        @empty
                                                            <td colspan="8">
                                                                <h4 class="text-danger">
                                                                    لا يوجد بيانات
                                                                </h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="parents" role="tabpanel"
                                        aria-labelledby="parents-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center"
                                                class="table center-aligned-table table-hover mb-0">

                                                <thead>
                                                    <tr class="table-dark text-white">
                                                        <th>#</th>
                                                        <th>الاسم</th>
                                                        <th>فصيلة الدم</th>
                                                        <th>عدد الاكياس </th>
                                                        <th>المدينه</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($donations->latest()->paginate(5) as $donation)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $donation->name }}</td>
                                                            <td>{{ $donation->bloodType->name }}</td>
                                                            <td>{{ $donation->num_bags }}</td>
                                                            <td>{{ $donation->city->name }}</td>
                                                        @empty
                                                            <td colspan="8">
                                                                <h4 class="text-danger">
                                                                    لا يوجد بيانات
                                                                </h4>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--=================================
 wrapper -->
            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>
