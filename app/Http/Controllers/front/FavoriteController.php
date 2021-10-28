<?php
namespace App\Http\Controllers\front;
use App\Client;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function favorites()
    {
      $client=auth()->guard('clients')->user();
      $favorites=$client->posts()->get();

      return view('front/favorites',compact('favorites'));
    }

    public function favorite_make(Request $request)
    {
      if($request->ajax()){
        $visitor=auth()->guard('clients')->user();
        $post_id=$request->input('post_id');
        $visitor->posts()->toggle($request->post_id);

        return $request;
      }
     }
}
