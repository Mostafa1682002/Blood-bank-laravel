@inject('cities', 'App\Models\City')
@inject('blood_types', 'App\Models\BloodType')
@extends('Front.layouts.master')
@section('title')
    بنك الدم - طلبات التبرع
@endsection
<style>
    .dis {
        pointer-events: none;
    }
</style>
@section('content')
    <!--inside-article-->
    <div class="all-requests">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                    </ol>
                </nav>
            </div>

            <!--requests-->
            <div class="requests">
                <div class="head-text">
                    <h2>طلبات التبرع</h2>
                </div>
                <div class="content">
                    <form class="row filter" action="{{ route('client.donation_requests') }}" method="GET">
                        <div class="col-md-5 blood">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control" id="exampleFormControlSelect1" name="blood_type_id">
                                        <option selected disabled>اختر فصيلة الدم</option>
                                        @foreach ($blood_types->all() as $blood)
                                            <option value="{{ $blood->id }}">{{ $blood->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 city">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control" id="exampleFormControlSelect1" name="city_id">
                                        <option selected disabled>اختر المدينة</option>
                                        @foreach ($cities->all() as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="patients">
                        @if (count($donations))
                            @foreach ($donations as $donation)
                                <div class="details">
                                    <div class="blood-type">
                                        <h2 dir="ltr">{{ $donation->bloodType->name }}</h2>
                                    </div>
                                    <ul>
                                        <li><span>اسم الحالة : </span>{{ $donation->name }}</li>
                                        <li><span>مستشفى : </span>{{ $donation->hospital }}</li>
                                        <li><span>المدينة : </span> {{ $donation->city->name }}</li>
                                    </ul>
                                    <a href="{{ route('client.inside_request', $donation->id) }}">التفاصيل</a>
                                </div>
                            @endforeach
                        @else
                            <p class="alert alert-danger text-center">لايوجد طلبات تبرع</p>
                        @endif
                    </div>
                    <div class="pages">
                        <nav aria-label="Page navigation example" dir="ltr">
                            <ul class="pagination">
                                <li class="page-item {{ $donations->currentPage() == 1 ? 'dis' : '' }}">
                                    <a class="page-link"
                                        href="{{ route('client.donation_requests') }}?page={{ $donations->currentPage() - 1 }}"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $donations->lastPage(); $i++)
                                    <li class="page-item"><a
                                            class="page-link {{ $donations->currentPage() == $i ? 'active' : '' }}"
                                            href="{{ route('client.donation_requests') }}?page={{ $i }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li
                                    class="page-item {{ $donations->currentPage() == $donations->lastPage() ? 'dis' : '' }}">
                                    <a class="page-link"
                                        href="{{ route('client.donation_requests') }}?page={{ $donations->currentPage() + 1 }}"
                                        aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
