<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pays;
use App\Echeance;
use App\Client;
use App\Acce;
use Auth;
use Session;
use App\Contact;
use Redirect;
use App\Appel;
use App\Rendezvou;

class ModifierClientController extends Controller
{
    public function index($id)
    {
        $classe_referentiel=1;
        $classe_transprt=1;
        $classe_client=1;

        $pays = Pays::all();
        $echeances = Echeance::all();

        $clients = Client::where('id',$id)->firstOrFail();
        Session::put('values', $clients);     

        $contact = Contact::where('client',$clients->id)->first();
        Session::put('contactclient',$contact);

        $appel = Appel::where('client',$clients->id)->first();
        Session::put('appelclient',$appel);

        $rdv = Rendezvou::where('client',$clients->id)->first();
        Session::put('rdvclient',$rdv);
        
        $acces= new Acce;
        $acces->utilisateur= Auth::user()->name;
        $acces->page= 'Modifier client: '.$clients->code;
        $acces->date=date("Y-m-d h:i:s");
        $acces->save();
        
        return view('backoffice.modifier_client',compact('clients','rdv','contact','appel','echeances','pays','classe_client','classe_referentiel','classe_transprt'));
    
    }
}
