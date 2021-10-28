@extends('front.layout')
@section('content')
@foreach($articles as $article)
<div class="slick-cont">
    <div class="card">

        <img src="/images/{{$article->image}}" height="350" width="300" class="card-img-top" alt="slick-img">

          <input id="post_id" type="hidden" for"post_id" name="post_id" value="{{$article->id}}">


        <a id="send" >  <div class="heart-icon"><i  class="far fa-heart">
        </i>

      </div></a>



        <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
            <p>
              {{$article->content}}
            </p>
        </div>
    </div>
</div>

    @endforeach

  @endsection
