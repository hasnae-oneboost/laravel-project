<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Acce;
use App\User;

class AccesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classe_administration=1;
        $classe_parametrage=1;
        $classe_acces=1;

        $users= User::all();        
        $user_name=Input::get('utilisateur');
        $date_de=Input::get('date_debut');
        $date_a=Input::get('date_fin',Carbon::now());

        if($user_name !='' && $date_de !='' && $date_a !='')  
            $acces=Acce::whereBetween('date', [$date_de." 00:00:00" , $date_a." 23:59:59"])
             ->where('utilisateur' , $user_name)
             ->paginate(25);

        elseif($date_de !='' && $date_a !='')  
            $acces=Acce::whereBetween('date', [$date_de." 00:00:00", $date_a." 23:59:59"])->paginate(25);

        elseif($user_name != '')
            $acces=Acce::where('utilisateur',$user_name)->paginate(25);
            
        else
            $acces = Acce::paginate(25);        

        $selected_user=Input::get('utilisateur');    
        $selected_date_debut=Input::get('date_debut');
        $selected_date_fin=Input::get('date_fin');
        return view('backoffice.opération',compact('users','selected_user','selected_date_debut','selected_date_fin','classe_parametrage','classe_acces','classe_administration','acces'));
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
