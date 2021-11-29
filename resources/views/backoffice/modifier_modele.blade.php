@extends('layouts.dashboard')
@section('title')
Modifier le modèle
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Classement des véhicules</li>
                <li>Classement des véhicules</li>
                <li><a href="{{route('backoffice_modeles')}}">Modèles</a></li>
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
            <!-- End success message-->
        </div>
    </div>
</div>

<div id="main" role="main">
        <!-- MAIN CONTENT -->
        <div id="content">
    
            <!-- widget grid -->
            <section id="widget-grid" class="">
    
                <!-- row -->
                <div class="row">             
                        
                        
                        <form class="" files="true" action="{{route('backoffice_modele_modifier',$modeles->id)}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                            <!-- NEW WIDGET START -->
                                <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    
                                    <!-- Widget ID (each widget will need unique ID)-->
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
                                                <span class="widget-icon"> <i class="fa fa-info">&nbsp;</i> </span>
                                        <p class="h6">&nbsp;Modèle</p>		   
                                        </header>
    
                                        <!-- widget div-->
                                        <div>
                                            
                                            <!-- widget content -->
                                            <div class="widget-body">
                                            
                                            <fieldset>
                                                <div class="form-group">
                                                                <div class="col-md-2">
                                                                <label>Categorie</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                <select name="categorie_vehicule" id="" required>
                                                                    <option value="{{$modeles->categorie_id}}">{{$modeles->categorie->libelle}}</option>                                                               
                                                                    @foreach($cats as $c)
                                                                    <option value="{{$c->id}}">{{$c->libelle}}</option>
                                                                    @endforeach
                                                                </select> </div>
                                                </div>
                                                
                                                        <div class="form-group" >
                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                    <label>Marque</label>
                                                                </div>
                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                    <select name="marque" id="" required>
                                                                    <option value="{{$modeles->marque_id}}">{{$modeles->marque->marque}}</option>
                                                                        @foreach($marques as $m)
                                                                        <option value="{{$m->id}}">{{$m->marque}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                        </div>
    
                                                        <div class="form-group" >
                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                    <label>Gamme</label>
                                                                </div>
                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                <select name="gamme" required>
                                                                    <option value="{{$modeles->gamme_id}}">{{$modeles->gamme->gamme}}</option>                                                                                                                                
                                                                        @foreach($gammes as $g)
                                                                        <option value="{{$g->id}}">{{$g->gamme}}</option>
                                                                        @endforeach
                                                                </select>
                                                                </div>
                                                        </div>
    
                                                        <div class="form-group" >
                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                    <label>Confort</label>
                                                                </div>
                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                    <select  name="confort"  required>
                                                                        <option value="{{$modeles->confort_id}}">{{$modeles->confort->nom}}</option>                                                                        
                                                                            @foreach($conforts as $c)
                                                                            <option value="{{$c->id}}">{{$c->nom}}</option>
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
    
                                    <!-- Widget ID (each widget will need unique ID)-->
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
                                                <span class="widget-icon"> <i class="fa fa-check">&nbsp;</i> </span>
                                                <p class="h6">&nbsp;Général</p>	
                                            </header>
    
                                            <!-- widget div-->
                                            <div>                                    
                                                <!-- widget content -->
                                                <div class="widget-body">
                                                
                                                <fieldset>
                                                    <div class="form-group">
                                                                    <div class="col-md-2">
                                                                    <label>Nom</label>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                    <input type="text"  class="form-control" name="nom" value="{{$modeles->nom}}" required>
                                                                    </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group" >
                                                            <div class="col-md-2">
                                                                <label>Année</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                            <input type="text"  class="form-control" name="annee" value="{{$modeles->annee}}" required>
                                                            </div>
                                                    </div>
                                                </fieldset>
                                                    <fieldset>
                                                    <div class="form-group" >
                                                            <div class="col-md-2">
                                                                <label>Energie</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                            <select  name="energie"  required>
                                                            <option value="{{$modeles->energie_id}}">{{$modeles->energie->libelle}}</option>                                                                                                                                                
                                                                    @foreach($energies as $e)
                                                                    <option value="{{$e->id}}">{{$e->libelle}}</option>
                                                                    @endforeach
                                                            </select> 
                                                            </div>
                                                    </div>
                                                    <div class="form-group" >
                                                            <div class="col-md-2">
                                                                <label>Chevaux fiscaux</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                <input class="form-control" type="text" id="" name="cv_fiscaux" value="{{$modeles->cv_fiscaux}}" required>
                                                            </div>
                                                    </div>                                               
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group" >
                                                            <div class="col-md-2">
                                                                <label>Nombre portes</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                            <input type="text"  class="form-control" name="nombre_portes" value="{{$modeles->nombre_portes}}" required>
                                                            </div>
                                                    </div>
                                                    <div class="form_group">
                                                            <div class="col-md-2">
                                                                <label>TVA</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                            <select name="montant_tva" class="type_tva_select">
                                                            <option value="{{$modeles->tva}}">{{$modeles->tva}}</option>                                                       
                                                                @foreach($tva as $t)
                                                                <option value="{{$t->taux_tva}}">{{$t->taux_tva}}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                    <div class="form_group">
                                                        <div class="col-md-2">
                                                            <label>Prix HT</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <label class="input">
                                                        <input type="number" class="form-control" name="montant_ht"  min="0" step="0.01" value="{{$modeles->prix_ht}}" required>
                                                    </label>    
                                                    </div>
    
                                                    </div>
                                                   
                                                    <div class="form_group">
                                                        <div class="col-md-2">
                                                            <label>Prix TTC</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                                <label class="input">                                                            
                                                                 <input type="number" class="form-control" min="0" step="0.01" id="ttc" name="montant_ttc" value="{{$modeles->ttc}}" required>
                                                                </label>    
                                                        </div>
    
                                                    </div>
                                                    <div class="form-group">
                                                            <div class="col-md-2">
                                                                <label>Boite de vitesse</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                            <select name="boite_vitesse" id="">
                                                                        <option value="{{$modeles->boite_vitesse}}">{{$modeles->boite_vitesse}}</option>
                                                                            <option value="Manuelle">Manuelle</option>
                                                                            <option value="Automatique">Automatique</option>
                                                                        </select>
                                                            </div>
    
                                                    </div>
                                                </fieldset>                                       
                                                </div>
                                                <!-- end widget content -->
                                        </div>
                                            <!-- end widget div -->
                                            
                                    </div>
                                    <!--end widget-->
    
                                        
                                </article>
                                <!-- WIDGET END -->
    
                                <!-- NEW WIDGET START -->
                                <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    
                                    <!-- Widget ID (each widget will need unique ID)-->
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
                                                <span class="widget-icon"> <i class="fa fa-phone">&nbsp;</i> </span>
                                                <p class="h6">&nbsp;Motorisation</p>			
                                            </header>
    
                                            <!-- widget div-->
                                            <div>
                                                <!-- widget content -->
                                                <div class="widget-body">
                                                        <fieldset>
                                                                <div class="form-group">
                                                                                <div class="col-md-2">
                                                                                <label>Cylindrée</label>
                                                                                </div>
                                                                                <div class="col-md-10">
                                                                                  <input type="number" min="0" class="form-control" name="cylindree" value="{{$modeles->cylindree}}" required>
                                                                                    
                                                                                </div>
                                                                </div>  
                                                            </fieldset>
                                                            <fieldset>                                              
                                                                <div class="form-group" >
                                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                                    <label>Moteur</label>
                                                                                </div>
                                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                                  <input type="text"  class="form-control" name="moteur" value="{{$modeles->moteur}}" required>
                                                                                
                                                                                </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="form-group" >
                                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                                    <label>Chevaux moteur</label>
                                                                                </div>
                                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                                     <input type="number" min="0"  class="form-control" name="cv_moteur" value="{{$modeles->cv_moteur}}" required>
                                                                                </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="form-group" >
                                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                                    <label>Transmission</label>
                                                                                </div>
                                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                                <input type="text"  class="form-control" name="transmission" value="{{$modeles->transmission}}" required>   
                                                                                </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="form-group" >
                                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                                    <label>Accélération</label>
                                                                                </div>
                                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                                            <input type="number" min="0"  class="form-control" name="acceleration" value="{{$modeles->acceleration}}" required>                                                                            
                                                                                </div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset>                                                        
                                                            <div class="form-group">
                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                    <label>Vitesse max</label>
                                                                </div>
                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                <input type="number" min="0"  class="form-control" name="vitesse_max" value="{{$modeles->vitesse_max}}" required>
                                                                       
                                                                </div>
                                                            </div> 
                                                                                                                                                
                                                            </fieldset>					                                    
                                                </div>
                                                <!-- end widget content -->                                
                                            </div>
                                            <!-- end widget div -->                           
                                        </div>
                                        <!-- end widget -->	
    
                                    <!--Widget ID (each widget will need unique ID)-->
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
                                                <span class="widget-icon"> <i class="fa fa-list">&nbsp;</i> </span>
                                                <p class="h6">&nbsp;Dimensions & consommations </p>				
                                            </header>    
                                            <!-- widget div-->
                                            <div>
                                                <!-- widget content -->
                                                <div class="widget-body">
                                                        <fieldset>
                                                                <div class="form-group">
                                                                                <div class="col-md-2">
                                                                                <label>Hauteur</label>
                                                                                </div>
                                                                                <div class="col-md-10">
                                                                                
                                                                                    <input type="number" min="0"  class="form-control" name="hauteur" value="{{$modeles->hauteur}}" required>
                                                                               
                                                                                </div>
                                                                </div>
                                                                
                                                                        <div class="form-group" >
                                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                                    <label>Largeur</label>
                                                                                </div>
                                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                                    <input type="number" min="0"  class="form-control" name="largeur" value="{{$modeles->largeur}}" required>
                                                                                </div>
                                                                        </div>
                                                        </fieldset>
                                                        <fieldset>
                                                                        <div class="form-group" >
                                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                                    <label>Longueur</label>
                                                                                </div>
                                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                                   <input type="number" min="0"  class="form-control" name="longueur" value="{{$modeles->longueur}}" required>
                                                                                </div>
                                                                        </div>
                                                                        <div class="form-group" >
                                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                                    <label>Poids vide</label>
                                                                                </div>
                                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                                    <input type="number" min="0"  class="form-control" name="poids_vide" value="{{$modeles->poids_vide}}" required>
                                                                                </div>
                                                                        </div>
                                                                        <div class="form-group" >
                                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                                    <label>PTC</label>
                                                                                </div>
                                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                                    <input type="text"  class="form-control" name="ptc" value="{{$modeles->ttc}}" required>
                                                                                </div>
                                                                        </div>
                                                                        <div class="form-group" >
                                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                                    <label>Urbaine</label>
                                                                                </div>
                                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                                    <input type="number" min="0"  class="form-control" name="urbaine" value="{{$modeles->urbaine}}" required>
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
                                   <!-- NEW WIDGET START -->
                                   <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    
        <!-- Widget ID (each widget will need unique ID)-->
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
                <span class="widget-icon"> <i class="fa fa-">&nbsp;</i> </span>
                <p class="h6">&nbsp;Divers</p>			
            </header>
    
            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">
                        <fieldset>
                                <div class="form-group">
                                                <div class="col-md-2">
                                                <label>Puissance fiscale</label>
                                                </div>
                                                <div class="col-md-10">
                                                  <input type="text"  class="form-control" name="puissance_fiscale" value="{{$modeles->puissance_fiscale}}" required>
                                                    
                                                </div>
                                </div> 
                            </fieldset>
                            <fieldset>                                               
                                <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Couple</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                  <input type="text"  class="form-control" name="couple" value="{{$modeles->couple}}" required>
                                                
                                                </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Volume du reservoir N°1</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                     <input type="text"  class="form-control" name="volume_reservoir1" value="{{$modeles->volume_reservoir1}}" required>
                                               
                                                </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Volume du reservoir N°2</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                <input type="text"  class="form-control" name="volume_reservoir2" value="{{$modeles->volume_reservoir2}}" required>
                                                
                                                </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Montant vignette</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                    <input type="text"  class="form-control" name="montant_vignette" value="{{$modeles->montant_vignette}}" required>
                                                           
                                                </div>
                                </div>
                        </fieldset>
                        <fieldset>                                                        
                            <div class="form-group">
                                <div class="col-md-2" style="margin-top: 15px">
                                    <label>Description</label>
                                </div>
                                <div class="col-md-10" style="margin-top: 15px">
                                <input type="text"  class="form-control" name="description" value="{{$modeles->description}}" required>
                                       
                                </div>
                            </div> 
                                                                                                                
                            </fieldset>					                                    
                </div>
                <!-- end widget content -->                                
            </div>
            <!-- end widget div -->                           
    </div>
        <!-- end widget -->	
    
        <!-- Widget ID (each widget will need unique ID)-->
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
                <span class="widget-icon"> <i class="fa fa-">&nbsp;</i> </span>
                <p class="h6">&nbsp;Paramétrage</p>			
            </header>
    
            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">
                        <fieldset>
                                <div class="form-group">
                                                <div class="col-md-2">
                                                <label>Intervalle de revision</label>
                                                </div>
                                                <div class="col-md-10">
                                                  <input type="number" min="0"  class="form-control" name="intervalle_revision" value="{{$modeles->intervalle_revision}}" required>
                                                    
                                                </div>
                                </div> 
                            </fieldset>
                            <fieldset>                                                
                                <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Marge de tolerance</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                  <input type="number" min="0"  class="form-control" name="marge_tolerance" value="{{$modeles->marge_tolerance}}" required>
                                                
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
                <!-- END ROW -->
                                        
                                            
            </section>
            <!--STATUT-->
                                    
        </div>
    </div> 
@endsection