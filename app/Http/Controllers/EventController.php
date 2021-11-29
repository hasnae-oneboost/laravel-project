<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Event;
use Calendar;
use Auth;
use App\User;
use App\Notifications\NotifyEventOwner;
use App\Role;
use App\Appel;
use App\Rendezvou;
use App\Acce;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = [];
        $appelsclient = [];
        $appelsfournisseur = [];
        
        if(Auth::user()->roles[0]->name == 'Administrateur'){
            $data = Event::all();
            $dataappelsclient = Appel::where('fournisseur',null)->get();
            $dataappelsfournisseur = Appel::where('client',null)->get();
            $datardvclient = Rendezvou::where('fournisseur',null)->get();
            $datardvfournisseur = Rendezvou::where('client',null)->get();
        }
        else { 
            $data = Event::where('role',Auth::user()->roles[0]->id)->get();
            $dataappelsclient = Appel::where('fournisseur',null)->get();
            $dataappelsfournisseur = Appel::where('client',null)->get();
            $datardvclient = Rendezvou::where('fournisseur',null)->get();
            $datardvfournisseur = Rendezvou::where('client',null)->get();
        }
        

        if($data->count()){

          foreach ($data as $key => $value) {

            $events[] = Calendar::event(

                $value->title, 

                true, //Full day event?

                new \DateTime($value->start_date),

                new \DateTime($value->end_date.' +1 day'),
                null,
                [
                    'color' => '#e9212e',
                ]

            );

          }

        }
        if($dataappelsclient->count()){

            foreach ($dataappelsclient as $key => $value) {
  
              $appelsclient[] = Calendar::event(
  
                'Appeler Client: 
                '.$value->clien->raison_sociale, 
  
                  false, //Full day event?
  
                  new \DateTime($value->prochain_appel),
  
                  new \DateTime($value->prochain_appel),
                  null,
                  [
                    'color' => 'gray',                    
                    'url' => 'appel/'.$value->client,
                    ]
  
              );
  
            }
  
        }
        if($dataappelsfournisseur->count()){

            foreach ($dataappelsfournisseur as $key => $value) {
  
              $appelsfournisseur[] = Calendar::event(
  
                  'Appeler fournisseur: 
                  '.$value->fournisseu->code, 
  
                  false, //Full day event?
  
                  new \DateTime($value->prochain_appel),
  
                  new \DateTime($value->prochain_appel),
                  null,
                  [
                    'color' => 'blue',
                    'url'   => 'appel_fournisseur/'.$value->fournisseur,
                  ]
  
              );
  
            }
  
        }
        if($datardvclient->count()){

            foreach ($datardvclient as $key => $value) {
  
              $appelsclient[] = Calendar::event(
  
                'Rendez-vous client: 
                '.$value->clien->raison_sociale, 
  
                  false, //Full day event?
  
                  new \DateTime($value->date_heure),
  
                  new \DateTime($value->date_heure),
                  null,
                  [
                    'color' => 'darkcyan',
                    'url' => 'rendez_vous/'.$value->client,
                  ]
  
                  
              );
  
            }
  
        }
        if($datardvfournisseur->count()){

            foreach ($datardvfournisseur as $key => $value) {
  
              $appelsfournisseur[] = Calendar::event(
  
                  'Rendez-vous fournisseur:
                   '.$value->fournisseu->libelle, 
  
                  false, //Full day event?
  
                  new \DateTime($value->date_heure),
  
                  new \DateTime($value->date_heure),
                  null,
                  [
                    'color' => 'green',
                    'url'   => 'rendez_vous_fournisseur/'.$value->fournisseur,
                  ]
  
              );
  
            }
  
        }
        
        $calendar = Calendar::addEvents($events); 
        $calendar = Calendar::addEvents($appelsclient); 
        $calendar = Calendar::addEvents($appelsfournisseur); 
        $classe_calendar=1;
        $roles = Role::all();

        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Calendrier';
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();

      return view('backoffice.calendrier', compact('calendar','classe_calendar','data','roles'));

      
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
        $events= new Event;
        //validation
        $this->validate($request,[
            'titre'          => 'required',
            'date_debut'          => 'required',
            'date_fin'          => 'required',            
        ]);

        $events->title = Input::get('titre');
        $events->start_date = Input::get('date_debut');
        $events->end_date = Input::get('date_fin');
        if(Auth::user()->roles[0]->name == 'Administrateur')
            $events->role = Input::get('role');
        else
            $events->role = Auth::user()->roles[0]->id;
        $events->save();

       
        return back()->with('success', 'Evenement ajouté');
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
        $events= Event::findOrFail($request->id);
        //validation
        $this->validate($request,[
            'titre'          => 'required',
            'date_debut'          => 'required',
            'date_fin'          => 'required',
            
        ]);

        $events->title = Input::get('titre');
        $events->start_date = Input::get('date_debut');
        $events->end_date = Input::get('date_fin');
        
        if(Auth::user()->roles[0]->name == 'Administrateur')
            $events->role = Input::get('role');
        else
            $events->role = Auth::user()->roles[0]->id;

        $events->save();
        return back()->with('success', 'Evenement modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $events= Event::findOrFail($request->id);
        $events->delete($request->all());
        return back()->with('success', 'Evenement supprimé');
    }
}
