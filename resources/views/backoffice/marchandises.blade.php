@extends('layouts.dashboard')

@section('title')
Marchandises
@endsection

@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Utilisation</li>
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
                    <p class="h6">&nbsp;Marchandises</p>  

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
                                    <th>Libellé</th>
                                    <th>Type de marchandise</th>
                                    <th>Unité</th>
                                    <th>TVA (%)</th>
                                    <th>Description</th>
                                    <th>Ajouté Par</th>
                                    <th>Modifié Par</th>
                                    <th>Actions</th>
                                
                            </thead>
                            <tbody>
                                @foreach($marchandises as $m)
                                <tr>
                                    <td>{{$m->libelle}}</td>
                                    <td>{{$m->typesmarchandise->libelle}}</td>
                                    <td>{{$m->unite->libelle}}</td>
                                    <td>{{$m->tva->taux_tva}}</td>
                                    <td>{{$m->description}}</td>
                                    <td>{{$m->ajoute_par}}</td>
                                    <td>{{$m->modifie_par}}</td>
                                    <td>
                                        @permission('Modifier') 
                                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#Modifier-{{$m->id}}"><i class="fa fa-edit"></i></button>
                                        @endpermission
                                        @permission('Supprimer') 
                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$m->id}}"> <i class="fa fa-trash"></i></button>
                                        @endpermission
                                        <button class="btn btn-default" data-toggle="modal" data-target="#Visualiser-{{$m->id}}"> <i class="fa fa-eye"></i></button></td>
                                        
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

<!-- Modal: Ajouter poste -->
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
                 
    
                    <form id="login-form" class="smart-form" action="{{route('backoffice_marchandise_ajouter')}}" method="POST">
                        {{csrf_field()}}
                                <fieldset>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Libellé</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="libelle" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2">Type</label>
                                            <div class="col col-10">
                                                <label class="select">
                                                    <select name="type_marchandise" required>
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
                                                <label class="label col col-2">Unité</label>
                                                <div class="col col-10">
                                                    <label class="select">
                                                        <select name="unite" required>
                                                            <option value=""></option>
                                                            @foreach($unites as $u)
                                                            <option value="{{$u->id}}">{{$u->libelle}}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2">TVA</label>
                                            <div class="col col-10">
                                                <label class="select">
                                                    <select name="tva" required>
                                                        <option value=""></option>
                                                        @foreach($tva as $tv)
                                                        <option value="{{$tv->id}}">{{$tv->libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                                    <div class="row">
                                                        <label class="label col col-2">Description</label>
                                                        <div class="col col-10">
                                                            <label class="input">
                                                                <input type="text" name="description" required>
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
@foreach($marchandises as $ma)
<div class="modal fade" id="Modifier-{{$ma->id}}" tabindex="-1" role="dialog">
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

                <form id="login-form" class="smart-form" action="{{route('backoffice_marchandise_modifier')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                            
                                                
                        <fieldset>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Libellé</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="hidden" name="id" value="{{$ma->id}}">
                                                <input type="text" name="libelle" value="{{$ma->libelle}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                <div class="row">
                                    <label class="label col col-2">Type</label>
                                    <div class="col col-10">
                                        <label class="select">
                                            <select name="type_marchandise" required>
                                                <option value="{{$m->type_id}}">{{$m->typesmarchandise->libelle}}</option>
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
                                        <label class="label col col-2">Unité</label>
                                        <div class="col col-10">
                                            <label class="select">
                                                <select name="unite" required>
                                                <option value="{{$m->unite_id}}">{{$m->unite->libelle}}</option>
                                                    @foreach($unites as $u)
                                                    <option value="{{$u->id}}">{{$u->libelle}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                <div class="row">
                                    <label class="label col col-2">TVA</label>
                                    <div class="col col-10">
                                        <label class="select">
                                            <select name="tva" required>
                                                <option value="{{$m->tva_id}}">{{$m->tva->libelle}}</option>
                                                @foreach($tva as $tv)
                                                <option value="{{$tv->id}}">{{$tv->libelle}}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            </section>
                            <section>
                                            <div class="row">
                                                <label class="label col col-2">Description</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="description" value="{{$m->description}}" required>
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
@foreach($marchandises as $mar)
<div class="modal fade" id="Supprimer-{{$mar->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_marchandise_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>
                                
                                    <input type="hidden" name="id" value="{{$mar->id}}">
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
@foreach($marchandises as $marc)
<div class="modal fade" id="Visualiser-{{$marc->id}}" tabindex="-1" role="dialog">
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
                                    <label class="label col col-2">Libellé</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <input type="text" name="libelle" value="{{$marc->libelle}}" disabled>
                                        </label>
                                    </div>
                                </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-2">Type</label>
                                <div class="col col-10">
                                    <label class="select">
                                        <select name="type_marchandise" disabled>
                                            <option value="{{$m->type_id}}">{{$m->typesmarchandise->libelle}}</option>
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
                                    <label class="label col col-2">Unité</label>
                                    <div class="col col-10">
                                        <label class="select">
                                            <select name="unite" disabled>
                                            <option value="{{$m->unite_id}}">{{$m->unite->libelle}}</option>
                                                @foreach($unites as $u)
                                                <option value="{{$u->id}}">{{$u->libelle}}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-2">TVA</label>
                                <div class="col col-10">
                                    <label class="select">
                                        <select name="tva" disabled>
                                            <option value="{{$m->tva_id}}">{{$m->tva->libelle}}</option>
                                            @foreach($tva as $tv)
                                            <option value="{{$tv->id}}">{{$tv->libelle}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                                        <div class="row">
                                            <label class="label col col-2">Description</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="text" name="description" value="{{$m->description}}" disabled>
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