@extends('front.layout')
@section('content')

@foreach($donations as $donation)

<div class="req-item my-3">
    <div class="row">
        <div class="col-md-9 col-sm-12 clearfix">
            <div class="blood-type m-1 float-right">
                <h3>{{$donation->blood_kind->name}}</h3>
            </div>
            <div class="mx-3 float-right pt-md-2">
                <p>
                  اسم الحالة: {{$donation->patient_name}}
                </p>
                <p>
                  مستشفي:  {{$donation->hospital_name}}
                </p>
                <p>
              المدينة: {{$donation->city->name}}
                </p>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 text-center p-sm-3 pt-md-5">
            <a href="{{route('status_details',$donation->id)}}" class="btn btn-light px-5 py-3">التفاصيل</a>
        </div>
    </div>
</div>
@endforeach
@endsection
