<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

use App\Motifsdecaissement;
use App\Categoriesmotifsdecaissement;
use App\Acce;
Use Auth;

class MotifsDecaissementController extends Controller
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
        $classe_utilisation=1;
        $classe_caisse=1;
        $classe_motif_decaissement=1;
        $decaissement = Categoriesmotifsdecaissement::all();
        //Gestion d'acces
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Motifs d encaissemnt';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        $numero_compte_id= Input::get('numero_compte_id');
        $libelle_id= Input::get('libelle_id');
        $categorie_id=Input::get('categorie_id');

        if($numero_compte_id !=''){          
            $motifs=Motifsdecaissement::where('id',$numero_compte_id)->get();  
        }
        elseif($libelle_id != ''){
            $motifs=Motifsdecaissement::where('id',$libelle_id)->get();            
        }
        elseif($categorie_id != ''){
            $motifs=Motifsdecaissement::where('categorie_motif_id',$categorie_id)->get();            
        }
        elseif($numero_compte_id !='' && $libelle_id != '' && $categorie_id !=''){          
            $motifs=Motifsdecaissement::where('id',$numero_compte_id)->where('id',$libelle_id)->where('categorie_motif_id',$categorie_id)->get();  
        }                 
        else
            $motifs=Motifsdecaissement::paginate(15);       



        $selected_num_compte= Input::get('numero_compte_id');
        $selected_categorie=Input::get('categorie_id');
        $selected_libelle=Input::get('libelle_id');

        return View('backoffice.motifs_decaissement',compact('motifs','decaissement','selected_libelle','selected_categorie','selected_num_compte','classe_referentiel','classe_utilisation','classe_caisse','classe_motif_decaissement'));
    
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
        $motifs= new Motifsdecaissement;
        //Validation
        $this->validate($request,[
            'code'          => 'required|unique:motifs_decaissements,code',
            'libelle'          => 'required',
            'numero_compte_comptable'          => 'required',
            'categorie_motif_id'          => 'required',
            'description'          => 'required',
            
        ]);
        
        $motifs->code = Input::get('code');
        $motifs->libelle = Input::get('libelle');
        $motifs->numero_compte_comptable = Input::get('numero_compte_comptable');
        $motifs->categorie_motif_id = Input::get('categorie_motif_id');
        $motifs->description = Input::get('description');
        $motifs->ajoute_par = Auth::user()->name;
        $motifs->modifie_par = ' ';
        
        $motifs->save();

        return back()->with('success','Ajout réussi');
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
        $motifs= Motifsdecaissement::findOrFail($request->id);
        //Validation
        $this->validate($request,[
            'code'          => 'required|unique:motifs_decaissements,code,'.$motifs->id,
            'libelle'          => 'required',
            'numero_compte_comptable'          => 'required',
            'categorie_motif_id'          => 'required',
            'description'          => 'required',
            
        ]);
        
        $motifs->code = Input::get('code');
        $motifs->libelle = Input::get('libelle');
        $motifs->numero_compte_comptable = Input::get('numero_compte_comptable');
        $motifs->categorie_motif_id = Input::get('categorie_motif_id');
        $motifs->description = Input::get('description');
        $motifs->modifie_par = Auth::user()->name;
        
        $motifs->save();

        return back()->with('success','Modification réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $motifs= Motifsdecaissement::findOrFail($request->id);
        $motifs->delete($request->all());
        return back()->with('success','Suppression réussie');
    }
}
