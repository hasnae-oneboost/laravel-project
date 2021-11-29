<?php

namespace App\Http\Controllers;
use App\Role;
use App\Permission;
use DB;
use Illuminate\Support\Facades\Input;
use App\Acce;
use Auth;

use Illuminate\Http\Request;

class RoleController extends Controller
{  public function __construct()
    {
        $this->middleware('permission:Créer', ['only' => ['create', 'store']]);    
        $this->middleware('permission:Modifier', ['only' => ['edit', 'update']]);   
        $this->middleware('permission:Supprimer', ['only' => ['show', 'delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classe_administration=1;
        $classe_autorisation=1;
        $classe_role=1;

        $roles=Role::all();
        $permissions= Permission::all();
       $oldperm = Input::get('permission[]');
       $acces= new Acce;
       $acces->utilisateur= Auth::user()->name;
       $acces->page= 'Roles';
       $acces->date=date("Y-m-d h:i:s");
       $acces->save();
        return view('backoffice.roles',compact('classe_role','classe_administration','classe_autorisation','roles','permissions','oldperm'));
    
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
        $this->validate($request,[
            'permission' => 'required',
            'name'        => 'required',
            'description'=> 'required'    
            ]);
        
        $roles=Role::create($request->except(['permission']));

        foreach($request->permission as $key=>$value){
            $roles->attachPermission($value);
        }
        return back()->with('success', 'Ajout réussi');

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
      //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'permission' => 'required',
            'name'        => 'required',
            'description'=> 'required'    
            ]);
       $role=Role::findOrFail($request->id);
       $role->name=$request->name;
       $role->description=$request->description;
       $role->save();

       DB::table('permission_role')->where('role_id',$request->id)->delete();
       foreach($request->permission as $key=>$value){
        $role->attachPermission($value);
    }
    return back()->with('success', 'Modification réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $roles = Role::findOrFail($request->id);
        
        $roles->delete($request->all());
    
      
        return back()->with('success', 'Suppression réussie');
        
    }
}
