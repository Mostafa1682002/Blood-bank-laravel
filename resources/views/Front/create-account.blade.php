@inject('blood_types', 'App\Models\BloodType')
@inject('governorates', 'App\Models\Governorate')
@extends('Front.layouts.master')
@section('title')
    بنك الدم - انشاء حساب
@endsection
@section('content')
    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                {{-- @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                    </ul>
                @endif --}}
                <form action="{{ route('client.register') }}" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="الإسم" value="{{ old('name') }}">
                    @error('name')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="البريد الإلكترونى" value="{{ old('email') }}">
                    @error('email')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror

                    <input placeholder="تاريخ الميلاد" name="date_birth" class="form-control" type="text"
                        onfocus="(this.type='date')" id="date" value="{{ old('date_birth') }}">
                    @error('date_birth')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <select class="form-control" id="blood_type_id" name="blood_type_id">
                        <option selected disabled hidden value="">فصيلة الدم</option>
                        @foreach ($blood_types->all() as $blood_type)
                            <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                        @endforeach
                    </select>
                    @error('blood_type_id')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <select class="form-control" id="governorates" name="governorate_id">
                        <option selected disabled hidden value="">المحافظة</option>
                        @foreach ($governorates->all() as $governorate)
                            <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                        @endforeach
                    </select>
                    @error('governorate_id')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror

                    <select class="form-control" id="city_id" name="city_id">
                        <option selected disabled hidden value="">المدينة</option>
                    </select>
                    @error('city_id')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror

                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="رقم الهاتف" value="{{ old('phone') }}">
                    @error('phone')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror

                    <input placeholder="آخر تاريخ تبرع" name="last_date_donation" class="form-control" type="text"
                        onfocus="(this.type='date')" id="date" value="{{ old('last_date_donation') }}">
                    @error('last_date_donation')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror

                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="كلمة المرور">
                    @error('password')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror

                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1"
                        placeholder="تأكيد كلمة المرور">

                    <div class="create-btn">
                        <input type="submit" value="إنشاء">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('select[name="governorate_id"]').on('change', function() {
            var governorate_id = $(this).val();
            if (governorate_id) {
                $.ajax({
                    url: "{{ route('client.get_cities', '') }}/" + governorate_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="city_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city_id"]').append(
                                '<option value="' + value + '">' + key +
                                '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    </script>
@endsection
