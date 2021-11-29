<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\{Role,Client,Parc};
use DB;
use App\Acce;
use Auth;
use Illuminate\Support\Facades\Input;

class UtilisateursController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classe_administration=1;
        $classe_autorisation=1;
        $classe_users=1;
        $users = User::all();
        $clients = Client::all();
        $parc = Parc::all();

        $roles = Role::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Gestion des utilisateurs';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
       
        return view('backoffice.utilisateurs',compact('clients','parc','classe_autorisation','classe_users','classe_administration','users','roles'));
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
        $users= new User;
        //Validation
        $this->validate($request,[
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'prenom' => 'required|string|max:255',
            'login' => 'required|max:255',
            'matricule' => 'required|max:255',
            ]);

        
        $users->name=$request->nom;
        $users->email=$request->email;
        $users->matricule=$request->matricule;
        $users->prenom=$request->prenom;
        $users->login=$request->login;
        $users->password=bcrypt($request->password);
        if(Input::get('client'))
            $users->client_id= Input::get('client');
        else    
            $users->client_id=null;
        if(Input::get('parc'))   
            $users->parc_id =  Input::get('parc');
        else    
            $users->parc_id=null;
        
        $users->save();
        
        foreach($request->role as $key=>$value){
            $users->attachRole($value);
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
        $users =User::findOrFail($request->id);
        //Validation
        $this->validate($request,[
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$users->id,
            'password' => 'confirmed',
            'prenom' => 'required|string|max:255',
            'login' => 'required|max:255',
            'matricule' => 'required|max:255',
            ]);

        
        $users->name=$request->nom;
        $users->email=$request->email;
        $users->matricule=$request->matricule;
        $users->prenom=$request->prenom;
        $users->login=$request->login;
        $users->password=bcrypt($request->password);

        if(Input::get('client'))
            $users->client_id= Input::get('client');
        else    
            $users->client_id=null;
        if(Input::get('parc'))   
            $users->parc_id =  Input::get('parc');
        else    
            $users->parc_id=null;
        

        $users->save();
 
        DB::table('role_user')->where('user_id',$request->id)->delete();
        foreach($request->role as $key=>$value){
            $users->attachRole($value);
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
        $users = User::findOrFail($request->id);
        
        $users->delete($request->all());
    
      
        return back()->with('success', 'Suppression réussie');
    }
}
