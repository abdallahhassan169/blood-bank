@extends('front.layout')
@section('content')
@include('flash::message')

<div class="container">
        <!--Breadcrumb-->
        <nav class="my-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('/')}}">الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">انشاء طلب جديد</li>
            </ol>
        </nav><!--End Breadcrumb-->
    </div><!--End container-->
    <section class="signup text-center">
        <div class="container">
            <div class="py-4 mb-4">
                <form action="{{route('donation_store')}}" method="post" class="w-75 m-auto">
                  @csrf
                    <input type="text" name="patient_name" for"patient_name" class="form-control my-3" placeholder="الاسم">
                    <input type="mail" name="patient_phone" for"patient_phone" class="form-control my-3" placeholder="رقم التليفون">
                    <input type="text" name="hospital_name" for"hospital_name" class="form-control my-3" placeholder="اسم المستشفي">
                    <input type="text" name="patient_age" for"patient_age" class="form-control my-3" placeholder="عمر المريض">
                    <input type="text" name="hospital_address" for"hospital_address" class="form-control my-3" placeholder="عنوان المستشفي">
                    <select name="blood_kind_id" for"blood_kind_id" id="blood" class="form-control my-3">
                        <option >فصيلة الدم</option>
                        @foreach($blood_types as $blood)
                        <option value="{{$blood->id}}">{{$blood->name}}</option>
                        @endforeach
                    </select>
                    <select name="governorate" id="capital" for"governorate"  class="form-control my-3">
                        <option selected disabled >المحافظة</option>
                        @foreach($governorates as $governorate)
                        <option id="gov_val"  value="{{$governorate->id}}">{{$governorate->name}}</option>
                        @endforeach
                    </select>
                    <select name="city_id" for"city_id" id="city" class="form-control my-3">
                        <option selected>المدينة</option>
                        @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                    <div>
                      التفاصيل
                    <textarea name="details" for"details" class="form-control my-3" >
                    </textarea>
                  </div>
                    <button type="submit" class="btn btn-success py-2 w-50">انشاء  </button>
                </form>
            </div>
        </div>
    </section>

@endsection
