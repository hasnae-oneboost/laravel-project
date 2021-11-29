@extends('layouts.dashboard')
@section('title')
Gammes
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Classement des véhicules</li>
                <li>Classement des véhicules</li>
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
                                                <form id="login-form" class="smart-form" action="{{route('backoffice_gammes')}}" method="get">
                                                         
                                                        
                                                        <fieldset>
                                                                <div class="row">
                                                           
                                                                        <div class="col col-3">
                                                                            <label class="label">
                                                                                        Marque
                                                                            </label>
                                                                            <label class="select">
                                                                                    <select name="marque" >
                                                                                        <option value=""></option>
                                                                                        @foreach($marques as $m)
                                                                                        <option value="{{$m->id}}" @if($selected_marque == $m->id) selected="selected" @endif>{{$m->marque}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                            </label>
                                                        
                                                                        </div>
                                                                        <div class="col col-3">
                                                                                <label class="label">
                                                                                           Categorie
                                                                                </label>
                                                                                <label class="select">
                                                                                        <select name="categorie_vehicule" >
                                                                                            <option value=""></option>
                                                                                            @foreach($categories as $c)
                                                                                            <option value="{{$c->id}}" @if($selected_cat == $c->id) selected="selected" @endif>{{$c->libelle}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                </label> 
                                                                                
                                                                            </div>
                                                                            <div class="col col-3">
                                                                                    <label class="label">
                                                                                              Confort
                                                                                    </label>
                                                                                    <label class="select">
                                                                                            <select name="confort" >
                                                                                                <option value=""></option>
                                                                                                @foreach($conforts as $co)
                                                                                                <option value="{{$co->id}}" @if($selected_confort == $co->id) selected="selected" @endif>{{$co->nom}}</option>
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
                                                                     
                                                                     
                                                            
                                                        </fieldset>
                                                    </form>
                                                </div>
                                          </div>
                                        </div>
                                </div>
                    </article>
             
                <!-- row -->
                <div class="row">
            
                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
            
                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" 
                        data-widget-deletebutton="false" data-widget-togglebutton="false" role="widget">
                            <header>
                                
                                <span class="widget-icon"> <i class="fa fa-list">&nbsp;</i> </span>
                                <p class="h6">&nbsp;Gammes</p>
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
                                                <th>Gamme</th>
                                                <th>Marque</th>
                                                <th>Catégorie</th>
                                                <th>Confort</th>
                                                <th>Ajouté Par</th>
                                                <th>Modifié Par</th>
                                                <th>Actions</th>
                                               
                                        </thead>
                                        <tbody>
                                                @foreach($gammes as $g)
                                                <tr>
                                                    <td>{{$g->gamme}}</td>
                                                    <td>{{$g->marque->marque}}</td>
                                                    <td>{{$g->categorie->libelle}}</td> 
                                                    <td>{{$g->confort->nom}}</td>                                               
                                                    <td>{{$g->ajoute_par}}</td>
                                                    <td>{{$g->modifie_par}}</td>
                                                    <td>
                                                    @permission('Modifier') 
                                                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#Modifier-{{$g->id}}"><i class="fa fa-edit"></i></button>
                                                    @endpermission
                                                    @permission('Supprimer') 
                                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$g->id}}"> <i class="fa fa-trash"></i></button>
                                                    @endpermission
                                                    <button class="btn btn-default" data-toggle="modal" data-target="#Visualiser-{{$g->id}}"> <i class="fa fa-eye"></i></button></td>
                                                    </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                    {{$gammes->appends(Request::except('page'))->render()}}                                   
                                </div>
                                <!-- end widget content -->
                            </div>
                        </div>
                    </article>
                </div>
                </section>
            </div>

                        
