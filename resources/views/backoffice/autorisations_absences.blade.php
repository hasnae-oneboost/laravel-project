@extends('layouts.dashboard')
@section('title')
Autorisations d'absences
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a>Accueil</a></li>
                <li>Ressources humaines</li>
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
                        <form id="login-form" class="smart-form" action="{{route('backoffice_autorisations_absences')}}" method="get">
                            <fieldset>
                                <div class="row">
                                    <div class="col col-3">
                                        <label class="label">
                                            Employé 
                                        </label>
                                        <label class="input">
                                                <select name="employe" id="" >
                                                        <option value=""></option>
                                                        @foreach($personnels as $p)
                                                        <option value="{{$p->id}}" @if($selected_employe == $p->id) selected="selected" @endif>{{$p->nom}}&nbsp;{{$p->prenom}}</option>
                                                        @endforeach
                                                    </select>
                                        </label>
                                    </div>
                                    <div class="col col-3">
                                        <label class="label">
                                                   Type d'absence
                                        </label>
                                        <label class="select">
                                                <select name="type_absence" id="" >
                                                        <option value=""></option>
                                                        @foreach($types as $t)
                                                        <option value="{{$t->id}}" @if($selected_type == $t->id) selected="selected" @endif>{{$t->libelle}}</option>
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
                    <p class="h6">&nbsp;Autorisations d'absences</p>  

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
                                    <th>Employé</th>
                                    <th>Type d'absence</th>
                                    <th>Date de demande</th> 
                                    <th>Date de départ</th> 
                                    <th>Date de retour</th> 
                                    <th>Date de reprise</th> 
                                    <th>Description</th>                                     
                                    <th>Ajouté Par</th>
                                    <th>Modifié Par</th>
                                    <th>Actions</th> 
                            </thead>
                            <tbody>
                                @foreach($autorisations as $a)
                                <tr>
                                    <td>{{$a->personnel->nom}}&nbsp;{{$a->personnel->prenom}}</td>
                                    <td>{{$a->typesabsence->libelle}}</td>
                                    <td>{{$a->date_demande}}</td>
                                    <td>{{$a->date_depart}}</td>
                                    <td>{{$a->date_retour}}</td>
                                    <td>{{$a->date_reprise}}</td>                                                                  
                                    <td>{{$a->description}}</td>
                                    <td>{{$a->ajout_par}}</td>
                                    <td>{{$a->modifie_par}}</td>
                                    <td>
                                        @permission('Modifier') 
                                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#Modifier-{{$a->id}}"><i class="fa fa-edit"></i></button>
                                        @endpermission
                                        @permission('Supprimer') 
                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$a->id}}"> <i class="fa fa-trash"></i></button>
                                        @endpermission
                                        <button class="btn btn-default" data-toggle="modal" data-target="#Visualiser-{{$a->id}}"> <i class="fa fa-eye"></i></button></td>
                                    </tr>
                                   
                                @endforeach
                            
                            </tbody>
                        </table>
                        {{$autorisations->appends(Request::except('page'))->render()}}                                                                      
                       
                    </div>
                    <!-- end widget content -->
                </div>
            </div>
        </article>
    </div>
    </section>
</div>

