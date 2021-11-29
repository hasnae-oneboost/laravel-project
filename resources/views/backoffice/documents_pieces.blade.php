@extends('layouts.dashboard')
@section('title')
Pièces jointes
@endsection
@section('breadcrumb')
	<!-- breadcrumb -->
	<ol class="breadcrumb" style="background-color: #333;" >
        <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
        <li>Intervention</li>
        <li>Pièces</li>
        <li><a href="{{route('backoffice_pieces')}}">Pièces</a></li>
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
                        <span class="widget-icon"> <i class="fa fa-file">&nbsp;</i> </span>
                    <p class="h6">&nbsp;Documents de la pièce: <strong>{{$pieces->libelle}}</strong></p>
                    </header>
						<!-- widget div-->
						<div>				
							 <!-- widget content -->
                             <div class="table-responsive">
                                <table id="dt_basic" class="table table-bordered" width="100%">
                                    <thead>			                
                                        <tr>
                                            <th>#</th>
                                            <th>Fichier</th>  
                                            <th>Ajouté par</th>
                                            <th>Modifié par</th>                                              
                                            <th>Actions</th>
                                        </tr>                                
                                    </thead>
                                    <tbody>
                                        @foreach($documentspieces as $documentpiece)                                        
                                        <tr>
                                        <td>{{$documentpiece->id}}</td>                              
                                        <td><a class="btn btn-red" data-toggle="modal" data-target="#file-{{$documentpiece->id}}"><i class="fa fa-file"></i></a></td>
                                    </td>
                                        <td>{{$documentpiece->ajoute_par}}</td>                              
                                        <td>{{$documentpiece->modifie_par}}</td>                              
                                        <td>                                                
                                            <button class="btn btn-secondary"  data-toggle="modal" data-target="#modifier-{{$documentpiece->id}}"><i class="fa fa-edit"></i></button>  
                                            <button class="btn btn-red"  data-toggle="modal" data-target="#supprimer-{{$documentpiece->id}}"><i class="fa fa-trash"></i></button>                                             
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
                    Ajouter un nouveau document à la pièce: <strong>{{$pieces->libelle}}</strong>
                </h4>
            </div>
            <div class="modal-body no-padding">            

                <form id="login-form" class="smart-form" action="{{route('backoffice_documents_pieces_ajouter',$pieces->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                            <fieldset>
                                <input type="hidden" name="piece_id" value="{{$pieces->id}}">
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Fichier</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="file" name="fichier" required>
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


<!-- Modal: file -->
@foreach($documentspieces as $d)
<div class="modal fade" id="file-{{$d->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <div class="modal-body no-padding">
                    <form id="login-form" class="smart-form" action="" method="POST">
                        {{csrf_field()}}
                                <fieldset>                                                                 
                                     <embed src="/documents_piece/{{$d->fichier}}" frameborder="0" width="100%" height="500px">         
                                </fieldset>                                      
                    </form>	
                </div>
    
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach
<!-- Modal: Supprimer -->
@foreach($documentspieces as $doc)
<div class="modal fade" id="supprimer-{{$doc->id}}"  tabindex="-1" role="dialog">
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

            <form id="login-form" class="smart-form" action="{{route('backoffice_documents_pieces_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                            <fieldset>                                            
                                    <input type="hidden" name="id" value="{{$doc->id}}">
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

@foreach($documentspieces as $docs)
<!-- Modal: Modifier -->
<div class="modal fade" id="modifier-{{$docs->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">
                        Modifier document ID N°<strong>{{$docs->id}}</strong> de la pièce: <strong>{{$pieces->libelle}}</strong>
                    </h4>
                </div>
                <div class="modal-body no-padding">         
    
                    <form id="login-form" class="smart-form" action="{{route('backoffice_documents_pieces_modifier',$pieces->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                                <fieldset>
                                        <input type="hidden" name="piece_id" value="{{$pieces->id}}">
                                        <input type="hidden" name="id" value="{{$docs->id}}">
                              
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Fichier</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="file" name="fichier" required>
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

@endsection