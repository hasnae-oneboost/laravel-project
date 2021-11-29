@extends('layouts.dashboard')
@section('title')
Villes
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Utilisation</li>
                <li>Personnel</li>
                <li>@yield('title')</li>	
		</ol>
			<!-- end breadcrumb -->
@endsection

@section('content')

<!-- MAIN CONTENT -->
<div id="content">
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

<!--Button: Ajouter-->
<div class="pull-right">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
                    @permission('Créer') 
                <div class="">
                <button class="btn btn-red btn-lg" data-toggle="modal" data-target="#AjoutVillesModal" >Ajouter</button>
                </div>
                @endpermission
            </h1>
        </div>
   
</div>
<!--/Button: Ajouter-->    


				
<!-- widget grid -->
<section id="widget-grid" class="">

    <div class="row">

                     
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">


            <!--***************************************-->
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
                                <form id="login-form" class="smart-form" action="{{route('backoffice_villes')}}" method="get">
                                      
                                            <fieldset>
                                                    <div class="row">
                                               
                                                            <div class="col col-8">
                                                                <label class="label">
                                                                            Pays
                                                                </label>
                                                                <label class="select">
                                                                        <select name="pays" class="pays_select">
                                                                                <option value=""></option>
                                                                                @foreach($pays as $p)                                             
                                                                                <option value="{{$p->id}}" @if( $selectedPays  == $p->id) selected="selected" @endif >{{$p->libelle_pays}}</option>
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
</div>
                 
    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

            

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" 
            data-widget-deletebutton="false" data-widget-togglebutton="false" role="widget">
                
                @if($selectedPays)
                    <header>                    
                        <span class="widget-icon"> <i class="fa fa-filter">&nbsp;</i> </span>
                    <p class="h6">&nbsp;Liste des Villes</p>
                    </header>

                @else
                    <header>                    
                        <span class="widget-icon"> <i class="fa fa-map-marker">&nbsp;</i> </span>
                        <p class="h6">&nbsp;Liste des Villes</p>
                    </header>
                @endif
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
                            

                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>			                
                                <tr>
                                    <th>Libellé</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th><i class="fa fa-flag"></i></th>
                                    <th>Pays</th>
                                    <th>Ajouté par</th>
                                    <th>Modifié Par</th>
                                    @permission('Modifier','Supprimer')
                                    <th>Actions</th>
                                    @endpermission
                                
                            </thead>
                            <tbody>
                                    @foreach($villes as $ville)
                                    <tr>
                                        
                                        <td>{{$ville->libelle_ville}}</td>
                                        <td>{{$ville->latitude_ville}}</td>
                                        <td>{{$ville->longitude_ville}}</td>
                                        <td><i class="flag flag-{{strtolower($ville->pays->code_pays)}}"></i></td>
                                        <td>{{$ville->pays->libelle_pays}}</td>
                                        <td>{{$ville->ajoute_par}}</td>
                                        <td>{{$ville->modifie_par}}</td>
                                        @permission('Modifier','Supprimer')
                                    <td>
                                            @permission('Modifier') 
                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#ModifierVillesModal-{{$ville->id}}"><i class="fa fa-edit"></i></button>
                                        @endpermission
                                        @permission('Supprimer') 
                                        <button class="btn btn-red"data-toggle="modal" data-target="#SupprimerVillesModal-{{$ville->id}}"> <i class="fa fa-trash"></i></button></td>
                                    @endpermission
                                    </tr>
                                    @endpermission
                                    @endforeach
                            
                            </tbody>
                        </table>
                        {{$villes->appends(Request::except('page'))->render()}}
                     </div>
                    </div>
                    <!-- end widget content -->
                
                </div>
            </div>
        </article>
    </div>
</section>
</div>


<!-- Modal: Ajouter Villes -->
@foreach($villes as $vil)
<div class="modal fade" id="AjoutVillesModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">
                        Ajout Ville
                    </h4>
                </div>
                <div class="modal-body no-padding">
    
                    <form id="login-form" class="smart-form" action="{{ route('backoffice_villes_ajouter') }}" method="POST">
                        {{csrf_field()}}
                                <fieldset>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2">Libellé</label>
                                            <div class="col col-10">
                                                <label class="input"> <i class="icon-append"><i class="fa fa-map-marker"></i></i>
                                                    <input type="text" name="libelle" required>
                                                </label>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Latitude</label>
                                                <div class="col col-10">
                                                    <label class="input"> <i class="icon-append "><i class="fa fa-compass"></i></i>
                                                        <input type="text" name="latitude" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Longitude</label>
                                                <div class="col col-10">
                                                    <label class="input"> <i class="icon-append "><i class="fa fa-compass"></i></i>
                                                        <input type="text" name="longitude" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Pays</label>
                                                <div class="col col-10">
                                                    <label class="input">                                                            
                                                       <select name="pays" class="pays_select" required style="width:470px;">
                                                            <option value="" ></option>
                                                            @foreach($pays as $p)
                                                            <option value="{{$p->id}}" id="pays">{{$p->libelle_pays}}</option>
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


  <!-- Modal: Modifier ville -->
@foreach($villes as $v)
<div class="modal fade" id="ModifierVillesModal-{{$v->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    Modification Ville
                </h4>
            </div>
            <div class="modal-body no-padding">

            <form id="login-form" class="smart-form" action="{{ route('backoffice_villes_modifier')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                            <fieldset>                   
                                <section>
                                    <div class="row">
                                        <label class="label col col-2">Libellé</label>
                                        <div class="col col-10">
                                            <label class="input"> <i class="icon-append"><i class="fa fa-globe"></i></i>
                                                <input type="hidden" name="id" value="{{$v->id}}">
                                                <input type="text" name="libelle" value="{{$v->libelle_ville}}" required>
                                            </label>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Latitude</label>
                                            <div class="col col-10">
                                                <label class="input"> <i class="icon-append "><i class="fa fa-compass"></i></i>
                                                    <input type="text" name="latitude" value="{{$v->latitude_ville}}" required>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Longitude</label>
                                            <div class="col col-10">
                                                <label class="input"> <i class="icon-append "><i class="fa fa-compass"></i></i>
                                                    <input type="text" name="longitude" value="{{$v->longitude_ville}}" required>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Pays</label>
                                            <div class="col col-10">
                                                <label class="">
                                                    <select name="pays" class="pays_selected" required style="width:470px;">
                                                        <option value="{{$p->id}}">{{$v->pays->libelle_pays}}</option>
                                                        @foreach($pays as $p)
                                                        <option value="{{$p->id}}">{{$p->libelle_pays}}</option>
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


<!-- Modal: Supprimer ville -->
@foreach($villes as $vi)
<div class="modal fade" id="SupprimerVillesModal-{{$vi->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_villes_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                         <fieldset>
                            <input type="hidden" name="ville_id" value="{{$vi->id}}">
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


<script>
    

</script>

@endsection