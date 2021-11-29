@extends('layouts.dashboard')
@section('title')
Pays
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
                        <button class="btn btn-red btn-lg" data-toggle="modal" data-target="#AjoutPaysModal" >Ajouter</button>
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
                    
                    <span class="widget-icon"> <i class="fa fa-globe">&nbsp;</i> </span>
                    <p class="h6">&nbsp;Liste des Pays</p>  

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
                                    <th><i class="fa fa-flag"></i></th>
                                    <th>Code Pays</th>
                                    <th>Libellé</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Ordre</th>
                                    <th>Ajouté Par</th>
                                    <th>Modifié Par</th>
                                    @permission('Modifier','Supprimer')
                                    <th>Actions</th>
                                    @endpermission
                                
                            </thead>
                            <tbody>
                                @foreach($pays as $p)
                                <tr>
                                    <td><i class="flag flag-{{strtolower($p->code_pays)}}"></i></td>
                                    <td>{{$p->code_pays}}</td>
                                    <td>{{$p->libelle_pays}}</td>
                                    <td>{{$p->latitude_pays}}</td>
                                    <td>{{$p->longitude_pays}}</td>
                                    <td>{{$p->ordre}}</td>
                                    <td>{{$p->ajoute_par}}</td>
                                    <td>{{$p->modifie_par}}</td>
                                    @permission('Modifier','Supprimer')
                                <td>
                                        @permission('Modifier') 
                                    <button class="btn btn-secondary"  data-toggle="modal" data-target="#ModifierPaysModal-{{$p->id}}"><i class="fa fa-edit"></i></button>
                                    @endpermission
                                    @permission('Supprimer')      
                                    <button class="btn btn-red" data-toggle="modal" data-target="#SupprimerPaysModal-{{$p->id}}"> <i class="fa fa-trash"></i></button></td>
                                @endpermission
                                </tr>
                                @endpermission
                                @endforeach
                            
                            </tbody>
                        </table>
                        {{$pays->appends(Request::except('page'))->render()}}
                    </div>
                    <!-- end widget content -->
                </div>
            </div>
        </article>
    </div>
    </section>
</div>

<!-- Modal: Ajouter pays -->
<div class="modal fade" id="AjoutPaysModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">
                        Ajout Pays
                    </h4>
                </div>
                <div class="modal-body no-padding">
                 
    
                    <form id="login-form" class="smart-form" action="{{ route('backoffice_pays_ajouter') }}" method="POST">
                        {{csrf_field()}}
                                <fieldset>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2">Code Pays</label>
                                            <div class="col col-10">
                                                <label class="input"> <i class="icon-append"><i class="fa fa-globe"></i></i>
                                                    
                                                    <input type="text" name="code" required>
                                                </label>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Libellé</label>
                                                <div class="col col-10">
                                                    <label class="input"> <i class="icon-append "><i class="fa fa-map-marker"></i></i>
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
                                                <label class="label col col-2">Ordre</label>
                                                <div class="col col-10">
                                                    <label class="input"> <i class="icon-append "></i>
                                                        <input type="number" min="0" step="1" name="ordre" required>
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
  

<!-- Modal: Modifier pays -->
@foreach($pays as $pa)
<div class="modal fade" id="ModifierPaysModal-{{$pa->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    Modification Pays
                </h4>
            </div>
            <div class="modal-body no-padding">

                <form id="login-form" class="smart-form" action="{{ route('backoffice_pays_modifier')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                            <fieldset>                   
                                <section>
                                    <div class="row">
                                        <label class="label col col-2">Code Pays</label>
                                        <div class="col col-10">
                                            <label class="input"> <i class="icon-append"><i class="fa fa-globe"></i></i>
                                            <input type="hidden" name="id" value="{{$pa->id}}">
                                            <input type="text" name="code" value="{{$pa->code_pays}}" required>
                                            </label>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Libellé</label>
                                            <div class="col col-10">
                                                <label class="input"> <i class="icon-append "><i class="fa fa-map-marker"></i></i>
                                                    <input type="text" name="libelle" value="{{$pa->libelle_pays}}" required>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Latitude</label>
                                            <div class="col col-10">
                                                <label class="input"> <i class="icon-append "><i class="fa fa-compass"></i></i>
                                                    <input type="text" name="latitude" value="{{$pa->latitude_pays}}">
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Longitude</label>
                                            <div class="col col-10">
                                                <label class="input"> <i class="icon-append "></i>
                                                    <input type="text" name="longitude" value="{{$pa->longitude_pays}}" required>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Ordre</label>
                                            <div class="col col-10">
                                                <label class="input"> <i class="icon-append "><i class="fa fa-num"></i></i>
                                                <input type="number" min="0" step="1" value="{{$pa->ordre}}" name="ordre" required>
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

<!-- Modal: Supprimer pays -->
@foreach($pays as $pay)
<div class="modal fade" id="SupprimerPaysModal-{{$pay->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_pays_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>
                                
                                    <input type="hidden" name="pays_id" value="{{$pay->id}}">
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