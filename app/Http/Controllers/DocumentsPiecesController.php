<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Piece;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Documentspiece;

class DocumentsPiecesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_intervention=1;
        $classe_piece=1;
        $classepiece=1;
        
        $pieces= Piece::where('id',$id)->firstOrFail();

        $documentspieces = Documentspiece::where('piece_id',$id)->get();
                
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Documents de la pièce: '.$pieces->libelle;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.documents_pieces',compact('documentspieces','pieces','classe_referentiel'
        ,'classe_intervention','classe_piece','classepiece'));
    
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
        $documentspieces = new Documentspiece;

        
        $fichierpiece = $request->file('fichier');

        if($request->file('fichier')){
            $file_name ='document_piece_ID_'.$request->piece_id.'_'.rand().'.'.$fichierpiece->getClientOriginalExtension();
            $fichierpiece->move(public_path('documents_piece'),$file_name);
            $documentspieces->fichier = $file_name;
        }
             

        $documentspieces->piece_id = Input::get('piece_id');

        $documentspieces->ajoute_par = Auth::user()->name;
        $documentspieces->modifie_par = ' ';
        
        $documentspieces->save();

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
        $documentspieces = Documentspiece::findOrFail($request->id);

        $fichierpiece = $request->file('fichier');

        if($request->file('fichier')){
            $file_name ='document_piece_ID_'.$request->piece_id.'_'.rand().'.'.$fichierpiece->getClientOriginalExtension();
            $fichierpiece->move(public_path('documents_piece'),$file_name);
            $documentspieces->fichier = $file_name;
        }
             

        $documentspieces->piece_id = Input::get('piece_id');
        $documentspieces->modifie_par = Auth::user()->name;

        $documentspieces->save();

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
        $documentspieces = Documentspiece::findOrFail($request->id);
        $documentspieces->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
