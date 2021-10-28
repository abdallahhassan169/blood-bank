@extends('front.layout')
@section('content')
@if($favorites->count())
@foreach($favorites as $article)
<div class="slick-cont">
    <div class="card">
        <img src="/images/{{$article->image}}" class="card-img-top" alt="slick-img">
        <form id="favorite"  action="#" >
          @csrf
          <input id="post_id" type="hidden" for"post_id" name="post_id" value="{{$article->id}}">


        <a id="send" href="#">  <div class="heart-icon"><i aria-hidden="false" class="far fa-heart">
        </i>

      </div></a>

        </form>
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
    @else
    <br>
    <br>
    <br>
    <br>
    <br>

<div class="container"><p><h2>لا يوجد مقالات مفضلة</h2></p></div>
    <br>
    <br>
    <br>
    <br>
    <br>
    @endif
  @endsection
