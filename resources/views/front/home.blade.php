@extends('front.layout')
        @section('content')
        <div class="main-header">
            <div class="slide">
                <img src="{{asset('front/imgs/header.jpg')}}" class="d-block w-100" alt="...">
                <div class="slick-caption">
                    <h4 class="my-md-3">بنك الدم نمضى قدما لصحة أفضل</h4>
                    <p class="pl-md-5">هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد هذا النص من مولد
                        النص
                        العرب</p>
                    <button class="btn bg px-5">المزيد</button>
                </div>
            </div>
            <div class="slide">
                <img src="{{asset('front/imgs/header.jpg')}}" class="d-block w-100" alt="...">
                <div class="slick-caption">
                    <h4 class="my-md-3">بنك الدم نمضى قدما لصحة أفضل</h4>
                    <p class="pl-md-5">هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد هذا النص من مولد
                        النص
                        العرب</p>
                    <button class="btn bg px-5">المزيد</button>
                </div>
            </div>
            <div class="slide">
                <img src="{{asset('front/imgs/header.jpg')}}" class="d-block w-100" alt="...">
                <div class="slick-caption">
                    <h4 class="my-md-3">بنك الدم نمضى قدما لصحة أفضل</h4>
                    <p class="pl-md-5">هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد هذا النص من مولد
                        النص
                        العرب</p>
                    <button class="btn bg px-5">المزيد</button>
                </div>
            </div>
        </div>
        <!--End main-header-->
    </section>
    <!--End Header-->
    <!--About section-->
    <section class="about py-5">
        <div class="container">
            <div class="about-cont py-3">
                <p class="pl-4"><span> بنك الدم</span> هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد
                    هذا النص من مولد النص العرب حيث يمكنك ان تولد هذا النص أو
                    العديد من النصوص الأخرى وإضافة الى زيادة عدد الحروف التى يولدها التطبيق يطلع على صورة حقيقة لتطبيق
                    الموقع
                </p>
            </div>
        </div>
        <!--End container-->
    </section>
    <!--End About-->
    <!--Articles section-->
    <section class="articles py-5">
        <div class="title">
            <div class="container">
                <h2><span class="py-1">المقالات</span> </h2>
            </div>
            <hr />
        </div>
        <div class="article-slide mt-3">
            <div class="container">
                <div class="arrow text-left">
                    <button type="button" class="prev-arrow px-2 py-1"><i class="fas fa-chevron-right"></i></button>
                    <button type="button" class="next-arrow px-2 py-1"><i class="fas fa-chevron-left"></i></button>
                </div>
                <div class="slick2">

                    @foreach($displayed_posts as $post)
                    <div class="slick-cont">
                        <div class="card">
                            <img src="{{asset('front/imgs/p1.jpg')}}" class="card-img-top" alt="slick-img">
                            <div class="heart-icon"><i class="far fa-heart"></i></div>
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p>
                                  {{$post->content}}
                                </p>
                                <div class="text-center"><a href="{{route('article_details',$post->id)}}" class="btn bg px-5">التفاصيل</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
        <!--End container-->
    </section>
    <!--End Articles-->
    <!--Donation-->
    <section class="donation">
        <h2 class="text-center"><span class="py-1">طلبات التبرع</span> </h2>
        <hr />
        <div class="donation-request py-5">
          <form id="search" action="#">
            <div class="container">
                <div class="selection w-75 d-flex mx-auto my-4">
                    <select id="search_bloodId" name="search_bloodId" class="custom-select">


                        <option selected disabled>اختر فصيلة الدم</option>
                        @foreach($blood_types as $b)
                        <option  value="{{$b->id}}">{{$b->name}}</option>
                      @endforeach
                    </select>
                    <select  name="city_id" id="search_cityId" class="custom-select mx-md-3 mx-sm-1">
                        <option selected disabled >اختر المدينة</option>
                        @foreach($cities as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                <div><button type="submit" class="fas fa-search"></button></div>


                </div>
                </form>
                <!--End selection-->
                @foreach($displayed_donations as $donation)
                <div id="search_area" class="req-item my-3">
                    <div class="row">
                        <div class="col-md-9 col-sm-12 clearfix">
                            <div class="blood-type m-1 float-right">
                                <h3>{{$donation->blood_kind->name}}</h3>
                            </div>
                            <div class="mx-3 float-right pt-md-2">
                                <p>
اسم الحالة:{{$donation->patient_name}}
                                </p>
                                <p>
اسم المستشفي:{{$donation->hospital_name}}
                              </p>
                                <p>
              اسم المدينة:  {{$donation->city->name}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 text-center p-sm-3 pt-md-5">
                            <a href="{{route('status_details',$donation->id)}}" class="btn btn-light px-5 py-3">التفاصيل</a>
                        </div>
                    </div>
                </div>
                @endforeach


    </section>
    <!--End Donation-->
    <!--Contact-us-->
    <section class="contact-us py-5 mt-4">
        <div class="container">
            <div class="row">
                <div class="contact-info col-md-6 col-sm-12 text-center">
                    <h4 class="text-center"><span class="brd">اتصل بنا </span> </h4>
                    <p class="my-5">يمكنك الأتصال بنا للاستفسار عن معلومة وسيتم الرد عليكم</p>
                    <div class="phone-nm mx-auto">
                        <p class="py-3 text-right" href="">002<span class="px-3">1215454551</span>+</p>
                        <img src="{{asset('front/imgs/whats.png')}}" alt="whats-phone">
                    </div>
                </div>
            </div>
        </div>
        <!--End container-->
    </section>
    <!--End Contact-us-->
    <!--blood-app-->
    <section class="blood-app py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="mt-5 mb-4">تطبيق بنك الدم</h4>
                    <p class="appText">هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد هذا النص من مولد
                        النص
                        العرب</p>
                    <div class="text-center avilb">
                        <h5 class="my-4">متوفر على</h5>
                        <img src="{{asset('front/imgs/google.png')}}" alt="">
                        <img src="{{asset('front/imgs/ios.png')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 my-3"><img src="{{asset('front/imgs/App.png')}}" class="img-fluid" alt=""></div>
            </div>
            <!--End row-->
        </div>
        <!--End container-->
    </section>
    <!--End blood-app-->
    <!--Footer-->
  <script type="text/javascript">
  $('#search').submit(function(e){
    e.preventDefault();
    let bloodIdSearch=$('#search_bloodId').val();
    let cityIdSearch=$('#search_cityId').val();

    if(bloodIdSearch != "")
    {
      $.ajax({
        url:'{{route('search')}}',
        method:'GET',
        data:{bloodIdSearch:bloodIdSearch,cityIdSearch:cityIdSearch},
        dataType:'html',
      success:function(data){
        $('#search_area').html(data);
        console.log(data);
      }

    });
  }

  });

  </script>
    @endsection
