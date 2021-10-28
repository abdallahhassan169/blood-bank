<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function __construct()
    // {
    //      $this->middleware('permission:users-list');
    //      $this->middleware('permission:users-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:users-delete', ['only' => ['destroy']]);
    // }
    public function index(Request $request)
    {
      $records = User::where(function($q)use($request){
        if($request->has('name')){
          $q->where('name','like','%'.$request->name.'%')->
          orWhere('email','like','%'.$request->name.'%');
        }
      })
      ->latest()->paginate(10);
      return view('admin/users/list',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
return view('admin/users/create');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request)
    {
$rules=['name'=>'required|min:3|max:50|regex:/^.*(?=.*[a-zA-Z0-9]).*$/','email'=>'required|email','password'=>'required|min:8|max:50'];
$messages=['name.required'=>'name is required','email.required'=>'email is required','password.required'=>'password is required'];
                        $this->validate($request,$rules,$messages
                        );


                          $user=User::create([
                               'name' => $request->name,
                               'email' => $request->email,
                               'password' => Hash::make($request->password),


                           ]);
                           $user->assignRole($request->input('roles'));
                          $user->roles()->attach($request->input('roles'));
                  flash()->success('success');
                  return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $record=User::findOrFail($id);
        return view('admin/users/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record=User::findOrFail($id);
        //dd($model);
        return view('admin/users/edit',compact('record'));
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
      $record=User::findOrFail($id);

                                  $user=User::update([
                                     'name' => $request->name,
                                     'email' => $request->email,
                                     'password' => Hash::make($request->password),

                                 ]);
                                 $user->roles()->sync((array)$request->input('roles'));
      flash('updated')->success();
      return redirect(route('users.index'),compact('record'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=User::findOrFail($id);

        $record->delete();
        return back();
    }
}
