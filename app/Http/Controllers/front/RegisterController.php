<?php

namespace App\Http\Controllers\front;
use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\BloodType;
use App\Governorate;
use App\City;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
  public function signup(){

      $blood_types=BloodType::all();
      $cities=City::all();
      $governorates=Governorate::all();
    return view('front/signup',compact('blood_types','cities','governorates'));

  }
  public function register(Request $request){


      $validation=validator()->make($request->all(),[

        'name'=>'required|min:3|max:50',
        'phone'=>'required|unique:visitors,phone',
        'e_mail'=>'required|email|unique:visitors',
        'password'=>'required|confirmed|min:8|max:50',
        'last_donation_date'=>'required|before:today',
        'date_of_birth'=>'required|before:today',
        'blood_type_id'=>'required|exists:blood_kinds,id',//exist in table,table_name,the id
        'city_id'=>'required|exists:cities,id'


      ]);

      if($validation->fails()){
        $eror=$validation->errors()->first();
        flash()->warning($eror);
        return back();

      }

$request->merge(['password'=>bcrypt($request->password)]);
$client=Client::create($request->all());
$client->api_token=str::random(60);
$client->save();
return redirect(route('signin'));
flash()->success('تمت الاضافة بنجاح');



  }
}
