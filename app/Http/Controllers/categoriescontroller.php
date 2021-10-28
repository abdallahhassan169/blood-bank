<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class categoriescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function __construct()
    // {
    //      $this->middleware('permission:category-list');
    //      $this->middleware('permission:category-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    // }
    public function index(Request $request)
    {
      $records = Category::where(function($q)use($request){
        if($request->has('name')){
          $q->where('name','like','%'.$request->name.'%');
          }
      })
      ->latest()->paginate(10);

        return view('admin/categories/list',compact('records'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin/categories/add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

             $this->validate($request,[
               'name' => 'required|min:3|max:50'
             ]);
        $category=new Category;
         $category->name=$request->name;
       $category->save();
       return redirect('/index');
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

                    $record=Category::findOrFail($id);
                    return view('admin/categories/edit',compact('record'));
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

                    $record=Category::findOrFail($id);
                    $record->update();
                    return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

                          $record=Category::findOrFail($id);
                          $record->delete();
                          return redirect(route('categories.index'));
    }
}
