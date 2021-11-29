@extends('layouts.dashboard')
@section('title')
Intervenants
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Interventions</li>
                <li>Intervenants</li>
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
                    <p class="h6">&nbsp;Intervenants</p>  
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
                                    <th>Prénom</th>
                                    <th>CIN</th>
                                    <th>Date de naissance</th> 
                                    <th>Diplome</th>
                                    <th>Fonction</th>
                                    <th>Date d'entrée</th>                                   
                                    <th>Ajouté Par</th>
                                    <th>Modifié Par</th>
                                    <th>Actions</th>                                
                            </thead>
                            <tbody>
                                @foreach($intervenants as $i)
                                <tr>
                                    <td>{{$i->matricule}}</td>
                                    <td>{{$i->nom}}</td>
                                    <td>{{$i->prenom}}</td>
                                    <td>{{$i->cin}}</td>
                                    <td>{{$i->date_naissance}}</td> 
                                    <td>{{$i->diplome}}</td>
                                    <td>{{$i->fonction}}</td>
                                    <td>{{$i->date_entree}}</td>                                   
                                    <td>{{$i->ajoute_par}}</td>
                                    <td>{{$i->modifie_par}}</td>                                    
                                <td>
                                        @permission('Modifier') 
                                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#Modifier-{{$i->id}}"><i class="fa fa-edit"></i></button>
                                        @endpermission
                                        @permission('Supprimer') 
                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$i->id}}"> <i class="fa fa-trash"></i></button>
                                        @endpermission
                                        <button class="btn btn-default" data-toggle="modal" data-target="#Visualiser-{{$i->id}}"> <i class="fa fa-eye"></i></button></td>
                                        
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
                    <form id="login-form" class="smart-form" action="{{route('backoffice_intervenant_ajouter')}}" method="POST">
                        {{csrf_field()}}
                                <fieldset>
                                        <section>
                                                <div class="row">
                                                    <label class="label col col-2">Matricule</label>
                                                    <div class="col col-10">
                                                        <label class="input">                                                            
                                                              <input type="text" name="matricule" required>
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
                                                    <label class="label col col-2">Prénom</label>
                                                    <div class="col col-10">
                                                        <label class="input">                                                            
                                                          <input type="text" name="prenom" required>
                                                        </label>
                                                    </div>       
                                                </div>
                                        </section>
                                            <section>
                                                    <div class="row">
                                                        <label class="label col col-2">CIN</label>
                                                        <div class="col col-10">
                                                            <label class="input">                                                            
                                                                    <input type="text" name="cin" required>
                                                            </label>
                                                        </div>                                            
                                                       
                                                    </div>
                                            </section>
                                            <section>
                                                    <div class="row">
                                                        <label class="label col col-2">Date de naissance</label>
                                                        <div class="col col-10">
                                                            <label class="input">                                                            
                                                                  <input type="text" name="date_naissance" required>
                                                            </label>
                                                        </div>                                        
                                                       
                                                    </div>
                                            </section>
                                            <section>
                                                    <div class="row">
                                                        <label class="label col col-2">Diplome</label>
                                                        <div class="col col-10">
                                                            <label class="input">                                                            
                                                                  <input type="text" name="diplome" required>
                                                            </label>
                                                        </div>                                        
                                                       
                                                    </div>
                                            </section>
                                            <section>
                                                    <div class="row">
                                                        <label class="label col col-2">Fonction</label>
                                                        <div class="col col-10">
                                                            <label class="input">                                                            
                                                                  <input type="text" name="fonction" required>
                                                            </label>
                                                        </div>                                       
                                                       
                                                    </div>
                                            </section>
                                            <section>
                                                    <div class="row">
                                                        <label class="label col col-2">Date d'entrée</label>
                                                        <div class="col col-10">
                                                            <label class="input">                                                            
                                                                  <input type="text" name="date_entree" required>
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
@foreach($intervenants as $in)
<div class="modal fade" id="Modifier-{{$in->id}}" tabindex="-1" role="dialog">
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

                <form id="login-form" class="smart-form" action="{{route('backoffice_intervenant_modifier')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                            
                    <fieldset>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Matricule</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                    <input type="hidden" name="id" value="{{$in->id}}">                                                            
                                                  <input type="text" name="matricule" value="{{$in->matricule}}" required>
                                            </label>
                                        </div>                                        
                                       
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Nom</label>
                                        <div class="col col-10">
                                            <label class="input">                                                            
                                                  <input type="text" name="nom" value="{{$in->nom}}" required>
                                            </label>
                                        </div>                                        
                                       
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Prénom</label>
                                        <div class="col col-10">
                                            <label class="input">                                                            
                                              <input type="text" name="prenom" value="{{$in->prenom}}" required>
                                            </label>
                                        </div>       
                                    </div>
                            </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">CIN</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                        <input type="text" name="cin" value="{{$in->cin}}" required>
                                                </label>
                                            </div>                                            
                                           
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Date de naissance</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                      <input type="text" name="date_naissance" value="{{$in->date_naissance}}" required>
                                                </label>
                                            </div>                                        
                                           
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Diplome</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                      <input type="text" name="diplome" value="{{$in->diplome}}" required>
                                                </label>
                                            </div>                                        
                                           
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Fonction</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                      <input type="text" name="fonction" value="{{$in->fonction}}" required>
                                                </label>
                                            </div>                                       
                                           
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Date d'entrée</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                      <input type="text" name="date_entree" value="{{$in->date_entree}}" required>
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

<!-- Modal: Supprimer -->
@foreach($intervenants as $inter)
<div class="modal fade" id="Supprimer-{{$inter->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_intervenant_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>
                                
                                    <input type="hidden" name="id" value="{{$inter->id}}">
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



<!-- Modal: Visualiser -->
@foreach($intervenants as $interv)
<div class="modal fade" id="Visualiser-{{$interv->id}}" tabindex="-1" role="dialog">
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
                    {{csrf_field()}}
                            
                    <fieldset>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Matricule</label>
                                        <div class="col col-10">
                                            <label class="input">                                                            
                                                  <input type="text" name="matricule" value="{{$interv->matricule}}" disabled>
                                            </label>
                                        </div>                                        
                                       
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Nom</label>
                                        <div class="col col-10">
                                            <label class="input">                                                            
                                                  <input type="text" name="nom" value="{{$interv->nom}}" disabled>
                                            </label>
                                        </div>                                        
                                       
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Prénom</label>
                                        <div class="col col-10">
                                            <label class="input">                                                            
                                              <input type="text" name="prenom" value="{{$interv->prenom}}" disabled>
                                            </label>
                                        </div>       
                                    </div>
                            </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">CIN</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                        <input type="text" name="cin" value="{{$interv->cin}}" disabled>
                                                </label>
                                            </div>                                            
                                           
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Date de naissance</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                      <input type="text" name="date_naissance" value="{{$interv->date_naissance}}" disabled>
                                                </label>
                                            </div>                                        
                                           
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Diplome</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                      <input type="text" name="diplome" value="{{$interv->diplome}}" disabled>
                                                </label>
                                            </div>                                        
                                           
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Fonction</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                      <input type="text" name="fonction" value="{{$interv->fonction}}" disabled>
                                                </label>
                                            </div>                                       
                                           
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Date d'entrée</label>
                                            <div class="col col-10">
                                                <label class="input">                                                            
                                                      <input type="text" name="date_entree" value="{{$interv->date_entree}}" disabled>
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

@endsection