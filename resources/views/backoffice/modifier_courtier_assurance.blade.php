@extends('layouts.dashboard')
@section('title')
Modifier le courtier d'assurance
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Juridique</li>
                <li>Assurance</li>
                <li><a href="{{route('backoffice_courtiers_assurance')}}">Courtiers d'assurance</a></li>
                <li>@yield('title')</li>	
		</ol>
			<!-- end breadcrumb -->
@endsection


@section('content')

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
            <!-- widget grid -->
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
                    
                    
                    <form class="" files="true" action="{{route('backoffice_courtiers_modifier')}}" method="POST" enctype="multipart/form-data">
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
                                                                <input type="hidden" name="id" value="{{$courtiers->id}}">                                                            
                                                                <input class="form-control" type="text" id="" name="matricule"  value="{{$courtiers->matricule}}"  required>
                                                            </div>
                                            </div>
                                            
                                                    <div class="form-group" >
                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                <label>Nom</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                <input class="form-control" type="text" id="" name="nom" value="{{$courtiers->nom}}" required>

                                                            </div>
                                                    </div>

                                                    <div class="form-group" >
                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                <label>Adresse</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                            <input class="form-control" type="text" id="" name="adresse" value="{{$courtiers->adresse}}" required>

                                                            </div>
                                                    </div>

                                                    <div class="form-group" >
                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                <label>Pays</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                            <select class="pays_select" name="pays" id="pays" style="width:695px;" required>
                                                                    <option value="{{$courtiers->pay_id}}">{{$courtiers->pay->libelle_pays}}</option>                                                                        
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
                                                                <select class="ville_select" name="ville" id="ville" style="width:695px;" required>
                                                                <option value="{{$courtiers->ville_id}}">{{$courtiers->ville->libelle_ville}}</option>                                                                        
                                                                </select>
                                                                            
                                                            </div>
                                                    </div>
                                                    <div class="form-group" >
                                                        <div class="col-md-2" style="margin-top: 15px">
                                                            <label> Société d'assurance</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                           <select class="societe_select" name="societe_assurance" id="societe_assurance" style="width:695px;" required >
                                                            <option value="{{$courtiers->societe_assurance_id}}">{{$courtiers->societesassurance->nom}}</option>
                                                            
                                                            @foreach($societes as $s)
                                                            <option value="{{$s->id}}">{{$s->nom}}</option>
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
                                                                <input type="text"  class="form-control" name="rc" value="{{$courtiers->rc}}" required>
                                                                </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2">
                                                            <label>Patente</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                        <input type="text"  class="form-control" name="patente" value="{{$courtiers->patente}}" required>
                                                        </div>
                                                </div>
                                            </fieldset>
                                                <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2">
                                                            <label>IF</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <input class="form-control" type="text" id="" name="if" value="{{$courtiers->if}}" required>
                                                        </div>
                                                </div>
                                                <div class="form-group" >
                                                        <div class="col-md-2">
                                                            <label>Compte bancaire</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <input class="form-control" type="text" id="" name="compte_bancaire" value="{{$courtiers->compte_bancaire}}" required>
                                                        </div>
                                                </div>                                               
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2">
                                                            <label>Capital</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                        <input type="text"  class="form-control" name="capital" value="{{$courtiers->capital}}" required>
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
                                                                                <input type="text"  class="form-control" name="fixe1" value="{{$courtiers->fixe1}}" required>
                                                                            </div>
                                                            </div>                                                
                                                            <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Fixe 2</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                            <input type="text" name="fixe2" class="form-control" value="{{$courtiers->fixe2}}" required>
                                                                            </div>
                                                            </div>
                                                            <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Fixe 3</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                                <input class="form-control" name="fixe3" type="text" value="{{$courtiers->fixe3}}" required>
                                                                            </div>
                                                            </div>
                        
                                                            <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Fixe4</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                                <input class="form-control" name="fixe4" type="text" value="{{$courtiers->fixe4}}" required>        
                                                                            </div>
                                                            </div>
                                                            <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>GSM 1</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                            <input class="form-control" name="gsm1" type="text" value="{{$courtiers->gsm1}}" required>        

                                                                            </div>
                                                            </div>
                                                    </fieldset>
                                                    <fieldset>                                                        
                                                        <div class="form-group">
                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                <label>GSM 2</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                <input type="text" class="form-control" name="gsm2" value="{{$courtiers->gsm2}}" required>
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
                                                                                <input class="form-control" name="gerant" type="text" value="{{$courtiers->gerant}}" required>        
                                                                            </div>
                                                            </div>
                                                            
                                                                    <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Nom du résponsable</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                            <input type="text" name="nom_responsable" class="form-control" value="{{$courtiers->nom_responsable}}" required>
                                                                            </div>
                                                                    </div>
                                                    </fieldset>
                                                    <fieldset>
                                                                    <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Site web</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                                <input class="form-control" name="site_web" type="text" value="{{$courtiers->site_web}}" required>
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Commentaire</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                                <input class="form-control" name="commentaire" type="text" value="{{$courtiers->commentaire}}" required>
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