@extends('layouts.dashboard')
@section('title')
Véhicules réformés
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


 
    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" 
            data-widget-deletebutton="false" data-widget-togglebutton="false" role="widget">
            
            

                <header>
                    
                    <span class="widget-icon"> <i class="fa fa-list">&nbsp;</i> </span>
                    <p class="h6">&nbsp;Véhicules réformés</p>  

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
                                    <th>Date de réforme</th>
                                    <th>Type de réforme</th>
                                    <th>Montant</th>
                                    <th>Observation</th>
                                    <th>Ajouté Par</th>
                                    <th>Modifié Par</th>
                                    <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($vehiculesreformes as $v)
                                <tr>                                    
                                    <td>{{$v->vehicule->immatriculation}}</td>
                                    <td>{{$v->date_reforme}}</td>
                                    <td>{{$v->reforme->libelle}}</td>
                                    <td>{{number_format($v->montant,2,',',' ')}}</td>
                                    <td>{{$v->observation}}</td>
                                    <td>{{$v->ajoute_par}}</td>
                                    <td>{{$v->modifie_par}}</td>
                                    <td>
                                    @permission('Modifier') 
                                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#Modifier-{{$v->id}}"><i class="fa fa-edit"></i></button>
                                    @endpermission
                                    @permission('Supprimer') 
                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$v->id}}"> <i class="fa fa-trash"></i></button>
                                    @endpermission
                                    <button class="btn btn-default" data-toggle="modal" data-target="#Visualiser-{{$v->id}}"> <i class="fa fa-eye"></i></button></td>
                                    
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
                    <form id="login-form" class="smart-form" action="{{route('backoffice_vehicules_reformes_ajouter')}}" method="POST">
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
                                                <label class="label col col-2">Date de réforme</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="date_reforme" id="date" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Type de réforme</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <select name="type_reforme" id="" required>
                                                                <option value=""></option>
                                                            @foreach($typereforme as $t)
                                                                <option value="{{$t->id}}">{{$t->libelle}}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Montant</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="montant" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Observation</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="observation" required>
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
  

<!-- Modal: Modifier vehicules_reformes -->
@foreach($vehiculesreformes as $ve)
<div class="modal fade" id="Modifier-{{$ve->id}}" tabindex="-1" role="dialog">
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
                <form id="login-form" class="smart-form" action="{{route('backoffice_vehicules_reformes_modifier')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}                            
                    <fieldset>                                 
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Vehicule</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="hidden" name="id" value="{{$ve->id}}">
                                                <select name="vehicule" id="" required>
                                                    <option value="{{$ve->vehicule_id}}">{{$ve->vehicule->immatriculation}}</option>
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
                                        <label class="label col col-2">Date de réforme</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="date_reforme" id="date" value="{{$ve->date_reforme}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>

                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Type de réforme</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <select name="type_reforme" id="" required>
                                                    <option value="{{$ve->reforme_id}}">{{$ve->reforme->libelle}}</option>
                                                    @foreach($typereforme as $t)
                                                        <option value="{{$t->id}}">{{$t->libelle}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Montant</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="montant" value="{{$ve->montant}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Observation</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="observation" value="{{$ve->observation}}" required>
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

<!-- Modal: Visualiser vehicules_reformes -->
@foreach($vehiculesreformes as $vere)
<div class="modal fade" id="Visualiser-{{$vere->id}}" tabindex="-1" role="dialog">
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

                <form id="login-form" class="smart-form" action="" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                            
                    <fieldset>                                 
                        <section>
                                <div class="row">
                                    <label class="label col col-2">Vehicule</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="hidden" name="id" value="{{$vere->id}}">
                                            <select name="vehicule" id="" disabled>
                                                <option value="{{$vere->vehicule_id}}">{{$vere->vehicule->immatriculation}}</option>
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
                                    <label class="label col col-2">Date de réforme</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="text" name="date_reforme" id="date" value="{{$vere->date_reforme}}" disabled>
                                        </label>
                                    </div>
                                </div>
                        </section>

                        <section>
                                <div class="row">
                                    <label class="label col col-2">Type de réforme</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <select name="type_reforme" id="" disabled>
                                                <option value="{{$vere->reforme_id}}">{{$vere->reforme->libelle}}</option>
                                                @foreach($typereforme as $t)
                                                    <option value="{{$t->id}}">{{$t->libelle}}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                </div>
                        </section>
                        <section>
                                <div class="row">
                                    <label class="label col col-2">Montant</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="text" name="montant" value="{{$vere->montant}}" disabled>
                                        </label>
                                    </div>
                                </div>
                        </section>
                        <section>
                                <div class="row">
                                    <label class="label col col-2">Observation</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="text" name="observation" value="{{$vere->observation}}" disabled>
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

<!-- Modal: Supprimer vehicules_reformes -->
@foreach($vehiculesreformes as $vch)
<div class="modal fade" id="Supprimer-{{ $vch->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_vehicules_reformes_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>
                                
                                    <input type="hidden" name="id" value="{{ $vch->id}}">
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