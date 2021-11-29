@extends('layouts.dashboard')
@section('title')
Visualiser la demande d'intervention
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
                <form class="" files="true" action="" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PATCH')}}
                    
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
                                                    <input type="hidden" name="id" value="{{$demandes->id}}">
													<div class="col-md-10">
                                                        <select class="form-control" name="vehicule" id="" disabled>
                                                                <option value="{{$demandes->vehicule_id}}">{{$demandes->vehicule->immatriculation}}</option>
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
                                                        <select class="form-control" name="demandeur" id="" disabled>
                                                            <option value="{{$demandes->demandeur_id}}">{{$demandes->demandeur->nom}}&nbsp;{{$demandes->demandeur->prenom}}</option>
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
                                                                <select class="form-control" name="categorie[]" id="" multiple disabled>
                                                                        @foreach(explode(', ',$demandes->categorie) as $cat)
                                                                        <option value="{{$cat}}" selected>{{$cat}}</option>
                                                                        @endforeach
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
                                                        <select class="form-control" name="gravite" id="" disabled>
                                                                <option value="{{$demandes->gravite_id}}">{{$demandes->gravit->libelle}}</option>
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
                                                        <select class="form-control" name="urgence" id="" disabled>
                                                                <option value="{{$demandes->urgence_id}}">{{$demandes->urgenc->libelle}}</option>
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
                                                                            <input class="form-control" name="description" value="{{$demandes->description}}" type="text" disabled>        
                                                                        </div>
                                                        </div>
                                                </fieldset>
                                                <fieldset>
                                                            <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>N° Systeme</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                       <input type="text" name="numero_systeme" value="{{$demandes->numero_systeme}}" class="form-control" disabled>
                                                                    </div>
                                                            </div>
                                                </fieldset>	
                                                <fieldset>
                                                        <div class="form-group" >
                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                    <label>Date de la demande</label>
                                                                </div>
                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                <input type="text" name="date_demande" id="date" value="{{$demandes->date_demande}}" class="form-control" disabled>
                                                                </div>
                                                        </div>
                                                </fieldset>	
                                                <fieldset>
                                                        <div class="form-group" >
                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                    <label>Kilométrage</label>
                                                                </div>
                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                <input type="text" name="kilometrage" value="{{$demandes->kilometrage}}" class="form-control" disabled>
                                                                </div>
                                                        </div>
                                                </fieldset>		
                                                <fieldset>
                                                        <div class="form-group" >
                                                                <div class="col-md-2" style="margin-top: 15px">
                                                                    <label>Index horaire</label>
                                                                </div>
                                                                <div class="col-md-10" style="margin-top: 15px">
                                                                <input type="text" name="index_horaire" value="{{$demandes->index_horaire}}"  class="form-control" disabled>
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

            <!-- end row -->

            

        </section>
        <!-- end widget grid -->

    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

@endsection