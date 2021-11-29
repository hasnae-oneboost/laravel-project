@extends('layouts.dashboard')
@section('title')
Liste des appels
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Consommations</li>
                <li><a href="{{route('backoffice_liste_fournisseurs')}}">Fournisseurs</a></li>
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
                                        <a  data-toggle="modal" data-target="#Ajouter-{{$fournisseurs->id}}" class="btn btn-red btn-lg">Ajouter</a>
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
                                <p class="h6">&nbsp;Listes des appels</p>
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
                                                <th>Fournisseur</th>
                                                <th>Date et heure d'appel</th>
                                                <th>Résumé de l'appel</th>
                                                <th>Prochain appel</th>
                                                <th>Actions</th>                                               
                                        </thead>
                                                                              
                                        <tbody>
                                                @foreach($appel as $appels)
                                                <tr>
                                                    <td>{{$appels->fournisseu->libelle}}</td>  
                                                    <td>{{$appels->date_heure}}</td> 
                                                    <td>{{$appels->resume_appel}}</td>
                                                    <td>{{$appels->prochain_appel}}</td>                                                   
                                                    <td>
                                                    @permission('Modifier') 
                                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#Modifier-{{$appels->id}}"><i class="fa fa-edit"></i></button>
                                                    @endpermission
                                                    @permission('Supprimer') 
                                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$appels->id}}"> <i class="fa fa-trash"></i></button>
                                                    @endpermission
                                                        <button class="btn btn-default" data-toggle="modal" data-target="#Visualiser-{{$appels->id}}" > <i class="fa fa-eye"></i></button>
                                                </td> 
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

                        
<!-- Modal: ajouter -->
<div class="modal fade" id="Ajouter-{{$fournisseurs->id}}"  tabindex="-1" role="dialog">
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
	
                    <form id="login-form" class="smart-form" action="{{route('backoffice_appel_ajouter_fournisseur')}}" method="POST">
                            {{csrf_field()}}
                                <fieldset>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Fournisseur</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="hidden" name="fournisseur_id" value="{{$fournisseurs->id}}">
                                                        <input type="text" name="fournisseur" value="{{$fournisseurs->libelle}}" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Date et heure</label>
                                                <div class="col col-10">
                                                        <label class="input">                                                                    
                                                                <div class="input-group" id="date_heure"  class="input-append">                                                                    
                                                                        <input type="text" data-format="hh:mm:ss"  class="form-control " id="date_heure" name="date_heure" value=""  required>
                                                                        <span class="input-group-addon add-on">
                                                                           <i data-time-icon="icon-time">
                                                                            </i>
                                                                          </span>
                                                                </div>
                                                             
                                                        </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Resumé d'appel</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="resume_appel" value="" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Prochain appel</label>
                                                <div class="col col-10">
                                                        <label class="input">  
                                                                <div class="input-group" id="prochain_appel"  class="input-append">                                                                    
                                                                        <input type="text" data-format="hh:mm:ss"  class="form-control " id="prochain_appel" name="prochain_appel" value=""  required>
                                                                        <span class="input-group-addon add-on">
                                                                           <i data-time-icon="icon-time">
                                                                            </i>
                                                                          </span>
                                                                </div>
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

<!-- Modal: modifier -->
@foreach($appel as $appelfournisseur)
<div class="modal fade" id="Modifier-{{$appelfournisseur->id}}"  tabindex="-1" role="dialog">
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
	
                    <form id="login-form" class="smart-form" action="{{route('backoffice_appel_modifier_fournisseur')}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}                            
                                <fieldset>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Fournisseur</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="hidden" name="id" value="{{$appelfournisseur->id}}">                                                
                                                        <input type="hidden" name="fournisseur_id" value="{{$fournisseurs->id}}">
                                                        <input type="text" name="fournisseur" value="{{$fournisseurs->libelle}}" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Date et heure</label>
                                                <div class="col col-10">
                                                        <label class="input">                                                                    
                                                                <div class="input-group" id="date_heure_m" class="input-append">                                                                    
                                                                        <input type="text" data-format="hh:mm:ss"  class="form-control " id="date_heure_m" name="date_heure" value="{{$appelfournisseur->date_heure}}"  required>
                                                                        <span class="input-group-addon add-on">
                                                                           <i data-time-icon="icon-time">
                                                                            </i>
                                                                          </span>
                                                                </div>
                                                        </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Resumé d'appel</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="resume_appel" value="{{$appelfournisseur->resume_appel}}" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Prochain appel</label>
                                                <div class="col col-10">
                                                        <label class="input">                                                                    
                                                                <div class="input-group" id="prochain_appel_m" class="input-append">                                                                    
                                                                        <input type="text" data-format="hh:mm:ss"  class="form-control " id="prochain_appel_m" name="prochain_appel" value="{{$appelfournisseur->prochain_appel}}"  required>
                                                                        <span class="input-group-addon add-on">
                                                                           <i data-time-icon="icon-time">
                                                                            </i>
                                                                          </span>
                                                                </div>
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

<!-- Modal: visualiser -->
@foreach($appel as $appel_fournisseur)
<div class="modal fade" id="Visualiser-{{$appel_fournisseur->id}}"  tabindex="-1" role="dialog">
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
                                        <label class="label col col-2">Fournisseur</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="hidden" name="id" value="{{$appel_fournisseur->id}}">                                                
                                                <input type="hidden" name="fournisseur_id" value="{{$fournisseurs->id}}">
                                                <input type="text" name="fournisseur" value="{{$fournisseurs->libelle}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Date et heure</label>
                                        <div class="col col-10">
                                                <label class="input">                                                                    
                                                        <div class="input-group" id="date_heure" class="input-append">                                                                    
                                                                <input type="text" data-format="hh:mm:ss"  class="form-control " id="date_heure" name="date_heure" value="{{$appel_fournisseur->date_heure}}"  disabled>
                                                                <span class="input-group-addon">
                                                                   
                                                                  </span>
                                                        </div>
                                                </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Resumé d'appel</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="resume_appel" value="{{$appel_fournisseur->resume_appel}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Prochain appel</label>
                                        <div class="col col-10">
                                                <label class="input">                                                                    
                                                        <div class="input-group" id="date_heure" class="input-append">                                                                    
                                                                <input type="text" data-format="hh:mm:ss"  class="form-control " id="date_heure" name="prochain_appel" value="{{$appel_fournisseur->prochain_appel}}"  disabled>
                                                                <span class="input-group-addon">
                                                                   
                                                                  </span>
                                                        </div>
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
@foreach($appel as $ap)
<div class="modal fade" id="Supprimer-{{$ap->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_appel_supprimer_fournisseur')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>                                            
                                    <input type="hidden" name="id" value="{{$ap->id}}">
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