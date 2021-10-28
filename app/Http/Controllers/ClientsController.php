<?php

namespace App\Http\Controllers;
use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function __construct()
    // {
    //      $this->middleware('permission:clients-list');
    //      $this->middleware('permission:clients-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:clients-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:clients-delete', ['only' => ['destroy']]);
    // }
    public function index(Request $request)
    {
      //$search = \Request::get('search');
      $records = Client::where(function($q)use($request){
        if($request->has('name')){
          $q->where('name','like','%'.$request->name.'%')->
          orWhere('phone','like','%'.$request->name.'%')->
          orWhere('e_mail','like','%'.$request->name.'%');
        }
      })
      ->latest()->paginate(10);
    //  dd($clients);

        return view('admin/clients/list',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

              $record=Client::findOrFail($id);
              return view('admin/clients/show',compact('record'));
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
        $record=Client::findOrFail($id);
        $record->delete();
        return redierect(route('clients.index'));
        flash()->success('deleted');
    }
}
