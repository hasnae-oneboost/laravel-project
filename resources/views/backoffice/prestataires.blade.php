@extends('layouts.dashboard')
@section('title')
Prestataires
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Transport</li>
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
                                        <a href="{{route('backoffice_prestataire_ajout')}}" class="btn btn-red btn-lg">Ajouter</a>   
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
                                <p class="h6">&nbsp;Prestataires</p>
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
                                                <th>Raison sociale</th>
                                                <th>Pays</th>
                                                <th>Ville</th>
                                                <th>Adresse</th>
                                                
                                                <th>Site web</th>
                                                <th>E-mail</th>
                                                
                                                <th>Ajouté Par</th>
                                                <th>Modifié Par</th>
                                                <th>Actions</th>                                               
                                        </thead>
                                        <tbody>
                                                @foreach($prestataires as $p)
                                                <tr>
                                                    <td>{{$p->raison_sociale}}</td> 
                                                    <td>{{$p->pay->libelle_pays}}</td>
                                                    <td>{{$p->ville->libelle_ville}}</td>
                                                    <td>{{$p->adresse}}</td>
                                                    
                                                    <td>{{$p->site_web}}</td> 
                                                    <td>{{$p->email}}</td>
                                                    
                                                    <td>{{$p->ajoute_par}}</td>
                                                    <td>{{$p->modifie_par}}</td>
                                                    <td>
                                                        @permission('Modifier') 
                                                         <button class="btn btn-secondary" onclick="window.location.href='{{route('backoffice_prestataire_modif',$p->id)}}'"><i class="fa fa-edit"></i></button>
                                                        @endpermission
                                                        @permission('Supprimer') 
                                                            <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$p->id}}"> <i class="fa fa-trash"></i></button>
                                                        @endpermission
                                                        <button class="btn btn-default" onclick="window.location.href='{{route('backoffice_prestataire_visualiser',$p->id)}}'"> <i class="fa fa-eye"></i></button>
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

<!-- Modal: Supprimer -->
@foreach($prestataires as $pr)
<div class="modal fade" id="Supprimer-{{$pr->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_prestataire_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>                                            
                                    <input type="hidden" name="id" value="{{$pr->id}}">
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