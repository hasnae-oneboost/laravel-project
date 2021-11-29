@extends('layouts.dashboard')
@section('title')
Liste des infractions
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Juridique</li>
                <li>Infractions</li>
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
                    <p class="h6">&nbsp;Liste des infractions</p>  

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
                                    <th>Type d'infraction</th>
                                    <th>Libellé</th>                                    
                                    <th>Description</th>
                                    <th>Amende</th>
                                    <th>Nombre de points</th>
                                    <th>Ajouté Par</th>
                                    <th>Modifié Par</th>
                                    @permission('Modifier','Supprimer')
                                    <th>Actions</th>
                                    @endpermission
                                
                            </thead>
                            <tbody>
                                @foreach($infractions as $i)
                                <tr>
                                    <td>{{$i->typesinfraction->libelle}}</td>
                                    <td>{{$i->libelle}}</td>
                                    <td>{{$i->description}}</td>
                                    <td>{{$i->amende}}</td>
                                    <td>{{$i->nombre_points}}</td>
                                    <td>{{$i->ajoute_par}}</td>
                                    <td>{{$i->modifie_par}}</td>
                                    @permission('Modifier','Supprimer')
                                    <td>
                                            @permission('Modifier') 
                                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#Modifier-{{$i->id}}"><i class="fa fa-edit"></i></button>
                                        @endpermission
                                        @permission('Supprimer') 
                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$i->id}}"> <i class="fa fa-trash"></i></button>
                                        @endpermission
                                        
                                        <button class="btn btn-default" data-toggle="modal" data-target="#Visualiser-{{$i->id}}"> <i class="fa fa-eye"></i></button></td>
                                        
                                    </tr>
                                    @endpermission
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

<!-- Modal: Ajouter poste -->
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
                 
    
                    <form id="login-form" class="smart-form" action="{{route('backoffice_infraction_ajouter')}}" method="POST">
                        {{csrf_field()}}
                                <fieldset>
                                        <section>
                                                <div class="row">
                                                    <label class="label col col-2">Type d'infraction</label>
                                                    <div class="col col-10">
                                                    <label class="select">                                                                    
                                                            <select class="typeinf_select" name="type_infraction" id="societe_assurance">
                                                                <option value=""></option>
                                                                @foreach($types as $t)
                                                                <option value="{{$t->id}}">{{$t->libelle}}</option>
                                                                @endforeach
                                                            </select>                                                                       
                                                    </label>
                                                    </div>
                                                </div>
                                        </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Libellé</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="libelle" required>
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
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Amende</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="amende" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Nombre de points</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="number" name="nombre_points" required>
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
  

<!-- Modal: Modifier -->
@foreach($infractions as $in)
<div class="modal fade" id="Modifier-{{$in->id}}" tabindex="-1" role="dialog">
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

                <form id="login-form" class="smart-form" action="{{route('backoffice_infraction_modifier')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                            
                    <fieldset>
                            <input type="hidden" name="id" value="{{$in->id}}">
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Type d'infraction</label>
                                        <div class="col col-10">
                                            <label class="select">                                                                    
                                                <select class="typeinf_select" name="type_infraction" id="societe_assurance">
                                                    <option value="{{$i->type_infraction_id}}">{{$i->typesinfraction->libelle}}</option>
                                                    @foreach($types as $t)
                                                    <option value="{{$t->id}}">{{$t->libelle}}</option>
                                                    @endforeach
                                                </select>
                                                           
                                        </label>
                                    </div>
                                        
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Libellé</label>
                                        <div class="col col-10">
                                            <label class="input">                                                    
                                                <input type="text" name="libelle" value="{{$in->libelle}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Description</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="description" value="{{$in->description}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Amende</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="amende" value="{{$in->amende}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Nombre de points</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="number" name="nombre_points" value="{{$in->nombre_points}}" required>
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

<!-- Modal: Supprimer -->
@foreach($infractions as $inf)
<div class="modal fade" id="Supprimer-{{$inf->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_infraction_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>
                                
                                    <input type="hidden" name="id" value="{{$inf->id}}">
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

<!-- Modal: Visualiser -->
@foreach($infractions as $infr)
<div class="modal fade" id="Visualiser-{{$infr->id}}" tabindex="-1" role="dialog">
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
                            
                    <fieldset>
                            <input type="hidden" name="id" value="{{$infr->id}}">
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Type d'infraction</label>
                                        <div class="col col-10">
                                        <label class="select">                                                                    
                                                <select class="typeinf_select" name="type_infraction" id="societe_assurance" disabled>
                                                    <option value="{{$infr->type_infraction_id}}">{{$infr->typesinfraction->libelle}}</option>
                                                    
                                                </select>
                                                           
                                        </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Libellé</label>
                                        <div class="col col-10">
                                            <label class="input">                                                    
                                                <input type="text" name="libelle" value="{{$infr->libelle}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Description</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="description" value="{{$infr->description}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Amende</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="amende" value="{{$infr->amende}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Nombre de points</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="nombre_points" value="{{$infr->nombre_points}}" disabled>
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


@endsection