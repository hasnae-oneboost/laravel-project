@extends('layouts.dashboard')
@section('title')
Parcs
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Classement des véhicules</li>
                <li>Classement des véhicules</li>
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
                                
                                <span class="widget-icon"> <i class="fa fa-list">&nbsp;</i> </span>
                                <p class="h6">&nbsp;Parcs</p>
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
                                                <th>Code</th>
                                                <th>Nom</th>
                                                <th>Adresse</th>
                                                <th>Pays</th>
                                                <th>Ville</th>
                                                <th>Code de gestionnaire</th>
                                                <th>Nom de gestionnaire</th>
                                                <th>E-mail de gestionnaire</th>
                                                <th>Commentaire</th>
                                                <th>Ajouté Par</th>
                                                <th>Modifié Par</th>
                                                <th>Actions</th>                                               
                                        </thead>
                                        <tbody>
                                                @foreach($parcs as $p)
                                                <tr>
                                                    <td>{{$p->code}}</td>
                                                    <td>{{$p->nom}}</td>
                                                    <td>{{$p->adresse}}</td>
                                                    <td>{{$p->pay->libelle_pays}}</td>
                                                    <td>{{$p->ville->libelle_ville}}</td>
                                                    <td>{{$p->code_gestionnaire}}</td>
                                                    <td>{{$p->nom_gestionnaire}}</td>
                                                    <td>{{$p->email_gestionnaire}}</td> 
                                                    <td>{{$p->commentaire}}</td>                                               
                                                    <td>{{$p->ajoute_par}}</td>
                                                    <td>{{$p->modifie_par}}</td>
                                                    <td>
                                                    @permission('Modifier') 
                                                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#Modifier-{{$p->id}}"><i class="fa fa-edit"></i></button>
                                                    @endpermission
                                                    @permission('Supprimer') 
                                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$p->id}}"> <i class="fa fa-trash"></i></button>
                                                    @endpermission
                                                    <button class="btn btn-default" data-toggle="modal" data-target="#Visualiser-{{$p->id}}"> <i class="fa fa-eye"></i></button></td>
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

                        
<!-- Modal: Ajouter -->
<div class="modal fade" id="Ajout" tabindex="-1" role="dialog">

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
                    <form id="login-form" class="smart-form" action="{{route('backoffice_parcs_ajouter')}}" method="POST">
                        {{csrf_field()}}
                                <fieldset>                                    
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Code</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="code" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2">Nom</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="text" name="nom" required>
                                                </label>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2">Adresse</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="text" name="adresse" required>
                                                </label>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2">Pays</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                        <select class="pays_select" name="pays" id="" required>
                                                                <option value=""></option>
                                                                @foreach($pays as $p)
                                                                <option value="{{$p->id}}">{{$p->libelle_pays}}</option>
                                                                @endforeach
                                                        </select>
                                                </label>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2">Ville</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                        <select class="ville_select" name="ville" id="" required>
                                                                <option value=""></option>
                                                        </select>
                                                </label>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2">Code de gestionnaire</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                      <input type="text" name="code_gestionnaire" required>                                                
                                                </label>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Nom de gestionnaire</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                      <input type="text" name="nom_gestionnaire" required>     
                                                    </label>
                                                </div>
                                            </div>
                                        </section>
                                        <section>
                                                <div class="row">
                                                    <label class="label col col-2">E-mail de gestionnaire</label>
                                                    <div class="col col-10">
                                                        <label class="input">
                                                            <input type="text" name="email_gestionnaire" required>
                                                        </label>
                                                    </div>
                                                </div>
                                        </section>
                                        <section>
                                            <div class="row">
                                                <label class="label col col-2">Commentaire</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="commentaire" required>
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
  

