@extends('layouts.dashboard')

@section('title')
Référentiel
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>	
		</ol>
		<!-- end breadcrumb -->
@endsection

@section('content')

<!-- MAIN PANEL -->
<div id="main" role="main">
    <!-- MAIN CONTENT -->
    <div class="container">
        <!-- widget grid -->
        <section id="widget-grid" class="">
            <section id="widget-grid" class="">
                <!-- row -->
                <div class="row">
                    <div class="container">

                        <!--Utilisateurs--> 
                        @role('Administrateur')
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="panel-group" id="">
                                 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a><span class="fa  fa-users">
                                          </span>&nbsp;Utilisateurs</a>
                                      </h4>
                                    </div>
                                 <div id="accordion_us" class="panel-body">
                                    <div class="list-group">
                                            <a class="list-group-item" data-toggle="collapse" data-parent="#accordion_us" href="#collapseFour_us"><span class="">
                                                </span>&nbsp;Gestion<span class="pull-right"> <i class="fa fa-angle-down"></i></span></a>
                                      
                                            <div id="collapseFour_us" class="panel-collapse collapse">
                                                <div class="list-group">
                                                    <a href="{{URL::route('backoffice_utilisateurs')}}" class="list-group-item">
                                                        <i class="fa fa-users"></i>
                                                        Gestion des utilisateurs
                                                    </a>
                                                    <a href="" class="list-group-item">
                                                        <i class="fa fa-key"></i>
                                                        Gestion des acces
                                                    </a>
                                                </div>
                                            </div>
                                    </div> 
                                  </div>
                                  
                                </div>
                            </div>
                        </div>
                        @endrole
                        <!--/Utilisateurs-->

                        
                        <!--Entreprise-->   
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="panel-group" id="">
                             
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a ><span class="fa fa-suitcase">
                                      </span>&nbsp;Entreprise</a>
                                  </h4>
                                </div>
                                <div id="" class="panel-body">
                                  <div class="list-group">
                                    <a href="{{URL::route('backoffice_entreprise')}}" class="list-group-item">
                                      Données de l'entreprise
                                    </a>
                                  </div>
                                </div>
                              </div>
                              
                            </div>
                        </div>
                        <!--/Entreprise-->

                        
                        <!--Utilisation-->
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="panel-group" id="">                                 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a><span class="fa fa-folder-open">
                                          </span>&nbsp;Utilisation</a>
                                      </h4>
                                    </div>
                                    <div id="accordion_personnel" class="panel-body">
                                        <div class="list-group">
                                            <a class="list-group-item" data-toggle="collapse" data-parent="#accordion_personnel" href="#collapseFour_personnel"><span class="">
                                                </span>&nbsp;Personnel <span class="pull-right"> <i class="fa fa-angle-down"></i></span></a>
                                      
                                            <div id="collapseFour_personnel" class="panel-collapse collapse">
                                                <div class="list-group">                                                        
                                                     <a href="{{URL::route('backoffice_centres_medicaux')}}" class="list-group-item">
                                                                <i class="fa fa-medkit"></i>
                                                                Centres médicaux
                                                    </a>
                                                    <a href="{{URL::route('backoffice_centres_formation')}}" class="list-group-item">
                                                                    <i class="fa fa-file"></i>
                                                                    Centres de formation
                                                    </a>
                                                    <a href="{{URL::route('backoffice_nationalites')}}" class="list-group-item">
                                                            <i class="fa fa-flag"></i>
                                                            Nationalités
                                                    </a>
                                                    <a href="{{URL::route('backoffice_situations')}}" class="list-group-item">
                                                            <i class="fa fa-file"></i>
                                                            Situations
                                                    </a>
                                                    <a href="{{URL::route('backoffice_situations_familiales')}}" class="list-group-item">
                                                            <i class="fa fa-file"></i>
                                                            Situations familiales
                                                    </a>
                                                    <a href="{{URL::route('backoffice_pays')}}" class="list-group-item">
                                                        <i class="fa fa-globe"></i>
                                                        Pays
                                                    </a>
                                                    <a href="{{URL::route('backoffice_villes')}}" class="list-group-item">
                                                        <i class="fa fa-map-marker"></i>
                                                        Villes
                                                    </a>
                                                    <a href="{{URL::route('backoffice_epi')}}" class="list-group-item">
                                                            <i class="fa fa-shield"></i>
                                                            Equipement de protection individuelle
                                                    </a>
                                                    <a href="{{URL::route('backoffice_types_promotion')}}" class="list-group-item">
                                                            <i class="fa fa-bullhorn"></i>
                                                            Types de promotion
                                                    </a>
                                                    <a href="{{URL::route('backoffice_types_sanctions')}}" class="list-group-item">
                                                            <i class="fa fa-ban"></i>
                                                            Types de sanctions
                                                    </a>
                                                </div>
                                            </div>                                            
                                                <a class="list-group-item" data-toggle="collapse" href="#collapseFour_caisse"><span class="">
                                                      </span>&nbsp;Caisses <span class="pull-right"> <i class="fa fa-angle-down"></i></span></a>
                                                     
                                                <div id="collapseFour_caisse" class="panel-collapse collapse">
                                                    <div class="list-group">
                                                            <a href="{{URL::route('backoffice_caisses')}}" class="list-group-item">
                                                                    <i class="fa fa-money"></i>
                                                                Caisses
                                                            </a>
                                                            <a class="list-group-item" data-toggle="collapse" href="#collapseFour_tresorerie"><span class="">
                                                                </span>&nbsp;Trésorerie <span class="pull-right"> <i class="fa fa-angle-down"></i></span></a>
                                                            <div id="collapseFour_tresorerie" class="panel-collapse collapse">
                                                                    <a href="{{URL::route('backoffice_banques')}}" class="list-group-item">
                                                                            <i class="fa fa-bank"></i>
                                                                        Banques
                                                                    </a>
                                                                    <a href="{{URL::route('backoffice_agences')}}" class="list-group-item">
                                                                            <i class="fa fa-building"></i>
                                                                        Agences bancaires
                                                                    </a>
                                                                    <a href="{{URL::route('backoffice_comptes')}}" class="list-group-item">
                                                                                <i class="fa fa-credit-card"></i>
                                                                            Comptes bancaires
                                                                    </a>
                                                    </div>
                                                    <a href="{{URL::route('backoffice_categories_motifs_encaissement')}}" class="list-group-item">
                                                            <i class="fa fa-reorder"></i>
                                                        Catégories des motifs d'encaissement
                                                    </a>
                                                    <a href="{{URL::route('backoffice_categories_motifs_decaissement')}}" class="list-group-item">
                                                            <i class="fa fa-reorder"></i>
                                                        Catégories des motifs du decaissement
                                                    </a>
                                                    <a href="{{URL::route('backoffice_motifs_encaissement')}}" class="list-group-item">
                                                            <i class="fa fa-file"></i>
                                                        Motifs d'encaissement
                                                    </a>
                                                    <a href="{{URL::route('backoffice_motifs_decaissement')}}" class="list-group-item">
                                                            <i class="fa fa-file"></i>
                                                        Motifs du decaissement
                                                    </a>
                                                    </div>
                                                </div>
                                            <a class="list-group-item" data-toggle="collapse" data-parent="#accordion_tva" href="#collapseFour_tva"><span class="">
                                                </span>&nbsp;TVA <span class="pull-right"> <i class="fa fa-angle-down"></i></span></a>
                                      
                                            <div id="collapseFour_tva" class="panel-collapse collapse">
                                                <div class="list-group">                                                        
                                                     <a href="{{URL::route('backoffice_type_tva')}}" class="list-group-item">
                                                                <i class="fa fa-reorder"></i>
                                                               Type TVA
                                                    </a>
                                                    <a href="{{URL::route('backoffice_tva')}}" class="list-group-item">
                                                                    <i class="fa fa-percent"></i>
                                                                TVA
                                                    </a>
                                                  
                                                 
                                                </div>
                                            </div>
                                            <a class="list-group-item" data-toggle="collapse" data-parent="#accordion_trp" href="#collapseFour_trp"><span class="">
                                                </span>&nbsp;Transport <span class="pull-right"> <i class="fa fa-angle-down"></i></span></a>
                                      
                                            <div id="collapseFour_trp" class="panel-collapse collapse">
                                                <div class="list-group">                                                        
                                                     <a href="{{URL::route('backoffice_lieux')}}" class="list-group-item">
                                                                <i class="fa fa-map-marker"></i>
                                                               Lieux
                                                    </a>
                                                    <a href="{{URL::route('backoffice_trajets')}}" class="list-group-item">
                                                                    <i class="fa fa-truck"></i>
                                                                Trajets
                                                    </a>
                                                    <a href="{{URL::route('backoffice_categorie_trajet')}}" class="list-group-item">
                                                        <i class="fa fa-reorder"></i>
                                                                Categorie des trajets
                                                    </a>
                                                    <a href="{{URL::route('backoffice_detail_trajet')}}" class="list-group-item">
                                                        <i class="fa fa-reorder"></i>
                                                                Détails des trajets
                                                    </a>
                                                 
                                                </div>
                                            </div>
                                            <a href="{{URL::route('backoffice_type_marchandise')}}" class="list-group-item">
                                                <i class="fa fa-file"></i> Types des marchandises
                                               </a>  
                                               <a href="{{URL::route('backoffice_unites')}}" class="list-group-item">
                                                <i class="fa fa-file"></i> Unités
                                               </a>
                                               <a href="{{URL::route('backoffice_marchandises')}}" class="list-group-item">
                                                <i class="fa fa-file"></i> Marchandises
                                               </a> 
                                               <a class="list-group-item" data-toggle="collapse" data-parent="#accordion_ut" href="#collapseFour_ut"><span class="">
                                            </span>&nbsp;Utilisation <span class="pull-right"> <i class="fa fa-angle-down"></i></span></a>
                                  
                                        <div id="collapseFour_ut" class="panel-collapse collapse">
                                            <div class="list-group">                                                        
                                                 <a href="{{URL::route('backoffice_directions')}}" class="list-group-item">
                                                            <i class="fa fa-"></i>
                                                           Diréctions
                                                </a>
                                                <a href="{{URL::route('backoffice_departements')}}" class="list-group-item">
                                                                <i class="fa fa-"></i>
                                                            Départements
                                                </a>
                                                <a href="{{URL::route('backoffice_services')}}" class="list-group-item">
                                                    <i class="fa fa-"></i>
                                                            Sérvices
                                                </a>
                                                                                           
                                            </div>
                                        </div>   
                                        </div>                                        
                                        
                                    </div>
                                          
                                </div>
                            </div>
                        </div>
                        <!--/Utilisation-->

                        <!--RH-->
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="panel-group" id="">
                                 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a><span class="fa fa-male">
                                          </span>&nbsp;RH</a>
                                      </h4>
                                    </div>
                                 <div id="accordion_rh" class="panel-body">
                                    <div class="list-group">
                                            <a class="list-group-item" data-toggle="collapse" data-parent="#accordion_rh" href="#collapseFour_rh"><span class="">
                                                </span>&nbsp;Ressources humaines <span class="pull-right"> <i class="fa fa-angle-down"></i></span></a>
                                      
                                            <div id="collapseFour_rh" class="panel-collapse collapse">
                                                <div class="list-group">
                                                    <a href="{{URL::route('backoffice_cat_postes')}}" class="list-group-item">
                                                        <i class="fa fa-reorder"></i>
                                                        Catégories des postes
                                                    </a>
                                                    <a href="{{URL::route('backoffice_contrat')}}" class="list-group-item">
                                                        <i class="fa fa-files-o"></i>
                                                        Types des contrats
                                                    </a>
                                                    <a href="{{URL::route('backoffice_poste')}}" class="list-group-item">
                                                            <i class="fa fa-black-tie "></i>
                                                            Types des postes
                                                    </a>
                                                    <a href="{{URL::route('backoffice_rubrique')}}" class="list-group-item">
                                                            <i class="fa fa-list"></i>
                                                            Rubriques
                                                    </a>
                                                    <a href="{{URL::route('backoffice_absence')}}" class="list-group-item">
                                                            <i class="fa fa-file"></i>
                                                            Types des absences
                                                    </a>
                                                </div>
                                            </div>
                                    </div>
                                    
                                          
                                  </div>
                                  
                                </div>
                            </div>
                        </div>
                        <!--/RH-->

                        <!--Juridique-->
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="panel-group" id="">
                                 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a><span class="fa fa-gavel">
                                          </span>&nbsp;Juridique</a>
                                      </h4>
                                    </div>
                                 <div id="accordion_jr" class="panel-body">
                                    <div class="list-group">
                                            <a class="list-group-item" data-toggle="collapse" data-parent="#accordion_jr" href="#collapseFour_jr"><span class="">
                                                </span>&nbsp;Sinistre <span class="pull-right"> <i class="fa fa-angle-down"></i></span></a>
                                      
                                            <div id="collapseFour_jr" class="panel-collapse collapse">
                                                <div class="list-group">
                                                    <a href="{{URL::route('backoffice_cat_details_accident')}}" class="list-group-item">
                                                        <i class="fa fa-reorder"></i>
                                                        Catégories des détails d'accident
                                                    </a>
                                                    <a href="{{URL::route('backoffice_types_details_accident')}}" class="list-group-item">
                                                        <i class="fa fa-files-o"></i>
                                                        Types des détails d'accident
                                                    </a>
                                                    <a href="{{URL::route('backoffice_types_degats')}}" class="list-group-item">
                                                            <i class="fa fa-unlink "></i>
                                                            Types des dégâts
                                                    </a>
                                                    
                                                </div>
                                            </div>
                                            <a class="list-group-item" data-toggle="collapse" data-parent="#accordion_vt" href="#collapseFour_vt"><span class="">
                                                </span>&nbsp;Visite technique <span class="pull-right"> <i class="fa fa-angle-down"></i></span></a>
                                      
                                            <div id="collapseFour_vt" class="panel-collapse collapse">
                                                <div class="list-group">
                                                    <a href="{{URL::route('backoffice_types_vt')}}" class="list-group-item">
                                                        <i class="fa fa-wrench"></i>
                                                        Types des Visites techniques
                                                    </a>
                                                    <a href="{{URL::route('backoffice_freq_vt')}}" class="list-group-item">
                                                        <i class="fa fa-file"></i>
                                                        Fréquences des Visites techniques
                                                    </a>                                               
                                                    
                                                </div>
                                            </div>
                                            <a class="list-group-item" data-toggle="collapse" data-parent="#accordion_sa" href="#collapseFour_sa"><span class="">
                                            </span>&nbsp;Assurance<span class="pull-right"> <i class="fa fa-angle-down"></i></span></a>
                                  
                                        <div id="collapseFour_sa" class="panel-collapse collapse">
                                            <div class="list-group">
                                                <a href="{{URL::route('backoffice_societes_assurance')}}" class="list-group-item">
                                                    <i class="fa fa-file"></i>
                                                    Sociétés d'assurance
                                                </a>
                                                <a href="{{URL::route('backoffice_courtiers_assurance')}}" class="list-group-item">
                                                        <i class="fa fa-file"></i>
                                                       Courtiers d'assurance
                                                </a>                                             
                                                
                                            </div>
                                        </div>

                                        <a class="list-group-item" data-toggle="collapse" data-parent="#accordion_if" href="#collapseFour_if"><span class="">
                                            </span>&nbsp;Infractions<span class="pull-right"> <i class="fa fa-angle-down"></i></span></a>
                                  
                                        <div id="collapseFour_if" class="panel-collapse collapse">
                                            <div class="list-group">
                                                <a href="{{URL::route('backoffice_types_infractions')}}" class="list-group-item">
                                                    <i class="fa fa-file"></i>
                                                    Types d'infractions
                                                </a>
                                                <a href="{{URL::route('backoffice_infractions')}}" class="list-group-item">
                                                        <i class="fa fa-file"></i>
                                                       Infractions
                                                </a>                                             
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                          
                                  </div>
                                  
                                </div>
                            </div>
                        </div>
                        <!--/Juridique--> 
                        
                         <!--Intervention-->
                         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="panel-group" id="">
                                 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a><span class="fa fa-">
                                          </span>&nbsp;Interventions</a>
                                      </h4>
                                    </div>
                                 <div id="accordion_i" class="panel-body">
                                    <div class="list-group">
                                            <a class="list-group-item" data-toggle="collapse" data-parent="#accordion_i" href="#collapseFour_i"><span class="">
                                                </span>&nbsp;Demande d'intervention <span class="pull-right"> <i class="fa fa-angle-down"></i></span></a>
                                      
                                            <div id="collapseFour_i" class="panel-collapse collapse">
                                                <div class="list-group">
                                                    <a href="{{URL::route('backoffice_gravites')}}" class="list-group-item">
                                                        <i class="fa fa-reorder"></i>
                                                       Gravités des demandes d'intervention
                                                    </a>
                                                    <a href="{{URL::route('backoffice_urgences')}}" class="list-group-item">
                                                        <i class="fa fa-reorder"></i>
                                                       Urgences des demandes d'intervention
                                                    </a>
                                                    <a href="{{URL::route('backoffice_categories_interventions')}}" class="list-group-item">
                                                            <i class="fa fa-reorder"></i>
                                                        Catégories des demandes d'intervention
                                                    </a>
                                                </div>
                                            </div>
                                            <a class="list-group-item" data-toggle="collapse" data-parent="#accordion_iter" href="#collapseFour_iter"><span class="">
                                                </span>&nbsp;Intervention <span class="pull-right"> <i class="fa fa-angle-down"></i></span></a>
                                      
                                            <div id="collapseFour_iter" class="panel-collapse collapse">
                                                <div class="list-group">
                                                    <a href="{{URL::route('backoffice_garages')}}" class="list-group-item">
                                                        <i class="fa fa-reorder"></i>
                                                       Garages
                                                    </a>                                               
                                                    <a href="{{URL::route('backoffice_fournisseurs')}}" class="list-group-item">
                                                            <i class="fa fa-reorder"></i>
                                                            Centres de visite technique
                                                    </a> 
                                                    <a href="{{URL::route('backoffice_familles_intervention')}}" class="list-group-item">
                                                            <i class="fa fa-reorder"></i>
                                                            Familles d'intervention
                                                    </a>  
                                                    <a href="{{URL::route('backoffice_categories_famille')}}" class="list-group-item">
                                                            <i class="fa fa-reorder"></i>
                                                            Categories de famille d'intervention
                                                    </a>
                                                    <a href="{{URL::route('backoffice_sous_categories_famille')}}" class="list-group-item">
                                                            <i class="fa fa-reorder"></i>
                                                            Sous categories de famille d'intervention
                                                    </a>
                                                    <a href="{{URL::route('backoffice_categorie_priseencharge')}}" class="list-group-item">
                                                            <i class="fa fa-reorder"></i>
                                                          Categorie prise en charge
                                                    </a>                                             
                                                </div>
                                            </div>
                                           
                                    </div>
                                    
                                          
                                  </div>
                                  
                                </div>
                            </div>
                        </div>
                        <!--/Intervention--> 
                    </div>
                </div>
            </section>
        </section>
    </div>

</div>
<!-- END MAIN-->




	   	 
     

@endsection



