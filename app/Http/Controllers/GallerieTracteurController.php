<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicule;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\{Categoriesvehicule,Marque,Gamme,Confort,Modele,Parc,Typesacquisition};
use App\Tracteursphoto ;

class GallerieTracteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $classe_accueil=1;
        $classe_flotte=1;
        $classe_parcs=1;
        $classe_tracteur=1;
        
        $tracteurs= Vehicule::where('id',$id)->firstOrFail();

        $tracteurphotos = Tracteursphoto ::where('tracteur_id',$id)->OrderBy('ordre','asc')->get();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Liste des photos du tracteur: '.$tracteurs->code;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.gallerie_tracteur',compact('tracteurphotos','tracteurs','classe_parcs','classe_accueil','classe_flotte','classe_tracteur'));
    
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
        $tracteurphotos = new Tracteursphoto ;

        
        $photos = $request->file('photos');

        if($request->file('photos')){
            $photo_name ='photo_tracteur_ID_N_'.$request->tracteur_id.'_'.rand().'.'.$photos->getClientOriginalExtension();
            $photos->move(public_path('images_tracteur'),$photo_name);
            $tracteurphotos->photo = $photo_name;
        }

        $id =$request->tracteur_id;
        $tracteurphotos->tracteur_id = $id ;
        $tracteurphotos->ordre = $request->ordre;
        $tracteurphotos->save();

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
        $tracteurphotos = Tracteursphoto::findOrFail($request->id);

        $photos = $request->file('photos');

        if($request->file('photos')){
            $photo_name ='photo_tracteur_ID_N_'.$request->tracteur_id.'_'.rand().'.'.$photos->getClientOriginalExtension();
            $photos->move(public_path('images_tracteur'),$photo_name);
            $tracteurphotos->photo = $photo_name;
        }
               
        $tracteurphotos->ordre = $request->ordre;
        $tracteurphotos->save();

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
        $tracteurphotos = Tracteursphoto ::findOrFail($request->id);
        $tracteurphotos->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
