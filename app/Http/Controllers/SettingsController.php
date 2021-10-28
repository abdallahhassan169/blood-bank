<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:settings-list');
    //      $this->middleware('permission:settings-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:settings-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:settings-delete', ['only' => ['destroy']]);
    // }
    public function index()
    {
        return view('admin/settings/list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $setting=Setting::first();
        return view('admin/settings/create',compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

  $rules=['phone'=>'required|min:11|max:11','email'=>'required|email','fb_link'=>'required|min:3','t_link'=>'required','about_app'=>'required','whats_link'=>'required','setting_text'=>'required'];
  $messages=['name.required'=>'name is required','email.required'=>'email is required','password.required'=>'password is required'];
                          $this->validate($request,$rules,$messages
                          );


                    $user=Setting::create($request->all());
                    flash()->success('success');
                    return back();
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
