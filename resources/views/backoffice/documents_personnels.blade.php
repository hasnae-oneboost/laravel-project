@extends('layouts.dashboard')
@section('title')
Documents Personnels
@endsection
@section('breadcrumb')
	<!-- breadcrumb -->
	<ol class="breadcrumb" style="background-color: #333;" >
        <li><a href="">Accueil</a></li>
        <li>Ressources humaines</li>
        <li><a href="{{route('backoffice_personnels')}}">Personnels</a></li>
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
                    <p class="h6">&nbsp;Documents du personnel: <strong>{{$personnels->matricule}}</strong></p>
                    </header>
						<!-- widget div-->
						<div>				
							<!-- widget content -->
							<div class="widget-body">								 
										<ul id="myTab1" class="nav nav-tabs">
                                             @if($documentsAssurancedevoyage->isNotempty())                                                                                              
											<li class="active">
												<a href="#s1" data-toggle="tab">Assurance de voyage</a>
                                            </li>
                                            @endif
                                            @if($documentsCIN->isNotempty())                                                                                                                                          
											<li>
												<a href="#s2" data-toggle="tab">CIN</a>
                                            </li>
                                            @endif
                                            @if($documentsCartesejour->isNotempty())    
                                            <li>
                                                <a href="#s3" data-toggle="tab">Carte de séjour Mouritanie</a>
                                               
                                            </li>
                                            @endif
                                            @if($documentsCarteprofessionnelle->isNotempty())    
                                            <li>
                                                <a href="#s4" data-toggle="tab">Carte professionnelle</a>
                                            </li>
                                            @endif 
                                            @if($documentsCDI->isNotempty())                                                  
                                            <li>
                                                <a href="#s5" data-toggle="tab">CDI</a>
                                            </li>
                                            @endif
                                            @if($documentsCDD->isNotempty())    
                                            <li>
                                                <a href="#s6" data-toggle="tab">CDD</a>
                                            </li>
                                            @endif
                                            @if($documentsPasseport->isNotempty())     
                                            <li>
                                                <a href="#s7" data-toggle="tab">Passeport</a>
                                            </li>
                                            @endif
                                            @if($documentsPermis->isNotempty())     
                                            <li>
                                                <a href="#s8" data-toggle="tab">Permis de conduire</a>
                                            </li>
                                            @endif
                                            @if($documentsVisaRU->isNotempty())     
                                            <li>
                                                <a href="#s9" data-toggle="tab">Visa Royaume Uni</a>
                                            </li>
                                            @endif
                                            @if($documentsVisaEs->isNotempty())    
                                            <li>
                                                <a href="#s10" data-toggle="tab">Visa schengen Espagne</a>
                                            </li> 
                                            @endif
                                            @if($documentsVisaFr->isNotempty())    
                                            <li>
                                                <a href="#s11" data-toggle="tab">Visa schengen France</a>
                                            </li>
                                            @endif
                                            @if($documentsVisaPB->isNotempty())    
                                            <li>
                                                <a href="#s12" data-toggle="tab">Visa schengen Pays-bas</a>
                                            </li>
                                            @endif
                                            @if($documentsVisiteMedicale->isNotempty())    
                                            <li>
                                                <a href="#s13" data-toggle="tab">Visite médicale</a>
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
                                                            @foreach($documentsAssurancedevoyage as $documentassurance)
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
                                                            @foreach($documentsCIN as $docCIN)
                                                            <tr>
                                                                <td>{{$docCIN->id}}</td>
                                                                <td>{{$docCIN->date}}</td>
                                                                <td>{{$docCIN->date_expiration}}</td>
                                                                <td>{{$docCIN->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docCIN->id}}"><i class="fa fa-file"></i></a></td>
                                                                
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docCIN->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docCIN->id}}"><i class="fa fa-trash"></i></a>
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
                                                            @foreach($documentsCartesejour as $docCarte)
                                                            <tr>
                                                                <td>{{$docCarte->id}}</td>
                                                                <td>{{$docCarte->date}}</td>
                                                                <td>{{$docCarte->date_expiration}}</td>
                                                                <td>{{$docCarte->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docCarte->id}}"><i class="fa fa-file"></i></a></td>
                                                                 
                                                                <td>
                                                                        <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docCarte->id}}"><i class="fa fa-edit"></i></a>
                                                                        <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docCarte->id}}"><i class="fa fa-trash"></i></a>
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
                                                            @foreach($documentsCarteprofessionnelle as $docCartePro)
                                                            <tr>
                                                                <td>{{$docCartePro->id}}</td>
                                                                <td>{{$docCartePro->date}}</td>
                                                                <td>{{$docCartePro->date_expiration}}</td>
                                                                <td>{{$docCartePro->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docCartePro->id}}"><i class="fa fa-file"></i></a></td>
                                                                 
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docCartePro->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docCartePro->id}}"><i class="fa fa-trash"></i></a>
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
                                                            @foreach($documentsCDI as $docCDI)
                                                            <tr>
                                                                <td>{{$docCDI->id}}</td>
                                                                <td>{{$docCDI->date}}</td>
                                                                <td>{{$docCDI->date_expiration}}</td>
                                                                <td>{{$docCDI->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docCDI->id}}"><i class="fa fa-file"></i></a></td>
                                                                
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docCDI->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docCDI->id}}"><i class="fa fa-trash"></i></a>
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
                                                                <th>Alerte</th>
                                                                <th>Fichier</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                @foreach($documentsCDD as $docCDD)
                                                                <tr>
                                                                    <td>{{$docCDD->id}}</td>
                                                                    <td>{{$docCDD->date}}</td>
                                                                    <td>{{$docCDD->alerte}}</td>
                                                                    <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docCDD->id}}"><i class="fa fa-file"></i></a></td>
                                                                     
                                                                    <td>
                                                                        <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docCDD->id}}"><i class="fa fa-edit"></i></a>
                                                                        <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docCDD->id}}"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                          <!--/************************/-->
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
                                                        @foreach($documentsPasseport as $docPassport)
                                                        <tr>
                                                            <td style="">{{$docPassport->id}}</td>
                                                            <td>{{$docPassport->date}}</td>
                                                            <td>{{$docPassport->date_expiration}}</td>
                                                            <td>{{$docPassport->alerte}}</td>
                                                            <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docPassport->id}}"><i class="fa fa-file"></i></a></td>
                                                            <td>
                                                                <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docPassport->id}}"><i class="fa fa-edit"></i></a>
                                                                <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docPassport->id}}"><i class="fa fa-trash"></i></a>
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
                                                            @foreach($documentsPermis as $docPermis)
                                                            <tr>
                                                                <td>{{$docPermis->id}}</td>
                                                                <td>{{$docPermis->date}}</td>
                                                                <td>{{$docPermis->date_expiration}}</td>
                                                                <td>{{$docPermis->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docPermis->id}}"><i class="fa fa-file"></i></a></td>
                                                                
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docPermis->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docPermis->id}}"><i class="fa fa-trash"></i></a>
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
                                                            @foreach($documentsVisaRU as $docVisaRU)
                                                            <tr>
                                                                <td>{{$docVisaRU->id}}</td>
                                                                <td>{{$docVisaRU->date}}</td>
                                                                <td>{{$docVisaRU->date_expiration}}</td>
                                                                <td>{{$docVisaRU->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docVisaRU->id}}"><i class="fa fa-file"></i></a></td>
                                                                
                                                                <td>
                                                                        <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docVisaRU->id}}"><i class="fa fa-edit"></i></a>
                                                                        <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docVisaRU->id}}"><i class="fa fa-trash"></i></a>
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
                                                            @foreach($documentsVisaEs as $docViseEs)
                                                            <tr>
                                                                <td>{{$docViseEs->id}}</td>
                                                                <td>{{$docViseEs->date}}</td>
                                                                <td>{{$docViseEs->date_expiration}}</td>
                                                                <td>{{$docViseEs->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docViseEs->id}}"><i class="fa fa-file"></i></a></td>
                                                                
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docViseEs->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docViseEs->id}}"><i class="fa fa-trash"></i></a>
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
                                                            @foreach($documentsVisaFr as $docVisaFr)
                                                            <tr>
                                                                <td>{{$docVisaFr->id}}</td>
                                                                <td>{{$docVisaFr->date}}</td>
                                                                <td>{{$docVisaFr->date_expiration}}</td>
                                                                <td>{{$docVisaFr->alerte}}</td>
                                                                <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docVisaFr->id}}"><i class="fa fa-file"></i></a></td>
                                                                
                                                                <td>
                                                                    <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docVisaFr->id}}"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docVisaFr->id}}"><i class="fa fa-trash"></i></a>
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
                                                                @foreach($documentsVisaPB as $docVisaPB)
                                                                <tr>
                                                                    <td>{{$docVisaPB->id}}</td>
                                                                    <td>{{$docVisaPB->date}}</td>
                                                                    <td>{{$docVisaPB->date_expiration}}</td>
                                                                    <td>{{$docVisaPB->alerte}}</td>
                                                                    <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docVisaPB->id}}"><i class="fa fa-file"></i></a></td>
                                                                    
                                                                    <td>
                                                                        <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docVisaPB->id}}"><i class="fa fa-edit"></i></a>
                                                                        <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docVisaPB->id}}"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="s13">
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
                                                                @foreach($documentsVisiteMedicale as $docViMedi)
                                                                <tr>
                                                                    <td>{{$docViMedi->id}}</td>
                                                                    <td>{{$docViMedi->date}}</td>
                                                                    <td>{{$docViMedi->date_expiration}}</td>
                                                                    <td>{{$docViMedi->alerte}}</td>
                                                                    <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$docViMedi->id}}"><i class="fa fa-file"></i></a></td>
                                                                    
                                                                    <td>
                                                                        <a class="btn btn-default" data-toggle="modal" data-target="#modifier-{{$docViMedi->id}}"><i class="fa fa-edit"></i></a>
                                                                        <a class="btn btn-red" data-toggle="modal" data-target="#supprimer-{{$docViMedi->id}}"><i class="fa fa-trash"></i></a>
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
                    Ajouter un nouveau document au personnel: <strong>{{$personnels->matricule}}</strong>
                </h4>
            </div>
            <div class="modal-body no-padding">            

                <form id="login-form" class="smart-form" action="{{route('backoffice_documents_personnels_ajouter',$personnels->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                            <fieldset>
                                <input type="hidden" name="personnel_id" value="{{$personnels->id}}">
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Document</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <select name="document" id="document">
                                                        <option value=""></option>
                                                        <option value="Assurance de voyage">Assurance de voyage</option>
                                                        <option value="CIN">CIN</option>
                                                        <option value="Carte de séjour Mouritanie">Carte de séjour Mouritanie</option>                                                       
                                                        <option value="Carte professionnelle">Carte professionnelle</option>
                                                        <option value="CDI">CDI</option>
                                                        <option value="CDD">CDD</option>
                                                        <option value="Passeport">Passeport</option>
                                                        <option value="Permis de conduire">Permis de conduire</option>
                                                        <option value="Visa Royaume Uni">Visa Royaume Uni</option>
                                                        <option value="Visa schenegen Espagne">Visa schenegen Espagne</option>
                                                        <option value="Visa schengen France">Visa schengen France</option>
                                                        <option value="Vise schengen Pays-Bas">Vise schengen Pays-Bas</option>
                                                        <option value="Visite médicale">Visite médicale</option>
                                                                                                        
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
                                        <div class="row" name="date_expir" id="date_expir">
                                            <label class="label col col-2">Date d'expiration</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="text" name="date_expiration" id="date">
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
                                     <embed src="/documents_personnels/{{$d->fichier}}" frameborder="0" width="100%" height="500px">         
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_documents_personnels_supprimer')}}" method="POST">
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
                        Modifier document <strong>{{$docs->document}}</strong> ID N°<strong>{{$docs->id}}</strong> du personnel: <strong>{{$personnels->matricule}}</strong>
                    </h4>
                </div>
                <div class="modal-body no-padding">         
    
                    <form id="login-form" class="smart-form" action="{{route('backoffice_documents_personnels_modifier',$personnels->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                                <fieldset>
                                        <input type="hidden" name="personnel_id" value="{{$personnels->id}}">
                                        <input type="hidden" name="id" value="{{$docs->id}}">
                                 
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Document</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <select name="document">
                                                            <option value="{{$docs->document}}">{{$docs->document}}</option>
                                                            <option value="Assurance de voyage">Assurance de voyage</option>
                                                            <option value="CIN">CIN</option>
                                                            <option value="Carte de séjour Mouritanie">Carte de séjour Mouritanie</option>                                                       
                                                            <option value="Carte professionnelle">Carte professionnelle</option>
                                                            <option value="CDI">CDI</option>
                                                            <option value="CDD">CDD</option>
                                                            <option value="Passeport">Passeport</option>
                                                            <option value="Permis de conduire">Permis de conduire</option>
                                                            <option value="Visa Royaume Uni">Visa Royaume Uni</option>
                                                            <option value="Visa schenegen Espagne">Visa schenegen Espagne</option>
                                                            <option value="Visa schengen France">Visa schengen France</option>
                                                            <option value="Vise schengen Pays-Bas">Vise schengen Pays-Bas</option>
                                                            <option value="Visite médicale">Visite médicale</option>
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