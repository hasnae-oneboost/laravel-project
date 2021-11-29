@extends('layouts.dashboard')
@section('title')
Liste des caisses
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Utilisations</li>
                <li>Caisses</li>
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
                    <p class="h6">&nbsp;Liste des caisses</p>  

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
                                    <th>Libellé</th> 
                                    <th>Numéro compte comptable</th>
                                    <th>Caisse principale</th>
                                    <th>Montant Min (DHs)</th>
                                    <th>Solde initial (DHs)</th>
                                    <th>Solde (DHs)</th>
                                    <th>Description</th>
                                    <th>Observation</th>
                                    <th>Ajouté Par</th>
                                    <th>Modifié Par</th>
                                    <th>Actions</th> 
                            </thead>
                            <tbody>
                                @foreach($caisses as $c)
                                <tr>
                                    <td>{{$c->code}}</td>
                                    <td>{{$c->libelle}}</td>
                                    <td>{{$c->numero_compte_comptable}}</td>
                                    <td>
                                            @if ($c->caisse_principale == 1)
                                               <div class="text-center"> <i class="fa fa-check" style="color: green; font-size: 25px"></i> </div>
                                            @elseif ($c->caisse_principale == 0)
                                               <div class="text-center"> <i class="fa fa-times" style="color:#e9212e; font-size: 25px"></i> </div>
                                            @endif
                                    </td>
                                    
                                    <td>{{number_format($c->montant_min,2,',',' ')}}</td>                                            
                                    <td>{{number_format($c->solde_initial,2,',',' ')}}</td>
                                    <td>{{number_format($c->solde_initial,2,',',' ')}}</td>                                   
                                    <td>{{$c->description}}</td>
                                    <td>{{$c->observation}}</td>
                                    <td>{{$c->ajoute_par}}</td>
                                    <td>{{$c->modifie_par}}</td>
                                    
                                    <td>
                                            @permission('Modifier') 
                                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#Modifier-{{$c->id}}"><i class="fa fa-edit"></i></button>
                                        @endpermission
                                        @permission('Supprimer') 
                                        <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$c->id}}"> <i class="fa fa-trash"></i></button>
                                        @endpermission
                                        
                                        <button class="btn btn-default" data-toggle="modal" data-target="#Visualiser-{{$c->id}}"> <i class="fa fa-eye"></i></button></td>
                                        
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
                 
    
                    <form id="login-form" class="smart-form" action="{{route('backoffice_caisse_ajouter')}}" method="POST">
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
                                                <label class="label col col-2">N° compte comptable</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="numero_compte_comptable" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Caisse principale</label>
                                                <div class="col col-10">
                                                    <div class="checkbox-default">
                                                        <label  style="font-size: 2em">
                                                        <input type="hidden" name="caisse_principale" value="0">                                                    
                                                        <input type="checkbox" name="caisse_principale" value="1" >                                                    
                                                    </label>
                                                    </div>
                                                    </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Montant Min</label>
                                                <div class="col col-10">
                                                    <label class="input"><i class="icon-append ">DHs</i></i>
                                                        <input type="number" name="montant_min" min="0.00" step="0.01" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Solde initial</label>
                                                <div class="col col-10">
                                                    <label class="input"><i class="icon-append ">DHs</i></i>
                                                        <input type="number" name="solde_initial" min="0" step="0.01" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Solde</label>
                                                <div class="col col-10">
                                                    <label class="input"><i class="icon-append ">DHs</i>
                                                        <input type="number" name="solde" min="0.00" step="0.01" required>
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
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Observation</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="observation" required>
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
@foreach($caisses as $ca)
<div class="modal fade" id="Modifier-{{$ca->id}}" tabindex="-1" role="dialog">
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

                <form id="login-form" class="smart-form" action="{{route('backoffice_caisse_modifier')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                            
                    <fieldset>
                            <input type="hidden" name="id" value="{{$ca->id}}">
                            
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Code</label>
                                        <div class="col col-10">
                                            <label class="input">                                                    
                                                <input type="text" name="code" value="{{$ca->code}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                                                     
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Libellé</label>
                                        <div class="col col-10">
                                            <label class="input">                                                    
                                                <input type="text" name="libelle" value="{{$ca->libelle}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">N° compte comptable</label>
                                        <div class="col col-10">
                                            <label class="input">                                                    
                                                <input type="text" name="numero_compte_comptable" value="{{$ca->numero_compte_comptable}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Caisse principale</label>
                                        <div class="col col-10">
                                                <div class="checkbox-default">
                                                    <label style="font-size: 2em"> 
                                                        <input type="hidden" name="caisse_principale" value="0">                                                                                                   
                                                        <input type="checkbox" name="caisse_principale" value="1" @if( $ca->caisse_principale == 1 ) checked @endif>
                                                    </label>
                                                </div>                                             
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Montant Min</label>
                                        <div class="col col-10">
                                            <label class="input"> <i class="icon-append ">DHs</i>                                                   
                                                <input type="number" name="montant_min" value="{{$ca->montant_min}}" min="0.00" step="0.01" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Solde initial</label>
                                        <div class="col col-10">
                                            <label class="input"> <i class="icon-append ">DHs</i>                                                   
                                                <input type="number" name="solde_initial" value="{{$ca->solde_initial}}" min="0" step="0.01" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Solde</label>
                                        <div class="col col-10">
                                            <label class="input"><i class="icon-append ">DHs</i>
                                                <input type="number" name="solde" value="{{$ca->solde}}" min="0.00" step="0.01" required>
                                            
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Description</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="description" value="{{$ca->description}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Observation</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="observation" value="{{$ca->observation}}" required>
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
@foreach($caisses as $caisse)
<div class="modal fade" id="Supprimer-{{$caisse->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_caisse_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>
                                
                                    <input type="hidden" name="id" value="{{$caisse->id}}">
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
@foreach($caisses as $cai)
<div class="modal fade" id="Visualiser-{{$cai->id}}" tabindex="-1" role="dialog">
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
                            <input type="hidden" name="id" value="{{$ca->id}}">
                            
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Code</label>
                                        <div class="col col-10">
                                            <label class="input">                                                    
                                                <input type="text" name="code" value="{{$cai->code}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                                                     
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Libellé</label>
                                        <div class="col col-10">
                                            <label class="input">                                                    
                                                <input type="text" name="libelle" value="{{$cai->libelle}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">N° compte comptable</label>
                                        <div class="col col-10">
                                            <label class="input">                                                    
                                                <input type="text" name="numero_compte_comptable" value="{{$cai->numero_compte_comptable}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Caisse principale</label> 
                                            <div class="col col-10">
                                                <div class="checkbox-default">
                                                        <label  style="font-size: 2em"> 
                                                <input type="checkbox" name="caisse_principale" value="{{$cai->caisse_principale}}" @if( $cai->caisse_principale == 1 ) checked @endif disabled>                                                    
                                                        </label>
                                                </div>
                                            </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Montant Min</label>
                                        <div class="col col-10">
                                            <label class="input"> <i class="icon-append ">DHs</i>                                                    
                                                <input type="number" name="montant_min" value="{{$cai->montant_min}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Solde initial</label>
                                        <div class="col col-10">
                                            <label class="input"> <i class="icon-append ">DHs</i>                                                       
                                                <input type="number" name="solde_initial" value="{{$cai->solde_initial}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Solde</label>
                                        <div class="col col-10">
                                            <label class="input"><i class="icon-append ">DHs</i> 
                                                <input type="number" name="solde" value="{{$cai->solde}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>                          
                          
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Description</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="description" value="{{$ca->description}}" disabled>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Observation</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="text" name="observation" value="{{$cai->observation}}" disabled>
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