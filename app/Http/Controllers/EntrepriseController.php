<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use File;
use App\Entreprise;
use App\Acce;
use Auth;

class EntrepriseController extends Controller
{

    public function __construct()
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
        $classe_referentiel=1;
        $classe_entreprise=1;
            $entreprise = Entreprise::findOrFail(1);
            //return $entreprise;
            $acces= new Acce;
            $acces->utilisateur= Auth::user()->name;
            $acces->page= 'Données de l entreprise';
            $acces->date=date("Y-m-d h:i:s");
            $acces->save();
            return view('backoffice.entreprise',compact('entreprise','classe_referentiel','classe_entreprise'));
        
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
            'raison_sociale'     => 'required',
            'logoInput'          => 'image|mimes:jpeg,png',
            'IF'                 => 'required',
            'RC'                 => 'required',
            'adresse'            => 'required',
            'telephone'         => 'required',
            'fixe'              => 'required',
            'type'              => 'required',
            'capital'           => 'required',
            'cnss'              => 'required',
            'tp'                => 'required',
            'swift'             => 'required',
            'site'              => 'required', 
            'ice'               => 'required',
            'email'             => 'required|email'
        ], [
        
        
            'raison_sociale.required' => 'Veuillez compléter ce champ',
            //'logoInput.image' => '',
            'IF.required' => 'Veuillez compléter ce champ',
            'RC.required' => 'Veuillez compléter ce champ',
            'adresse.required' => 'Veuillez compléter ce champ',
            'telephone.required' => 'Veuillez compléter ce champ',
            'fixe.required' => 'Veuillez compléter ce champ',
            'type.required' => 'Veuillez compléter ce champ',
            'capital.required' => 'Veuillez compléter ce champ',
            'cnss.required' => 'Veuillez compléter ce champ',
            'tp.required' => 'Veuillez compléter ce champ',
            'swift.required' => 'Veuillez compléter ce champ',
            'site.required' => 'Veuillez compléter ce champ',
            'ice.required' => 'Veuillez compléter ce champ',
            'email.required' => 'Veuillez compléter ce champ',
            'email.email' => 'Saisissez une adresse email valide',
        ]);

        $entreprise = Entreprise::findOrFail(1);

        if($request->file('logoInput')){
        $logo = $request->file('logoInput');
        $logo_name = 'logo'. '.' . $logo->getClientOriginalExtension();
        $logo->move(public_path('images'),$logo_name);

        $entreprise->logo =$logo_name; 

            if($logo_name != $entreprise->logo){
                File::delete('images/'.$entreprise->logo);
            }
        }
          
        if($request->file('logoDocInput')){
            $logo = $request->file('logoDocInput');
            $logo_doc_name = 'logo_doc'. '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('images'),$logo_doc_name);
    
            $entreprise->logo_document =$logo_doc_name; 
    
                if($logo_doc_name != $entreprise->logo_document){
                    File::delete('images/'.$entreprise->logo_document);
                }
            }
            
        //$entreprise->update($request->all());
         $entreprise->raison_sociale = Input::get('raison_sociale');   
         $entreprise->IF = Input::get('IF');    
         $entreprise->RC = Input::get('RC');    
         $entreprise->adresse = Input::get('adresse');    
         $entreprise->telephone = Input::get('telephone');    
         $entreprise->fixe = Input::get('fixe');    
         $entreprise->type = Input::get('capital');    
         $entreprise->cnss = Input::get('cnss');    
         $entreprise->TP = Input::get('tp'); 
         $entreprise->swift = Input::get('swift');
         $entreprise->site = Input::get('site');    
         $entreprise->ice = Input::get('ice');
         $entreprise->email = Input::get('email');     
        
       
         $entreprise->save();
       return back()->with('success', 'Modification réussie');
       
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
