@inject('blood_types', 'App\Models\BloodType')
@inject('governorates', 'App\Models\Governorate')
@extends('Front.layouts.master')
@section('title')
    بنك الدم - معلوماتي
@endsection
@section('content')
    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">معلوماتي</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                @if (session('success'))
                    <div class="alert  alert-success" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p class="text-center">{{ session('success') }} </p>
                    </div>
                @endif
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ route('client.update_profile') }}" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="الإسم" value="{{ $profile->name }}">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="البريد الإلكترونى" value="{{ $profile->email }}">

                    <input placeholder="تاريخ الميلاد" name="date_birth" class="form-control" type="text"
                        onfocus="(this.type='date')" id="date" value="{{ $profile->date_birth }}">
                    <select class="form-control" id="blood_type_id" name="blood_type_id">
                        @foreach ($blood_types->all() as $blood_type)
                            <option value="{{ $blood_type->id }}"
                                {{ $profile->blood_type_id == $blood_type->id ? 'selected' : '' }}>{{ $blood_type->name }}
                            </option>
                        @endforeach
                    </select>
                    <select class="form-control" id="governorates" name="governorate_id">
                        <option value="{{ $profile->city->governorate_id }}">{{ $profile->city->governorate->name }}
                        </option>
                        @foreach ($governorates->all() as $governorate)
                            <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                        @endforeach
                    </select>

                    <select class="form-control" id="city_id" name="city_id">
                        <option value="{{ $profile->city_id }}">{{ $profile->city->name }}</option>
                    </select>

                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="رقم الهاتف" value="{{ $profile->phone }}">

                    <input placeholder="آخر تاريخ تبرع" name="last_date_donation" class="form-control" type="text"
                        onfocus="(this.type='date')" id="date" value="{{ $profile->last_date_donation }}">

                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" minlength="5"
                        placeholder="كلمة المرور">

                    <input type="password" name="password_confirmation" minlength="5" class="form-control"
                        id="exampleInputPassword1" placeholder="تأكيد كلمة المرور">

                    <div class="create-btn">
                        <input type="submit" value="تحديث">
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
