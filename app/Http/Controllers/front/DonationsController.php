<?php

namespace App\Http\Controllers\front;
use App\BloodType;
use App\Governorate;
use App\City;
use App\DonationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonationsController extends Controller
{
  public function donation_create(Request $request)
  {
    $blood_types=BloodType::all();
      $cities=City::all();
    $governorates=Governorate::all();
    return view('front/donation_create',compact('blood_types','cities','governorates'));
  }
  public function donation_store(Request $request)
  {

             $validation=validator()->make($request->all(),[

               'patient_name'=>'required|min:3|max:50',
               'patient_phone'=>'required|unique:visitors,phone|min:11|max:11',
               'city_id'=>'required|exists:cities,id',
               'blood_kind_id'=>'required|exists:blood_kinds,id',//exist in table,table_name,the id

               'hospital_address'=>'required|min:3|max:50|',
               'hospital_name'=>'required|min:3|max:50|',


             ]);
             if($validation->fails()){
               $eror=$validation->errors()->first();
               return $eror;
               }

             $new_donation=new DonationRequest;
             $donation=$new_donation::create($request->all());
             flash()->success('تمت اضافة طلبك بنجاح ...شكرا لاستخدامك بنك الدم');
             return redirect(route('donations'));


}
  public function status_details($id)
  {
    $blood_types=BloodType::all();
    $city=City::all();
    $donation=DonationRequest::findOrFail($id);
      return view('front/status-details',compact('donation','city','blood_types','id'));
  }

  public function donations()
    {
      $blood_types=BloodType::all();
      $cities=City::all();
      $donations=DonationRequest::all();
        return view('front/donations',compact('donations','cities','blood_types'));
    }

}
