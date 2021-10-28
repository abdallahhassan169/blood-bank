<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class AdminController extends Controller
{
  public function index()
  {
      return view('admin/index');


  }
  public function statistics()
  {
    return view('admin/statistics');

  }

  public function home()
  {
    return view('home');

  }
}
