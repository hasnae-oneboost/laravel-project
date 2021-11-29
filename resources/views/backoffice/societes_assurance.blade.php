@extends('layouts.dashboard')
@section('title')
Sociétés d'assurance
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
                  
                                            
                <!-- widget grid -->
                <section id="widget-grid" class="">

                    <div class="row">
                        <!--Button ajout-->
                            <div class="pull-right">
                                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                                        <h1 class="page-title txt-color-blueDark">
                                         @permission('Créer') 
                                            <div class="">
                                            
                                            <a href="{{route('backoffice_societe_ajout')}}" class="btn btn-red btn-lg">Ajouter</a>    
                                        </div>
                                            @endpermission
                                        </h1>
                                    </div>
                               
                            </div>                
                        <!-- End button ajout-->  
                     
                         </div> 
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
                                                        <form class="form-inline" action="{{route('backoffice_societes_assurance')}}" method="get">
                                                                <div class="form-group"> 
                                                                    <label class="input">
                                                                        Société d'assurance:
                                                                    </label>
                                                                    <label class="input">                                  
                                                                    <select name="societe" class="societe_select" >
                                                                            <option value=""></option>
                                                                                @foreach($societes as $societe )
                                                                            <option value=""></option>
                                                                                <option value="{{$societe->nom}}" @if( $selectedsociete  == $societe->nom) selected="selected" @endif >{{$societe->nom}}</option>
                                                                                @endforeach
                                                                    </select>
                                                                </label>
                                                                
                                                                
                                                                        <button class="btn btn-red" type="submit">
                                                                            <i class="fa fa-search"></i>
                                                                        </button>
                                                                    
                                                                    </div>
                                                                </form>
                                                            </div>
                                              </div>
                                            </div>
                                    </div>
                              
                            </article>
                        </div>

                        <!----><!---->
                        
                            
             
                <!-- row -->
                <div class="row">
            
                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
            
                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" 
                        data-widget-deletebutton="false" data-widget-togglebutton="false" role="widget">
                        
                        
            
                            <header>
                                
                                <span class="widget-icon"> <i class="fa fa-list">&nbsp;</i> </span>
                                <p class="h6">&nbsp;Sociétés d'assurance</p>  
            
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
                                                <th>Pays</th> 
                                                <th>Villes</th>
                                                <th>Adresse</th>                                                                                               
                                                <th>Gérant</th> 
                                                <th>Nom du résponsable</th>
                                                <th>Site web</th>  
                                                <th>Commentaire</th>                                  
                                                <th>Ajouté Par</th>
                                                <th>Modifié Par</th>
                                                <th>Actions</th>                                               
                                        </thead>
                                        <tbody>
                                            @foreach($societes as $so)
                                            <tr>
                                                <td>{{$so->matricule}}</td>
                                                <td>{{$so->nom}}</td>
                                                <td>{{$so->pay->libelle_pays}}</td>
                                                <td>{{$so->ville->libelle_ville}}</td>
                                                <td>{{$so->adresse}}</td>                                               
                                                <td>{{$so->gerant}}</td>
                                                <td>{{$so->nom_responsable}}</td>
                                                <td>{{$so->site_web}}</td>
                                                <td>{{$so->commentaire}}</td>
                                                <td>{{$so->ajoute_par}}</td>
                                                <td>{{$so->modifie_par}}</td>
                                                
                                                <td>
                                                @permission('Modifier') 
                                                    <button class="btn btn-secondary" onclick="window.location.href='{{route('backoffice_societe_modifier',$so->id)}}'"><i class="fa fa-edit"></i></button>
                                                @endpermission
                                                @permission('Supprimer') 
                                                    <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$so->id}}"> <i class="fa fa-trash"></i></button>
                                                @endpermission
                                                <button class="btn btn-default" onclick="window.location.href='{{route('backoffice_societe_visualiser',$so->id)}}'"> <i class="fa fa-eye"></i></button>
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



<!-- Modal: Supprimer societe -->
@foreach($societes as $soc)
<div class="modal fade" id="Supprimer-{{$soc->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_societies_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>
                                
                                    <input type="hidden" name="id" value="{{$soc->id}}">
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