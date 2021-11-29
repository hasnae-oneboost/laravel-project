@extends('layouts.dashboard')
@section('title')
Pièces jointes
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
                            <button class="btn btn-red btn-lg" data-toggle="modal" data-target="#Ajout" >Ajouter</button>
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
                    <form id="login-form" class="smart-form" action="{{route('backoffice_pieces_jointes')}}" method="get">
                        <fieldset>
                            <div class="row">
                                <div class="col col-3">
                                    <label class="label">
                                        Vehicule 
                                    </label>
                                    <label class="select">
                                        <select name="vehicule" class="">
                                            <option value=""></option>
                                            @foreach($vehicules as $v)
                                            <option value="{{$v->id}}" @if($selected_vehicule == $v->id) selected="selected" @endif >{{$v->immatriculation}}</option>
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
                    <p class="h6">&nbsp;Pièces jointes</p>  

                </header>
                
                <!-- widget div-->
                <div>
                        
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>
                    <!-- end widget edit box -->

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
                                    <th>Fichier</th>

                                    <th>Description</th>
                                    
                                    <th>Ajouté Par</th>
                                    <th>Modifié Par</th>
                                    <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($pieces as $p)
                                <tr>                                    
                                    <td>{{$p->vehicule->immatriculation}}</td>
                                    <td>{{$p->libelle}}</td>
                                    
                                    <td>
                                        <a class="btn btn-default" data-toggle="modal" data-target="#file-{{$p->id}}"><i class="fa fa-file"></i></a>
                                    </td>
                                    <td>{{$p->description}}</td>
                                    <td>{{$p->ajoute_par}}</td>
                                    <td>{{$p->modifie_par}}</td>
                                    <td>
                                    @permission('Modifier') 
                                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#Modifier-{{$p->id}}"><i class="fa fa-edit"></i></button>
                                    @endpermission
                                    @permission('Supprimer') 
                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$p->id}}"> <i class="fa fa-trash"></i></button>
                                    @endpermission
                                    <button class="btn btn-default" data-toggle="modal" data-target="#Visualiser-{{$p->id}}"> <i class="fa fa-eye"></i></button></td>
                                    
                                    </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                        {{$pieces->appends(Request::except('page'))->render()}}                                                                      
                       
                    </div>
                    <!-- end widget content -->
                </div>
            </div>
        </article>
    </div>
    </section>
</div>
<!-- Modal: Ajouter  -->
<div class="modal fade" id="Ajout" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">
                        Ajouter
                    </h4>
                </div>
                <div class="modal-body no-padding">
                    <form id="login-form" class="smart-form" action="{{route('backoffice_pieces_jointes_ajouter')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                                <fieldset>                                 
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Vehicule</label>
                                                <div class="col col-10">
                                                    <label class="input">                                                            
                                                        <select name="vehicule" id="" required>
                                                            <option value=""></option>
                                                            @foreach($vehicules as $v)
                                                                <option value="{{$v->id}}">{{$v->immatriculation}}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Libelle</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="libelle" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">URL</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="file"  name="url"  required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Description</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="description" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>         
                                </fieldset>
                                
                                <footer>
                                    <button type="submit" class="btn btn-red">
                                       Valider
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
  

<!-- Modal: Modifier pieces_jointes -->
@foreach($pieces as $pi)
<div class="modal fade" id="Modifier-{{$pi->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    Modifier
                </h4>
            </div>
            <div class="modal-body no-padding">
                <form id="login-form" class="smart-form" action="{{route('backoffice_pieces_jointes_modifier')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}                            
                    <fieldset>                                 
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Vehicule</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="hidden" name="id" value="{{$pi->id}}">
                                                <select name="vehicule" id="" required>
                                                    <option value="{{$pi->vehicule_id}}">{{$pi->vehicule->immatriculation}}</option>
                                                    @foreach($vehicules as $v)
                                                        <option value="{{$v->id}}">{{$v->immatriculation}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Libelle</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="libelle" id="date" value="{{$pi->libelle}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">URL</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="file" name="url"  required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Description</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="description" value="{{$pi->description}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                        </fieldset>
                            <footer>
                                <button type="submit" class="btn btn-red">
                                   Valider
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

<!-- Modal: Visualiser pieces_jointes -->
@foreach($pieces as $piec)
<div class="modal fade" id="Visualiser-{{$piec->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    Visualiser
                </h4>
            </div>
            <div class="modal-body no-padding">

                <form id="login-form" class="smart-form" action="" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                            
                    <fieldset>                                 
                        <section>
                                <div class="row">
                                    <label class="label col col-2">Vehicule</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="hidden" name="id" value="{{$piec->id}}">
                                            <select name="vehicule" id="" disabled>
                                                <option value="{{$piec->vehicule_id}}">{{$piec->vehicule->immatriculation}}</option>
                                                @foreach($vehicules as $v)
                                                    <option value="{{$v->id}}">{{$v->immatriculation}}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                </div>
                        </section>

                        <section>
                                <div class="row">
                                    <label class="label col col-2">Libelle</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="text" name="libelle" id="date" value="{{$piec->libelle}}" disabled>
                                        </label>
                                    </div>
                                </div>
                        </section>
                        <section>
                                <div class="row">
                                    <label class="label col col-2">URL</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="file" name="url" required>
                                        </label>
                                    </div>
                                </div>
                        </section>
                        <section>
                                <div class="row">
                                    <label class="label col col-2">Description</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="text" name="montant" value="{{$piec->description}}" disabled>
                                        </label>
                                    </div>
                                </div>
                        </section>

            
                    </fieldset>
                </form>						
                        

            </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach

<!-- Modal: Supprimer pieces_jointes -->
@foreach($pieces as $piece)
<div class="modal fade" id="Supprimer-{{ $piece->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_pieces_jointes_supprimer')}}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>
                                
                                    <input type="hidden" name="id" value="{{ $piece->id}}">
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


<!-- Modal: file -->
@foreach($pieces as $piecejointe)
<div class="modal fade" id="file-{{$piecejointe->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
            </div>
            <div class="modal-body no-padding">
                <form id="login-form" class="smart-form" action="" method="POST">
                    {{csrf_field()}}
                    <fieldset>
                      
                        <embed src="/documents_piece_jointe/{{$piecejointe->url}}" frameborder="0" width="100%" height="500px">           
                    </fieldset>                                                                                                 
                </form>	
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach


@endsection