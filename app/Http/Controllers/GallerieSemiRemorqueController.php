<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicule;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Acce;
use App\{Categoriesvehicule,Marque,Gamme,Confort,Modele,Parc,Typesacquisition};
use App\Semiremorquesphoto;

class GallerieSemiRemorqueController extends Controller
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
        $classe_semi_remorque=1;
        
        $semiremorques= Vehicule::where('id',$id)->firstOrFail();

        $semiremorquesphotos = Semiremorquesphoto::where('semiremorque_id',$id)->OrderBy('ordre','asc')->get();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Liste des photos du semi-remorque: '.$semiremorques->immatriculation;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.gallerie_semi_remorque',compact('semiremorquesphotos','semiremorques','classe_parcs','classe_accueil','classe_flotte','classe_semi_remorque'));
    
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
        $semiremorquesphotos = new Semiremorquesphoto;

        
        $photos = $request->file('photos');

        if($request->file('photos')){
            $photo_name ='photo_semi_remorque_ID_N_'.$request->semiremorque_id.'_'.rand().'.'.$photos->getClientOriginalExtension();
            $photos->move(public_path('images_semi_remorque'),$photo_name);
            $semiremorquesphotos->photo = $photo_name;
        }
          
       

        $id =$request->semiremorque_id;
        $semiremorquesphotos->semiremorque_id = $id ;
        $semiremorquesphotos->ordre = $request->ordre;
        $semiremorquesphotos->save();

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
        $semiremorquesphotos = Semiremorquesphoto::findOrFail($request->id);

        $photos = $request->file('photos');

        /*if($request->file('photos')){
            $photo_name ='photo_semi_remorque_ID_N_'.$request->semiremorque_id.'_'.rand().'.'.$photos->getClientOriginalExtension();
            $photos->move(public_path('images_semi_remorque'),$photo_name);
            $semiremorquesphotos->photo = $photo_name;
        }
           */   
        if($request->file('photos')){
            $photo_name ='photo_semi_remorque_ID_N_'.$request->semiremorque_id.'_'.rand().'.'.$photos->getClientOriginalExtension();
            $photos->move(public_path('images_semi_remorque'),$photo_name);
            $semiremorquesphotos->photo = $photo_name;
                if($photo_name != $semiremorquesphotos->photo){
                    File::delete('images_semi_remorque/'.$semiremorquesphotos->photo);
                }
            }
               
        $semiremorquesphotos->ordre = $request->ordre;
        $semiremorquesphotos->save();

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
        $semiremorquesphotos = Semiremorquesphoto::findOrFail($request->id);
        $semiremorquesphotos->delete($request->all());
        return back()->with('success', 'Suppression réussie');
    }
}
