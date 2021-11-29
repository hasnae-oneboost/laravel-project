@extends('layouts.dashboard')
@section('title')
Courtiers d'assurance
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Juridique</li>
                <li>Assurance</li>
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
                <div class="row">
                    <div class="pull-right">
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                                <h1 class="page-title txt-color-blueDark">
                                 @permission('Créer') 
                                    <div class="">
                                    
                                    <a href="{{route('backoffice_courtier_ajout')}}" class="btn btn-red btn-lg">Ajouter</a>    
                                </div>
                                    @endpermission
                                </h1>
                            </div>
                       
                        </div>
                </div>
                <!-- End button ajout-->  
             
            
                                            
                <!-- widget grid -->
                <section id="widget-grid" class="">
                    <div class="row">
                                <!-- NEW WIDGET START -->
                                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
                        

                                    <!--******************RECHERCHE*********************-->
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
                                                    <form class="form-inline" action="{{route('backoffice_courtiers_assurance')}}" method="get">
                                                        
                                                            <div class="form-inline">
                                                                <div class="col-md-3"> 
                                                                <label class="control-label">
                                                                    Courtier d'assurance :
                                                                </label> 
                                                            </div >
                                                            <div class="col-md-8">
                                                                <label class="select">                                  
                                                                <select name="courtier_id" class="courtier_select" style="width: 100%">
                                                                    <option value=""></option>
                                                                    @foreach($courtiers as $courtier )
                                                                    <option value="{{$courtier->id}}" @if( $selected_courtier  == $courtier->id) selected="selected" @endif  >{{$courtier->nom}}</option>
                                                                    @endforeach
                                                                </select>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                    <label class="control-label">
                                                                        Société d'assurance :
                                                                    </label> 

                                                            </div>
                                                            <div class="col-md-8">
                                                                    <label class="select">                                  
                                                                    <select name="societe_id" class="societe_select" style="width: 100%">
                                                                                <option value=""></option>
                                                                                    @foreach($courtiers as $courtier )
                                                                                    <option value="{{$courtier->societe_assurance_id}}" @if( $selected_societe  == $courtier->societe_assurance_id) selected="selected" @endif >{{$courtier->societesassurance->nom}}</option>
                                                                                    
                                                                                    @endforeach
                                                                    </select>
                                                                    </label>
                                                                </div>
                                                                
                                                            <div class="">
                                                             
                                                              <button class="btn btn-red" type="submit">
                                                                  Chercher
                                                                                <i class="fa fa-search"></i>
                                                             </button>
                                                            </div> 
                                                                           
                                                                    
                                                            </div>
                                                                       
                                                                            
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
                        
                        
            
                            <header>
                                
                                <span class="widget-icon"> <i class="fa fa-list">&nbsp;</i> </span>
                                <p class="h6">&nbsp;Courtiers d'assurance</p>  
            
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
                                                
                                                
                                                <th>Matricule</th>  
                                                <th>Nom</th>  
                                                <th>Adresse</th>
                                                <th>Pays</th> 
                                                <th>Ville</th>
                                                <th>Société d'assurance</th>
                                                
                                                <th>Gérant</th> 
                                                <th>Nom du résponsable</th>
                                                <th>Site web</th>  
                                                <th>Commentaire</th>                                  
                                                <th>Ajouté Par</th>
                                                <th>Modifié Par</th>
                                                
                                                <th>Actions</th>
                                               
                                        </thead>
                                        <tbody>
                                            @foreach($courtiers as $co)
                                            <tr>
                                                <td>{{$co->matricule}}</td>
                                                <td>{{$co->nom}}</td>
                                                <td>{{$co->adresse}}</td>
                                                <td>{{$co->pay->libelle_pays}}</td>
                                                <td>{{$co->ville->libelle_ville}}</td>
                                                <td>{{$co->societesassurance->nom}}</td>
                                                
                                                <td>{{$co->gerant}}</td>
                                                <td>{{$co->nom_responsable}}</td>
                                                <td>{{$co->site_web}}</td>
                                                <td>{{$co->commentaire}}</td>
                                                <td>{{$co->ajoute_par}}</td>
                                                <td>{{$co->modifie_par}}</td>
                                                
                                                <td>
                                                @permission('Modifier') 
                                                    <button class="btn btn-secondary" onclick="window.location.href='{{route('backoffice_courtier_modifier',$co->id)}}'"><i class="fa fa-edit"></i></button>
                                                @endpermission
                                                @permission('Supprimer') 
                                                    <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$co->id}}"> <i class="fa fa-trash"></i></button>
                                                @endpermission
                                                <button class="btn btn-default" onclick="window.location.href='{{route('backoffice_courtier_visualiser',$co->id)}}'"> <i class="fa fa-eye"></i></button>
                                             
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



<!-- Modal: Supprimer courtier -->
@foreach($courtiers as $cou)
<div class="modal fade" id="Supprimer-{{$cou->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_courtiers_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>
                                
                                    <input type="hidden" name="id" value="{{$cou->id}}">
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