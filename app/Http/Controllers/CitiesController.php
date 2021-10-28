<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Governorate;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function __construct()
    // {
    //      $this->middleware('permission:city-list');
    //      $this->middleware('permission:city-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:city-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:city-delete', ['only' => ['destroy']]);
    // }
    public function index(Request $request)
    {
      $records = City::where(function($q)use($request){
        if($request->has('name')){
          $q->where('name','like','%'.$request->name.'%');
          }
      })
      ->latest()->paginate(10);

        return view('admin/cities/list',compact('records'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $governorates=Governorate::all();
        return view('admin/cities/create',compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

  $rules=['name'=>'required|min:3|max:50',
'governorate_id'=>'required|exist:governorates,id'];
  $messages=['name.required'=>'name is required',
'governorate.required'=>'governorate is required'];
                          $this->validate($request,$rules,$messages
                          );
                     $city=new City;
                      $city->name=$request->name;
                      $city->governorate_id=$request->governorate_id;
                    $city->save();
                    return redirect('/index');
                    flash('Message')->success();
    }

    /**
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
      $governorates=Governorate::all();
      $model=City::findOrFail($id);
        return view('admin/cities/edit',compact('model','governorates'));
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
        $record=City::findOrFail($id);
        $record->update($request->all());
        return redierct('admin/cities/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

          $record=City::findOrFail($id);
          $record->delete();
          return redierct('admin/cities/list');
    }
}
