<!DOCTYPE html>
@extends('front.layout')
@section('content')
@include('flash::message')

    <div class="container">
            <!--Breadcrumb-->
            <nav class="my-4" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسيه</a></li>
                    <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                </ol>
            </nav><!--End Breadcrumb-->
        </div><!--End container-->

        <section class="signup text-center">
            <div class="container">
                <div class="py-4 mb-4">
                    <form action="{{route('registered')}}" method="post" class="w-75 m-auto">
                      @csrf
                        <input type="text" name="name" for"name" class="form-control my-3" placeholder="الاسم">
                        @error('name')
                          <div class="error">'الاسم غير مضبوط يجب ان يكون علي الاقل ثلاثة حروف'

                          </div>
                        @enderror
                        <input type="mail" name="e_mail" for"e_mail" class="form-control my-3" placeholder="البريد الاليكترونى">
                        @error('e_mail')
                          <div class="error">'البريد الاليكترونى موجود بالفعل او ان الاسم غير صالح'

                          </div>
                        @enderror
                        <input type="text" onfocus="(this.type='date')" name="date_of_birth" for"date_of_birth" class="form-control my-3" placeholder="تاريخ الميلاد">
                        @error('date_of_birth')
                          <div class="error">'التاريخ الذي ادخلته غير صحيح'

                          </div>
                        @enderror
                        <input type="text" onfocus="(this.type='date')" name="last_donation_date" for"last_donation_date" class="form-control my-3" placeholder="تاريخ اخر تبرع">
                        @error('last_donation_date')
                          <div class="error">'التاريخ الذي ادخلته غير صحيح'

                          </div>
                        @enderror
                        <select name="blood_type_id" for"blood_type_id" id="blood" class="form-control my-3">
                            <option >فصيلة الدم</option>
                            @foreach($blood_types as $blood)
                              <option value="{{$blood->id}}">{{$blood->name}}</option>
                            @endforeach
                        </select>
                        @error('blood_type_id')
                          <div class="error">'يجب ان تقوم باختيار فصيلة الدم'

                          </div>
                        @enderror
                        <select name="governorate" for"governorate" id="capital" class="form-control my-3">
                            <option >المحافظة</option>
                            @foreach($governorates as $governorate)
                              <option value="$governorate->id">{{$governorate->name}}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                          <div class="error">'المحافظة مطلوبة'

                          </div>
                        @enderror
                        <select name="city_id" for"city_id" id="city" class="form-control my-3">
                            <option selected>المدينة</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                          </select>
                          @error('city_id')
                            <div class="error">'المدينة مطلوبة'

                            </div>
                          @enderror
                        <input type="text" name="phone" for"phone" class="form-control my-3" placeholder="رقم الهاتف">
                        @error('phone')
                          <div class="error">'رقم الهاتف غير صحيح او انه موجود بالفعل'

                          </div>
                        @enderror
                        <input type="password" name="password" for"password" class="form-control my-3" placeholder="كلمة المرور">
                        @error('password')
                          <div class="error">يجب ان تكون كلمة السر علي الاقل من 8 حروف '

                          </div>
                        @enderror
                        <input type="password" for"password_confirmation" name="password_confirmation" class="form-control my-3" placeholder="تأكيد كلمة المرور">
                        @error('confirmed')
                          <div class="error">'يجب ان يكون التاكيد مماثل لكلمة المرور'

                          </div>
                        @enderror
                        <button type="submit" class="btn btn-success py-2 w-50">ارسال</button>
                    </form>
                </div>
            </div>
        </section>
        @endsection