<!-- Modal: Ajouter  -->
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
                 
    
                    <form id="login-form" class="smart-form" action="{{route('backoffice_autorisations_absences_ajouter')}}" method="POST">
                        {{csrf_field()}}
                                <fieldset>

                                        <section>
                                                <div class="row">
                                                    <label class="label col col-2">Employé</label>
                                                    <div class="col col-10">
                                                        <label class="input">
                                                            <select name="employe" id="" required>
                                                                <option value=""></option>
                                                                @foreach($personnels as $p)
                                                                <option value="{{$p->id}}">{{$p->nom}}&nbsp;{{$p->prenom}}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                        </section> 
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Types d'absence</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <select name="type_absence" id="" required>
                                                            <option value=""></option>
                                                            @foreach($types as $t)
                                                            <option value="{{$t->id}}">{{$t->libelle}}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>  
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Date de demande</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" id="date" name="date_demande" value='{{date('Y-m-d')}}' required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Date de départ</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="date_depart" id="date" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Date de retour</label>
                                                <div class="col col-10">
                                                        <label class="input">
                                                                <input type="text" name="date_retour" id="date" required>
                                                            </label>
                                                    </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Date de reprise</label>
                                                <div class="col col-10">
                                                        <label class="input">
                                                                <input type="text" name="date_reprise" id="date" required>
                                                            </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Description</label>
                                                <div class="col col-10">
                                                        <label class="input">
                                                                <input type="text" name="description" >
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
@foreach($autorisations as $autorisation)
<div class="modal fade" id="Modifier-{{$autorisation->id}}" tabindex="-1" role="dialog">
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

                <form id="login-form" class="smart-form" action="{{route('backoffice_autorisations_absences_modifier')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                            
                        <fieldset>
                            <input type="hidden" name="id" value="{{$autorisation->id}}">
                            
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Employé</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <select name="employe" id="" required>
                                                    <option value="{{$autorisation->personnel_id}}">{{$autorisation->personnel->nom}}&nbsp;{{$autorisation->personnel->prenom}}</option>
                                                    
                                                    @foreach($personnels as $p)
                                                    <option value="{{$p->id}}">{{$p->nom}}&nbsp;{{$p->prenom}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                            </section> 
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Types d'absence</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <select name="type_absence" id="">
                                                    <option value="{{$autorisation->type_id}}">{{$autorisation->typesabsence->libelle}}</option>
                                                    @foreach($types as $t)
                                                    <option value="{{$t->id}}">{{$t->libelle}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                            </section>  
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Date de demande</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" id="date" name="date_demande" value="{{$autorisation->date_demande}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Date de départ</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="date_depart" id="date" value="{{$autorisation->date_demande}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Date de retour</label>
                                        <div class="col col-10">
                                                <label class="input">
                                                        <input type="text" name="date_retour" id="date" value="{{$autorisation->date_retour}}" required>
                                                    </label>
                                            </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Date de reprise</label>
                                        <div class="col col-10">
                                                <label class="input">
                                                        <input type="text" name="date_reprise" id="date" value="{{$autorisation->date_reprise}}" required>
                                                    </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Description</label>
                                        <div class="col col-10">
                                                <label class="input">
                                                        <input type="text" name="description" value="{{$autorisation->description}}" >
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
@foreach($autorisations as $autoris)
<div class="modal fade" id="Supprimer-{{$autoris->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_autorisations_absences_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>
                                
                                    <input type="hidden" name="id" value="{{$autoris->id}}">
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
@foreach($autorisations as $autorisat)
<div class="modal fade" id="Visualiser-{{$autorisat->id}}" tabindex="-1" role="dialog">
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
                            <input type="hidden" name="id" value="{{$autorisat->id}}">
                            
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Employé</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <select name="employe" id="" disabled>
                                                    <option value="{{$autorisat->personnel_id}}">{{$autorisat->personnel->nom}}&nbsp;{{$autorisat->personnel->prenom}}</option>
                                                    
                                                    @foreach($personnels as $p)
                                                    <option value="{{$p->id}}">{{$p->nom}}&nbsp;{{$p->prenom}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                            </section> 
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Types d'absence</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <select name="type_absence" id="" disabled>
                                                    <option value="{{$autorisat->type_id}}">{{$autorisat->typesabsence->libelle}}</option>
                                                    @foreach($types as $t)
                                                    <option value="{{$t->id}}">{{$t->libelle}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                            </section>  
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Date de demande</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" id="date" name="date_demande" value="{{$autorisat->date_demande}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Date de départ</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="date_depart" id="date" value="{{$autorisat->date_demande}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Date de retour</label>
                                        <div class="col col-10">
                                                <label class="input">
                                                        <input type="text" name="date_retour" id="date" value="{{$autorisat->date_retour}}" disabled>
                                                    </label>
                                            </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Date de reprise</label>
                                        <div class="col col-10">
                                                <label class="input">
                                                        <input type="text" name="date_reprise" id="date" value="{{$autorisat->date_reprise}}" disabled>
                                                    </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Description</label>
                                        <div class="col col-10">
                                                <label class="input">
                                                        <input type="text" name="description" value="{{$autorisat->description}}" disabled>
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