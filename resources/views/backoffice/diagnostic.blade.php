@extends('layouts.dashboard')

@section('title')
Diagnostic
@endsection

@section('breadcrumb')
	<!-- breadcrumb -->
	<ol class="breadcrumb" style="background-color: #333;" >
        <li><a href="">Accueil</a></li>
        <li>Maintenance</li>
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
                                    <form id="login-form" class="smart-form" action="" method="get">
                                        <fieldset>
                                            <div class="row">
                                                <div class="col col-3">
                                                    <label class="label">
                                                        Vehicule 
                                                    </label>
                                                    <label class="input">
                                                        <select name="vehicule" id="">
                                                         <option value=""></option>
                                                            @foreach($vehicules as $v)
                                                            <option value="{{$v->id}}" @if($selected_vehicule == $v->id) selected="selected" @endif>{{$v->immatriculation}}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                                                <div class="col col-3">
                                                    <label class="label">
                                                                Demandeur
                                                    </label>
                                                    <label class="select">
                                                            <select name="demandeur" class="">
                                                                    <option value=""></option>
                                                                    @foreach($demandeurs as $d)
                                                                    <option value="{{$d->id}}" @if($selected_demandeur == $d->id) selected="selected" @endif>{{$d->nom}}&nbsp;{{$d->prenom}}</option>
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
            <div class="row">
                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" 
                            data-widget-deletebutton="false" data-widget-togglebutton="false" role="widget">
                            <header>
                                <span class="widget-icon"> <i class="fa fa-list">&nbsp;</i> </span>
                                <p class="h6">&nbsp;Diagnostic</p>
                            </header>                            
                            <!-- widget div-->
                            <div>
                                <!-- widget content -->
                                <div class="table-responsive">            
                                    <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                        <thead>			                
                                            <tr>
                                                <th>Véhicule</th>
                                                <th>Demandeur</th>
                                                <th>Demande</th>                                              
                                                <th>Ajouté Par</th>
                                                <th>Modifié Par</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($diagnostics as $d)
                                                <tr>
                                                    <td>{{$d->vehicule->immatriculation}}</td>
                                                    <td>{{$d->demandeur->nom}}&nbsp;{{$d->demandeur->prenom}}</td>
                                                    <td>{{$d->demande->numero_systeme}}</td>
                                                    <td>{{$d->ajoute_par}}</td>
                                                    <td>{{$d->modifie_par}}</td>
                                                    <td>
                                                    @permission('Modifier') 
                                                    <button class="btn btn-secondary" onclick="window.location.href='{{route('backoffice_diagnostic_modif',$d->id)}}'"><i class="fa fa-edit"></i></button>
                                                    @endpermission
                                                    @permission('Supprimer') 
                                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$d->id}}"> <i class="fa fa-trash"></i></button>
                                                    @endpermission
                                                        <button class="btn btn-default" onclick="window.location.href='{{route('backoffice_diagnostic_visualiser',$d->id)}}'"> <i class="fa fa-eye"></i></button>
                                                        <button  class="btn btn-default" onclick="window.location.href='{{route('backoffice_imprime_info_diagnostic',$d->id)}}'"><i class="fa fa-print"></i></button>                                                   
                                                    </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$diagnostics->appends(Request::except('page'))->render()}}                                                                      
                                </div>
                                <!-- end widget content -->
                            </div>
                        </div>
                    </article>
            </div>
        </section>
    </div>

    <!-- Modal: Supprimer -->
    @foreach($diagnostics as $demand)
        <div class="modal fade" id="Supprimer-{{$demand->id}}"  tabindex="-1" role="dialog">
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
                        <form id="login-form" class="smart-form" action="{{route('backoffice_diagnostic_supprimer')}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <fieldset>                                            
                                <input type="hidden" name="id" value="{{$demand->id}}">
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