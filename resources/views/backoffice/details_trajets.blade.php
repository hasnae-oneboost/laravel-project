@extends('layouts.dashboard')
@section('title')
Détails des trajets
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Utilisation</li>
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
                        <a href="{{route('backoffice_detail_ajout')}}" class="btn btn-red btn-lg" >Ajouter</a>
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
                    <p class="h6">&nbsp;Details des trajets</p>  

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
                                    <th>Trajet</th>
                                    <th>Catégorie du trajet</th>                                    
                                    <th>Date début</th>
                                    <th>Date fin</th>
                                    <th>Prime de déplacement: 1er conducteur (Dhs)</th>
                                    <th>Prime de déplacement: 2ème conducteur (Dhs) </th>
                                    <th>Frais de route (Dhs)</th>
                                    <th>Consommation (L)</th>
                                    <th>Description</th>
                                    <th>Ajouté Par</th>
                                    <th>Modifié Par</th>
                                    @permission('Modifier','Supprimer')
                                    <th>Actions</th>
                                    @endpermission                                
                            </thead>
                            <tbody>
                                @foreach($details as $d)
                                <tr>
                                    <td>{{$d->trajet->libelle}}</td>
                                    <td>{{$d->categorietrajet->libelle}}</td>
                                    <td>{{$d->date_debut}}</td>
                                    <td>{{$d->date_fin}}</td>
                                    <td>{{number_format($d->prime_deplacement_1er_conducteur,2,',',' ')}}</td>
                                    <td>{{number_format($d->prime_deplacement_2eme_conducteur,2,',',' ')}}</td>
                                    <td>{{number_format($d->frais_route,2,',',' ')}}</td>
                                    <td>{{number_format($d->consommation,0,'',' ')}}</td>
                                    <td>{{$d->description}}</td>
                                    <td>{{$d->ajoute_par}}</td>
                                    <td>{{$d->modifie_par}}</td>
                                    @permission('Modifier','Supprimer')
                                    <td>
                                            @permission('Modifier') 
                                        <button class="btn btn-secondary" onclick="window.location.href='{{route('backoffice_detail_modif',$d->id)}}'"><i class="fa fa-edit"></i></button>
                                        @endpermission
                                        @permission('Supprimer') 
                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$d->id}}"> <i class="fa fa-trash"></i></button>
                                        @endpermission
                                        <button class="btn btn-default" onclick="window.location.href='{{route('backoffice_detail_visualiser',$d->id)}}'"> <i class="fa fa-eye"></i></button></td>
                                        
                                    </tr>
                                    @endpermission
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
@foreach($details as $deta)
<div class="modal fade" id="Supprimer-{{$deta->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_detail_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>                                            
                                    <input type="hidden" name="id" value="{{$deta->id}}">
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