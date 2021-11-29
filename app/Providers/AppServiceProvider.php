<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Event;
use Carbon\Carbon;
use Auth;
use App\{Appel,Rendezvou};
use App\Documenttracteur;
use App\Documentsemiremorque;
use App\Documentsvoitureservice;
use App\Documentspersonnel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringlength(191);
        View::composer('*', function($view)
        {
            if (Auth::check()){
                $role = Auth::user()->roles[0]->id;
                $appels= Appel::where('prochain_appel',Carbon::now()->format('Y-m-d H:i'))->get();
                $appelsTomorrow= Appel::where('date_heure',Carbon::now()->addDays(1)->format('Y-m-d H:i'))->get();
                $countappels= Appel::where('prochain_appel',Carbon::now()->addDays(1)->format('y-m-d'))->count();
                $countappelsTomorrow= Appel::where('date_heure',Carbon::now()->addDays(1)->format('y-m-d'))->count();
                if(Auth::user()->roles[0]->name == 'Administrateur'){
                        /***
                         * Today's Events
                         */
                        $eventofday= Event::where('start_date',Carbon::now()->format('y-m-d'))
                            ->get();
                       /***
                         * Tomorrow's Events
                         */
                        $eventoftomorrow= Event::where('start_date',Carbon::now()->addDays(1)->format('y-m-d'))
                            ->get();
                    
                        
                        $countToday= Event::where('start_date',Carbon::now()->format('y-m-d'))
                            ->count();
                        $countTomorrow= Event::where('start_date',Carbon::now()->addDays(1)->format('y-m-d'))
                            ->count();
                }
                else{
                    /***
                     * Today's Events
                     */
                        $eventofday= Event::where('start_date',Carbon::now()->format('y-m-d'))
                        ->where('role',$role)
                        ->get();
                    /***
                     * Tomorrow's Events
                     */
                    $eventoftomorrow= Event::where('start_date',Carbon::now()->addDays(1)->format('y-m-d'))
                        ->where('role',$role)
                        ->get();                    
                   $countToday= Event::where('start_date',Carbon::now()->format('y-m-d'))
                        ->where('role',$role)  
                        ->count();
                    $countTomorrow= Event::where('start_date',Carbon::now()->addDays(1)->format('y-m-d'))
                        ->where('role',$role)
                        ->count();
                }
                /**
                 * Notifications : Documents des tracteurs
                 */                
                $documentsnotif= Documenttracteur::where('date',Carbon::now()->format('Y-m-d'))->where('alerte','Oui')->get();
                $documentsTomorrow = Documenttracteur::where('date',Carbon::now()->addDays(1)->format('Y-m-d'))->where('alerte','Oui')->get();
                $countdocuments=Documenttracteur::where('date',Carbon::now()->format('Y-m-d'))->where('alerte','Oui')->count();
                $countdocumentsTomorrow=Documenttracteur::where('date',Carbon::now()->addDays(1)->format('Y-m-d'))->where('alerte','Oui')->count();
                /**
                 * Notifications : Documents des semi-remorques 
                 */
                $documentsSMnotif= Documentsemiremorque::where('date',Carbon::now()->format('Y-m-d'))->where('alerte','Oui')->get();
                $documentsSMTomorrow = Documentsemiremorque::where('date',Carbon::now()->addDays(1)->format('Y-m-d'))->where('alerte','Oui')->get();
                $countdocumentsSM=Documentsemiremorque::where('date',Carbon::now()->format('Y-m-d'))->where('alerte','Oui')->count();
                $countdocumentsSMTomorrow=Documentsemiremorque::where('date',Carbon::now()->addDays(1)->format('Y-m-d'))->where('alerte','Oui')->count();
                /**
                 * Notifications : Documents des voitures de service
                 */
                $documentsVSnotif= Documentsvoitureservice::where('date',Carbon::now()->format('Y-m-d'))->where('alerte','Oui')->get();
                $documentsVSTomorrow = Documentsvoitureservice::where('date',Carbon::now()->addDays(1)->format('Y-m-d'))->where('alerte','Oui')->get();
                $countdocumentsVS=Documentsvoitureservice::where('date',Carbon::now()->format('Y-m-d'))->where('alerte','Oui')->count();
                $countdocumentsVSTomorrow=Documentsvoitureservice::where('date',Carbon::now()->addDays(1)->format('Y-m-d'))->where('alerte','Oui')->count();
               
                /**
                 * Notifications : Documents Personnel
                 */
                $documentsPersnotif= Documentspersonnel::where('date',Carbon::now()->format('Y-m-d'))->where('alerte','Oui')->get();
                $documentsPersTomorrow = Documentspersonnel::where('date',Carbon::now()->addDays(1)->format('Y-m-d'))->where('alerte','Oui')->get();
                $countdocumentsPers=Documentspersonnel::where('date',Carbon::now()->format('Y-m-d'))->where('alerte','Oui')->count();
                $countdocumentsPersTomorrow=Documentspersonnel::where('date',Carbon::now()->addDays(1)->format('Y-m-d'))->where('alerte','Oui')->count();
               
                /**
                 * Notifications number
                 */
                $countNotification = $countToday+$countTomorrow+$countappels+$countappels+$countdocuments+$countdocumentsTomorrow
                +$countdocumentsSM+$countdocumentsSMTomorrow+$countdocumentsVS+$countdocumentsVSTomorrow+$countdocumentsPers
                +$countdocumentsPersTomorrow;     
               

                View::share('eventofday',$eventofday);
                View::share('eventoftomorrow',$eventoftomorrow);
                View::share('appels',$appels);
                View::share('appelsTomorrow',$appelsTomorrow);
                View::share('countNotification',$countNotification);
                View::share('documentsnotif',$documentsnotif);
                View::share('documentsTomorrow',$documentsTomorrow);
                View::share('documentsSMnotif',$documentsSMnotif);
                View::share('documentsSMTomorrow',$documentsSMTomorrow);
                View::share('documentsVSnotif',$documentsVSnotif);
                View::share('documentsVSTomorrow',$documentsVSTomorrow);
                View::share('documentsPersnotif',$documentsPersnotif);
                View::share('documentsPersTomorrow',$documentsPersTomorrow);
       
       
       }
    });
            
        
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
