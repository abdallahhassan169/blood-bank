<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Str;
use Mail;
use App\Client;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  private function apiResponse($status,$message,$data)
  {
    $response=[
    'status'=> $status,
    'message'=>$message,
    'data'=>$data,
];
return response()->json($response);

  }
  public function register(Request $request){

      $validation=validator()->make($request->all(),[

        'name'=>'required',
        'phone'=>'required|unique:clients,id',
        'e_mail'=>'required|unique:clients',
        'password'=>'required|confirmed',
        'last_donation_date'=>'required|before:today',
        'date_of_birth'=>'required|before:today',
        'blood_type_id'=>'required|exists:blood_types,id',//exist in table,table_name,the id
        'city_id'=>'required|exists:cities,id'


      ]);

if ($validation->fails()){

  return $this->apiResponse(0,'failed',$validation->errors());
}

$request->merge(['password'=>bcrypt($request->password)]);
$client=Client::create($request->all());
$client->api_token=str::random(60);
$client->save();


return $this->apiResponse(1,'success',[
  'api_token' =>$client->api_token,
  'client'=>$client
]);

  }
public function login(Request $request){
  $validation=validator()->make($request->all(),[

    'phone'=>'required',
    'password'=>'required',


  ]);
  $client=Client::where('phone',$request->phone)->first();
  if ($client)
  {
  if (Hash::check($request->password,$client->password))
  {
    return $this->apiResponse(1,'تم تسجيل الدخول',[
'api_token'=>$client->api_token,
'client'=>$client,

]);



  }
else
{
  return $this->apiResponse(0,'failed','no data to show');



}
}
else
{
  return $this->apiResponse(0,'failed','no data to show');


}

}



public function emailSending(Request $request)
{

  $user=Client::where('phone',$request->phone)->first();
  if($user)
  {
      $code=rand(1111,9999);
      $update=$user->update(['pin_code'=>$code]);
        if($update){

Mail::to($user ->e_mail)
  ->bcc("sovghab@gmail.com")
  ->send(new ResetPassword($code));




            return $this->apiResponse(1,'please check your phone',$code);
                  }
          else
           {
            return $this->apiResponse(0,'failed,please try again');
            }
}
else {
  return $this->apiResponse(0,'there is no mail attached to this phone','no data to show');
}


}
}
