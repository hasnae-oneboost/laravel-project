@extends('layouts.dashboard')
@section('title')
Semi-remorques
@endsection
@section('breadcrumb')
	<!-- breadcrumb -->
	<ol class="breadcrumb" style="background-color: #333;" >
        <li><a href="">Accueil</a></li>
        <li>Flotte</li>
        <li>Parc</li>
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
                                            <a href="{{route('backoffice_semi_remorque_ajout')}}" class="btn btn-red btn-lg">Ajouter</a>    
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
                                <form id="login-form" class="smart-form" action="{{route('backoffice_semi_remorques')}}" method="get">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col col-3">
                                                <label class="label">
                                                    Parc 
                                                </label>
                                                <label class="select">
                                                    <select name="parc" class="">
                                                        <option value=""></option>
                                                        @foreach($parcs as $park)
                                                        <option value="{{$park->id}}" @if($selected_parc == $park->id) selected="selected" @endif >{{$park->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="col col-3">
                                                <label class="label">
                                                            Marque
                                                </label>
                                                <label class="select">
                                                        <select name="marque" class="">
                                                            <option value=""></option>
                                                            @foreach($marques as $m)
                                                            <option value="{{$m->id}}" @if($selected_marque == $m->id) selected="selected" @endif >{{$m->marque}}</option>
                                                            @endforeach
                                                        </select>
                                                </label>                                                    
                                            </div>
                                            <div class="col col-3">
                                                <label class="label">
                                                            Gamme
                                                </label>
                                                <label class="select">
                                                    <select name="gamme" class="">
                                                        <option value=""></option>
                                                        @foreach($gammes as $g)
                                                        <option value="{{$g->id}}" @if($selected_gamme == $g->id) selected="selected" @endif >{{$g->gamme}}</option>
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
                                <p class="h6">&nbsp;Semi-remorques</p>
                            </header>                            
                            <!-- widget div-->
                            <div>
                                <!-- widget content -->
                                <div class="table-responsive">            
                                    <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                        <thead>			                
                                            <tr>
                                                <th>Parc</th>
                                                <th>Marque</th>
                                                <th>Gamme</th>
                                                <th>Confort</th>
                                                <th>Type</th>
                                                <th>Immatriculation</th>
                                                <th>Prestataire</th>
                                                <th>Ajouté Par</th>
                                                <th>Modifié Par</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($semiremorques as $semiremork)
                                                <tr>
                                                    <td>{{$semiremork->parc->nom}}</td>
                                                    <td><img src="/logo_marque/{{$semiremork->marque->logo}}" alt="logo" width="60px" height="50px" ></td>
                                                    <td>{{$semiremork->gamme->gamme}}</td>
                                                    <td>{{$semiremork->confort->nom}}</td>
                                                    <td>{{$semiremork->type->libelle}}</td>                                                                                                                                                                                
                                                    <td>{{$semiremork->immatriculation}}</td>
                                                    @if($semiremork->prestataire_id == null)
                                                    <td>{{$semiremork->prestataire}}</td>
                                                    @else
                                                    <td>{{$semiremork->prestatair->raison_sociale}}</td>
                                                    @endif
                                                    <td>{{$semiremork->ajoute_par}}</td>
                                                    <td>{{$semiremork->modifie_par}}</td>
                                                    <td>
                                                    @permission('Modifier') 
                                                    <button class="btn btn-secondary" onclick="window.location.href='{{route('backoffice_semi_remorque_modif',$semiremork->id)}}'"><i class="fa fa-edit"></i></button>
                                                    @endpermission
                                                    @permission('Supprimer') 
                                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$semiremork->id}}"> <i class="fa fa-trash"></i></button>
                                                    @endpermission
                                                        <button class="btn btn-default" onclick="window.location.href='{{route('backoffice_semi_remorque_visualiser',$semiremork->id)}}'"> <i class="fa fa-eye"></i></button>
                                                        <button class="btn btn-default" onclick="window.location.href='{{route('backoffice_semi_remorque_gallerie',$semiremork->id)}}'"> <i class="fa fa-picture-o"></i></button>
                                                        <button  class="btn btn-default" onclick="window.location.href='{{route('backoffice_documents_semi_remorque',$semiremork->id)}}'" ><i class="fa fa-file"></i></button>
                                                        <button  class="btn btn-default" onclick="window.location.href='{{route('backoffice_imprime_info_semi_remorque',$semiremork->id)}}'"><i class="fa fa-print"></i></button>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$semiremorques->appends(Request::except('page'))->render()}}                                                                      
                                </div>
                                <!-- end widget content -->
                            </div>
                        </div>
                    </article>
            </div>
        </section>
    </div>

    <!-- Modal: Supprimer -->
    @foreach($semiremorques as $semiremorq)
        <div class="modal fade" id="Supprimer-{{$semiremorq->id}}"  tabindex="-1" role="dialog">
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
                        <form id="login-form" class="smart-form" action="{{route('backoffice_semi_remorque_supprimer')}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <fieldset>                                            
                                <input type="hidden" name="id" value="{{$semiremorq->id}}">
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