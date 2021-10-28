<!DOCTYPE html>
@extends('front.layout')
@section('content')
@include('flash::message')

        <nav class="my-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('/')}}">الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">اتصل بنا</li>
            </ol>
        </nav><!--End Breadcrumb-->
    </div><!--End container-->
    <section class="contact py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="contact-details">
                        <h5 class="py-3 text-center">اتصل بنا</h5>
                        <div class="text-center py-3"><img src="{{asset('front/imgs/logo.png')}}" alt="img-logo"></div>
                        <div class="contact-mail p-3">
                            <p class="py-1">الجوال <span> : {{$settings->phone}}</span></p>
                            <p class="py-1">البريد الاليكترونى <span> : {{$settings->email}}</span></p>
                        </div>
                        <div class="contact-social text-center">
                            <h6 class="py-2"> تواصل معنا</h6>
                            <ul class="list-unstyled d-flex justify-content-center py-md-3">
                                <li class="ml-2"><a class="google" href="{{$settings->email}}"><i class="fab fa-google-plus-square"></i></a></li>
                                <li class="mx-2"><a class="whatsapp" href=""><i class="fab fa-whatsapp-square"></i></a></li>
                                <li class="mx-2"><a class="insta" href=""><i class="fab fa-instagram"></i></a></li>
                                <li class="mx-2"><a class="youtube" href=""><i class="fab fa-youtube-square"></i></a></li>
                                <li class="mx-2"><a class="twitter" href=""><i class="fab fa-twitter-square"></i></li>
                                <li class="mr-2"><a class=" facebook" href=""><i class="fab fa-facebook-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <div class="contact-form text-center">
                        <h5 class="py-3">تواصل معنا</h5>
                        <form method="post" action="{{route('contact_store')}}">
                          @csrf
                            <input type="text" name="name" for"name" class="form-control my-3" placeholder="الاسم">
                            <input type="mail" name="g_mail" for"g_mail" class="form-control my-3" placeholder="البريد الاليكترونى">
                            <input type="text" name="telephone" for"telephone" class="form-control my-3" placeholder="الجوال">
                            <textarea name="text" for"text" class="form-control my-4" rows="5" placeholder="نص الرسالة"></textarea>
                            <button type="submit" class="btn py-3 bg w-100 ">ارسال</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
