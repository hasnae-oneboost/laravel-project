@extends('layouts.dashboard')
@section('title')
Equipements des véhicules
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
            <li><a href="">Accueil</a></li>
            <li>Flotte</li>
            <li>@yield('title')</li>	
		</ol>
		<!-- end breadcrumb -->
@endsection

@section('content')
<!-- MAIN CONTENT -->
<div id="content">
    <!-- Get the success message / Message de succes-->
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

    <!--Button ajout-->
        <div class="pull-right">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                    <h1 class="page-title txt-color-blueDark">
                        @permission('Créer') 
                        <div class="">
                            <button class="btn btn-red btn-lg" onclick="window.location.href='{{route('backoffice_equipements_vehicules_ajout')}}'">Ajouter</button>
                        </div>
                        @endpermission
                    </h1>
                </div>
        </div>
    <!-- End button ajout-->
    <!-- widget grid -->
    <section id="widget-grid" class="">

          <!--******************RECHERCHE*********************-->
          <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false">
                                <i class="fa fa-filter">&nbsp;</i> Recherche<span class="pull-right"> <i class="fa fa-angle-down"></i></span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <form id="login-form" class="smart-form" action="{{route('backoffice_equipements_vehicules')}}" method="get">
                                <fieldset>
                                    <div class="row">
                                        <div class="col col-3">
                                            <label class="label">
                                                Vehicule 
                                            </label>
                                            <label class="select">
                                                <select name="vehicule" class="">
                                                    <option value=""></option>
                                                    @foreach($vehicules as $vehicule)
                                                    <option value="{{$vehicule->id}}" @if($selected_vehicule == $vehicule->id) selected="selected" @endif >{{$vehicule->immatriculation}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                        <div class="col col-3">
                                            <label class="label">
                                                        Libelle
                                            </label>
                                            <label class="select">
                                                    <select name="libelle" class="">
                                                        <option value=""></option>
                                                        @foreach($equipementsvehicules as $equi)
                                                        <option value="{{$equi->libelle}}" @if($selected_libelle == $equi->libelle) selected="selected" @endif >{{$equi->libelle}}</option>
                                                        @endforeach
                                                    </select>
                                            </label>                                                    
                                        </div>
                                        <div class="col col-3">
                                            <label class="label">
                                                        Type d'équipement
                                            </label>
                                            <label class="select">
                                                <select name="type_equipement" class="">
                                                    <option value=""></option>
                                                    @foreach($equipements as $e)
                                                    <option value="{{$e->id}}" @if($selected_type_equipement == $e->id) selected="selected" @endif >{{$e->libelle}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
            
                                        <div class="col col-3">                                                                        
                                                <label class="pull-right"  style="margin-top: 25px;">                                                                    
                                                    <button class="btn btn-red btn-sm"  type="submit">
                                                        <i class="fa fa-search"></i>
                                                        Recherche 
                                                    </button>
                                                </label>
                                        </div> 
                                    </div>      
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </article> 
        </div>      
    <!-- row -->

    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" 
            data-widget-deletebutton="false" data-widget-togglebutton="false" role="widget">
            <header>
                    <span class="widget-icon"> <i class="fa fa-list">&nbsp;</i> </span>
                    <p class="h6">&nbsp;Equipements des véhicules</p>  
            </header>
                
                <!-- widget div-->
                <div>
                  

                    <!-- widget content -->
                    <div class="table-responsive">
                            <div id="dt_basic_wrapper" class="dataTables form-inline dt-bootstrap no-footer">
                                    <div class="dt-toolbar">
                                            <div class="col-sm-6 col-xs-12 hidden-xs">
                                                <div class="dataTables_length" id="dt_basic_length">
                                                  <!--entries-->
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>			                
                                <tr>
                                    <th>Véhicule</th>
                                    <th>Libelle</th>
                                    <th>Code</th>
                                    <th>Type d'équipement</th>
                                    <th>Equipement</th>
                                    <th>Fournisseur</th>
                                    <th>Description</th>
                                    <th>Ajouté Par</th>
                                    <th>Modifié Par</th>
                                    <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($equipementsvehicules as $e)
                                <tr>                                    
                                    <td>{{$e->vehicule->immatriculation}}</td>
                                    <td>{{$e->libelle}}</td>
                                    <td>{{$e->code}}</td>
                                    <td>{{$e->typeequipementvehicule->libelle}}</td>
                                    <td>{{$e->equipementvehicule->libelle}}</td>
                                    <td>{{$e->fournisseur->libelle}}</td>
                                    <td>{{$e->description}}</td>
                                    <td>{{$e->ajoute_par}}</td>
                                    <td>{{$e->modifie_par}}</td>
                                    <td>
                                            @permission('Modifier') 
                                            <button class="btn btn-secondary" onclick="window.location.href='{{route('backoffice_equipements_vehicules_modif',$e->id)}}'"><i class="fa fa-edit"></i></button>
                                            @endpermission
                                            @permission('Supprimer') 
                                                <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$e->id}}"> <i class="fa fa-trash"></i></button>
                                            @endpermission
                                                <button class="btn btn-default" onclick="window.location.href='{{route('backoffice_equipements_vehicules_visualiser',$e->id)}}'"> <i class="fa fa-eye"></i></button>
                                                
                                    </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                       
                    </div>
                    <!-- end widget content -->
                </div>
            </div>
        </article>
    </div>
    </section>
</div>


<!-- Modal: Supprimer equipementsvehicules -->
@foreach($equipementsvehicules as $equi)
<div class="modal fade" id="Supprimer-{{ $equi->id}}"  tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    Suppression
                </h4>
            </div>
            <div class="modal-body no-padding">
            <form id="login-form" class="smart-form" action="{{route('backoffice_equipements_vehicules_supprimer')}}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>
                                    <input type="hidden" name="id" value="{{ $equi->id}}">
                                    <div class="">
                                        <h2><i class="fa fa-warning"></i>&nbsp;Etes-vous sûr de vouloir supprimer cet élément?</h2>
                                    </div>
                            </fieldset>
                            
                            <footer>
                                <button type="submit" class="btn btn-red">
                                   Oui
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Annuler
                                </button>

                            </footer>
                </form>						
                        

            </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach



@endsection