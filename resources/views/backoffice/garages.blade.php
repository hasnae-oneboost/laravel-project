@extends('layouts.dashboard')
@section('title')
Garages
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Interventions</li>
                <li>Intervention</li>
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
                    <p class="h6">&nbsp;Garages</p>  
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
                                    <th>Nom</th>
                                    <th>Pays</th>
                                    <th>Ville</th>
                                    <th>Fixe</th> 
                                    <th>Gérant</th>
                                    <th>Responsable</th>                                   
                                    <th>Ajouté Par</th>
                                    <th>Modifié Par</th>
                                    <th>Actions</th>                                
                            </thead>
                            <tbody>
                                @foreach($garages as $g)
                                <tr>
                                    <td>{{$g->nom}}</td>
                                    <td>{{$g->pay->libelle_pays}}</td>
                                    <td>{{$g->ville->libelle_ville}}</td>
                                    <td>{{$g->fixe}}</td> 
                                    <td>{{$g->nom_gerant}}</td>
                                    <td>{{$g->responsable}}</td>                                   
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
                    <form id="login-form" class="smart-form" action="{{route('backoffice_garage_ajouter')}}" method="POST">
                        {{csrf_field()}}
                                <fieldset>
                                        <section>
                                                <div class="row">
                                                    <label class="label col col-2">Nom</label>
                                                    <div class="col col-10">
                                                        <label class="input">                                                            
                                                              <input type="text" name="nom" required>
                                                        </label>
                                                    </div>                                        
                                                   
                                                </div>
                                        </section>
                                        <section>
                                                <div class="row">
                                                    <label class="label col col-2">Pays</label>
                                                    <div class="col col-10">
                                                        <label class="input">                                                            
                                                                <select class="pays_select" name="pays" id="pays" style="width:695px;" required>
                                                                        <option value=""></option>
                                                                        @foreach($pays as $p)
                                                                            <option value="{{$p->id}}">{{$p->libelle_pays}}</option>
                                                                        @endforeach
                                                                    </select>
                                                        </label>
                                                    </div>                                            
                                                   
                                                </div>
                                        </section>
                                            <section>
                                                    <div class="row">
                                                        <label class="label col col-2">Ville</label>
                                                        <div class="col col-10">
                                                            <label class="input">                                                            
                                                                    <select class="ville_select" name="ville" id="ville" style="width:695px;" required>
                                                                            <option value=""></option>
                                                                            
                                                                        </select>
                                                            </label>
                                                        </div>                                            
                                                       
                                                    </div>
                                            </section>
                                            <section>
                                                    <div class="row">
                                                        <label class="label col col-2">Fixe</label>
                                                        <div class="col col-10">
                                                            <label class="input">                                                            
                                                                  <input type="text" name="fixe" required>
                                                            </label>
                                                        </div>                                        
                                                       
                                                    </div>
                                            </section>
                                            <section>
                                                    <div class="row">
                                                        <label class="label col col-2">Gerant</label>
                                                        <div class="col col-10">
                                                            <label class="input">                                                            
                                                                  <input type="text" name="nom_gerant" required>
                                                            </label>
                                                        </div>                                        
                                                       
                                                    </div>
                                            </section>
                                            <section>
                                                    <div class="row">
                                                        <label class="label col col-2">Responsable</label>
                                                        <div class="col col-10">
                                                            <label class="input">                                                            
                                                                  <input type="text" name="responsable" required>
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
@foreach($garages as $ga)
<div class="modal fade" id="Modifier-{{$ga->id}}" tabindex="-1" role="dialog">
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

                <form id="login-form" class="smart-form" action="{{route('backoffice_garage_modifier')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                            
                    <fieldset>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Nom</label>
                                        <div class="col col-10">
                                            <label class="input">   
                                                  <input type="hidden" name="id" value="{{$ga->id}}">                                                           
                                                  <input type="text" name="nom" value="{{$ga->nom}}" required>
                                            </label>
                                        </div>                                        
                                       
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Pays</label>
                                        <div class="col col-10">
                                            <label class="input">                                                            
                                                    <select class="pays_select" name="pays" id="pays" style="width:695px;" required>
                                                            <option value="{{$ga->pay_id}}">{{$ga->pay->libelle_pays}}</option>
                                                            @foreach($pays as $p)
                                                                <option value="{{$p->id}}">{{$p->libelle_pays}}</option>
                                                            @endforeach
                                                        </select>
                                            </label>
                                        </div>                                            
                                       
                                    </div>
                            </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Ville</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                        <select class="ville_select" name="ville" id="ville" style="width:695px;" required>
                           
                                                            <option value="{{$ga->ville_id}}">{{$ga->ville->libelle_ville}}</option>
                                                                
                                                            </select>
                                                </label>
                                            </div>                                            
                                           
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Fixe</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                      <input type="text" name="fixe" value="{{$ga->fixe}}" required>
                                                </label>
                                            </div>                                        
                                           
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Gerant</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                      <input type="text" name="nom_gerant" value="{{$ga->nom_gerant}}" required>
                                                </label>
                                            </div>                                        
                                           
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Responsable</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                      <input type="text" name="responsable" value="{{$ga->responsable}}" required>
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
@foreach($garages as $gar)
<div class="modal fade" id="Supprimer-{{$gar->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_garage_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>
                                
                                    <input type="hidden" name="id" value="{{$gar->id}}">
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
@foreach($garages as $garage)
<div class="modal fade" id="Visualiser-{{$garage->id}}" tabindex="-1" role="dialog">
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
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Nom</label>
                                        <div class="col col-10">
                                            <label class="input">   
                                                  <input type="hidden" name="id" value="{{$garage->id}}">                                                           
                                                  <input type="text" name="nom" value="{{$garage->nom}}" disabled>
                                            </label>
                                        </div>                                        
                                       
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Pays</label>
                                        <div class="col col-10">
                                            <label class="input">                                                            
                                                    <select class="pays_select" name="pays" id="pays" style="width:695px;" disabled>
                                                            <option value="{{$garage->pay_id}}">{{$garage->pay->libelle_pays}}</option>
                                                            @foreach($pays as $p)
                                                                <option value="{{$p->id}}">{{$p->libelle_pays}}</option>
                                                            @endforeach
                                                        </select>
                                            </label>
                                        </div>                                            
                                       
                                    </div>
                            </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Ville</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                        <select class="ville_select" name="ville" id="ville" style="width:695px;" disabled>
                                                                <option value="{{$garage->ville_id}}">{{$garage->ville->libelle_ville}}</option>
                                                                
                                                            </select>
                                                </label>
                                            </div>                                            
                                           
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Fixe</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                      <input type="text" name="fixe" value="{{$garage->fixe}}" disabled>
                                                </label>
                                            </div>                                        
                                           
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Gerant</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                      <input type="text" name="nom_gerant" value="{{$garage->nom_gerant}}" disabled>
                                                </label>
                                            </div>                                        
                                           
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Responsable</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                      <input type="text" name="responsable" value="{{$garage->responsable}}" disabled>
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