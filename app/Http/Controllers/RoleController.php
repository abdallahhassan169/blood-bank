<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
      */

    //  function __construct()
    // {
    //      $this->middleware('permission:roles-list');
    //      $this->middleware('permission:roles-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:roles-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:roles-delete', ['only' => ['destroy']]);
    //  }
    public function index()
    {
      $records=Role::paginate(20);
      return view('admin/roles/list',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $permission = Permission::get();
return view('admin/roles/create',compact('permission'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$rules=['name'=>'required','permission'=>'required|exists:permessions'];
$messages=['name.required'=>'name is required','permission.required'=>'permession is required'];
                        $this->validate($request,$rules,$messages
                        );



              $role = Role::create(['name' => $request->input('name')]);
              $role->syncPermissions($request->input('permission'));

                      flash()->success('success');
                  return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $record=Role::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=Role::findOrFail($id);
        //dd($model);
        return view('admin/roles/edit',compact('model'));
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
      $record=Role::findOrFail($id);
      $record->update($request->all());
      flash('updated')->success();
      return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=Role::findOrFail($id);
        $record->delete();

        return back();
    }
}
