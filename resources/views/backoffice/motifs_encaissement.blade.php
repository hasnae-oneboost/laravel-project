@extends('layouts.dashboard')
@section('title')
Motifs d'encaissement
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Utilisation</li>
                <li>Caisses</li>
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
                                                <form id="login-form" class="smart-form" action="{{route('backoffice_motifs_encaissement')}}" method="get">
                                                        
                                                        
                                                        <fieldset>
                                                                <div class="row">
                                                           
                                                                        <div class="col col-3">
                                                                            <label class="label">
                                                                                        N° Compte comptable
                                                                            </label>
                                                                            <label class="select">
                                                                                    <select name="numero_compte_id" class="num_compte_comptable_select" style="width: 100%">
                                                                                            <option value=""></option>
                                                                                            @foreach($motifs as $mt )
                                                                                            <option value="{{$mt->id}}"  @if( $selected_num_compte  == $mt->id) selected="selected" @endif>{{$mt->numero_compte_comptable}}</option>
                                                                                            @endforeach
                                                                                    </select>
                                                                            </label>
                                                        
                                                                        </div>
                                                                        <div class="col col-3">
                                                                                <label class="label">
                                                                                            Libelle
                                                                                </label>
                                                                                <label class="select">
                                                                                        <select name="libelle_id" class="libelle_motif_enc_select" style="width: 100%">
                                                                                                <option value=""></option>
                                                                                                @foreach($motifs as $mti )
                                                                                                    <option value="{{$mti->id}}"  @if( $selected_libelle  == $mti->id) selected="selected" @endif   >{{$mti->libelle}}</option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                </label>                                                            
                                                                            </div>
                                                                       
                                                                        <div class="col col-3">
                                                                                    <label  class="label">
                                                                                                Catégorie du motif
                                                                                    </label>
                                                                                    <label class="select">                                                                    
                                                                                            <select name="categorie_id" class="categorie_motif_enc_select" style="width: 100%">
                                                                                                    <option value=""></option>
                                                                                                        @foreach($motifs as $mf )
                                                                                                        <option value="{{$mf->categorie_motif_id}}" @if( $selected_categorie  == $mf->categorie_motif_id) selected="selected" @endif >{{$mf->categoriesmotifsencaissement->libelle}}</option>
                                                                                                        
                                                                                                        @endforeach
                                                                                        </select>
                                                                                    </label>
                                                                                   
                                                                                </div>
                                                                        <div class="col col-3">
                                                                                
                                                                                <label class="pull-right" style="margin-top: 25px;">                                                                    
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
                
                            <!-- row -->
                <div class="row">
            
                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
            
                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" 
                        data-widget-deletebutton="false" data-widget-togglebutton="false" role="widget">
                        
                        
            
                            <header>
                                
                                <span class="widget-icon"> <i class="fa fa-list">&nbsp;</i> </span>
                                <p class="h6">&nbsp;Motifs d'encaissement</p>  
            
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
                                                <th>Code</th>
                                                <th>Libellé</th>
                                                <th>N° Compte comptable</th>
                                                <th>Catégorie du motif</th>
                                                <th>Description</th>                                               
                                                <th>Ajouté Par</th>
                                                <th>Modifié Par</th>
                                                <th>Actions</th>
                                               
                                        </thead>
                                        <tbody>
                                                @foreach($motifs as $m)
                                                <tr>
                                                    <td>{{$m->code}}</td>
                                                    <td>{{$m->libelle}}</td> 
                                                    <td>{{$m->numero_compte_comptable}}</td>
                                                    <td>{{$m->categoriesmotifsencaissement->libelle}}</td>                                                                                                   
                                                    <td>{{$m->description}}</td>                                                
                                                    <td>{{$m->ajoute_par}}</td>
                                                    <td>{{$m->modifie_par}}</td>
                                                    <td>
                                                    @permission('Modifier') 
                                                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#Modifier-{{$m->id}}"><i class="fa fa-edit"></i></button>
                                                    @endpermission
                                                    @permission('Supprimer') 
                                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$m->id}}"> <i class="fa fa-trash"></i></button>
                                                    @endpermission
                                                    <button class="btn btn-default" data-toggle="modal" data-target="#Visualiser-{{$m->id}}"> <i class="fa fa-eye"></i></button></td>
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
                 
    
                    <form id="login-form" class="smart-form" action="{{route('backoffice_motifs_encaissement_ajouter')}}" method="POST">
                        {{csrf_field()}}
                                <fieldset>
                                        <section>
                                                <div class="row">
                                                    <label class="label col col-2">Code</label>
                                                    <div class="col col-10">
                                                        <label class="input">
                                                            <input type="text" name="code" required>
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
                                                <label class="label col col-2">N° Compte comptable</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="numero_compte_comptable" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Catégorie du motif</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                            <select name="categorie_motif_id" class="categorie_motif_enc_select" required >
                                                                    <option value="" ></option>
                                                                    @foreach($encaissement as $e)
                                                                    <option value="{{$e->id}}" >{{$e->libelle}}</option>
                                                                    @endforeach
                                                                </select>
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
  