<!-- Modal: Modifier -->
@foreach($parcs as $pa)
<div class="modal fade" id="Modifier-{{$pa->id}}" tabindex="-1" role="dialog">
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

                <form id="login-form" class="smart-form" action="{{route('backoffice_parcs_modifier')}}" id="edit" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}                     
                    <fieldset>                                    
                        <section>
                                <div class="row">
                                    <label class="label col col-2">Code</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="hidden" name="id" value="{{$pa->id}}">
                                            <input type="text" name="code" value="{{$pa->code}}" required>
                                        </label>
                                    </div>
                                </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-2">Nom</label>
                                <div class="col col-10">
                                    <label class="input">
                                        <input type="text" name="nom" value="{{$pa->nom}}" required>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-2">Adresse</label>
                                <div class="col col-10">
                                    <label class="input">
                                        <input type="text" name="adresse" value="{{$pa->adresse}}" required>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-2">Pays</label>
                                <div class="col col-10">
                                    <label class="input">
                                            <select class="pays_select" name="pays" id="" required>
                                                    <option value="{{$pa->pay_id}}">{{$pa->pay->libelle_pays}}</option>
                                                    @foreach($pays as $p)
                                                    <option value="{{$p->id}}">{{$p->libelle_pays}}</option>
                                                    @endforeach
                                            </select>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-2">Ville</label>
                                <div class="col col-10">
                                    <label class="input">
                                            <select class="ville_select" name="ville" id="" required>
                                                    <option value="{{$pa->ville_id}}">{{$pa->ville->libelle_ville}}</option>
                                            </select>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-2">Code de gestionnaire</label>
                                <div class="col col-10">
                                    <label class="input">
                                          <input type="text" name="code_gestionnaire" value="{{$pa->code_gestionnaire}}" required>                                                
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                                <div class="row">
                                    <label class="label col col-2">Nom de gestionnaire</label>
                                    <div class="col col-10">
                                        <label class="input">
                                          <input type="text" name="nom_gestionnaire" value="{{$pa->nom_gestionnaire}}" required>     
                                        </label>
                                    </div>
                                </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">E-mail de gestionnaire</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="email_gestionnaire" value="{{$pa->email_gestionnaire}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                <div class="row">
                                    <label class="label col col-2">Commentaire</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="text" name="commentaire" value="{{$pa->commentaire}}" required>
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

<!-- Modal: Visualiser -->
@foreach($parcs as $par)
<div class="modal fade" id="Visualiser-{{$par->id}}" tabindex="-1" role="dialog">
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

                <form id="login-form" class="smart-form" action="" method="POST">
                     <fieldset>                                    
                        <section>
                                <div class="row">
                                    <label class="label col col-2">Code</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="hidden" name="id" value="{{$pa->id}}">
                                            <input type="text" name="code" value="{{$pa->code}}" disabled>
                                        </label>
                                    </div>
                                </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-2">Nom</label>
                                <div class="col col-10">
                                    <label class="input">
                                        <input type="text" name="nom" value="{{$pa->nom}}" disabled>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-2">Adresse</label>
                                <div class="col col-10">
                                    <label class="input">
                                        <input type="text" name="adresse" value="{{$pa->adresse}}" disabled>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-2">Pays</label>
                                <div class="col col-10">
                                    <label class="input">
                                            <select class="pays_select" name="pays" id="" disabled>
                                                    <option value="{{$pa->pay_id}}">{{$pa->pay->libelle_pays}}</option>
                                                    @foreach($pays as $p)
                                                    <option value="{{$p->id}}">{{$p->libelle_pays}}</option>
                                                    @endforeach
                                            </select>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-2">Ville</label>
                                <div class="col col-10">
                                    <label class="input">
                                            <select class="ville_select" name="ville" id="" disabled>
                                                    <option value="{{$pa->ville_id}}">{{$pa->ville->libelle_ville}}</option>
                                            </select>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-2">Code de gestionnaire</label>
                                <div class="col col-10">
                                    <label class="input">
                                          <input type="text" name="code_gestionnaire" value="{{$pa->code_gestionnaire}}" disabled>                                                
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                                <div class="row">
                                    <label class="label col col-2">Nom de gestionnaire</label>
                                    <div class="col col-10">
                                        <label class="input">
                                          <input type="text" name="nom_gestionnaire" value="{{$pa->nom_gestionnaire}}" disabled>     
                                        </label>
                                    </div>
                                </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">E-mail de gestionnaire</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="email_gestionnaire" value="{{$pa->email_gestionnaire}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                <div class="row">
                                    <label class="label col col-2">Commentaire</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="text" name="commentaire" value="{{$pa->commentaire}}" disabled>
                                        </label>
                                    </div>
                                </div>
                        </section>
                                                                                                             
                    </fieldset>
            
                        
                </form>						
                        

            </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach

<!-- Modal: Supprimer -->
@foreach($parcs as $parc)
<div class="modal fade" id="Supprimer-{{$parc->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_parcs_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>                                            
                                    <input type="hidden" name="id" value="{{$parc->id}}">
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