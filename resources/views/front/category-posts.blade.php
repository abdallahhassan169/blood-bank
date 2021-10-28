@extends('front.layout')
@section('content')
@foreach($posts as $article)
<div class="slick-cont">
    <div class="card">
        <img src="/images/{{$article->image}}" class="card-img-top" alt="slick-img">
        <div><a class="heart-icon" href"route('favorite_make')"><i class="far fa-heart"></i></a></div>
        <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
            <p>
              {{$article->content}}
            </p>
            <div class="text-center"><a href="{{route('article_details',$article->id)}}" class="btn bg px-5">التفاصيل</a></div>
        </div>
    </div>
</div>
    @endforeach
  @endsection
