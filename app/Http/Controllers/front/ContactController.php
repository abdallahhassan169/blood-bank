<?php

namespace App\Http\Controllers\front;
use App\Setting;
use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact_create()
    {
      $settings=Setting::first();
      return view('front/contact',compact('settings'));

    }
    public function contact_store(Request $request)
    {
      $validation=validator()->make($request->all(),[

        'g_mail'=>'required|min:3',
        'telephone'=>'required:min:11|max:11',
        'name'=>'required:min:3|max:50',
        'text'=>'required|min:10|max:50',

      ]);
      
      if($validation->fails()){
        $eror=$validation->errors()->first();
        flash()->warning($eror);
        return back();

      }
      $new_contact=new Contact;
      $contact=$new_contact::create($request->all());
      flash()->success('شكرا علي تواصلكم معنا');
      return back();
    }
}
