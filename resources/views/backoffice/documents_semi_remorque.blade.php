@extends('layouts.dashboard')
@section('title')
Documents Semi-remorque
@endsection
@section('breadcrumb')
	<!-- breadcrumb -->
	<ol class="breadcrumb" style="background-color: #333;" >
        <li><a href="">Accueil</a></li>
        <li>Flotte</li>
        <li>Parc</li>
        <li><a href="{{route('backoffice_semi_remorques')}}">Semi-remorques</a></li>
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
                        <span class="widget-icon"> <i class="fa fa-file">&nbsp;</i> </span>
                    <p class="h6">&nbsp;Documents du semi-remorque: <strong>{{$semiremorques->immatriculation}}</strong></p>
                    </header>
                   
						<!-- widget div-->
						<div>				
							<!-- widget content -->
							<div class="widget-body">								 
										<ul id="myTab1" class="nav nav-tabs">
											<li class="active">
												<a href="#s1" data-toggle="tab">Assurance</a>
											</li>
											<li>
												<a href="#s2" data-toggle="tab">Autorisation de marchandise</a>
                                            </li>
                                            <li>
                                                <a href="#s3" data-toggle="tab">Carte grise</a>
                                               
                                            </li>
                                            <li>
                                                <a href="#s4" data-toggle="tab">Visite technique</a>
                                            </li> 
                                            @if($semiremorques->type->libelle == 'Frigo')                                                       
                                            <li>
                                                <a href="#s5" data-toggle="tab">ATP</a>
                                            </li>      
                                            <li>
                                                <a href="#s5" data-toggle="tab">Thermographe</a>
                                            </li> 
                                           @endif

										</ul>				
										<div id="myTabContent1" class="tab-content padding-10">
											<div class="tab-pane fade in active" id="s1">
												<div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Date</th>
                                                                <th>Date d'expiration</th>
                                                                <th>Alerte</th>
                                                                <th>Fichier</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($documentsAssurance as $documentassurance)
                                                            <tr>
                                                                <td style="">{{$documentassurance->id}}</td>
                                                                <td>{{$documentassurance->date}}</td>
                                                                <td>{{$documentassurance->date_expiration}}</td>
                                                                <td>{{$documentassurance->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$documentassurance->id}}"><i class="fa fa-file"></i></a></td>
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$documentassurance->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$documentassurance->id}}"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
											</div>
											<div class="tab-pane fade" id="s2">
												<div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Date</th>
                                                                <th>Date d'expiration</th>
                                                                <th>Alerte</th>
                                                                <th>Fichier</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($documentsAutorisationMarchandise as $documentsAutorisation)
                                                            <tr>
                                                                <td>{{$documentsAutorisation->id}}</td>
                                                                <td>{{$documentsAutorisation->date}}</td>
                                                                <td>{{$documentsAutorisation->date_expiration}}</td>
                                                                <td>{{$documentsAutorisation->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$documentsAutorisation->id}}"><i class="fa fa-file"></i></a></td>
                                                                
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$documentsAutorisation->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$documentsAutorisation->id}}"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
											</div>
											<div class="tab-pane fade" id="s3">
												<div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Date</th>
                                                                <th>Date d'expiration</th>
                                                                <th>Alerte</th>
                                                                <th>Fichier</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($documentsCarteGrise as $documentCarte)
                                                            <tr>
                                                                <td>{{$documentCarte->id}}</td>
                                                                <td>{{$documentCarte->date}}</td>
                                                                <td>{{$documentCarte->date_expiration}}</td>
                                                                <td>{{$documentCarte->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$documentCarte->id}}"><i class="fa fa-file"></i></a></td>
                                                                 
                                                                <td>
                                                                        <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$documentCarte->id}}"><i class="fa fa-edit"></i></a>
                                                                        <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$documentCarte->id}}"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
											</div>
											<div class="tab-pane fade" id="s4">
												<div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Date</th>
                                                                <th>Date d'expiration</th>
                                                                <th>Alerte</th>
                                                                <th>Fichier</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($documentsVisiteTechnique as $docVisiteTech)
                                                            <tr>
                                                                <td>{{$docVisiteTech->id}}</td>
                                                                <td>{{$docVisiteTech->date}}</td>
                                                                <td>{{$docVisiteTech->date_expiration}}</td>
                                                                <td>{{$docVisiteTech->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docVisiteTech->id}}"><i class="fa fa-file"></i></a></td>
                                                                 
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docVisiteTech->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docVisiteTech->id}}"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="s5">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Date</th>
                                                                <th>Date d'expiration</th>
                                                                <th>Alerte</th>
                                                                <th>Fichier</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($documentsATP as $docATP)
                                                            <tr>
                                                                <td>{{$docATP->id}}</td>
                                                                <td>{{$docATP->date}}</td>
                                                                <td>{{$docATP->date_expiration}}</td>
                                                                <td>{{$docATP->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docATP->id}}"><i class="fa fa-file"></i></a></td>
                                                                
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docATP->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docATP->id}}"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="s6">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Date</th>
                                                                <th>Date d'expiration</th>
                                                                <th>Alerte</th>
                                                                <th>Fichier</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                @foreach($documentsThermographe as $docThermographe)
                                                                <tr>
                                                                    <td>{{$docThermographe->id}}</td>
                                                                    <td>{{$docThermographe->date}}</td>
                                                                    <td>{{$docThermographe->date_expiration}}</td>
                                                                    <td>{{$docThermographe->alerte}}</td>
                                                                    <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docThermographe->id}}"><i class="fa fa-file"></i></a></td>
                                                                     
                                                                    <td>
                                                                        <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docThermographe->id}}"><i class="fa fa-edit"></i></a>
                                                                        <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docThermographe->id}}"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                          
                                        
                                            
                                            </div>
										</div>				
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
                    Ajouter un nouveau document au semi-remorque: <strong>{{$semiremorques->immatriculation}}</strong>
                </h4>
            </div>
            <div class="modal-body no-padding">            

                <form id="login-form" class="smart-form" action="{{route('backoffice_documents_semi_remorque_ajouter',$semiremorques->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                            <fieldset>
                                <input type="hidden" name="semiremorque_id" value="{{$semiremorques->id}}">
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Document</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <select name="document">
                                                        <option value=""></option>
                                                        <option value="Assurance">Assurance</option>
                                                        <option value="Autorisation de marchandise">Autorisation de marchandise</option>
                                                        <option value="Carte grise">Carte grise</option>                                                       
                                                        <option value="Visite technique">Visite technique</option>
                                                        @if($semiremorques->type->libelle == 'Frigo')                                                       
                                                        <option value="ATP">ATP</option>
                                                        <option value="Thermographe">Thermographe</option>
                                                       @endif
                                                        
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Date</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="text" name="date" id="date" required>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Date d'expiration</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="text" name="date_expiration" id="date" required>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Fichier</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="file" name="fichier" required>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Prestataire</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    @if($semiremorques->prestataire_id == null)
                                                   <input type="text" value="{{$semiremorques->prestataire}}" disabled>
                                                   @else
                                                   <input type="text" value="{{$semiremorques->prestatair->raison_sociale}}" disabled>
                                                   @endif
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


