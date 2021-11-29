@extends('layouts.dashboard')
@section('title')
Documents tracteur
@endsection
@section('breadcrumb')
	<!-- breadcrumb -->
	<ol class="breadcrumb" style="background-color: #333;" >
        <li><a href="">Accueil</a></li>
        <li>Flotte</li>
        <li>Parc</li>
        <li><a href="{{route('backoffice_tracteurs')}}">Tracteurs</a></li>
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
                    <p class="h6">&nbsp;Documents du tracteur: <strong>{{$tracteurs->immatriculation}}</strong></p>
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
                                                <a href="#s4" data-toggle="tab">Extincteur</a>
                                            </li>
                                            <li>
                                                <a href="#s5" data-toggle="tab">Deuxième extincteur</a>
                                            </li>
                                            <li>
                                                <a href="#s6" data-toggle="tab">Carte eurotoll</a>
                                            </li>
                                            <li>
                                                <a href="#s7" data-toggle="tab">Master card</a>
                                            </li>
                                            <li>
                                                <a href="#s8" data-toggle="tab">Tachygraphe</a>
                                            </li>
                                            <li>
                                                <a href="#s9" data-toggle="tab">Visite technique</a>
                                            </li>  
                                            <li>
                                                <a href="#s10" data-toggle="tab">Vignette</a>
                                            </li>      
                                            <li>
                                                <a href="#s11" data-toggle="tab">Autorisation de sortie</a>
                                            </li> 
                                            <li>
                                                <a href="#s12" data-toggle="tab">Assurance internationale</a>
                                            </li> 

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
                                                            @foreach($documentsExtincteur as $docExtincteur)
                                                            <tr>
                                                                <td>{{$docExtincteur->id}}</td>
                                                                <td>{{$docExtincteur->date}}</td>
                                                                <td>{{$docExtincteur->date_expiration}}</td>
                                                                <td>{{$docExtincteur->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docExtincteur->id}}"><i class="fa fa-file"></i></a></td>
                                                                 
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docExtincteur->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docExtincteur->id}}"><i class="fa fa-trash"></i></a>
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
                                                            @foreach($documentsDeuxiemeExtincteur as $docDeuxiemeExtincteur)
                                                            <tr>
                                                                <td>{{$docDeuxiemeExtincteur->id}}</td>
                                                                <td>{{$docDeuxiemeExtincteur->date}}</td>
                                                                <td>{{$docDeuxiemeExtincteur->date_expiration}}</td>
                                                                <td>{{$docDeuxiemeExtincteur->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docDeuxiemeExtincteur->id}}"><i class="fa fa-file"></i></a></td>
                                                                
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docDeuxiemeExtincteur->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docDeuxiemeExtincteur->id}}"><i class="fa fa-trash"></i></a>
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
                                                                @foreach($documentsCarteEurotoll as $docCarteEuro)
                                                                <tr>
                                                                    <td>{{$docCarteEuro->id}}</td>
                                                                    <td>{{$docCarteEuro->date}}</td>
                                                                    <td>{{$docCarteEuro->date_expiration}}</td>
                                                                    <td>{{$docCarteEuro->alerte}}</td>
                                                                    <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docCarteEuro->id}}"><i class="fa fa-file"></i></a></td>
                                                                     
                                                                    <td>
                                                                        <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docCarteEuro->id}}"><i class="fa fa-edit"></i></a>
                                                                        <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docCarteEuro->id}}"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="s7">
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
                                                            @foreach($documentsMasterCard as $docMaster)
                                                            <tr>
                                                                <td>{{$docMaster->id}}</td>
                                                                <td>{{$docMaster->date}}</td>
                                                                <td>{{$docMaster->date_expiration}}</td>
                                                                <td>{{$docMaster->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docMaster->id}}"><i class="fa fa-file"></i></a></td>
                                                                
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docMaster->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docMaster->id}}"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="s8">
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
                                                            @foreach($documentsTachygraphe as $docTachygraphe)
                                                            <tr>
                                                                <td>{{$docTachygraphe->id}}</td>
                                                                <td>{{$docTachygraphe->date}}</td>
                                                                <td>{{$docTachygraphe->date_expiration}}</td>
                                                                <td>{{$docTachygraphe->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docTachygraphe->id}}"><i class="fa fa-file"></i></a></td>
                                                               
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docTachygraphe->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docTachygraphe->id}}"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="s9">
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
                                                            @foreach($documentsVisiteTechnique as $docVisite)
                                                            <tr>
                                                                <td>{{$docVisite->id}}</td>
                                                                <td>{{$docVisite->date}}</td>
                                                                <td>{{$docVisite->date_expiration}}</td>
                                                                <td>{{$docVisite->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docVisite->id}}"><i class="fa fa-file"></i></a></td>
                                                                 
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docVisite->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docVisite->id}}"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="s10">
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
                                                                @foreach($documentsVignette as $docVignette)
                                                                <tr>
                                                                    <td>{{$docVignette->id}}</td>
                                                                    <td>{{$docVignette->date}}</td>
                                                                    <td>{{$docVignette->date_expiration}}</td>
                                                                    <td>{{$docVignette->alerte}}</td>
                                                                    <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docVignette->id}}"><i class="fa fa-file"></i></a></td>
                                                                     
                                                                    <td>
                                                                        <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docVignette->id}}"><i class="fa fa-edit"></i></a>
                                                                        <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docVignette->id}}"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
    
                                                    </div>
                                            </div>
                                            <div class="tab-pane fade" id="s11">
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
                                                                @foreach($documentsAutorisationSortie as $docAutoSortie)
                                                                <tr>
                                                                    <td>{{$docAutoSortie->id}}</td>
                                                                    <td>{{$docAutoSortie->date}}</td>
                                                                    <td>{{$docdocAutoSortieVignette->date_expiration}}</td>
                                                                    <td>{{$docAutoSortie->alerte}}</td>
                                                                    <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docAutoSortie->id}}"><i class="fa fa-file"></i></a></td>
                                                                     
                                                                    <td>
                                                                        <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docAutoSortie->id}}"><i class="fa fa-edit"></i></a>
                                                                        <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docAutoSortie->id}}"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
    
                                                    </div>
                                            </div>
                                            <div class="tab-pane fade" id="s12">
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
                                                                @foreach($documentsAssuranceInternationale as $docAssuranceInter)
                                                                <tr>
                                                                    <td>{{$docAssuranceInter->id}}</td>
                                                                    <td>{{$docAssuranceInter->date}}</td>
                                                                    <td>{{$docAssuranceInter->date_expiration}}</td>
                                                                    <td>{{$docAssuranceInter->alerte}}</td>
                                                                    <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docAssuranceInter->id}}"><i class="fa fa-file"></i></a></td>
                                                                     
                                                                    <td>
                                                                        <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docAssuranceInter->id}}"><i class="fa fa-edit"></i></a>
                                                                        <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docAssuranceInter->id}}"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
    
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
                    Ajouter un nouveau document au tracteur: <strong>{{$tracteurs->immatriculation}}</strong>
                </h4>
            </div>
            <div class="modal-body no-padding">            

                <form id="login-form" class="smart-form" action="{{route('backoffice_documents_tracteur_ajouter',$tracteurs->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                            <fieldset>
                                <input type="hidden" name="tracteur_id" value="{{$tracteurs->id}}">
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
                                                        <option value="Extincteur">Extincteur</option>
                                                        <option value="Deuxieme extincteur">Deuxieme extincteur</option>
                                                        <option value="Carte eurotoll">Carte eurotoll</option>
                                                        <option value="Master card">Master card</option>
                                                        <option value="Tachygraphe">Tachygraphe</option>
                                                        <option value="Visite technique">Visite technique</option>
                                                        <option value="Vignette">Vignette</option>
                                                        <option value="Autorisation de sortie">Autorisation de sortie</option>
                                                        <option value="Assurance internationale">Assurance internationale</option>
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
                                                    @if($tracteurs->prestataire_id == null)
                                                   <input type="text" value="{{$tracteurs->prestataire}}" disabled>
                                                   @else
                                                   <input type="text" value="{{$tracteurs->prestatair->raison_sociale}}" disabled>
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
                                     <embed src="/documents_tracteur/{{$d->fichier}}" frameborder="0" width="100%" height="500px">         
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_documents_tracteur_supprimer')}}" method="POST">
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
                        Modifier document <strong>{{$docs->document}}</strong> ID N°<strong>{{$docs->id}}</strong> du tracteur: <strong>{{$tracteurs->immatriculation}}</strong>
                    </h4>
                </div>
                <div class="modal-body no-padding">         
    
                    <form id="login-form" class="smart-form" action="{{route('backoffice_documents_tracteur_modifier',$tracteurs->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                                <fieldset>
                                        <input type="hidden" name="tracteur_id" value="{{$tracteurs->id}}">
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
                                                            <option value="Extincteur">Extincteur</option>
                                                            <option value="Deuxieme extincteur">Deuxieme extincteur</option>
                                                            <option value="Carte eurotoll">Carte eurotoll</option>
                                                            <option value="Master card">Master card</option>
                                                            <option value="Tachygraphe">Tachygraphe</option>
                                                            <option value="Visite technique">Visite technique</option>
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
                                                                @if($tracteurs->prestataire_id == null)
                                                               <input type="text" value="{{$tracteurs->prestataire}}" disabled>
                                                               @else
                                                               <input type="text" value="{{$tracteurs->prestatair->raison_sociale}}" disabled>
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