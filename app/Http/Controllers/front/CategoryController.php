<?php

namespace App\Http\Controllers\front;
use App\Category;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function categories()
    {
      $categories=Category::all();
      return view('front/categories',compact('categories'));
    }
    public function category_posts($id)
    {
      $category=Category::findOrFail($id);
        $posts=$category->posts()->paginate(10);
        return view('front/category-posts',compact('posts'));
    }

}
