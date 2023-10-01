@inject('blood_types', 'App\Models\BloodType')
@inject('governorates', 'App\Models\Governorate')
@extends('Front.layouts.master')
@section('title')
    بنك الدم - انشاء طلب تبرع
@endsection
@section('content')
    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">انشاء طلب تبرع</li>
                    </ol>
                </nav>
            </div>
            <br>
            @if (session('success'))
                <div class="alert  alert-success" role="alert">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="text-success text-center">{{ session('success') }}</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert  alert-danger" role="alert">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="text-danger text-center"> لم يتم حفظ البيانات</p>
                </div>
                @foreach ($errors->all() as $error)
                    <p class="text-danger text-center">{{ $error }}</p>
                @endforeach
            @endif
            <div class="account-form">
                <form action="{{ route('client.create_donation_request') }}" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="الإسم" value="{{ old('name') }}">

                    <input type="number" name="age" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="العمر" value="{{ old('age') }}">

                    <select class="form-control" id="blood_type_id" name="blood_type_id">
                        <option selected disabled hidden value="">فصيلة الدم</option>
                        @foreach ($blood_types->all() as $blood_type)
                            <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                        @endforeach
                    </select>

                    <input type="number" name="num_bags" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="عدد الاكياس" value="{{ old('num_bags') }}">

                    <select class="form-control" id="governorates" name="governorate_id">
                        <option selected disabled hidden value="">المحافظة</option>
                        @foreach ($governorates->all() as $governorate)
                            <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                        @endforeach
                    </select>

                    <select class="form-control" id="city_id" name="city_id">
                        <option selected disabled hidden value="">المدينة</option>
                    </select>

                    <input type="text" name="hospital" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="المستشفي" value="{{ old('hospital') }}">

                    <input type="text" name="address_hospital" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="عنوان المستشفي" value="{{ old('address_hospital') }}">

                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="رقم الهاتف" value="{{ old('phone') }}">
                    <textarea placeholder="ملاحظات" class="form-control" id="exampleFormControlTextarea1" rows="5" name="notes">{{ old('notes') }}</textarea>


                    <input type="number" name="latitude" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="المستشفي" value="4444">
                    <input type="number" name="longitude" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="المستشفي" value="4444">

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
