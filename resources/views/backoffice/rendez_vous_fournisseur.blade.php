@extends('layouts.dashboard')
@section('title')
Liste des rendez-vous
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
                                <p class="h6">&nbsp;Liste des rendez-vous</p>
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
                                                <th>Date et heure</th>
                                                <th>Description</th>
                                                <th>Actions</th>                                               
                                        </thead>
                                                                              
                                        <tbody>
                                                @foreach($rendezvous as $rdv)
                                                <tr>
                                                    <td>{{$rdv->fournisseu->libelle}}</td>  
                                                    <td>{{$rdv->date_heure}}</td> 
                                                    <td>{{$rdv->description}}</td>                                              
                                                    <td>
                                                    @permission('Modifier') 
                                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#Modifier-{{$rdv->id}}"><i class="fa fa-edit"></i></button>
                                                    @endpermission
                                                    @permission('Supprimer') 
                                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$rdv->id}}"> <i class="fa fa-trash"></i></button>
                                                    @endpermission
                                                        <button class="btn btn-default" data-toggle="modal" data-target="#Visualiser-{{$rdv->id}}" > <i class="fa fa-eye"></i></button>
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
	
            <form class="smart-form" id="login-form" files="true" action="{{route('backoffice_rendez_vous_ajouter_fournisseur')}}" method="POST" >
                {{csrf_field()}}
                <fieldset>
                    <div class="row">
                        <section class="col col-6">
                            <label  class="label">
                                            Fournisseur
                            </label>
                            <label class="input">
                               <input type="hidden" name="fournisseur_id" value="{{$fournisseurs->id}}">
                                <input type="text"  class="form-control" name="fournisseur" value="{{$fournisseurs->libelle}}"  disabled>
                            </label>
                            
                        </section>
                        <section class="col col-6">
                                <label class="label">
                                            Date et heure
                                </label>
                                <label class="input">                                                                    
                                        <div class="input-group" id="date_heure_m" class="input-append">                                                                    
                                                <input type="text" data-format="hh:mm:ss"  class="form-control" id="date_heure_m" name="date_heure" value=""  required>
                                                <span class="input-group-addon add-on">
                                                   <i data-time-icon="icon-time">
                                                    </i>
                                                  </span>
                                        </div>
                                </label>
                        </section>
                 
                        <section class="col col-6">
                                            <label class="label">
                                            Description
                                            </label>
                                            <div class="input" >                                                                    
                                                    <input type="text"  class="form-control" name="description"  value="" required>
                                            </div>
                        </section>
                    </div>
                 
                </fieldset>
        <footer>
                <button type="submit" class="btn btn-red">
                    Valider
                </button>
                <button type="button" class="btn btn-default" onclick="window.history.back();">
                    Retour
                </button>
            </footer>
        </form>					
                        

            </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal: modifier -->
@foreach($rendezvous as $rendezvousfournisseur)
<div class="modal fade" id="Modifier-{{$rendezvousfournisseur->id}}"  tabindex="-1" role="dialog">
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
	
            <form class="smart-form" id="login-form" files="true" action="{{route('backoffice_rendez_vous_modifier_fournisseur')}}" method="POST" >
                {{csrf_field()}}
                {{method_field('PATCH')}}
                
                <fieldset>
                    <div class="row">                               
                        <section class="col col-6">
                            <label  class="label">
                                            Fournisseur
                            </label>
                            <label class="input">
                                <input type="hidden" name="id" value="{{$rendezvousfournisseur->id}}">
                               <input type="hidden" name="fournisseur_id" value="{{$fournisseurs->id}}">
                                <input type="text"  class="form-control" name="fournisseur" value="{{$fournisseurs->libelle}}"  disabled>
                            </label>
                            
                        </section>
                        <section class="col col-6">
                                <label class="label">
                                            Date et heure
                                </label>
                                <label class="input">                                                                    
                                        <div class="input-group" id="date_heure" class="input-append">                                                                    
                                                <input type="text" data-format="hh:mm:ss"  class="form-control" id="date_heure" name="date_heure" value="{{$rendezvousfournisseur->date_heure}}"  required>
                                                <span class="input-group-addon add-on">
                                                   <i data-time-icon="icon-time">
                                                    </i>
                                                  </span>
                                        </div>
                                </label>
                        </section>
                    
                        <section class="col col-6">
                            <label class="label">
                                     Description
                            </label>
                            <label class="input">                                                                    
                                    <input type="text"  class="form-control" name="description" value="{{$rendezvousfournisseur->description}}" required>
                               
                            </label>
                        </section>
                    </div>                                 
                </fieldset>

                                                       
            


        <footer>
                <button type="submit" class="btn btn-red">
                    Valider
                </button>
                <button type="button" class="btn btn-default" onclick="window.history.back();">
                    Retour
                </button>
            </footer>
        </form>					
                        

            </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach

<!-- Modal: visualiser -->
@foreach($rendezvous as $rendezvous_fournisseur)
<div class="modal fade" id="Visualiser-{{$rendezvous_fournisseur->id}}"  tabindex="-1" role="dialog">
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
	
            <form class="smart-form" id="login-form" files="true" action="" method="POST" >
                {{csrf_field()}}
                {{method_field('PATCH')}}
                
                <fieldset>
                    <div class="row">
                               
                        <section class="col col-6">
                            <label  class="label">
                                            Fournisseur
                            </label>
                            <label class="input">
                                <input type="hidden" name="id" value="{{$rendezvous_fournisseur->id}}">
                               <input type="hidden" name="fournisseur_id" value="{{$fournisseurs->id}}">
                                <input type="text"  class="form-control" name="fournisseur" value="{{$fournisseurs->libelle}}"  disabled>
                            </label>
                            
                        </section>
                        <section class="col col-6">
                                <label class="label">
                                            Date et heure
                                </label>
                                <label class="input">                                                                    
                                        <input type="text"  class="form-control" name="date_heure"  value="{{$rendezvous_fournisseur->date_heure}}" disabled>
                                   
                                </label>
                        </section>
                
                        <section class="col col-6">
                            <label class="label">
                                     Description
                            </label>
                            <label class="input">                                                                    
                                    <input type="text"  class="form-control" name="description" value="{{$rendezvous_fournisseur->description}}" disabled>
                               
                            </label>
                        </section>
                    </div>
                  
                                 
                </fieldset>

        </form>					
                        

            </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach

<!-- Modal: Supprimer -->
@foreach($rendezvous as $rendez_vous)
<div class="modal fade" id="Supprimer-{{$rendez_vous->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_rendez_vous_supprimer_fournisseur')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>                                            
                                    <input type="hidden" name="id" value="{{$rendez_vous->id}}">
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