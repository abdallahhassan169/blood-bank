<?php

namespace App\Http\Controllers\front;
use App\Governorate;
use App\City;
use App\Contact;
use App\Notification;
use App\Categeory;
use App\Setting;
use App\Post;
use App\Category;
use App\Client;

use App\Token;
use App\DonationRequest;

use App\BloodType;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home(Request $request)
    {

          $displayed_posts=Post::paginate(3);
          $donations=DonationRequest::all();
          $settings=Setting::first();
          $blood_types=BloodType::all();
          $cities=City::all();
          $governorates=Governorate::all();
          $posts=Post::all();
          $contacts=Contact::all();
          $clients=Client::all();
          $displayed_donations=DonationRequest::paginate(3);

view()->share(compact('settings','blood_types','cities','governorates','posts','contacts','donations','clients','displayed_donations','displayed_posts'));
       return view('front/home');
    }
    public function search(Request $request){
      $displayed_donations=DonationRequest::where(function($q) use($request)
      {

        if($request->has('cityIdSearch'))
        {
          $q->where('city_id',$request->cityIdSearch);
        }
        if($request->has('bloodIdSearch'))
        {
          $q->where('blood_type_id',$request->bloodIdSearch);
        }
      })->paginate(3);
      $output='';
      foreach ($displayed_donations as $donation) {
        $output.='  <div class="req-item my-3">
              <div class="row">
                  <div class="col-md-9 col-sm-12 clearfix">
                      <div class="blood-type m-1 float-right">
                          <h3>'.$donation->blood_type->name.'</h3>
                      </div>
                      <div class="mx-3 float-right pt-md-2">
                          <p>
اسم الحالة:'.$donation->patient_name.'
                          </p>
                          <p>
اسم المستشفي:'.$donation->hospital_name.'
                        </p>
                          <p>
        اسم المدينة:  '.$donation->city->name.'
                          </p>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-12 text-center p-sm-3 pt-md-5">
                  <a href="'.route('status_details',$donation->id).'" class="btn btn-light px-5 py-3">التفاصيل</a>

                  </div>
              </div>
          </div><br>';


}
return $data = array('result' =>$output, );;

    }
    public function about_us()
    {
        return view('front/about-us');
    }
    public function article_details($id)
    {
       $article=Post::findOrFail($id);
       $related=Post::where('content','like','%'.$article->content.'%')->
       orWhere('title','like','%'.$article->title.'%')->paginate(3);
        return view('front/article-details',compact('article','related'));
    }
    public function contact()
    {
        return view('front/contact');
    }
    public function signin()
    {
        return view('front/signin');
    }
    public function signup()
    {
        return view('front/signup');
    }

    public function articles()
    {
      $articles=Post::paginate(15);
        return view('front/articles',compact('articles'));
    }

        public function about_bank()
        {
            return view('front/about_bank');
        }
public function my_info()
{

    $blood_types=BloodType::all();
    $city=City::all();
  return view('front/my_info',compact('blood_types','city'));
}
public function settings()
{
  $client_govs=auth()->guard('clients')->user()->governorates()->get();
  $blood_types=BloodType::all();
  $governorates=Governorate::all();
  $client=auth()->guard('clients')->user();
  $select_govs=$client->governorates()->get();
  $select_bloods=$client->bloodTypes()->get();




  return view('front/settings',compact('blood_types','client','select_bloods','select_govs','governorates'));
}
public function settings_create(Request $request)
{
  $client=auth()->guard('clients')->user();
  $select_govs=$client->governorates()->get();
  foreach ($select_govs as $g) {
    $gov_ids=array($g->id);
    $client->governorates()->detach($gov_ids);

  }
  $select_bloods=$client->bloodTypes()->get();
  foreach ($select_bloods as $blood) {
    $blood_ids=array($blood->id);
    $client->bloodTypes()->detach($blood_ids);

  }
        if($client->governorates()->get()&&$client->bloodTypes()->get()){
          $client->governorates()->attach($request->governorate_id);
          $client->bloodTypes()->attach($request->blood_type_id);
}
else{
  $client->governorates()->attach($request->governorate_id);
  $client->bloodTypes()->attach($request->blood_type_id);
}

              flash()->success('تم اطلاق الاشعارات بنجاح');
              return back();
}


}
