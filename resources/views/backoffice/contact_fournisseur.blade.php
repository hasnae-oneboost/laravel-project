@extends('layouts.dashboard')
@section('title')
Liste contacts
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
                                <p class="h6">&nbsp;Listes contacts</p>
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
                                                <th>Nom</th>
                                                <th>Poste</th>
                                                <th>Telephone</th>
                                                <th>E-mail</th>
                                                <th>Commentaire</th>
                                                <th>Actions</th>                                               
                                        </thead>
                                                                              
                                        <tbody>
                                                @foreach($contacts as $contact)
                                                <tr>
                                                    <td>{{$contact->fournisseu->libelle}}</td>  
                                                    <td>{{$contact->nom}}</td> 
                                                    <td>{{$contact->poste}}</td>
                                                    <td>{{$contact->telephone}}</td>
                                                    <td>{{$contact->email}}</td>  
                                                    <td>{{$contact->commentaire}}</td>                                                 
                                                    <td>
                                                    @permission('Modifier') 
                                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#Modifier-{{$contact->id}}"><i class="fa fa-edit"></i></button>
                                                    @endpermission
                                                    @permission('Supprimer') 
                                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$contact->id}}"> <i class="fa fa-trash"></i></button>
                                                    @endpermission
                                                        <button class="btn btn-default" data-toggle="modal" data-target="#Visualiser-{{$contact->id}}" > <i class="fa fa-eye"></i></button>
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
	
            <form class="smart-form" id="login-form" files="true" action="{{route('backoffice_contact_ajouter_fournisseur')}}" method="POST" >
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
                                            Nom
                                </label>
                                <label class="input">                                                                    
                                        <input type="text"  class="form-control" name="nom"  value="" required>
                                   
                                </label>
                        </section>
                        <section class="col col-6">
                                <label class="label">
                                            Poste
                                </label>
                                <label class="input">                                                                    
                                        <input type="text"  class="form-control" name="poste"  value="" required>
                                   
                                </label>
                        </section>
                        <section class="col col-6">
                                            <label class="label">
                                            Telephone
                                            </label>
                                            <div class="input" >                                                                    
                                                    <input type="text"  class="form-control" name="telephone"  value="" required>
                                            </div>
                        </section>
                        <section class="col col-6">
                            <label class="label">
                                     E-mail
                            </label>
                            <label class="input">                                                                    
                                    <input type="text"  class="form-control" name="email" value="" required>
                               
                            </label>
                        </section>
                        <section class="col col-6">
                            <label class="label">
                                        Commentaire
                            </label>
                            <label class="input">                                                                    
                                    <input type="text"  class="form-control" name="commentaire"  value="" required>
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

<!-- Modal: modifier -->
@foreach($contacts as $contactsfournisseurs)
<div class="modal fade" id="Modifier-{{$contactsfournisseurs->id}}"  tabindex="-1" role="dialog">
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
	
            <form class="smart-form" id="login-form" files="true" action="{{route('backoffice_contact_modifier_fournisseur')}}" method="POST" >
                {{csrf_field()}}
                {{method_field('PATCH')}}
                
                <fieldset>
                    <div class="row">
                               
                        <section class="col col-6">
                            <label  class="label">
                                            Fournisseur
                            </label>
                            <label class="input">
                                <input type="hidden" name="id" value="{{$contactsfournisseurs->id}}">
                               <input type="hidden" name="fournisseur_id" value="{{$fournisseurs->id}}">
                                <input type="text"  class="form-control" name="fournisseur" value="{{$fournisseurs->libelle}}"  disabled>
                            </label>
                            
                        </section>
                        <section class="col col-6">
                                <label class="label">
                                            Nom
                                </label>
                                <label class="input">                                                                    
                                        <input type="text"  class="form-control" name="nom"  value="{{$contactsfournisseurs->nom}}" required>
                                   
                                </label>
                        </section>
                        <section class="col col-6">
                                            <label class="label">
                                            Poste
                                            </label>
                                            <label class="input">                                                                    
                                                    <input type="text"  class="form-control" name="poste"  value="{{$contactsfournisseurs->poste}}" required>
                                               
                                            </label>
                        </section>
                        <section class="col col-6">
                            <label class="label">
                                     Telephone
                            </label>
                            <label class="input">                                                                    
                                    <input type="text"  class="form-control" name="telephone" value="{{$contactsfournisseurs->telephone}}" required>
                               
                            </label>
                        </section>
                    </div>
                    <div class="row">
                        <section class="col col-6">
                            <label class="label">
                                        E-mail
                            </label>
                            <label class="input">                                                                    
                                    <input type="text"  class="form-control" name="email"  value="{{$contactsfournisseurs->email}}" required>
                            </label>
                        </section>
                        <section class="col col-6">
                                <label class="label">
                                            Commentaire
                                </label>
                                <label class="input">                                                                    
                                        <input type="text"  class="form-control" name="commentaire"  value="{{$contactsfournisseurs->commentaire}}" required>
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
@foreach($contacts as $contacts_fournisseurs)
<div class="modal fade" id="Visualiser-{{$contacts_fournisseurs->id}}"  tabindex="-1" role="dialog">
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
                                <input type="hidden" name="id" value="{{$contacts_fournisseurs->id}}">
                               <input type="hidden" name="fournisseur_id" value="{{$fournisseurs->id}}">
                                <input type="text"  class="form-control" name="fournisseur" value="{{$fournisseurs->libelle}}"  disabled>
                            </label>
                            
                        </section>
                        <section class="col col-6">
                                <label class="label">
                                            Nom
                                </label>
                                <label class="input">                                                                    
                                        <input type="text"  class="form-control" name="nom"  value="{{$contacts_fournisseurs->nom}}" disabled>
                                   
                                </label>
                        </section>
                        <section class="col col-6">
                                            <label class="label">
                                            Poste
                                            </label>
                                            <label class="input">                                                                    
                                                    <input type="text"  class="form-control" name="poste"  value="{{$contacts_fournisseurs->poste}}" disabled>
                                               
                                            </label>
                        </section>
                        <section class="col col-6">
                            <label class="label">
                                     Telephone
                            </label>
                            <label class="input">                                                                    
                                    <input type="text"  class="form-control" name="telephone" value="{{$contacts_fournisseurs->telephone}}" disabled>
                               
                            </label>
                        </section>
                    </div>
                    <div class="row">
                        <section class="col col-6">
                            <label class="label">
                                        Commentaire
                            </label>
                            <label class="input">                                                                    
                                    <input type="text"  class="form-control" name="commentaire"  value="{{$contacts_fournisseurs->commentaire}}" disabled>
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
@foreach($contacts as $ap)
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_contact_supprimer_fournisseur')}}" method="POST">
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