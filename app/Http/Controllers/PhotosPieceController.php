<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Piece;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\Photospiece;

class PhotosPieceController extends Controller
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

        $piecesphotos = Photospiece::where('piece_id',$id)->OrderBy('ordre','asc')->get();
                
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Liste des photos de la pièce: '.$pieces->libelle;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.gallerie_pieces',compact('piecesphotos','pieces','classe_referentiel'
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
        $piecesphotos = new Photospiece;

        
        $photos = $request->file('photos');

        if($request->file('photos')){
            $photo_name ='photo_piece_ID_N_'.$request->piece_id.'_'.rand().'.'.$photos->getClientOriginalExtension();
            $photos->move(public_path('images_pieces'),$photo_name);
            $piecesphotos->photo = $photo_name;
        }
          
       

        $id =$request->piece_id;
        $piecesphotos->piece_id = $id ;
        $piecesphotos->ordre = $request->ordre;
        $piecesphotos->save();

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
        $piecesphotos = Photospiece::findOrFail($request->id);

        $photos = $request->file('photos');

        if($request->file('photos')){
            $photo_name ='photo_piece_ID_N_'.$request->piece_id.'_'.rand().'.'.$photos->getClientOriginalExtension();
            $photos->move(public_path('images_pieces'),$photo_name);
            $piecesphotos->photo = $photo_name;
                if($photo_name != $piecesphotos->photo){
                    File::delete('images_pieces/'.$piecesphotos->photo);
                }
            }
               
        $piecesphotos->ordre = $request->ordre;
        $piecesphotos->save();

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
        $piecesphotos = Photospiece::findOrFail($request->id);
        $piecesphotos->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
