@extends('layouts.dashboard')
@section('title')
Sinistres
@endsection
@section('breadcrumb')
	<!-- breadcrumb -->
	<ol class="breadcrumb" style="background-color: #333;" >
        <li><a href="">Accueil</a></li>
        <li>Juridique</li>
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
                                            <a href="{{route('backoffice_sinistres_ajout')}}" class="btn btn-red btn-lg">Ajouter</a>    
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
                                    <form id="login-form" class="smart-form" action="{{route('backoffice_sinistres')}}" method="get">
                                        <fieldset>
                                            <div class="row">
                                                <div class="col col-3">
                                                    <label class="label">
                                                        Année 
                                                    </label>
                                                    <label class="input">
                                                        <select name="annee" id="">
                                                         <option value="{{$selected_date}}">{{$selected_date}}</option>
                                                            <option value=""></option>
                                                        </select>
                                                    </label>
                                                </div>
                                                <div class="col col-3">
                                                    <label class="label">
                                                                Sinistre cloturé?
                                                    </label>
                                                    <label class="select">
                                                            <select name="sinistre_cloture" class="">
                                                                    <option value="{{$selected_sinistre}}">{{$selected_sinistre}}</option>
                                                                   <option value=""></option>                                                                                                                                   
                                                                    <option value="Oui" > Oui</option>
                                                                    <option value="Non">Non</option>
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
                                <p class="h6">&nbsp;Sinistres</p>
                            </header>                            
                            <!-- widget div-->
                            <div>
                                <!-- widget content -->
                                <div class="table-responsive">            
                                    <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                        <thead>			                
                                            <tr>
                                                <th>Tracteur/Voiture</th>
                                                <th>Semi-remorque</th>
                                                <th>Conducteur N°1</th>                                               
                                                <th>Date</th>
                                                <th>Pays - Ville</th>
                                                <th>Constat</th>
                                                <th>Rapport</th>
                                                <th>Sinistre cloturé</th>
                                                <th>Ajouté Par</th>
                                                <th>Modifié Par</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sinistres as $sinistre)
                                                <tr>
                                                    <td>{{$sinistre->tracteur->immatriculation}}</td>
                                                    @if($sinistre->semiremorque_id == null)
                                                    <td>-</td>
                                                    @else
                                                    <td>{{$sinistre->semiremorque->immatriculation}}</td>
                                                    @endif
                                                    <td>{{$sinistre->conducteur1->nom}}&nbsp;{{$sinistre->conducteur1->prenom}}</td>
                                                   
                                                    <td>{{$sinistre->date}}</td>
                                                    <td>{{$sinistre->pay->libelle_pays}} - {{$sinistre->ville->libelle_ville}}</td>
                                                    <td>{{$sinistre->constat}}</td>
                                                    <td>{{$sinistre->rapport}}</td>
                                                    <td>
                                                        @if ($sinistre->sinistre_cloture == 'Oui')
                                                           <div class="text-center"> <i class="fa fa-check" style="color: green; font-size: 25px"></i> </div>
                                                        @elseif ($sinistre->sinistre_cloture == 'Non')
                                                           <div class="text-center"> <i class="fa fa-times" style="color:#e9212e; font-size: 25px"></i> </div>
                                                        @endif
                                                    </td>
                                                    <td>{{$sinistre->ajoute_par}}</td>
                                                    <td>{{$sinistre->modifie_par}}</td>
                                                    <td>
                                                    @permission('Modifier') 
                                                    <button class="btn btn-secondary" onclick="window.location.href='{{route('backoffice_sinistres_modif',$sinistre->id)}}'"><i class="fa fa-edit"></i></button>
                                                    @endpermission
                                                    @permission('Supprimer') 
                                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$sinistre->id}}"> <i class="fa fa-trash"></i></button>
                                                    @endpermission
                                                        <button class="btn btn-default" onclick="window.location.href='{{route('backoffice_sinistres_visualiser',$sinistre->id)}}'"> <i class="fa fa-eye"></i></button>
                                                    </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$sinistres->appends(Request::except('page'))->render()}}                                                                      
                                </div>
                                <!-- end widget content -->
                            </div>
                        </div>
                    </article>
            </div>
        </section>
    </div>

    <!-- Modal: Supprimer -->
    @foreach($sinistres as $sinistr)
        <div class="modal fade" id="Supprimer-{{$sinistr->id}}"  tabindex="-1" role="dialog">
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
                        <form id="login-form" class="smart-form" action="{{route('backoffice_sinistres_supprimer')}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <fieldset>                                            
                                <input type="hidden" name="id" value="{{$sinistr->id}}">
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