<!-- Modal: Ajouter -->
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
    
                    <form id="login-form" class="smart-form" action="{{route('backoffice_gamme_ajouter')}}" method="POST">
                        {{csrf_field()}}
                                <fieldset>                                    
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Gamme</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="gamme" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2">Marque</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <select name="marque" required>
                                                        <option value=""></option>
                                                        @foreach($marques as $m)
                                                        <option value="{{$m->id}}">{{$m->marque}}</option>    
                                                        @endforeach
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2">Categorie</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <select name="categorie_vehicule" required>
                                                        <option value=""></option>
                                                        @foreach($categories as $c)
                                                        <option value="{{$c->id}}">{{$c->libelle}}</option>    
                                                        @endforeach
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                    <div class="row">
                                        <label class="label col col-2">Confort</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <select name="confort" required>
                                                    <option value=""></option>
                                                    @foreach($conforts as $co)
                                                    <option value="{{$co->id}}">{{$co->nom}}</option>    
                                                    @endforeach
                                                </select>
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
@foreach($gammes as $gam)
<div class="modal fade" id="Modifier-{{$gam->id}}" tabindex="-1" role="dialog">
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

                <form id="login-form" class="smart-form" action="{{route('backoffice_gamme_modifier')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}                            
                    <fieldset>                                    
                        <section>
                                <div class="row">
                                    <label class="label col col-2">Gamme</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="hidden" name="id" value="{{$gam->id}}">
                                            <input type="text" name="gamme" value="{{$gam->gamme}}" required>
                                        </label>
                                    </div>
                                </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-2">Marque</label>
                                <div class="col col-10">
                                    <label class="input">
                                        <select name="marque" required>
                                            <option value="{{$gam->marque_id}}">{{$gam->marque->marque}}</option>
                                            @foreach($marques as $m)
                                            <option value="{{$m->id}}">{{$m->marque}}</option>    
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-2">Categorie</label>
                                <div class="col col-10">
                                    <label class="input">
                                        <select name="categorie_vehicule" required>
                                            <option value="{{$gam->categorie_id}}">{{$gam->categorie->libelle}}</option>
                                            @foreach($categories as $c)
                                            <option value="{{$c->id}}">{{$c->libelle}}</option>    
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                        <div class="row">
                            <label class="label col col-2">Confort</label>
                            <div class="col col-10">
                                <label class="input">
                                    <select name="confort" required>
                                        <option value="{{$gam->confort_id}}">{{$gam->confort->nom}}</option>
                                        @foreach($conforts as $co)
                                        <option value="{{$co->id}}">{{$co->nom}}</option>    
                                        @endforeach
                                    </select>
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

<!-- Modal: Visualiser -->
@foreach($gammes as $gamm)
<div class="modal fade" id="Visualiser-{{$gamm->id}}" tabindex="-1" role="dialog">
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
                        <fieldset>                                    
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Gamme</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="hidden" name="id" value="{{$gamm->id}}">
                                                    <input type="text" name="gamme" value="{{$gamm->gamme}}" disabled>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                    <div class="row">
                                        <label class="label col col-2">Marque</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <select name="marque" disabled>
                                                    <option value="{{$gamm->marque_id}}">{{$gamm->marque->marque}}</option>
                                                    @foreach($marques as $m)
                                                    <option value="{{$m->id}}">{{$m->marque}}</option>    
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <div class="row">
                                        <label class="label col col-2">Categorie</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <select name="categorie_vehicule" disabled>
                                                    <option value="{{$gamm->categorie_id}}">{{$gamm->categorie->libelle}}</option>
                                                    @foreach($categories as $c)
                                                    <option value="{{$c->id}}">{{$c->libelle}}</option>    
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                <div class="row">
                                    <label class="label col col-2">Confort</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <select name="confort" disabled>
                                                <option value="{{$gamm->confort_id}}">{{$gamm->confort->nom}}</option>
                                                @foreach($conforts as $co)
                                                <option value="{{$co->id}}">{{$co->nom}}</option>    
                                                @endforeach
                                            </select>
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

<!-- Modal: Supprimer -->
@foreach($gammes as $gamme)
<div class="modal fade" id="Supprimer-{{$gamme->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_gamme_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>                                            
                                    <input type="hidden" name="id" value="{{$gamme->id}}">
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