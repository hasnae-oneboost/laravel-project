@extends('layouts.dashboard')
@section('title')
Personnels
@endsection
@section('breadcrumb')
	<!-- breadcrumb -->
	<ol class="breadcrumb" style="background-color: #333;" >
        <li><a href="">Accueil</a></li>
        <li>Flotte</li>
        <li>Ressources Humaines</li>
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
                                            <a href="{{route('backoffice_personnels_ajout')}}" class="btn btn-red btn-lg">Ajouter</a>    
                                        </div>
                                        @endpermission
                                    </h1>
                                </div>
                        
        </div>
        <!-- End button ajout-->  
                        
        <!-- widget grid -->
        <section id="widget-grid" class="">
             <!--******************RECHERCHE*********************-->
             <div class="row">
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
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
                                    <form id="login-form" class="smart-form" action="{{route('backoffice_personnels')}}" method="get">
                                        <fieldset>
                                            <div class="row">
                                                <div class="col col-3">
                                                    <label class="label">
                                                        Matricule 
                                                    </label>
                                                    <label class="select">
                                                        <select name="matricule" class="">
                                                            <option value=""></option>
                                                            @foreach($personnels as $person)
                                                            <option value="{{$person->matricule}}" @if($selected_matricule == $person->matricule) selected="selected" @endif >{{$person->matricule}}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                                                <div class="col col-3">
                                                    <label class="label">
                                                                Nom
                                                    </label>
                                                    <label class="select">
                                                            <select name="nom" class="">
                                                                <option value=""></option>
                                                                @foreach($personnels as $p)
                                                                <option value="{{$p->nom}}" @if($selected_nom == $p->nom) selected="selected" @endif >{{$p->nom}}</option>
                                                                @endforeach
                                                            </select>
                                                    </label>                                                    
                                                </div>
                                                <div class="col col-3">
                                                    <label class="label">
                                                                Categorie
                                                    </label>
                                                    <label class="select">
                                                        <select name="categorie" class="">
                                                            <option value=""></option>
                                                            @foreach($categories as $cat)
                                                            <option value="{{$cat->id}}" @if($selected_categorie == $cat->id) selected="selected" @endif >{{$cat->libelle}}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                    
                                                <div class="col col-3">                                                                        
                                                        <label class="pull-right"  style="margin-top: 25px;">                                                                    
                                                            <button class="btn btn-red btn-sm"  type="submit">
                                                                <i class="fa fa-search"></i>
                                                                Recherche 
                                                            </button>
                                                        </label>
                                                </div> 
                                            </div>      
                                        </fieldset>
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
                                <p class="h6">&nbsp;Personnels</p>
                            </header>                            
                            <!-- widget div-->
                            <div>
                                <!-- widget content -->
                                <div class="table-responsive">            
                                    <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                        <thead>			                
                                            <tr>
                                                <th>Matricule</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Adresse postale</th>
                                                <th>CIN</th>
                                                <th>GSM Professionnel</th>
                                                <th>GSM Personnel</th>
                                                <th>GSM Etranger</th>
                                                <th>Ajouté Par</th>
                                                <th>Modifié Par</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($personnels as $personnel)
                                                <tr>
                                                    <td>{{$personnel->matricule}}</td>
                                                    <td>{{$personnel->nom}}</td>
                                                    <td>{{$personnel->prenom}}</td>
                                                    <td>{{$personnel->adresse_postale}}</td>                                                                                                                                                                                
                                                    <td>{{$personnel->cin}}</td>
                                                    <td>{{$personnel->gsm_professionnel}}</td>
                                                    <td>{{$personnel->gsm_personnel}}</td>
                                                    <td>{{$personnel->gsm_etranger}}</td>
                                                    <td>{{$personnel->ajoute_par}}</td>
                                                    <td>{{$personnel->modifie_par}}</td>
                                                    <td>
                                                    @permission('Modifier') 
                                                    <button class="btn btn-secondary" onclick="window.location.href='{{route('backoffice_personnels_modif',$personnel->id)}}'"><i class="fa fa-edit"></i></button>
                                                    @endpermission
                                                    @permission('Supprimer') 
                                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$personnel->id}}"> <i class="fa fa-trash"></i></button>
                                                    @endpermission
                                                        <button class="btn btn-default" onclick="window.location.href='{{route('backoffice_personnels_visualiser',$personnel->id)}}'"> <i class="fa fa-eye"></i></button>
                                                        <button  class="btn btn-default" onclick="window.location.href='{{route('backoffice_imprime_info_personnels',$personnel->id)}}'"><i class="fa fa-print"></i></button>
                                                        <button  class="btn btn-default" onclick="window.location.href='{{route('backoffice_documents_personnels',$personnel->id)}}'" ><i class="fa fa-file"></i></button>
                                                     
                                                    </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$personnels->appends(Request::except('page'))->render()}}                                                                      
                                </div>
                                <!-- end widget content -->
                            </div>
                        </div>
                    </article>
            </div>
        </section>
    </div>

    <!-- Modal: Supprimer -->
    @foreach($personnels as $semiremorq)
        <div class="modal fade" id="Supprimer-{{$semiremorq->id}}"  tabindex="-1" role="dialog">
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
                        <form id="login-form" class="smart-form" action="{{route('backoffice_personnels_supprimer')}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <fieldset>                                            
                                <input type="hidden" name="id" value="{{$semiremorq->id}}">
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