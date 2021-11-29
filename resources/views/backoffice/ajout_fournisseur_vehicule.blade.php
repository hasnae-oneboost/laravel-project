@extends('layouts.dashboard')
@section('title')
Ajouter un nouveau fournisseur de véhicule
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Classement des véhicules</li>
                <li>Contrats</li>
                <li><a href="{{route('backoffice_fournisseur_vehicules')}}">Fournisseurs de véhicules</a></li>
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
                    
                    
                    <form class="" files="true" action="{{route('backoffice_fournisseur_vehicule_ajouter')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                
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
                                                            <label>Code</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                            <input type="hidden" name="id" >                                                                
                                                                <input class="form-control" type="text" id="" name="code" required>
                                                            </div>
                                            </div>
                                            
                                                    <div class="form-group" >
                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                <label>Libelle</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                <input class="form-control" type="text" id="" name="libelle" required>

                                                            </div>
                                                    </div>

                                                    <div class="form-group" >
                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                <label>Adresse</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                            <input class="form-control" type="text" id="" name="adresse"  required>

                                                            </div>
                                                    </div>

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
                                                    <div class="form-group">
                                                        <div class="col-md-2" style="margin-top: 15px">
                                                            <label>Activité(s)</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                        <div class="" style="margin-left: 25px">
                                                                            
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                  <input type="checkbox" class="checkbox style-0" value="Location" name="activite[]" >
                                                                                  <span>Location</span>
                                                                                </label>
                                                                            </div>
                                    
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                  <input type="checkbox" class="checkbox style-0" value="Société de leasing" name="activite[]">
                                                                                  <span>Société de leasing</span>
                                                                                </label>
                                                                            </div>
                                    
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                  <input type="checkbox" class="checkbox style-0" value="Concessionnaire" name="activite[]">
                                                                                  <span>Concessionnaire</span>
                                                                                </label>
                                                                            </div>
                                    
                                                                        </div>
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
                                                                <input type="text"  class="form-control" name="rc" required>
                                                                </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2">
                                                            <label>Patente</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                        <input type="text"  class="form-control" name="patente" required>
                                                        </div>
                                                </div>
                                            </fieldset>
                                                <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2">
                                                            <label>IF</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <input class="form-control" type="text" id="" name="if" required>
                                                        </div>
                                                </div>
                                                <div class="form-group" >
                                                        <div class="col-md-2">
                                                            <label>Compte bancaire</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <input class="form-control" type="text" id="" name="compte_bancaire" required>
                                                        </div>
                                                </div>                                               
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2">
                                                            <label>Capital</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                        <input type="text"  class="form-control" name="capital" required>
                                                        </div>
                                                </div>
                                                <div class="form_group">
                                                    <div class="col-md-2">
                                                        <label>CNSS</label>
                                                    </div>
                                                    <div class="col-md-10" style="margin-top: 15px">
                                                        <input type="text"  class="form-control" name="cnss" required>
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
                                                                                <input type="text"  class="form-control" name="fixe1" required>
                                                                            </div>
                                                            </div>                                                
                                                            <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Fixe 2</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                            <input type="text" name="fixe2" class="form-control" required>
                                                                            </div>
                                                            </div>
                                                            <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Fixe 3</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                                <input class="form-control" name="fixe3" type="text" required>
                                                                            </div>
                                                            </div>
                        
                                                            <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Fixe4</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                                <input class="form-control" name="fixe4" type="text" required>        
                                                                            </div>
                                                            </div>
                                                            <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>GSM 1</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                            <input class="form-control" name="gsm1" type="text" required>        

                                                                            </div>
                                                            </div>
                                                    </fieldset>
                                                    <fieldset>                                                        
                                                        <div class="form-group">
                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                <label>GSM 2</label>
                                                            </div>
                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                <input type="text" class="form-control" name="gsm2" required>
                                                            </div>
                                                        </div> 
                                                        <div class="form-group">
                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                <label>Fax</label>
                                                            </div>                                                                    
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <input type="text" class="form-control" name="fax"  required>
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
                                            <p class="h6">&nbsp;Autres</p>				
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
                                                                                <input class="form-control" name="gerant" type="text" required>        
                                                                            </div>
                                                            </div>
                                                            
                                                                    <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Nom du résponsable</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                            <input type="text" name="responsable" class="form-control"  required>
                                                                            </div>
                                                                    </div>
                                                    </fieldset>
                                                    <fieldset>
                                                                    <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Site web</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                                <input class="form-control" name="site_web" type="text"  required>
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group" >
                                                                            <div class="col-md-2" style="margin-top: 15px">
                                                                                <label>Commentaire</label>
                                                                            </div>
                                                                            <div class="col-md-10" style="margin-top: 15px">
                                                                                <input class="form-control" name="commentaire" type="text" required>
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