<!-- Modal: Modifier -->
@foreach($motifs as $mo)
<div class="modal fade" id="Modifier-{{$mo->id}}" tabindex="-1" role="dialog">
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

                <form id="login-form" class="smart-form" action="{{route('backoffice_motifs_encaissement_modifier')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                            
                    <fieldset>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Code</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="hidden" name="id" value="{{$mo->id}}">
                                                <input type="text" name="code" value="{{$mo->code}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                        
                        <section>
                                <div class="row">
                                    <label class="label col col-2">Libellé</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="text" name="libelle" value="{{$mo->libelle}}" required>
                                        </label>
                                    </div>
                                </div>
                        </section>
                        <section>
                                <div class="row">
                                    <label class="label col col-2">N° Compte comptable</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="text" name="numero_compte_comptable" value="{{$mo->numero_compte_comptable}}" required>
                                        </label>
                                    </div>
                                </div>
                        </section>
                        <section>
                                <div class="row">
                                    <label class="label col col-2">Catégorie du motif</label>
                                    <div class="col col-10">
                                        <label class="input">
                                                <select name="categorie_motif_id" class="categorie_motif_enc_select" required >
                                                        <option value="{{$mo->categorie_motif_id}}" >{{$mo->categoriesmotifsencaissement->libelle}}</option>
                                                        @foreach($encaissement as $e)
                                                        <option value="{{$e->id}}" >{{$e->libelle}}</option>
                                                        @endforeach
                                                    </select>
                                        </label>
                                    </div>
                                </div>
                        </section>
                        <section>
                                <div class="row">
                                    <label class="label col col-2">Description</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="text" name="description" value="{{$mo->description}}" required>
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
@foreach($motifs as $mot)
<div class="modal fade" id="Visualiser-{{$mot->id}}" tabindex="-1" role="dialog">
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
                                            <label class="label col col-2">Code</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="hidden" name="id" value="{{$mot->id}}">
                                                    <input type="text" name="code" value="{{$mot->code}}" disabled>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                            
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Libellé</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="libelle" value="{{$mot->libelle}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">N° Compte comptable</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="numero_compte_comptable" value="{{$mot->numero_compte_comptable}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Catégorie du motif</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                    <select name="categorie_motif_id" class="categorie_motif_enc_select" disabled>
                                                            <option value="{{$mot->categorie_motif_id}}" >{{$mot->categoriesmotifsencaissement->libelle}}</option>
                                                        </select>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Description</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="description" value="{{$mot->description}}" disabled>
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
@foreach($motifs as $motif)
<div class="modal fade" id="Supprimer-{{$motif->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_motifs_encaissement_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>                                            
                                    <input type="hidden" name="id" value="{{$motif->id}}">
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