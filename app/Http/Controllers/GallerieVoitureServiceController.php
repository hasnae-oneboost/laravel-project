<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicule;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\{Categoriesvehicule,Marque,Gamme,Confort,Modele,Parc,Typesacquisition};
use App\Voituresservicesphoto;

class GallerieVoitureServiceController extends Controller
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
        $classe_voiture_service=1;
        
        $voitureservice= Vehicule::where('id',$id)->firstOrFail();
        $voitureservicephotos = Voituresservicesphoto::where('voiture_id',$id)->OrderBy('ordre','asc')->get();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Liste des photos de la voiture de service N°: '.$voitureservice->immatriculation;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.gallerie_voiture_service',compact('voitureservicephotos','voitureservice','classe_parcs','classe_accueil','classe_flotte','classe_voiture_service'));
    
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
        $voitureservicephotos = new Voituresservicesphoto;

        
        $photos = $request->file('photos');

        if($request->file('photos')){
            $photo_name ='photo_voiture_service_ID_N_'.$request->voiture_id.'_'.rand().'.'.$photos->getClientOriginalExtension();
            $photos->move(public_path('images_voiture_service'),$photo_name);
            $voitureservicephotos->photo = $photo_name;
        }
          
       

        $id =$request->voiture_id;
        $voitureservicephotos->voiture_id = $id ;
        $voitureservicephotos->ordre = $request->ordre;
        $voitureservicephotos->save();

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
        $voitureservicephotos = Voituresservicesphoto::findOrFail($request->id);

        $photos = $request->file('photos');

        /*if($request->file('photos')){
            $photo_name ='photo_voiture_service_ID_N_'.$request->voiture_id.'_'.rand().'.'.$photos->getClientOriginalExtension();
            $photos->move(public_path('images_voiture_service'),$photo_name);
            $voitureservicephotos->photo = $photo_name;
        }
           */   
        if($request->file('photos')){
            $photo_name ='photo_voiture_service_ID_N_'.$request->voiture_id.'_'.rand().'.'.$photos->getClientOriginalExtension();
            $photos->move(public_path('images_voiture_service'),$photo_name);
            $voitureservicephotos->photo = $photo_name;
                if($photo_name != $voitureservicephotos->photo){
                    File::delete('images_voiture_service/'.$voitureservicephotos->photo);
                }
            }
               
        $voitureservicephotos->ordre = $request->ordre;
        $voitureservicephotos->save();

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
        $voitureservicephotos = Voituresservicesphoto::findOrFail($request->id);
        $voitureservicephotos->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
