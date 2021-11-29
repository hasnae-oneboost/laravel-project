@extends('layouts.dashboard')
@section('title')
Ajouter un nouveau sinistre
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
            <li><a href="">Accueil</a></li>
            <li>Juridique</li>
            <li><a href="{{route('backoffice_sinistres')}}">Sinistres</a></li>
            <li>@yield('title')</li>	
		</ol>
		<!-- end breadcrumb -->
@endsection
@section('content')
<div id="content">
        <div class="row">
            <div class="col-sm-12">
                <!--Error message--> 
                <div class="center"> 
                    @if ($errors->any())
                        <div class="alert alert-danger col-md-offset">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif 
                </div>
                <!--End error message-->
                <!-- Get the success message after updating-->
                <div class="center">     
                    @if(Session::has('success'))         
                    <div class="alert alert-success col-md-offset">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('success') }}    
                        @php                        
                        Session::forget('success');
                        @endphp     
                    </div>      
                    @endif        
                </div>
               
                
             </div>
         </div>           
        </div>
</div>
<!-- MAIN PANEL -->
<div id="main" role="main">
    <!-- MAIN CONTENT -->
    <div id="content">
        <!-- widget grid -->
        <section id="widget-grid" class="">
            <!-- row -->
            <div class="row">                
                <form class="" files="true" action="{{route('backoffice_sinistres_ajouter')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                        <!-- Widget *****  VEHICULE-->
                        <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
                            <!-- widget options:
                                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
                                
                                data-widget-colorbutton="false"	
                                data-widget-editbutton="false"
                                data-widget-togglebutton="false"
                                data-widget-deletebutton="false"
                                data-widget-fullscreenbutton="false"
                                data-widget-custombutton="false"
                                data-widget-collapsed="true" 
                                data-widget-sortable="false"
                            -->
                            <header>
                                    <span class="widget-icon"> <i class="fa fa-">&nbsp;</i> </span>
                               <p class="h6">&nbsp;Véhicule</p>		   
                            </header>

                            <!-- widget div-->
                            <div>
                                
                                <!-- widget content -->
                                <div class="widget-body">
                                   
                                <fieldset>
                                    <div class="form-group">
                                                    <div class="col-md-2">
                                                    <label>Tracteur</label>
                                                    </div>
													<div class="col-md-10">
                                                        <select class="form-control" name="tracteur" id="" required>
                                                                <option value=""></option>
                                                                @foreach($tracteurs as $tracteur)
                                                                <option value="{{$tracteur->id}}">Tracteur: {{$tracteur->immatriculation}}</option>
                                                                @endforeach
                                                                @foreach($voitures as $voiture)
                                                                <option value="{{$voiture->id}}">Voiture de service: {{$voiture->immatriculation}}</option>
                                                                @endforeach
                                                            </select>
                                                    </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Semi-remorque</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <select class="form-control" name="semiremorque" id="">
                                                                <option value=""></option>
                                                                @foreach($semiremorques as $semiremork)
                                                                <option value="{{$semiremork->id}}">{{$semiremork->immatriculation}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Conducteur N°1</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <select class="form-control" name="conducteur1" id="" required>
                                                            <option value=""></option>
                                                            @foreach($conducteurs as $conducteur)
                                                            <option value="{{$conducteur->id}}">{{$conducteur->nom}}&nbsp;{{$conducteur->prenom}}</option>
                                                            @endforeach
                                                    </select>
                                                    </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Conducteur N°2</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                            <select class="form-control" name="conducteur2" id="">
                                                                    <option value=""></option>
                                                                    @foreach($conducteurs as $conducteur)
                                                                    <option value="{{$conducteur->id}}">{{$conducteur->nom}}&nbsp;{{$conducteur->prenom}}</option>
                                                                    @endforeach
                                                            </select>

                                                    </div>
                                            </div>
                                </fieldset>
                                   
                                </div>
                                <!-- end widget content -->
                            </div>
                            <!-- end widget div -->
                            
                        </div>
                        <!-- end widget -->

                         <!-- Widget ***** CIRCONSTANCE DE LACCIDENT-->
                         <div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
                                <!-- widget options:
                                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
                                    
                                    data-widget-colorbutton="false"	
                                    data-widget-editbutton="false"
                                    data-widget-togglebutton="false"
                                    data-widget-deletebutton="false"
                                    data-widget-fullscreenbutton="false"
                                    data-widget-custombutton="false"
                                    data-widget-collapsed="true" 
                                    data-widget-sortable="false"                                    
                                -->
                                <header>
                                    <span class="widget-icon"> <i class="fa fa-calendar">&nbsp;</i> </span>
                                    <p class="h6">&nbsp;Circonstances de l'accident</p>	
                                </header>
    
                                <!-- widget div-->
                                <div>                                    
                                    <!-- widget content -->
                                    <div class="widget-body">
                                       
                                    <fieldset>
                                        <div class="form-group">
                                                        <div class="col-md-2">
                                                        <label>Date</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" id="date" name="date" required>
                                                        </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Heure</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                    <input class="form-control" type="text" id="heure" name="heure" required>
                                                </div>
                                        </div>
                                    </fieldset>
                                        <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Pays</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                    <select class="pays_select" name="pays" id="pays" style="width:695px;" required>
                                                        <option value=""></option>
                                                        @foreach($pays as $p)
                                                            <option value="{{$p->id}}">{{$p->libelle_pays}}</option>
                                                        @endforeach
                                                    </select>
                                            
                                                </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Ville</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                    <select class="ville_select" name="ville" id="ville" style="width:695px;" required>
                                                        <option value=""></option>
                                                    </select>
                                             </div>
                                        </div>                                               
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Constat</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px" >
                                                                <label class="radio-inline"><input  type="radio" name="constat" value="Oui"><i></i>Oui</label>
                                                                <label class="radio-inline"><input  type="radio" name="constat" value="Non"><i></i>Non</label>
                                             </div>
                                        </div>                                               
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Rapport</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                        <label class="radio-inline"><input  type="radio" name="rapport" value="Oui"><i></i>Oui</label>
                                                        <label class="radio-inline"><input type="radio" name="rapport" value="Non"><i></i>Non</label>
                                    
                                             </div>
                                        </div>                                               
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Commentaire</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                    <textarea class="form-control" name="commentaire" type="text"></textarea>
                                             </div>
                                        </div>                                               
                                    </fieldset>
                                       
                                    </div>
                                    <!-- end widget content -->
                            </div>
                                <!-- end widget div -->
                                
                        </div>
                        <!--end widget-->
                        <!-- Widget ***** PROCES VERBAL-->
                        <div class="jarviswidget jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
                                <!-- widget options:
                                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
                                    
                                    data-widget-colorbutton="false"	
                                    data-widget-editbutton="false"
                                    data-widget-togglebutton="false"
                                    data-widget-deletebutton="false"
                                    data-widget-fullscreenbutton="false"
                                    data-widget-custombutton="false"
                                    data-widget-collapsed="true" 
                                    data-widget-sortable="false"
                                -->
                                <header>
    
                                    <p class="h6">&nbsp;Procès verbal</p>			
                                </header>
    
                                <!-- widget div-->
                                <div>
                                    <!-- widget content -->
                                    <div class="widget-body">
                                            <fieldset>
                                                    <div class="form-group">
                                                                    <div class="col-md-2">
                                                                    <label>Autorité du procès verbal</label>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <select class="form-control" name="autorite_proces_verbal" id="">
                                                                                <option value=""></option>
                                                                                <option value="Police">Police</option>
                                                                                <option value="Gendarmerie">Gendarmerie</option>
                                                                        </select>
                                                                    </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>                                                
                                                    <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Renseignements du procès verbal</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                            <label class="radio-inline"><input  type="radio" name="renseignement_proces_verbal" value="Oui"><i></i>Oui</label>
                                                                            <label class="radio-inline"><input type="radio" name="renseignement_proces_verbal" value="Non"><i></i>Non</label>
                                                         </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Date du procès verbal</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                        <input class="form-control" name="date_proces_verbal" type="text" id="date">
                                                                    </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                
                                                    <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>N° Procès verbal</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                        <input class="form-control" name="numero_proces_verbal" type="text" >        
                                                                    </div>
                                                    </div>
                                                   
                                                                                            
                                                </fieldset>					                                    
                                    </div>
                                    <!-- end widget content -->                                
                                </div>
                                <!-- end widget div -->                           
                            </div>
                            <!-- end widget -->	

                        
                        
                        <!-- Widget ***** AUTRES-->
                        <div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
                                <!-- widget options:
                                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
                                    
                                    data-widget-colorbutton="false"	
                                    data-widget-editbutton="false"
                                    data-widget-togglebutton="false"
                                    data-widget-deletebutton="false"
                                    data-widget-fullscreenbutton="false"
                                    data-widget-custombutton="false"
                                    data-widget-collapsed="true" 
                                    data-widget-sortable="false"
                                -->
                                <header>
                                        <span class="widget-icon"> <i class="fa fa-info">&nbsp;</i> </span>
                                   <p class="h6">&nbsp;Autres</p>		   
                                </header>
    
                                <!-- widget div-->
                                <div>
                                    
                                    <!-- widget content -->
                                    <div class="widget-body">
                                       
                                    <fieldset>
                                        <div class="form-group">
                                                        <div class="col-md-2">
                                                        <label>Taux de remboursement</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" name="taux_remboursement" class="form-control">
                                                        </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2" style="margin-top: 15px">
                                                            <label>Montant de franchise</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <input type="text" name="montant_franchise" class="form-control">
                                                        </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2" style="margin-top: 15px">
                                                            <label>Référence de sinistre</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <input type="text" name="reference_sinistre" class="form-control">
                                                        </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2" style="margin-top: 15px">
                                                            <label>Taux de responsabilité</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <input type="text" name="taux_responsabilite" class="form-control">
                                                        </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2" style="margin-top: 15px">
                                                            <label>Date fin</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <input type="text" name="date_fin" class="form-control">
                                                        </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2" style="margin-top: 15px">
                                                            <label>Circonstance du sinistre</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <textarea type="text" name="circonstance_sinistre" class="form-control"></textarea>
                                                        </div>
                                                </div>
                                    </fieldset>
                                       
                                    </div>
                                    <!-- end widget content -->
                                </div>
                                <!-- end widget div -->
                                
                            </div>
                            <!-- end widget -->
    
                             <!-- Widget ***** SINISTRE CLOTURE-->
                             <div class="jarviswidget" id="wid-id-6" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
                                    <!-- widget options:
                                        usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
                                        
                                        data-widget-colorbutton="false"	
                                        data-widget-editbutton="false"
                                        data-widget-togglebutton="false"
                                        data-widget-deletebutton="false"
                                        data-widget-fullscreenbutton="false"
                                        data-widget-custombutton="false"
                                        data-widget-collapsed="true" 
                                        data-widget-sortable="false"                                    
                                    -->
                                    <header>
                                        <span class="widget-icon"> <i class="fa fa-calendar">&nbsp;</i> </span>
                                        <p class="h6">&nbsp;Sinistre cloturé?</p>	
                                    </header>
        
                                    <!-- widget div-->
                                    <div>                                    
                                        <!-- widget content -->
                                        <div class="widget-body">
                                           
                                        <fieldset>
                                            <div class="form-group">
                                                            <div class="col-md-2">
                                                            <label>Sinistre cloturé</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                    <label class="radio-inline"><input  type="radio" name="sinistre_cloture" value="Oui"><i></i>Oui</label>
                                                                    <label class="radio-inline"><input type="radio" name="sinistre_cloture" value="Non"><i></i>Non</label>
                                                 
                                                            </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            
                                        </div>
                                        <!-- end widget content -->
                                </div>
                                    <!-- end widget div -->
                                    
                            </div>
                            <!--end widget-->

                       		
                    </article>
                    <!-- WIDGET END -->

                   
                    <!-- WIDGET END -->
                    <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                        <!--Widget ***** VEHICULE PARTIE ADVERSE-->
                        <div class="jarviswidget jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
                                <!-- widget options:
                                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
                                    
                                    data-widget-colorbutton="false"	
                                    data-widget-editbutton="false"
                                    data-widget-togglebutton="false"
                                    data-widget-deletebutton="false"
                                    data-widget-fullscreenbutton="false"
                                    data-widget-custombutton="false"
                                    data-widget-collapsed="true" 
                                    data-widget-sortable="false"
                                -->
                                <header>
                                    <span class="widget-icon"> <i class="fa fa-clipboard-list">&nbsp;</i> </span>
                                    <p class="h6">&nbsp;Véhicule partie adverse</p>				
                                </header>    
                                <!-- widget div-->
                                <div>
                                    <!-- widget content -->
                                    <div class="widget-body">
                                            <fieldset>
                                                    <div class="form-group">
                                                                    <div class="col-md-2">
                                                                    <label>Immatriculation</label>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <input class="form-control" name="immatriculation" type="text">        
                                                                    </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                            <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Marque</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                       <input type="text" name="marque" class="form-control">
                                                                    </div>
                                                            </div>
                
                                            </fieldset>				
                                        
                                    </div>
                                    <!-- end widget content -->
                                    
                                </div>
                                <!-- end widget div -->
                                
                        </div>
                        <!-- end widget -->

                        <!-- Widget ***** CONDUCTEUR PARTIE ADVERSE-->
                        <div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
                            <!-- widget options:
                                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
                                
                                data-widget-colorbutton="false"	
                                data-widget-editbutton="false"
                                data-widget-togglebutton="false"
                                data-widget-deletebutton="false"
                                data-widget-fullscreenbutton="false"
                                data-widget-custombutton="false"
                                data-widget-collapsed="true" 
                                data-widget-sortable="false"
                            -->
                            <header>
                                    <span class="widget-icon"> <i class="fa fa-info">&nbsp;</i> </span>
                               <p class="h6">&nbsp;Conducteur partie adverse</p>		   
                            </header>

                            <!-- widget div-->
                            <div>
                                
                                <!-- widget content -->
                                <div class="widget-body">
                                   
                                <fieldset>
                                    <div class="form-group">
                                                    <div class="col-md-2">
                                                    <label>Nom du conducteur</label>
                                                    </div>
													<div class="col-md-10">
                                                        <input type="text" name="nom_conducteur" class="form-control">
                                                    </div>
                                    </div>
                                </fieldset>
                                <fieldset>                                    
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Prenom du conducteur</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <input type="text" name="prenom_conducteur" class="form-control">
                                                    </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>CIN</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <input type="text" name="cin" class="form-control">
                                                    </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>N° Permis</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <input type="text" name="numero_permis" class="form-control">
                                                    </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Type de permis</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <input type="text" name="type_permis" class="form-control">
                                                    </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Date de fin du permis</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                       <input type="text" name="date_fin_permis" id="date" class="form-control">
                                                    </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Ville du permis</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                   <input type="text" name="ville_permis" class="form-control">
                                                </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                            <div class="col-md-2" style="margin-top: 15px">
                                                <label>Adresse</label>
                                            </div>
                                            <div class="col-md-10" style="margin-top: 15px">
                                               <input type="text" name="adresse_permis" class="form-control">
                                            </div>
                                    </div>
                                </fieldset>
                                   
                                </div>
                                <!-- end widget content -->
                            </div>
                            <!-- end widget div -->
                            
                        </div>
                        <!-- end widget -->

                         <!-- Widget ***** ASSURE PARTIE ADVERSE-->
                         <div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
                                <!-- widget options:
                                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
                                    
                                    data-widget-colorbutton="false"	
                                    data-widget-editbutton="false"
                                    data-widget-togglebutton="false"
                                    data-widget-deletebutton="false"
                                    data-widget-fullscreenbutton="false"
                                    data-widget-custombutton="false"
                                    data-widget-collapsed="true" 
                                    data-widget-sortable="false"                                    
                                -->
                                <header>
                                    <span class="widget-icon"> <i class="fa fa-calendar">&nbsp;</i> </span>
                                    <p class="h6">&nbsp;Assuré partie adverse</p>	
                                </header>
    
                                <!-- widget div-->
                                <div>                                    
                                    <!-- widget content -->
                                    <div class="widget-body">
                                       
                                    <fieldset>
                                        <div class="form-group">
                                                        <div class="col-md-2">
                                                        <label>Compagnie assurance</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" name="compagnie_assurance">
                                                        </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2">
                                                    <label>N° Police</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                    <input class="form-control" type="text" name="numero_police">
                                                </div>
                                        </div>
                                    </fieldset>
                                        <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2">
                                                    <label>Agence intermediaire</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                    <input class="form-control" type="text" name="agence_intermediaire">
                                                </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2">
                                                    <label>N° Attestation</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                    <input class="form-control" type="text" name="numero_attestation" >
                                                </div>
                                        </div>                                               
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2">
                                                    <label>Adresse</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                    <input class="form-control" type="text" name="adresse_assure" >
                                                </div>
                                        </div>                                               
                                    </fieldset>
                                       
                                    </div>
                                    <!-- end widget content -->
                            </div>
                                <!-- end widget div -->
                                
                        </div>
                        <!--end widget-->

                         <!-- Widget ***** DEGATS-->
                         <div class="jarviswidget jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
                                <!-- widget options:
                                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
                                    
                                    data-widget-colorbutton="false"	
                                    data-widget-editbutton="false"
                                    data-widget-togglebutton="false"
                                    data-widget-deletebutton="false"
                                    data-widget-fullscreenbutton="false"
                                    data-widget-custombutton="false"
                                    data-widget-collapsed="true" 
                                    data-widget-sortable="false"
                                -->
                                <header>
    
                                    <p class="h6">&nbsp;Dégâts</p>			
                                </header>
    
                                <!-- widget div-->
                                <div>
                                    <!-- widget content -->
                                    <div class="widget-body">
                                            <fieldset>
                                                    <div class="form-group">
                                                                    <div class="col-md-2">
                                                                    <label>Dégâts</label>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <textarea class="form-control" name="degats" type="text"> </textarea>       
                                                                    </div>
                                                    </div>  
                                                </fieldset>
                                                <fieldset>                                              
                                                    <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Dégats adverse</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                       <textarea type="text" name="degat_adverse" class="form-control" ></textarea>
                                                                    </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Dégât matériel</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                            <label class="radio-inline"><input  type="radio" name="degat_materiel" value="Oui"><i></i>Oui</label>
                                                                            <label class="radio-inline"><input type="radio" name="degat_materiel" value="Non"><i></i>Non</label>
                                                         
                                                                    </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Dégât mortel</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                            <label class="radio-inline"><input  type="radio" name="degat_mortel" value="Oui"><i></i>Oui</label>
                                                                            <label class="radio-inline"><input type="radio" name="degat_mortel" value="Non"><i></i>Non</label>
                                                         
                                                                    </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Dégât corporel</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                       
                                                                            <label class="radio-inline"><input  type="radio" name="degat_corporel" value="Oui"><i></i>Oui</label>
                                                                            <label class="radio-inline"><input type="radio" name="degat_corporel" value="Non"><i></i>Non</label>
                                                         

                                                                    </div>
                                                    </div>
                                            </fieldset>
                                            
                                               				                                    
                                    </div>
                                    <!-- end widget content -->                                
                                </div>
                                <!-- end widget div -->                           
                            </div>
                            <!-- end widget -->	

                        <!--Widget ***** OBSERVATIONS-->
                        <div class="jarviswidget jarviswidget" id="wid-id-5" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
                                <!-- widget options:
                                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
                                    
                                    data-widget-colorbutton="false"	
                                    data-widget-editbutton="false"
                                    data-widget-togglebutton="false"
                                    data-widget-deletebutton="false"
                                    data-widget-fullscreenbutton="false"
                                    data-widget-custombutton="false"
                                    data-widget-collapsed="true" 
                                    data-widget-sortable="false"
                                -->
                                <header>
                                    <span class="widget-icon"> <i class="fa fa-clipboard-list">&nbsp;</i> </span>
                                    <p class="h6">&nbsp;Observations</p>				
                                </header>    
                                <!-- widget div-->
                                <div>
                                    <!-- widget content -->
                                    <div class="widget-body">
                                            <fieldset>
                                                    <div class="form-group">
                                                                    <div class="col-md-2">
                                                                    <label>Observation</label>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <textarea class="form-control" name="observation" type="text"> </textarea>       
                                                                    </div>
                                                    </div>
                                                    
                                                           
                
                                            </fieldset>				
                                        
                                    </div>
                                    <!-- end widget content -->
                                    
                                </div>
                                <!-- end widget div -->
                                
                        </div>
                        <!-- end widget -->	

                    </article>
                    <!-- WIDGET END -->

               

                   
                    
                    <footer class="pull-right" style="margin-right: 50px; margin-top: 200px">
                        <button type="button" class="btn btn-default btn-lg" onclick="window.history.back();">
                            Retour
                        </button>
                        <button type="submit" class="btn btn-red btn-lg">
                            Valider
                        </button>
                    </footer>
                 
                </form>
            </div>

            <!-- end row -->

            

        </section>
        <!-- end widget grid -->

    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

@endsection