<!-- Modal: file -->
@foreach($documents as $d)
<div class="modal fade" id="file-{{$d->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <div class="modal-body no-padding">
                    <form id="login-form" class="smart-form" action="" method="POST">
                        {{csrf_field()}}
                                <fieldset>                                                                 
                                     <embed src="/documents_semi_remorque/{{$d->fichier}}" frameborder="0" width="100%" height="500px">         
                                </fieldset>                                      
                    </form>	
                </div>
    
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach
<!-- Modal: Supprimer -->
@foreach($documents as $doc)
<div class="modal fade" id="supprimer-{{$doc->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_documents_semi_remorque_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>                                            
                                    <input type="hidden" name="id" value="{{$doc->id}}">
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

@foreach($documents as $docs)
<!-- Modal: Modifier -->
<div class="modal fade" id="modifier-{{$docs->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">
                        Modifier document <strong>{{$docs->document}}</strong> ID N°<strong>{{$docs->id}}</strong> du semi-remorque: <strong>{{$semiremorques->immatriculation}}</strong>
                    </h4>
                </div>
                <div class="modal-body no-padding">         
    
                    <form id="login-form" class="smart-form" action="{{route('backoffice_documents_semi_remorque_modifier',$semiremorques->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                                <fieldset>
                                        <input type="hidden" name="semiremorque_id" value="{{$semiremorques->id}}">
                                        <input type="hidden" name="id" value="{{$docs->id}}">
                                 
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Document</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <select name="document">
                                                            <option value="{{$docs->document}}">{{$docs->document}}</option>
                                                            <option value="Assurance">Assurance</option>
                                                            <option value="Autorisation de marchandise">Autorisation de marchandise</option>
                                                            <option value="Carte grise">Carte grise</option>                                                       
                                                            <option value="Visite technique">Visite technique</option>
                                                            @if($semiremorques->type->libelle == 'Frigo')                                                       
                                                            <option value="ATP">ATP</option>
                                                            <option value="Thermographe">Thermographe</option>
                                                            @endif
                                                        </select>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Date</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="date" id="date" value="{{$docs->date}}" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Date d'expiration</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="date_expiration" id="date" value="{{$docs->date_expiration}}" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Fichier</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="file" name="fichier" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2">Prestataire</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                        <label class="input">
                                                                @if($semiremorques->prestataire_id == null)
                                                               <input type="text" value="{{$semiremorques->prestataire}}" disabled>
                                                               @else
                                                               <input type="text" value="{{$semiremorques->prestatair->raison_sociale}}" disabled>
                                                               @endif
                                                        </label>
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

@endsection