@extends('layouts.dashboard')
@section('title')
Contrats de leasing
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
                                            <a href="{{route('backoffice_contrat_leasing_ajout')}}" class="btn btn-red btn-lg">Ajouter</a>    
                                        </div>
                                        @endpermission
                                    </h1>
                                </div>
                        
        </div>
        <!-- End button ajout-->
        <div class="row">    
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
                        

                        <!--******************RECHERCHE*********************-->
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
                                        <form id="login-form" class="smart-form" action="{{route('backoffice_contrats_leasing')}}" method="get">
                                                 
                                                
                                                <fieldset>
                                                        <div class="row">

                                                                <div class="col col-3">
                                                                        <label class="label">
                                                                                   N°Contrat
                                                                        </label>
                                                                        <label class="select">
                                                                                <select name="numContrat" class="">
                                                                                    <option value=""></option>
                                                                                    @foreach($contrats as $c)
                                                                                    <option value="{{$c->numero_contrat}}" @if($selected_num_contrat == $c->numero_contrat) selected="selected" @endif >{{$c->numero_contrat}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                        </label>
                                                                </div> 
                                                                <div class="col col-3">
                                                                    <label class="label">
                                                                                Fournisseur
                                                                    </label>
                                                                    <label class="select">
                                                                            <select name="fournisseur" class="">
                                                                                <option value=""></option>
                                                                                @foreach($typesFournisseur as $ty)
                                                                            <option value="{{$ty->id}}" @if($selected_type_fournisseur == $ty->id) selected="selected" @endif>{{$ty->libelle}}</option>
                                                                                @endforeach
                                                                                </select>
                                                                    </label>
                                                                </div>

                                                                <div class="col col-3">
                                                                        <label class="label">
                                                                                    Date Contrat
                                                                        </label>
                                                                        <label class="input">
                                                                                <input type="text" id="date" class="form-control" name="dateContrat" value="{{$selected_date}}" >
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
                                                             
                                                    
                                                </fieldset>
                                            </form>
                                        </div>
                                  </div>
                                </div>
                        </div>
                </article>
            </div>            
        <!-- widget grid -->
        <section id="widget-grid" class="">
            <div class="row">
                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" 
                            data-widget-deletebutton="false" data-widget-togglebutton="false" role="widget">
                            <header>
                                <span class="widget-icon"> <i class="fa fa-list">&nbsp;</i> </span>
                                <p class="h6">&nbsp;Contrats de leasing</p>
                            </header>                            
                            <!-- widget div-->
                            <div>
                                <!-- widget content -->
                                <div class="table-responsive">            
                                    <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                        <thead>			                
                                            <tr>
                                                <th>N°Contrat</th>
                                                <th>Fournisseur de véhicule</th>
                                                <th>Véhicule</th>
                                                <th>Date de contrat</th>
                                                <th>Date 1er prelevement</th>
                                                <th>Date fin de contrat</th>
                                                <th>Durée (mois)</th>
                                                <th>Description</th>
                                                <th>Ajouté Par</th>
                                                <th>Modifié Par</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contrats as $contrat)
                                                <tr>
                                                    <td>{{$contrat->numero_contrat}}</td>
                                                    <td>{{$contrat->fournisseur->libelle}}</td>
                                                    <td>{{$contrat->vehicule}}</td>
                                                    <td>{{$contrat->date_contrat}}</td>
                                                    <td>{{$contrat->date_premier_prelevement}}</td>
                                                    <td>{{$contrat->date_fin_contrat}}</td>
                                                    <td>{{$contrat->duree}}</td>
                                                    <td>{{$contrat->description}}</td>
                                                    <td>{{$contrat->ajoute_par}}</td>
                                                    <td>{{$contrat->modifie_par}}</td>
                                                    <td>
                                                    @permission('Modifier') 
                                                    <button class="btn btn-secondary" onclick="window.location.href='{{route('backoffice_contrat_leasing_modif',$contrat->id)}}'"><i class="fa fa-edit"></i></button>
                                                    @endpermission
                                                    @permission('Supprimer') 
                                                    <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$contrat->id}}"> <i class="fa fa-trash"></i></button>
                                                    @endpermission
                                                    <button class="btn btn-default" onclick="window.location.href='{{route('backoffice_contrat_leasing_visualiser',$contrat->id)}}'"> <i class="fa fa-eye"></i></button>
                                                    </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$contrats->appends(Request::except('page'))->render()}}                                    
                                    
                                </div>
                                <!-- end widget content -->
                            </div>
                        </div>
                    </article>
            </div>
        </section>
    </div>

    <!-- Modal: Supprimer -->
    @foreach($contrats as $contratleasing)
        <div class="modal fade" id="Supprimer-{{$contratleasing->id}}"  tabindex="-1" role="dialog">
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
                        <form id="login-form" class="smart-form" action="{{route('backoffice_contrat_leasing_supprimer')}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <fieldset>                                            
                                <input type="hidden" name="id" value="{{$contratleasing->id}}">
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



