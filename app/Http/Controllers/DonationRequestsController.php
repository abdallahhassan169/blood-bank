<?php

namespace App\Http\Controllers;
use App\DonationRequest;
use Illuminate\Http\Request;

class DonationRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function __construct()
    // {
    //      $this->middleware('permission:donations-list');
    //      $this->middleware('permission:donations-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:donations-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:donations-delete', ['only' => ['destroy']]);
    // }
    public function index(Request $request)
    {
      $records = DonationRequest::where(function($q)use($request){
        if($request->has('name')){
          $q->where('patient_name','like','%'.$request->name.'%')->
          orWhere('patient_phone','like','%'.$request->name.'%');        }
      })
      ->latest()->paginate(10);
      return view('admin/donation_requests/list',compact('records'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin/donation_requests/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

              $rules=[
            'patient_name'=>'required|min:3|max:50',
            'patient_phone'=>'required|min:11|max:11',
            'city'=>'required|min:3|max:50|regex:/^.*(?=.*[a-zA-Z0-9]).*$/',
            'blood_type'=>'required|max:50',
            'hospital_address'=>'required|min:3|max:50',
            'hospital_name'=>'required|min:3|max:50',
            'created_at'=>'required|date',


            ];
              $messages=['patient_name.required'=>'name is required',
            'patient_phone.required'=>'phone is required',
            'city.required'=>'city is required',
            'hospital_address.required'=>'hospiall address is required',
            'hospital_name.required'=>'hospital name is required',
            'created_at.required'=>'date is required',
            'blood_type.required'=>'blood type is required',
          ];
                                      $this->validate($request,$rules,$messages
                                      );
                                 $donation_request=new DonationRequest;
                                $donation_request->create($request->all());
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

        $record=DonationRequest::findOrFail($id);
        return view('admin/donation_requests/show',compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

          $record=DonationRequest::findOrFail($id);
          return view('admin/donation_requests/edit',compact('record'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $record=DonationRequest::findOrFail($id);
        $record->update($request->all());
        return redierect(route('donation_requests.list'));
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
