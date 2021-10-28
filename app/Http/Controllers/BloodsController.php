<?php

namespace App\Http\Controllers;
use App\BloodType;
use Illuminate\Http\Request;

class BloodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function __construct()
    // {
    //      $this->middleware('permission:bloods-list');
    //      $this->middleware('permission:bloods-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:bloods-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:bloods-delete', ['only' => ['destroy']]);
    // }
    public function index()
    {
        $record=BloodType::paginate(20);
        return view('admin/bloods/list',compact('record'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/bloods/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

  $rules=['name'=>'required|max:10'];
  $messages=['name.required'=>'name is required'];
                          $this->validate($request,$rules,$messages
                          );
      $record= new BloodType;
      $record->create($request->all());
      return redirect(route('bloods.index'));
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
      $model=BloodType::findOrFail($id);
        return view('admin/bloods/edit',compact('model'));
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

        $record=BloodType::findOrFail($id);
        $record->update($request->all());
        return redirect(route('bloods.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $record=BloodType::findOrFail($id);
      $record->delete();
      flash()->success('deleted');
      return redirect(route('bloods.index'));
    }
}
