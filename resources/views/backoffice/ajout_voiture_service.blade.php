@extends('layouts.dashboard')
@section('title')
Ajouter une nouvelle voiture de service
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
            <li><a href="">Accueil</a></li>
            <li>Flotte</li>
            <li>Parc</li>
            <li><a href="{{route('backoffice_voitures_service')}}">Voitures de service</a></li>
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
                <form class="" files="true" action="{{route('backoffice_voiture_service_ajouter')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
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
                               <p class="h6">&nbsp;Informations générales</p>		   
                            </header>

                            <!-- widget div-->
                            <div>
                                
                                <!-- widget content -->
                                <div class="widget-body">
                                   
                                <fieldset>
                                    <div class="form-group">
                                                    <div class="col-md-2">
                                                    <label>Parc</label>
                                                    </div>
													<div class="col-md-10">
                                                        <select class="form-control" name="parc" id="" required>
                                                                <option value=""></option>
                                                                @foreach($parcs as $parc)
                                                                <option value="{{$parc->id}}">{{$parc->nom}}</option>
                                                                @endforeach
                                                            </select>
                                                    </div>
                                    </div>
                                    
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Marque</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <select class="form-control" name="marque" id="" required>
                                                                <option value=""></option>
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
                                                        <select class="form-control" name="gamme" id="" required>
                                                                <option value=""></option>
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
                                                        <select class="form-control" name="confort" id="" required>
                                                                <option value=""></option>
                                                                @foreach($conforts as $c)
                                                                <option value="{{$c->id}}">{{$c->nom}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                            </div>

                                            

                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Modèle</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <select class="form-control" name="modele" id="" required>
                                                                <option value=""></option>
                                                                @foreach($modeles as $modele)
                                                                <option value="{{$modele->id}}">{{$modele->nom}}</option>
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
                                    <span class="widget-icon"> <i class="fa fa-calendar">&nbsp;</i> </span>
                                    <p class="h6">&nbsp;Dates & Designation</p>	
                                </header>
    
                                <!-- widget div-->
                                <div>                                    
                                    <!-- widget content -->
                                    <div class="widget-body">
                                       
                                    <fieldset>
                                        <div class="form-group">
                                                        <div class="col-md-2">
                                                        <label>Date entée parc</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" id="date" name="date_entree_parc" required>
                                                        </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2">
                                                    <label>Date mise en circulation</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                    <input class="form-control" type="text" id="date" name="date_mise_en_circulation" required>
                                                </div>
                                        </div>
                                    </fieldset>
                                        <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2">
                                                    <label>Date restitution</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                    <input class="form-control" type="text" id="date" name="date_restitution" required>
                                                </div>
                                        </div>
                                        <div class="form-group" >
                                                <div class="col-md-2">
                                                    <label>Date de récépissé</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                    <input class="form-control" type="text" id="date" name="date_recepisse" required>
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
    
                                    <p class="h6">&nbsp;Identification</p>			
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
                                                                        <input class="form-control" name="immatriculation" type="text" required>        
                                                                    </div>
                                                    </div>                                                
                                                    <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Code</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                       <input type="text" name="code" class="form-control" required>
                                                                    </div>
                                                    </div>
                                                    <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>N°Ordre</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                        <input class="form-control" name="numero_ordre" type="text" required>
                                                                    </div>
                                                    </div>
                
                                                    <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>N°Imputation</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                        <input class="form-control" name="numero_imputation" type="text" required>        
                                                                    </div>
                                                    </div>
                                                    <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Type d'acquisition</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                        <select class="form-control" name="type_acquisition"  id="" required>
                                                                                <option value=""></option>
                                                                                @foreach($types as $type)
                                                                                <option value="{{$type->id}}">{{$type->libelle}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                    </div>
                                                    </div>
                                            </fieldset>
                                            <fieldset>                                                        
                                                <div class="form-group">
                                                    <div class="col-md-2" style="margin-top: 15px">
                                                        <label>N° WW</label>
                                                    </div>
                                                    <div class="col-md-10" style="margin-top: 15px">
                                                         <input type="text" class="form-control" name="numero_ww" required>
                                                     </div>
                                                </div>                                                         
                                                <div class="form-group">
                                                        <div class="col-md-2" style="margin-top: 15px">
                                                            <label>N° carte grise</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <input type="text" class="form-control" name="numero_carte_grise" required>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <div class="col-md-2" style="margin-top: 15px">
                                                            <label>N° châssis</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <input type="text" class="form-control" name="numero_chassis" required>
                                                        </div>
                                                </div>
                                                <div class="form-group" >
                                                        <div class="col-md-2" style="margin-top: 15px">
                                                            <label>Prestataire</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <select class="form-control" name="prestataire"  id="" required>
                                                                    <option value="DSH TRANS">DSH TRANS</option>
                                                                    @foreach($prestataires as $prestataire)
                                                                        <option value="{{$prestataire->id}}">{{$prestataire->raison_sociale}}</option>
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
                                    <span class="widget-icon"> <i class="fa fa-clipboard-list">&nbsp;</i> </span>
                                    <p class="h6">&nbsp;Divers</p>				
                                </header>    
                                <!-- widget div-->
                                <div>
                                    <!-- widget content -->
                                    <div class="widget-body">
                                            <fieldset>
                                                    <div class="form-group">
                                                                    <div class="col-md-2">
                                                                    <label>Couleur</label>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <input class="form-control" name="couleur" type="text" required>        
                                                                    </div>
                                                    </div>
                                                    
                                                            <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Code clé</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                       <input type="text" name="code_cle" class="form-control" required>
                                                                    </div>
                                                            </div>
                
                                                            <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Description</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                        <input class="form-control" name="description" type="text" required>
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