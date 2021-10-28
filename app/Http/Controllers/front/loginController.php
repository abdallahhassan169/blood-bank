<?php

namespace App\Http\Controllers\front;
use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class loginController extends Controller
{
  public function signin(){

    return view('front/signin');
  }


 public function loggedin(Request $request){
   $validation=validator()->make($request->all(),[

     'phone'=>'required|exists:visitors,phone|min:3|max:50',
     'password'=>'required:min:8|max:50',


   ]);
   if($validation->fails()){
     $eror=$validation->errors()->first();
     flash()->warning($eror);
     return back();

   }
   if(auth()->guard('clients')->attempt(['phone'=>$request->input('phone'),'password'=>$request->input('password')])){
     return redirect(route('articles'));
   }
   else{
     return back()->withErrors($validation);

   }


 }
 public function loggedout(Request $request)
 {
     auth()->guard('clients')->logout();
     return  redirect(route('signin'));
 }

}
