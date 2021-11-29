@extends('layouts.dashboard')
@section('title')
Gallerie piece
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
<div id="content">
    <div class="row">
        <div class="col-sm-12">
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
            <!-- Get the success message after updating-->
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
         </div>
     </div>           
    </div>
</div>

<!-- MAIN PANEL -->
<div id="main" role="main">
    <!-- MAIN CONTENT -->
    <div id="content">
        <!--*****************************************-->
        <section id="widget-grid" class="">
            <!-- start row -->
					<div class="row">				
                            <h2 class="row-seperator-header"><i class="glyphicon glyphicon-picture"></i> Photos & Informations </h2>
                            <div class="col-sm-12">                    
                                <div class="row">
                    
                                    <div class="col-sm-12 col-md-12 col-lg-6">                                           
                                        <!-- well -->
                                        <div class="well">   
                                            <h3><strong>Photos</strong></h3>
                                            <div id="myCarousel-2" class="carousel slide">
                                                <ol class="carousel-indicators">
                                                    @foreach($piecesphotos as $piecephoto)
                                                    <li data-target="#myCarousel-2" data-slide-to="{{count($piecephoto->id)}}" class="active"></li>
                                                    @endforeach
                                                </ol>
                                                <div class="carousel-inner">
                                                    <!-- Slide 1 -->
                                                    @foreach($piecesphotos as $key => $photos)                                                  
                                                        <div class="item{{ $key == 0 ? ' active' : '' }}">
                                                            <img src="/images_pieces/{{$photos->photo}}" alt="photo" >
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                                                <a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
                                            </div>
                                        </div>
                                        <!-- end well-->
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <!-- well -->
                                        <div class="well">
                                                <div class="row pull-right">
                                                        <a type="button" class="btn btn-red btn-sm" href="{{route('backoffice_photo_pieces_list',$pieces->id)}}" target="_blank">
                                                            Liste des photos
                                                        </a>
                                                </div>
                                            <h3><strong>Informations</strong></h3>
                                            <div class="row">
                                            <dl>
                                                <dt class="col-sm-3">Famille</dt>
                                                <dd class="col-sm-9">{{$pieces->famille->libelle}}</dd>
                                                <dt class="col-sm-3">Catégorie</dt>
                                                <dd class="col-sm-9">{{$pieces->categorie->libelle}}</dd>
                                                <dt class="col-sm-3">Marque</dt>
                                                <dd class="col-sm-9">{{$pieces->marque->libelle}}</dd>
                                                <dt class="col-sm-3">Code</dt>
                                                <dd class="col-sm-9">{{$pieces->code}}</dd>
                                                <dt class="col-sm-3">Unité</dt>
                                                <dd class="col-sm-9">{{$pieces->unite->libelle}}</dd>
                                                <dt class="col-sm-3">Libelle</dt>
                                                <dd class="col-sm-9">{{$pieces->libelle}}</dd>                                           
                                            </dl>
                                            </div>
                                        </div>
                                        <div class="well">
                                                <h3><strong>Ajouter une nouvelle photo</strong></h3>
                                            <div class="row">                                                
                                                <form class="smart-form" action="{{route('backoffice_pieces_gallerie_ajouter',$pieces->id)}}" method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                    <fieldset>
                                                        <section>
                                                            <label class="label">Photo(s)</label>
                                                            <label class="input">
                                                                    <input type="hidden" name="piece_id" value="{{$pieces->id}}">
                                                                <input type="file" name="photos" required>
                                                            </label>
                                                        </section>
                                                        <section>
                                                            <label class="label">N° Ordre</label>
                                                            <label class="input">
                                                                    <input type="text" name="ordre" value="" required>
                                                            </label>
                                                        </section>
                                                    </fieldset>                                                    
                                                    <button type="submit" class="btn btn-red pull-right btn-sm" style="margin-top: 10px">Ajouter</button>
                                                </form>
                                            </div>         
                                        </div>
                                        <!-- end well -->
                                       
                                    </div>
                    
                                </div>
                                
                    
                            </div>
                    
                        </div>
                        <!-- end row -->
    
                       
    </div>
        </section>
    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

@endsection
