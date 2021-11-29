@extends('layouts.dashboard')
@section('title')
Visualiser la société d'assurance
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Juridique</li>
                <li>Assurance</li>
                <li><a href="{{route('backoffice_societes_assurance')}}">Sociétés d'assurance</a></li>
                <li>@yield('title')</li>	
		</ol>
			<!-- end breadcrumb -->
@endsection


@section('content')

@section('content')

<div id="main" role="main">
    <!-- MAIN CONTENT -->
    <div id="content">
        <!-- widget grid -->
        <section id="widget-grid" class="">
            <!-- row -->
            <div class="row">             
                    <form class="" files="true" action="{{route('backoffice_societes_modifier')}}" method="POST" enctype="multipart/form-data">
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
                                    <p class="h6">&nbsp;Général</p>		   
                                    </header>

                                    <!-- widget div-->
                                    <div>
                                        
                                        <!-- widget content -->
                                        <div class="widget-body">
                                        
                                        <fieldset>
                                            <div class="form-group">
                                                            <div class="col-md-2">
                                                            <label>Matricule</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="hidden" name="id" value="{{$societes->id}}">
                                                                <input type="text"  class="form-control" name="matricule" value="{{$societes->matricule}}" disabled>
                                                            </div>
                                            </div>
                                            
                                                    <div class="form-group" >
                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                <label>Nom</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                <input class="form-control" type="text" id="" name="nom" value="{{$societes->nom}}" disabled>

                                                            </div>
                                                    </div>

                                                    <div class="form-group" >
                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                <label>Adresse</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                            <input class="form-control" type="text" id="" name="adresse" value="{{$societes->adresse}}" disabled>

                                                            </div>
                                                    </div>

                                                    <div class="form-group" >
                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                <label>Pays</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                            <select class="pays_select" name="pays" id="pays" style="width:695px;" disabled>
                                                                    <option value="{{$societes->pay_id}}">{{$societes->pay->libelle_pays}}</option>
                                                                        @foreach($pays as $p)
                                                                            <option value="{{$p->id}}">{{$p->libelle_pays}}</option>
                                                                        @endforeach
                                                                    </select>
                                                            </div>
                                                    </div>

                                                    <div class="form-group" >
                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                <label>Ville</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                <select class="ville_select" name="ville" id="ville" style="width:695px;" disabled>
                                                                    <option value="{{$societes->ville_id}}">{{$societes->ville->libelle_ville}}</option>        
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
                                            <p class="h6">&nbsp;Statut</p>	
                                        </header>

                                        <!-- widget div-->
                                        <div>                                    
                                            <!-- widget content -->
                                            <div class="widget-body">
                                            
                                            <fieldset>
                                                <div class="form-group">
                                                                <div class="col-md-2">
                                                                <label>RC</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                <input type="text"  class="form-control" name="rc" value="{{$societes->rc}}" disabled>
                                                                </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2">
                                                            <label>Patente</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                        <input type="text"  class="form-control" name="patente" value="{{$societes->patente}}" disabled>
                                                        </div>
                                                </div>
                                            </fieldset>
                                                <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2">
                                                            <label>IF</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <input class="form-control" type="text" id="" name="if" value="{{$societes->if}}" disabled>
                                                        </div>
                                                </div>
                                                <div class="form-group" >
                                                        <div class="col-md-2">
                                                            <label>Compte bancaire</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <input class="form-control" type="text" id="" name="compte_bancaire" value="{{$societes->compte_bancaire}}" disabled>
                                                        </div>
                                                </div>                                               
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2">
                                                            <label>Capital</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                        <input type="text"  class="form-control" name="capital" value="{{$societes->capital}}" disabled>
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
                                            <p class="h6">&nbsp;Téléphone</p>			
                                        </header>

                                        <!-- widget div-->
                                        <div>
                                            <!-- widget content -->
                                            <div class="widget-body">
                                                    <fieldset>
                                                            <div class="form-group">
                                                                            <div class="col-md-2">
                                                                            <label>Fixe 1</label>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <input type="text"  class="form-control" name="fixe1" value="{{$societes->fixe1}}" disabled>
                                                                            </div>
                                                            </div>                                                
                                                            <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Fixe 2</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                            <input type="text" name="fixe2" class="form-control" value="{{$societes->fixe2}}" disabled>
                                                                            </div>
                                                            </div>
                                                            <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Fixe 3</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                                <input class="form-control" name="fixe3" type="text" value="{{$societes->fixe3}}" disabled>
                                                                            </div>
                                                            </div>
                        
                                                            <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Fixe4</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                                <input class="form-control" name="fixe4" type="text" value="{{$societes->fixe4}}" disabled>        
                                                                            </div>
                                                            </div>
                                                            <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>GSM 1</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                            <input class="form-control" name="gsm1" type="text" value="{{$societes->gsm1}}" disabled>        

                                                                            </div>
                                                            </div>
                                                    </fieldset>
                                                    <fieldset>                                                        
                                                        <div class="form-group">
                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                <label>GSM 2</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                <input type="text" class="form-control" name="gsm2" value="{{$societes->gsm2}}" disabled>
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
                                            <p class="h6">&nbsp;Autre</p>				
                                        </header>    
                                        <!-- widget div-->
                                        <div>
                                            <!-- widget content -->
                                            <div class="widget-body">
                                                    <fieldset>
                                                            <div class="form-group">
                                                                            <div class="col-md-2">
                                                                            <label>Gérant</label>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <input class="form-control" name="gerant" type="text" value="{{$societes->gerant}}" disabled>        
                                                                            </div>
                                                            </div>
                                                            
                                                                    <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Nom du résponsable</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                            <input type="text" name="nom_responsable" class="form-control" value="{{$societes->nom_responsable}}" disabled>                                                                           </div>
                                                                    </div>
                                                    </fieldset>
                                                    <fieldset>
                                                                    <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Site web</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                                <input class="form-control" name="site_web" type="text" value="{{$societes->site_web}}" disabled>
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Commentaire</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                                <input class="form-control" name="commentaire" type="text" value="{{$societes->commentaire}}" disabled>
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

                    </form>
                                           
                                        
            </div>
            <!-- END ROW -->
                                    
                                        
        </section>
        <!--STATUT-->
                                
    </div>
</div>  
@endsection