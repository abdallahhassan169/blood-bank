@extends('front/layout')
@section('content')

<nav class="my-4" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('/')}}">الرئيسيه</a></li>
        <li class="breadcrumb-item active" aria-current="page">اعدادات الاشعارات</li>
    </ol>
</nav><!--End Breadcrumb-->
@include('flash::message')

<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes"><h2>اعدادات المحافظات</h2></label>
  <div class="col-md-4">
    <form method="post" action="{{route('settings_create')}}">
      @csrf
      @foreach($governorates as $gov)
        <label for="">{{$gov->name}}</label>
        <input type="checkbox" name="governorate_id[]" data-toggle="toggle"
        @foreach($select_govs as $g)
        @if($gov->id==$g->id){{  'checked' }} @endif @endforeach value="{{$gov->id}}" >
      @endforeach
  </div>
</div>
<hr>
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes"><h2>اعدادات فصائل الدم</h2></label>
  <div class="col-md-4">
      @foreach($blood_types as $b)
        <label for="">{{$b->name}}</label>
        <input type="checkbox" data-toggle="toggle"  name="blood_type_id[]"
        @foreach($select_bloods as $bl)
        @if($b->id==$bl->id){{  'checked' }} @endif @endforeach value="{{$b->id}}" >
      @endforeach
      <br>

  </div>
</div>
<div>
  <button type="submit" class="btn btn-primary">اطلاق الاشعارات</button>
</div>
<br>

</form>
@endsection
