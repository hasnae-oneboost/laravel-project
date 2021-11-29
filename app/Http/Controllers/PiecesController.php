<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Piece;
use Auth;
use App\Acce;
use App\{Famillespiece,Categoriespiece,Marquespiece,Unite,Entreprise,Photospiece};
use PDF;

class PiecesController extends Controller
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
        $classe_intervention=1;
        $classe_piece=1;
        $classepiece=1;

        $familles = Famillespiece::all();
        $categories = Categoriespiece::all();
        $marques = Marquespiece::all();
        $unites = Unite::all();
    
        $pieceid = Piece::max('id');

        $famille= Input::get('famille');
        $marque= Input::get('marque');
        $categorie= Input::get('categorie');
        
        if($famille != '' && $categorie != '' && $marque != '')
            $pieces = Piece::where('famille_id',$famille)
                        ->where('marque_id',$marque)
                        ->where('categorie_id',$categorie)
                        ->paginate(15);
        elseif($famille != '' && $categorie != '')
            $pieces = Piece::where('famille_id',$famille)
            ->where('categorie_id',$categorie)
            ->paginate(15);                
        elseif($categorie != '' && $marque != '')
            $pieces = Piece::where('marque_id',$marque)
            ->where('categorie_id',$categorie)
            ->paginate(15);                
        elseif($famille != '' && $marque != '')
            $pieces = Piece::where('famille_id',$famille)
            ->where('marque_id',$marque)
            ->paginate(15);
        elseif($famille != '')
            $pieces = Piece::where('famille_id',$famille)->paginate(15);
        elseif($categorie != '') 
            $pieces = Piece::where('categorie_id',$categorie)->paginate(15);
        elseif($marque != '') 
            $pieces = Piece::where('marque_id',$marque)->paginate(15);        
        else
            $pieces = Piece::paginate(15);
            
        $selected_famille=Input::get('famille');
        $selected_marque= Input::get('marque');
        $selected_categorie= Input::get('categorie');
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Pièces';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

        return view('backoffice.pieces',compact('selected_categorie','selected_marque','selected_famille','pieceid','unites','marques','categories','familles','pieces','descriptions','classe_piece','classepiece','classe_referentiel','classe_intervention'));
   
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
        $pieces= new Piece;
        //validation
            $this->validate($request,[
                'famille' => 'required',
                'categorie' => 'required',
                'marque' => 'required',
                'code' => 'required',
                'unite' => 'required',
                'libelle' => 'required',
                'prix_ht' => 'required',
                'stock_minimal' => 'required',
            ]);

            $pieces->famille_id=Input::get('famille');
            $pieces->categorie_id=Input::get('categorie');
            $pieces->marque_id=Input::get('marque');
            $pieces->code=Input::get('code');
            $pieces->unite_id=Input::get('unite');
            $pieces->libelle=Input::get('libelle');
            $pieces->prix_ht=Input::get('prix_ht');
            $pieces->stock_minimal=Input::get('stock_minimal');
        
        $pieces->ajoute_par=Auth::user()->name;
        $pieces->modifie_par=' ';

        $pieces->save();

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
        $pieces= Piece::findOrFail($request->id);

        $this->validate($request,[
            'famille' => 'required',
            'categorie' => 'required',
            'marque' => 'required',
            'code' => 'required',
            'unite' => 'required',
            'libelle' => 'required',
            'prix_ht' => 'required',
            'stock_minimal' => 'required',
        ]);

        $pieces->famille_id=Input::get('famille');
        $pieces->categorie_id=Input::get('categorie');
        $pieces->marque_id=Input::get('marque');
        $pieces->code=Input::get('code');
        $pieces->unite_id=Input::get('unite');
        $pieces->libelle=Input::get('libelle');
        $pieces->prix_ht=Input::get('prix_ht');
        $pieces->stock_minimal=Input::get('stock_minimal');
                
        $pieces->modifie_par=Auth::user()->name;

        $pieces->save();
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
        $pieces= Piece::findOrFail($request->id);
        $pieces->delete($request->all());
        return back()->with('success','Suppression réussie');
    }   

    public function ToPDF($id){
        $entreprise = Entreprise::findOrFail(1);
        $pieces=Piece::findOrFail($id);
        $piecephotos = Photospiece::where('piece_id',$id)->get();
       
        $pdf = PDF::loadView('backoffice.imprimer_informations_piece', compact('pieces','entreprise','piecephotos'));
        return $pdf->download('informations_piece_'.$pieces->libelle.'.pdf');        
    }

    public function Rapport(){
        $pieces=Piece::all();
        $entreprise = Entreprise::findOrFail(1);
        
        //$piecephotos = Photospiece::where('piece_id',$id)->get();
       
        $pdf = PDF::loadView('backoffice.rapport_piece', compact('pieces','entreprise'));
        return $pdf->download('liste_des_pieces.pdf');        
    }
}
