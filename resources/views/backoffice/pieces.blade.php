@extends('layouts.dashboard')
@section('title')
Pieces
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Intervention</li>
                <li>Pièces</li>
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
        
            <div class="row">        
                <!--Button ajout-->
                <div class="pull-right">
                            
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                                
                                <h1 class="page-title txt-color-blueDark">
                                        @permission('Créer') 
                                           <div class="">
                                           <button class="btn btn-red btn-lg" onclick="window.location.href='{{route('backoffice_rapport_piece')}}'" ><i class="fa fa-file-pdf-o"></i></button>
                                           </div>
                                           @endpermission
                                       </h1>

                            </div>
                       
                </div>
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
            </div>
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
                                            <form id="login-form" class="smart-form" action="{{route('backoffice_pieces')}}" method="get">
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col col-3">
                                                            <label class="label">
                                                                Famille 
                                                            </label>
                                                            <label class="input">
                                                                <select name="famille" id="">
                                                                <option value=""></option>
                                                                    @foreach($familles as $f)
                                                                    <option value="{{$f->id}}" @if($selected_famille == $f->id) selected="selected" @endif>{{$f->libelle}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </label>
                                                        </div>
                                                        <div class="col col-3">
                                                            <label class="label">
                                                                Catégorie
                                                            </label>
                                                            <label class="select">
                                                                    <select name="categorie" class="">
                                                                            <option value=""></option>
                                                                            @foreach($categories as $c)
                                                                            <option value="{{$c->id}}" @if($selected_categorie == $c->id) selected="selected" @endif>{{$c->libelle}}</option>
                                                                            @endforeach
                                                                    </select>
                                                            </label>                                                    
                                                        </div>
                                                        <div class="col col-3">
                                                                <label class="label">
                                                                    Marque
                                                                </label>
                                                                <label class="select">
                                                                        <select name="marque" class="">
                                                                                <option value=""></option>
                                                                                @foreach($marques as $m)
                                                                                <option value="{{$m->id}}" @if($selected_marque == $m->id) selected="selected" @endif>{{$m->libelle}}</option>
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
                    <!-- row -->
                    <div class="row">                
                        <!-- NEW WIDGET START -->
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
                
                            <!-- Widget ID (each widget will need unique ID)-->
                            <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" 
                            data-widget-deletebutton="false" data-widget-togglebutton="false" role="widget">
                                <header>                                    
                                    <span class="widget-icon"> <i class="fa fa-list">&nbsp;</i> </span>
                                    <p class="h6">&nbsp;Pieces</p>
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
                                                    <th>Famille</th>
                                                    <th>Catégorie</th>
                                                    <th>Marque</th>
                                                    <th>Code</th>
                                                    <th>Unité</th>
                                                    <th>Libelle</th>
                                                    <th>Prix HT</th>
                                                    <th>Stock minimal</th>
                                                    <th>Ajouté Par</th>
                                                    <th>Modifié Par</th>
                                                    <th>Actions</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                    @foreach($pieces as $p)
                                                    <tr>
                                                        <td>{{$p->famille->libelle}}</td> 
                                                        <td>{{$p->categorie->libelle}}</td> 
                                                        <td>{{$p->marque->libelle}}</td> 
                                                        <td>{{$p->code}}</td> 
                                                        <td>{{$p->unite->libelle}}</td>
                                                        <td>{{$p->libelle}}</td>
                                                        <td>{{$p->prix_ht}}</td>
                                                        <td>{{$p->stock_minimal}}</td>
                                                        <td>{{$p->ajoute_par}}</td>
                                                        <td>{{$p->modifie_par}}</td>
                                                        <td>
                                                        @permission('Modifier') 
                                                            <button class="btn btn-secondary"  data-toggle="modal" data-target="#Modifier-{{$p->id}}"><i class="fa fa-edit"></i></button>
                                                        @endpermission
                                                        @permission('Supprimer') 
                                                            <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$p->id}}"> <i class="fa fa-trash"></i></button>
                                                        @endpermission
                                                        <button class="btn btn-default" data-toggle="modal" data-target="#Visualiser-{{$p->id}}"> <i class="fa fa-eye"></i></button>
                                                        <button class="btn btn-default" onclick="window.location.href='{{route('backoffice_pieces_gallerie',$p->id)}}'"> <i class="fa fa-picture-o"></i></button>
                                                        <button  class="btn btn-default" onclick="window.location.href='{{route('backoffice_imprime_info_pieces',$p->id)}}'"><i class="fa fa-print"></i></button>
                                                        <button  class="btn btn-default" onclick="window.location.href='{{route('backoffice_documents_pieces',$p->id)}}'" ><i class="fa fa-file"></i></button>
                                                        
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
                    <form id="login-form" class="smart-form" action="{{route('backoffice_pieces_ajouter')}}" method="POST">
                        {{csrf_field()}}
                                <fieldset>                                    
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Famille</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <select name="famille" id="" required>
                                                            <option value=""></option>
                                                            @foreach($familles as $f)
                                                            <option value="{{$f->id}}">{{$f->libelle}}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Catégorie</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                            <select name="categorie" id="" required>
                                                                    <option value=""></option>
                                                                    @foreach($categories as $cat)
                                                                    <option value="{{$cat->id}}">{{$cat->libelle}}</option>
                                                                    @endforeach
                                                                </select>
                                                                                                                
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Marque</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                            <select name="marque" id="" required>
                                                                    <option value=""></option>
                                                                    @foreach($marques as $m)
                                                                    <option value="{{$m->id}}">{{$m->libelle}}</option>
                                                                    @endforeach
                                                                </select>
                                                                                                                
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Code</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        @if($pieceid != null)
                                                        <input type="text" class="form-control" name="code" value="P {{$pieceid + 1}}" readonly required>                                                       
                                                        
                                                        @else
                                                        <input type="text" class="form-control" name="code" value="P 1" readonly required>                                                       
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Unité</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                            <select name="unite" id="" required>
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
                                                <label class="label col col-2">Libelle</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                            <input type="text" name="libelle" class="form-control" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Prix HT</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                            <input type="number" min="0" step="0.01" name="prix_ht" class="form-control" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Stock minimal</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                            <input type="number" min="0" name="stock_minimal" class="form-control" required>
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
@foreach($pieces as $pi)
<div class="modal fade" id="Modifier-{{$pi->id}}" tabindex="-1" role="dialog">
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

                <form id="login-form" class="smart-form" action="{{route('backoffice_pieces_modifier')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}                            
                    <fieldset>                                    
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Famille</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="hidden" name="id" value="{{$pi->id}}">
                                                <select name="famille" id="" required>
                                                    <option value="{{$pi->famille_id}}">{{$pi->famille->libelle}}</option>
                                                    @foreach($familles as $f)
                                                    <option value="{{$f->id}}">{{$f->libelle}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Catégorie</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                    <select name="categorie" id="" required>
                                                            <option value="{{$pi->categorie_id}}">{{$pi->categorie->libelle}}</option>
                                                            @foreach($categories as $cat)
                                                            <option value="{{$cat->id}}">{{$cat->libelle}}</option>
                                                            @endforeach
                                                        </select>
                                                                                                        
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Marque</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                    <select name="marque" id="" required>
                                                            <option value="{{$pi->marque_id}}">{{$pi->marque->libelle}}</option>
                                                            @foreach($marques as $m)
                                                            <option value="{{$m->id}}">{{$m->libelle}}</option>
                                                            @endforeach
                                                        </select>
                                                                                                        
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Code</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                
                                                <input type="text" class="form-control" name="code" value="{{$pi->code}}" readonly required>                                                       
                                               
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Unité</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                    <select name="unite" id="" required>
                                                            <option value="{{$pi->unite_id}}">{{$pi->unite->libelle}}</option>
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
                                        <label class="label col col-2">Libelle</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                    <input type="text" name="libelle" class="form-control" value="{{$pi->libelle}}" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Prix HT</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                    <input type="number" min="0" step="0.01" name="prix_ht" value="{{$pi->prix_ht}}" class="form-control" required>
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Stock minimal</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                    <input type="number" min="0" name="stock_minimal" value="{{$pi->stock_minimal}}" class="form-control" required>
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
@foreach($pieces as $pie)
<div class="modal fade" id="Visualiser-{{$pie->id}}" tabindex="-1" role="dialog">
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
                                            <label class="label col col-2">Famille</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="hidden" name="id" value="{{$pie->id}}">
                                                    <select name="famille" id="" disabled>
                                                        <option value="{{$pie->famille_id}}">{{$pie->famille->libelle}}</option>
                                                        @foreach($familles as $f)
                                                        <option value="{{$f->id}}">{{$f->libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Catégorie</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                        <select name="categorie" id="" disabled>
                                                                <option value="{{$pie->categorie_id}}">{{$pie->categorie->libelle}}</option>
                                                                @foreach($categories as $cat)
                                                                <option value="{{$cat->id}}">{{$cat->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                                                                            
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Marque</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                        <select name="marque" id="" disabled>
                                                                <option value="{{$pie->marque_id}}">{{$pie->marque->libelle}}</option>
                                                                @foreach($marques as $m)
                                                                <option value="{{$m->id}}">{{$m->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                                                                            
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Code</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    
                                                    <input type="text" class="form-control" name="code" value="{{$pie->code}}" readonly disabled>                                                       
                                                   
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Unité</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                        <select name="unite" id="" disabled>
                                                                <option value="{{$pie->unite_id}}">{{$pie->unite->libelle}}</option>
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
                                            <label class="label col col-2">Libelle</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                        <input type="text" name="libelle" class="form-control" value="{{$pie->libelle}}" disabled>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Prix HT</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                        <input type="number" min="0" step="0.01" name="prix_ht" value="{{$pie->prix_ht}}" class="form-control" disabled>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Stock minimal</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                        <input type="number" min="0" name="stock_minimal" value="{{$pie->stock_minimal}}" class="form-control" disabled>
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
@foreach($pieces as $piece)
<div class="modal fade" id="Supprimer-{{$piece->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_pieces_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>                                            
                                    <input type="hidden" name="id" value="{{$piece->id}}">
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