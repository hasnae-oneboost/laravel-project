@extends('layouts.dashboard')
@section('title')
Ajouter une nouvelle demande d'intervention
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
            <li><a href="">Accueil</a></li>
            <li>Maintenance</li>
            <li><a href="{{route('backoffice_demandes_interventions')}}">Demandes d'intervention</a></li>
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
                <form class="" files="true" action="{{route('backoffice_demandes_interventions_ajouter')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                        <!-- Widget *****  VEHICULE & Demandeur-->
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
                               <p class="h6">&nbsp;Véhicule & Demandeur</p>		   
                            </header>

                            <!-- widget div-->
                            <div>
                                
                                <!-- widget content -->
                                <div class="widget-body">
                                   
                                <fieldset>
                                    <div class="form-group">
                                                    <div class="col-md-2">
                                                    <label>Véhicules</label>
                                                    </div>
													<div class="col-md-10">
                                                        <select class="form-control" name="vehicule" id="" required>
                                                                <option value=""></option>
                                                                @foreach($vehicules as $v)
                                                                <option value="{{$v->id}}">{{$v->immatriculation}}</option>
                                                                @endforeach
                                                                
                                                            </select>
                                                    </div>
                                    </div>
                                </fieldset>
                             
                                        <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Demandeur</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <select class="form-control" name="demandeur" id="" required>
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

                         <!-- Widget ***** Informations générales-->
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
                                    <p class="h6">&nbsp;Informations générales</p>	
                                </header>
    
                                <!-- widget div-->
                                <div>                                    
                                    <!-- widget content -->
                                    <div class="widget-body">
                                       
                                    <fieldset>
                                        <div class="form-group">
                                                        <div class="col-md-2">
                                                        <label>Catégorie</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                                <select class="form-control" name="categorie[]" id="" multiple required>
                                                                        <option value=""></option>
                                                                        @foreach($categories as $c)
                                                                        <option value="{{$c->libelle}}">{{$c->libelle}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                 </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Gravité</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                        <select class="form-control" name="gravite" id="" required>
                                                                <option value=""></option>
                                                                @foreach($gravites as $g)
                                                                <option value="{{$g->id}}">{{$g->libelle}}</option>
                                                                @endforeach
                                                                
                                                            </select> 
                                                        </div>
                                        </div>
                                    </fieldset>
                                        <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Urgence</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                        <select class="form-control" name="urgence" id="" required>
                                                                <option value=""></option>
                                                                @foreach($urgences as $u)
                                                                <option value="{{$u->id}}">{{$u->libelle}}</option>
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
                        <!--end widget-->
                        
                    </article>
                    <!-- WIDGET END -->

                   
                    <!-- WIDGET END -->
                    <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                        <!--Widget ***** Designation-->
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
                                    <p class="h6">&nbsp;Désignation</p>				
                                </header>    
                                <!-- widget div-->
                                <div>
                                    <!-- widget content -->
                                    <div class="widget-body">
                                                <fieldset>
                                                        <div class="form-group">
                                                                        <div class="col-md-2">
                                                                        <label>Description</label>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <input class="form-control" name="description" type="text">        
                                                                        </div>
                                                        </div>
                                                </fieldset>
                                                <fieldset>
                                                            <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>N° Systeme</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                        @if($demandes != null)
                                                                    <input type="text" name="numero_systeme" value="DI {{$demandes+1}}" class="form-control" readonly>
                                                                        @else
                                                                    <input type="text" name="numero_systeme" value="DI 1" class="form-control" readonly>
                                                                        @endif                                                                         
                                                                </div>
                                                            </div>
                                                </fieldset>	
                                                <fieldset>
                                                        <div class="form-group" >
                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                    <label>Date de la demande</label>
                                                                </div>
                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                <input type="text" name="date_demande" id="date" class="form-control">
                                                                </div>
                                                        </div>
                                                </fieldset>	
                                                <fieldset>
                                                        <div class="form-group" >
                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                    <label>Kilométrage</label>
                                                                </div>
                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                <input type="text" name="kilometrage"  class="form-control">
                                                                </div>
                                                        </div>
                                                </fieldset>		
                                                <fieldset>
                                                        <div class="form-group" >
                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                    <label>Index horaire</label>
                                                                </div>
                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                <input type="text" name="index_horaire"  class="form-control">
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