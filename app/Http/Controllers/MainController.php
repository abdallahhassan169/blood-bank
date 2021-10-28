<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use App\Governorate;
use App\City;
use App\Contact;
use App\Notification;
use App\Categeory;
use App\Setting;
use App\Post;
use App\Category;

use App\Token;
use App\DonationRequest;

use App\BloodType;


class MainController extends Controller
{
  private function apiResponse($status,$message,$data){
    $response=[
    'status'=> $status,
    'message'=>$message,
    'data'=>$data,
];
return response()->json($response);

  }

  public function governorates(){

    $governorates=Governorate::all();
    return $this->apiResponse(1,'sucsess',$governorates);
}


  public function cities(Request $request){

    $cities=City::where('governorate_id',$request->governorate_id)->get();
    return $this->apiResponse(1,'sucsess',$cities);
}

public function posts(Request $request){

$posts=Post::where(function($q) use($request){

  if($request->name)
  {
    $q->where('title' , 'LIKE' , '%' . $request->name . '%')
    ->orWhere('content' , 'LIKE' , '%' . $request->name . '%');
  }

    if($request->post_id)
    {
      $q->where('id' , $request->id);
    }

})->latest()->paginate(10);// filter
return $this->apiResponse(1,'success',$posts);

}
public function bloodTypes()
{

  $blood_types=BloodType::all();
  return $this->apiResponse(1,'success',$blood_types);

}
public function settings()
{
  $settings=Setting::find(1);

  return $this->apiResponse(1,'success',$settings);



}
public function contacts(Request $request){

        $validation=validator()->make($request->all(),[

          'email'=>'required',
          'phone'=>'required',
          'text'=>'required',
          'name'=>'required',

        ]);
        $contact=Contact::create($request->all());

          return $this->apiResponse(1,'success',$contact);




}
public function post(Request $request)
{
  // $client=Client::find($id);
$posts=$request->user()->posts()->find($request->post_id);
return $this->apiResponse(1,'success',$posts);



}

public function notifactionList(request $request)
{
  $notifactions= $request->user()->notifications()->paginate();//def 15
return $this->apiResponse(1,'success',$notifactions);




}
public function categoryPosts(Request $request)
{

  $category=Category::where(function($q) use($request){

    if($request->name)
    {
      $q->where('title' , 'LIKE' , '%' . $request->name . '%')
      ->orWhere('content' , 'LIKE' , '%' . $request->name . '%');
    }

      if($request->post_id)
      {
        $q->where('id' , $request->id);
      }

  })->latest()->paginate(10);


return $this->apiResponse(1,'success',$category);


}



public function donationRequests()
{
$donation_requests=DonationRequest::all();//pag

  return $this->apiResponse(1,'success',$donation_requests);
}
public function favorite(Request $request)
{
      $request->user()->favorites()->toggle($request->post_id);
       return apiResponse(1,'success','is favorited');

 }
 public function donationRequestCreate(request $request)
 {

         $validation=validator()->make($request->all(),[

           'patient_name'=>'required',
           'patient_phone'=>'required|unique:clients,id',
           'city_id'=>'required|exists:cities,id',
           'blood_type_id'=>'required|exists:blood_types,id',//exist in table,table_name,the id
           'client_id'=>'required',
           'hospital_address'=>'required',
           'hospital_name'=>'required',


         ]);

   if ($validation->fails()){

     return $this->apiResponse(0,'failed',$validation->errors());
   }
 $donationRequest=$request->user()->donationRequest()->create($request->all());

 $clientIds=$donationRequests->city;/*->governorate->clients()->whereHas('bloodtypes',function($q)use($request){
   $q->where('blood_types.id',$request->blood_type_id);
 })->pluck('clients.id')->toArray();*/
 if(count($clientIds))
 {
 $notifactions=$donationRequest->notifactions()->create([
   'tittle'=>'احتاج متبرع لفصيلة',
   'content'=>$request->user()->name.'محتاج متبرع لفصيلة',
 ]);
 $notifaction->clients()->attach($clientIds);
 $tokens=Token::whereIn('client_id',$clientIds)->pluck('token','!=','null')->toArray();
 $tokens=$client->tokens()->where('token','!=','')->whereIn('client_id',$clientIds)->pluck('token')->toArray();
 if(count($tokens))
 {
 $audience=['include_players_ids'=>$tokens];
 $content='يوجد اشعار من'.$request->user()->name();

 $title=$notifaction->title;
 $content=$notifaction->content;
 $data=[
 'action'=>'new notify',
 'data'=>null,
 'client'=>'client',
 'title'=>$notifaction->title,
 'content'=>$notifaction->content,
 'id'=>$donationRequest->id

 ];
   info(json_encode($data));

   $send=notifyByFirebase($title,$content,$tokens,$data);
   info($send);

   info("firebase result".$send);
   $send=json_decode($send);
   return $this->apiResponse(1,'تم الاضافة بنجاح',$donationRequest->load('city'));
 }


 }

}

public function tokenCreate(Request $request)
{

        $validation=validator()->make($request->all(),[

          'token'=>'required',
            'client_id'=>'required',
          'platform'=>'required',


        ]);

  if ($validation->fails()){

    return $this->apiResponse(0,'failed',$validation->errors());
  }
Token::where('token',$request->token->delete());
$request->user()->tokens()->create($request->all());
return $this->apiResponse(1,'success','تم التسجيل بنجاح');

}
public function tokenRemove(Request $request)
{
  if($request->token!==null){
  Token::where('token',$request->token->delete());
  return $this->apiResponse(1,'success','تم الخروج');
}



}
public function notifacationSettings(Request $request)
{


          $validation=validator()->make($request->all(),[

            'api_token'=>'required',
              'governorate_id'=>'required',
            'blood_type_id'=>'required',


          ]);

    if ($validation->fails()){

      return $this->apiResponse(0,'failed',$validation->errors());
    }
else
{
  $settings=$request->all();
return $this->apiResponse(1,'success',$settings);


}


}
public function newPassword(Request $request)
{


            $validation=validator()->make($request->all(),[
              'pin_code'=>'required',
              'password'=>'required',


            ]);

      if ($validation->fails()){

        return $this->apiResponse(0,'failed',$validation->errors());
      }
  else
  {
  $current_pin_code = Auth::Client()->pin_code;
  if(Hash::check($request->pin_code, $current_pin_code)){

        $user_id = Auth::Client()->id;
        $obj_client = Client::find($client_id);
        $obj_user->password = Hash::make($request->password['password']);;
        $obj_user->save();

  return $this->apiResponse(1,'success','your password changed to'.$current_password);
}


else{
return $this->apiResponse(0,'failed','phone is incorrect');

}

}

}

public function donationRequestDetails()
{
$details=DonationRequest::paginate(10);
return $this->apiResponse(1,'success',$details);


}
public function notifactionsCount(Request $request)
{

$x = $request->user()->notifactions()->where('client_notification.is_read',0)->count();
return $x;
}


}
