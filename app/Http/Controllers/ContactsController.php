<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //
    // function __construct()
    // {
    //      $this->middleware('permission:contacts-list');
    //      $this->middleware('permission:contacts-create', ['only' => ['create','store']]);
    //       $this->middleware('permission:contacts-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:contacts-delete', ['only' => ['destroy']]);
    // }
    public function index(Request $request)
    {
      $records = Contact::where(function($q)use($request){
        if($request->has('name')){
          $q->where('f_b_link','like','%'.$request->name.'%')->
          orWhere('t_link','like','%'.$request->name.'%')->
          orWhere('g_mail','like','%'.$request->name.'%');
        }
      })
      ->latest()->paginate(10);
      return view('admin/contacts/list',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

              $record=Contact::findOrFail($id);
              return view('admin/contacts/read',compact('record'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $record=DonationRequest::findOrFail($id);
      $record->delete();
    }
}
