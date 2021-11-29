@extends('layouts.dashboard')
@section('title')
Liste des photos de la pièces
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
		<!--end breadcrumb-->
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
        <!-- row -->
        <div class="row">    
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">    
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" 
                data-widget-deletebutton="false" data-widget-togglebutton="false" role="widget">
                    <header>    
                        <span class="widget-icon"> <i class="fa fa-list">&nbsp;</i></span>
                        <p class="h6">&nbsp;Liste des photos de la pièces</p>  
                    </header>                    
                    <!-- widget div-->
                    <div>    
                        <!-- widget content -->
                        <div class="table-responsive">
                            <table id="dt_basic" class="table table-bordered" width="100%">
                                <thead>			                
                                    <tr>
                                        <th>Photo</th>
                                        <th>N° Ordre</th>                                                
                                        <th>Actions</th>
                                    </tr>                                
                                </thead>
                                <tbody>
                                    @foreach($piecesphotos as $piecephoto)                                        
                                    <tr>
                                    <td><img src="/images_pieces/{{$piecephoto->photo}}" alt="" height="50px" width="50px"></td>
                                    <td>{{$piecephoto->ordre}}</td>                              
                                    <td>                                                
                                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#modifier-{{$piecephoto->id}}"><i class="fa fa-edit"></i></button>  
                                        <button class="btn btn-red"  data-toggle="modal" data-target="#supprimer-{{$piecephoto->id}}"><i class="fa fa-trash"></i></button>                                             
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
<!-- Modal: Liste-->

    <!--*******************************************-->
    
@foreach($piecesphotos as $photos)     
<div id="modifier-{{$photos->id}}" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modifier</h4>
                    </div>
                    <div class="modal-body">
                            <form id="add-event-form smart-form" action="{{route('backoffice_photo_pieces_modifier')}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}                                    
                                    <fieldset>            
                                        <div class="form-group">
                                            <label>Photo</label>
                                            <input type="hidden" name="id" value="{{$photos->id}}">
                                            <input class="form-control" name="photo" type="file" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>N° Ordre</label>
                                            <input class="form-control" name="ordre" type="text" value="{{$photos->ordre}}">
                                        </div>    
                                    </fieldset>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-red" type="submit" >
                                                    Valider
                                                </button>
                                                <button class="btn btn-default" data-dismiss="modal" data-dismiss="modal" aria-hidden="true">Annuler</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                    </div>
                  
        
                </div>
            </div>
</div>
@endforeach 

@foreach($piecesphotos as $photo)
<div class="modal fade" id="supprimer-{{$photo->id}}"  tabindex="-1" role="dialog">
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
    
                <form id="login-form" class="smart-form" action="{{route('backoffice_photo_pieces_supprimer')}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                                <fieldset>                                    
                                        <input type="hidden" name="id" value="{{$photo->id}}">
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