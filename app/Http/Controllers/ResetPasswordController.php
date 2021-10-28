<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{

  public function resetpassword(){

    return view('admin.users.resetpassword');
  }
  public function updatePassword($id,Request $request)
  {

      $rules=['password'=>'required',
    'new_password'=>'required',
  'confirm_password'=>'required',];
      $messages=['name.required'=>'password is required',
    'new_password.required'=>'new password is required',
    'confirm_password.required'=>'confirm password is required',

  ];
                              $this->validate($request,$rules,$messages
                              );

 $user=User::findOrFail($id);
 if($user->password==$request->password)
 {
   return ok;
 }
  }
}
