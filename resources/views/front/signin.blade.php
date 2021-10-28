<!DOCTYPE html>
@extends('front.layout')
@section('content')
@include('flash::message')

    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-5" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="route('/')">الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
            </ol>
        </nav><!--End Breadcrumb-->
        <section class="signup-form my-4 py-4">
            <div class="my-5 text-center"><img src="{{('front/imgs/logo.png')}}" alt="logo"></div>
            <form action="{{route('loggedin')}}" method="post" class="w-75 mx-auto my-5">
              @csrf
                <input type="text" name="phone" for"phone" class="form-control my-3 py-3" id="usName" placeholder="الجوال">
                @error('phone')
                  <div class="error"> هذا الرقم غير مسجل

                  </div>
                @enderror
                <input type="password" name="password" for"password" class="form-control my-3 py-3" id="usPassword" placeholder="كلمة المرور">
                @error('password')
                  <div class="error"> كلمة المرور غير صحيحة

                  </div>
                @enderror
                <div class="form-check float-right my-4">
                    <input class="form-check-input" for"remember_me" type="checkbox" value="" id="defaultCheck2">
                    <label class="form-check-label mr-3" for="defaultCheck2">
                       تذكرنى
                    </label>
                </div>
                <div class="clr"></div>
                <div class="form-row my-4">
                    <div class="col">
                        <button type="submit" class="form-control py-3 bg-success text-white">دخول</button>
                    </div>
                    <div class="col">
                        <a href="{{route('signup')}}" type="submit" class="form-control text-center py-3 bg">انشاء حساب جديد</a>
                    </div>
                </div>
            </form>
        </section>
    </div>
  @endsection
