<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modele;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Marque;
use App\Gamme;


class ModeleController extends Controller
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
        $classe_classement=1;
        $classe_class=1;
        $classe_modele=1;

        $nom= Input::get('nom_modele');
        $marque= Input::get('marque');
        $gamme= Input::get('gamme');

        $marques= Marque::all();
        $gammes= Gamme::all();
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modèles';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        if($nom != '' && $gamme != '' && $marque != '')
            $modeles = Modele::where('nom',$nom)
                        ->where('marque_id',$marque)
                        ->where('gamme_id',$gamme)
                        ->paginate(15);
        elseif($nom != '' && $gamme != '')
            $modeles = Modele::where('nom',$nom)
            ->where('gamme_id',$gamme)
            ->paginate(15);                
        elseif($gamme != '' && $marque != '')
            $modeles = Modele::where('marque_id',$marque)
            ->where('gamme_id',$gamme)
            ->paginate(15);                
        elseif($nom != '' && $marque != '')
            $modeles = Modele::where('nom',$nom)
            ->where('marque_id',$marque)
            ->paginate(15);                
            
        elseif($nom != '')
            $modeles = Modele::where('nom',$nom)->paginate(15);
        elseif($gamme != '') 
            $modeles = Modele::where('gamme_id',$gamme)->paginate(15);
        elseif($marque != '') 
            $modeles = Modele::where('marque_id',$marque)->paginate(15);        
        else
            $modeles = Modele::paginate(15);
        

        $selected_nom=Input::get('nom_modele');
        $selected_marque= Input::get('marque');
        $selected_gamme= Input::get('gamme');

        return view('backoffice.modeles',compact('selected_marque','selected_gamme','selected_nom','gammes','marques','modeles','classe_class','classe_referentiel','classe_classement','classe_modele'));
   
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
        $modeles = new Modele;

       //Validation
       $this->validate($request,[
        'gamme'      => 'required',
        'marque'      => 'required',
        'categorie_vehicule'    => 'required',
        'confort'    => 'required',
        'nom'    => 'required',
        'annee'    => 'required',
        'energie'    => 'required',
        'cv_fiscaux'    => 'required|numeric',
        'nombre_portes'    => 'required|numeric',
        'montant_ht'    => 'required|numeric',
        'montant_tva'    => 'required|numeric',
        'montant_ttc'    => 'required|numeric',
        'boite_vitesse'    => 'required',
        'cylindree'    => 'required',
        'moteur'    => 'required',
        'cv_moteur'    => 'required|numeric',
        'transmission'    => 'required',
        'acceleration'    => 'required|numeric',
        'vitesse_max'   =>  'required|numeric',
        'hauteur'   =>  'required|numeric',
        'largeur'   =>  'required|numeric',
        'longueur'   =>  'required|numeric',
        'poids_vide'   =>  'required|numeric',
        'ptc'   =>  'required|numeric',
        'urbaine'   =>  'required|numeric',
        'puissance_fiscale'   =>  'required|numeric',
        'couple'   =>  'required|numeric',
        'volume_reservoir1'   =>  'required|numeric',
        'volume_reservoir2'   =>  'required|numeric',
        'montant_vignette'   =>  'required|numeric',
        'description'   =>  'required',
        'intervalle_revision'   =>  'required|numeric',
        'marge_tolerance'   =>  'required|numeric',
    ]);
      
        $modeles->gamme_id = Input::get('gamme');
        $modeles->marque_id = Input::get('marque');
        $modeles->categorie_id = Input::get('categorie_vehicule');
        $modeles->confort_id = Input::get('confort');
        $modeles->nom =  Input::get('nom');
        $modeles->annee = Input::get('annee');
        $modeles->energie_id = Input::get('energie');
        $modeles->cv_fiscaux = Input::get('cv_fiscaux');
        $modeles->nombre_portes = Input::get('nombre_portes');
        $modeles->prix_ht =Input::get('montant_ht');
        $modeles->tva =Input::get('montant_tva');
        $modeles->ttc =Input::get('montant_ttc');
        $modeles->boite_vitesse =Input::get('boite_vitesse');
        $modeles->cylindree =Input::get('cylindree');
        $modeles->moteur =Input::get('moteur');
        $modeles->cv_moteur =Input::get('cv_moteur');
        $modeles->transmission =Input::get('transmission');
        $modeles->acceleration =Input::get('acceleration');
        $modeles->vitesse_max= Input::get('vitesse_max');
        $modeles->hauteur= Input::get('hauteur');
        $modeles->largeur= Input::get('largeur');
        $modeles->longueur= Input::get('longueur');
        $modeles->poids_vide= Input::get('poids_vide');    
        $modeles->ptc= Input::get('ptc');    
        $modeles->urbaine= Input::get('urbaine');    
        $modeles->puissance_fiscale= Input::get('puissance_fiscale');    
        $modeles->couple= Input::get('couple');    
        $modeles->volume_reservoir1= Input::get('volume_reservoir1');    
        $modeles->volume_reservoir2= Input::get('volume_reservoir2');    
        $modeles->montant_vignette= Input::get('montant_vignette');    
        $modeles->description= Input::get('description');    
        $modeles->intervalle_revision= Input::get('intervalle_revision');    
        $modeles->marge_tolerance= Input::get('marge_tolerance');    
        $modeles->ajoute_par = Auth::user()->name;
        $modeles->modifie_par = ' ';

        //dd($request);
        $modeles->save();

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
        $modeles = Modele::findOrFail($request->id);

        //Validation
        $this->validate($request,[
            'gamme'      => 'required',
            'marque'      => 'required',
            'categorie_vehicule'    => 'required',
            'confort'    => 'required',
            'nom'    => 'required',
            'annee'    => 'required',
            'energie'    => 'required',
            'cv_fiscaux'    => 'required|numeric',
            'nombre_portes'    => 'required|numeric',
            'montant_ht'    => 'required|numeric',
            'montant_tva'    => 'required|numeric',
            'montant_ttc'    => 'required|numeric',
            'boite_vitesse'    => 'required',
            'cylindree'    => 'required',
            'moteur'    => 'required',
            'cv_moteur'    => 'required|numeric',
            'transmission'    => 'required',
            'acceleration'    => 'required|numeric',
            'vitesse_max'   =>  'required|numeric',
            'hauteur'   =>  'required|numeric',
            'largeur'   =>  'required|numeric',
            'longueur'   =>  'required|numeric',
            'poids_vide'   =>  'required|numeric',
            'ptc'   =>  'required|numeric',
            'urbaine'   =>  'required|numeric',
            'puissance_fiscale'   =>  'required|numeric',
            'couple'   =>  'required|numeric',
            'volume_reservoir1'   =>  'required|numeric',
            'volume_reservoir2'   =>  'required|numeric',
            'montant_vignette'   =>  'required|numeric',
            'description'   =>  'required',
            'intervalle_revision'   =>  'required|numeric',
            'marge_tolerance'   =>  'required|numeric',
        ]);
      
        $modeles->gamme_id = Input::get('gamme');
        $modeles->marque_id = Input::get('marque');
        $modeles->categorie_id = Input::get('categorie_vehicule');
        $modeles->confort_id = Input::get('confort');
        $modeles->nom =  Input::get('nom');
        $modeles->annee = Input::get('annee');
        $modeles->energie_id = Input::get('energie');
        $modeles->cv_fiscaux = Input::get('cv_fiscaux');
        $modeles->nombre_portes = Input::get('nombre_portes');
        $modeles->prix_ht =Input::get('montant_ht');
        $modeles->tva =Input::get('montant_tva');
        $modeles->ttc =Input::get('montant_ttc');
        $modeles->boite_vitesse =Input::get('boite_vitesse');
        $modeles->cylindree =Input::get('cylindree');
        $modeles->moteur =Input::get('moteur');
        $modeles->cv_moteur =Input::get('cv_moteur');
        $modeles->transmission =Input::get('transmission');
        $modeles->acceleration =Input::get('acceleration');
        $modeles->vitesse_max= Input::get('vitesse_max');
        $modeles->hauteur= Input::get('hauteur');
        $modeles->largeur= Input::get('largeur');
        $modeles->longueur= Input::get('longueur');
        $modeles->poids_vide= Input::get('poids_vide');    
        $modeles->ptc= Input::get('ptc');    
        $modeles->urbaine= Input::get('urbaine');    
        $modeles->puissance_fiscale= Input::get('puissance_fiscale');    
        $modeles->couple= Input::get('couple');    
        $modeles->volume_reservoir1= Input::get('volume_reservoir1');    
        $modeles->volume_reservoir2= Input::get('volume_reservoir2');    
        $modeles->montant_vignette= Input::get('montant_vignette');    
        $modeles->description= Input::get('description');    
        $modeles->intervalle_revision= Input::get('intervalle_revision');    
        $modeles->marge_tolerance= Input::get('marge_tolerance');    
        $modeles->modifie_par = Auth::user()->name;

        $modeles->save();

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
        $modeles=Modele::findOrFail($request->id);
        $modeles->delete($request->all());
        return back()->with('success', 'Suppression réussie');
                
    }
}
