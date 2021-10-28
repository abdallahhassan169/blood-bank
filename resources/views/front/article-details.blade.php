<!DOCTYPE html>
@extends('front.layout')
@section('content')
    <section class="artice-detailes pb-5">
        <div class="container">
            <div class="article-img m-auto">
                <img src="/images/{{$article->image}}" class="card-img-top" alt="article-img">
            </div>
            <div class="article-content my-4">
                <div class="article-header p-2 d-flex justify-content-between">
                    <h6>{{$article->title}}</h6>

                </div>
                <div class="article-details p-4">
                    <p class="my-md-4"> {{$article->content}}

                    </p>

                </div>

            </div>
        </div>
    </section>
    <!--Articles section-->
    <section class="articles mb-5">
            <div class="title">
                <div class="container">
                    <h5><span class="py-1">مقالات ذات صلة</span> </h5>
                </div>
            </div>
            <div class="article-slide mt-3">
                <div class="container">
                    <div class="arrow text-left">
                        <button type="button" class="prev-arrow px-2 py-1"><i class="fas fa-chevron-right"></i></button>
                        <button type="button" class="next-arrow px-2 py-1"><i class="fas fa-chevron-left"></i></button>
                    </div>
                    @foreach($related as $re)
                    @if($re->id != $article->id)

                    <div class="slick2">
                        <div class="slick-cont">
                            <div class="card">
                                <img src="/images/{{$re->image}}" class="card-img-top" alt="slick-img">
                                <div class="heart-icon"><i class="far fa-heart"></i></div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$re->title}}</h5>
                                    <p>{{$re->content}}</p>
                                    <div class="text-center"><a href="article-details.html" class="btn bg px-5">التفاصيل</a></div>
                                </div>
                            </div>
                        </div>





                </div>
                @endif

                @endforeach
            </div>
            <!--End container-->
        </section>
        <!--End Articles-->
  @endsection
