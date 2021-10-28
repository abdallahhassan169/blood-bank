<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Governorate;
use App\City;

class governoratecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function __construct()
    // {
    //      $this->middleware('permission:governorate-list');
    //      $this->middleware('permission:governorate-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:governorate-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:governorate-delete', ['only' => ['destroy']]);
    // }
    public function index(Request $request)
    {
      $records = Governorate::where(function($q)use($request){
        if($request->has('name')){
          $q->where('name','like','%'.$request->name.'%');
        }
      })
      ->latest()->paginate(10);
      return view('admin/governorates/list',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
return view('admin/governorates/create');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$rules=['name'=>'required|min:3|max:50|regex:/^.*(?=.*[a-zA-Z]).*$/'];
$messages=['name.required'=>'name is required'];
                        $this->validate($request,$rules,$messages
                        );
                   $governorate=new Governorate;
                    $governorate->name=$request->name;
                  $governorate->save();
                  flash()->success('success');
                  return redirect(route('governorates.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $record=Governorate::findOrFail($id);
        $cities=City::where('governorate_id',$id)->get();

        return view('admin/governorates/show',compact('record','cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=Governorate::findOrFail($id);
        //dd($model);
        return view('admin/governorates/edit',compact('model'));
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
      $record=Governorate::findOrFail($id);
      $record->update($request->all());
      flash('updated')->success();
      return redirect(route('governorates.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=Governorate::findOrFail($id);
        if($record->cities()->count()){
           flash('hello')->success();
        }
        $record->delete();
        return back();
    }
}
