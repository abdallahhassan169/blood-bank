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
                        <p class="status-item float-right p-3">{{$donation->patient_name}}</p>
                    </div>

                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">العمر</p>
                        <p class="status-item float-right p-3">{{$donation->patient_age}}</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">عنوان المستشفي</p>
                        <p class="status-item float-right p-3">{{$donation->hospital_address}}</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">المشفى</p>
                        <p class="status-item float-right p-3">{{$donation->hospital_name}}</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">رقم الجوال</p>
                        <p class="status-item float-right p-3">{{$donation->patient_phone}}</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">المدينة</p>
                        <p class="status-item float-right p-3">{{$donation->city->name}}</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">فصيلة الدم</p>
                        <p class="status-item float-right p-3">{{$donation->blood_kind->name}}</p>
                    </div><br>

                    <p class="status float-right p-3">التفاصيل</p><br>
                    <p class="my-md-2">
                  {{$donation->details}}
                    </p>
                </div>
                <!--Location on Google-->
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.244327965891!2d31.23191431511476!3d30.02984758188777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145847340c2eaedf%3A0xec8a9d758ecabbf1!2z2YXYs9iq2LTZgdmJINin2KjZiCDYp9mE2LHZiti0INmE2YTYp9i32YHYp9mE!5e0!3m2!1sen!2seg!4v1573594740665!5m2!1sen!2seg" width="100%" height="330" frameborder="0" style="border:1px solid #ddd;" allowfullscreen=""></iframe>                </div>
            </div>
        </div><!--End Container-->
    </section><!--End Status section-->

@endsection
