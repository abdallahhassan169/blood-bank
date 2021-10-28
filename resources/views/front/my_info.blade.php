<!DOCTYPE html>
@extends('front.layout')
@section('content')

    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-5" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسيه</a></li>
                <li class="breadcrumb-item"><a href="{{route('donations')}}">طلبات التبرع</a></li>
                <li class="breadcrumb-item active" aria-current="page">طلب التبرع : احمد محمد</li>
            </ol>
        </nav><!--End Breadcrumb-->
    </div><!--End container-->
    <!--Status section-->
    <section class="Status-details">
        <div class="container">
            <div class="Status-info p-3 my-4">
                <div class="row">
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">الأسم</p>
                        <p class="status-item float-right p-3">{{auth()->guard('clients')->user()->name}}</p>
                    </div>
                  
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">البريد الالكتروني</p>
                        <p class="status-item float-right p-3">{{auth()->guard('clients')->user()->e_mail}}</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">رقم الهاتف</p>
                        <p class="status-item float-right p-3">{{auth()->guard('clients')->user()->phone}}</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">المدينة</p>
                        <p class="status-item float-right p-3">{{auth()->guard('clients')->user()->city->name}}</p>
                    </div>

                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">فصيلة الدم</p>
                        <p class="status-item float-right p-3">{{auth()->guard('clients')->user()->bloodType->name}}</p>
                    </div>
        </div><!--End Container-->
    </section><!--End Status section-->

@endsection
