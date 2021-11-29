@extends('layouts.dashboard')
@section('title')
Modifier détail 
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                        <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                        <li>Utilisation</li>
                        <li>Transport</li>                        
                        <li><a href="{{route('backoffice_detail_trajet')}}">Details des trajets</a></li>
                        <li>@yield('title')</li>	
		</ol>
			<!-- end breadcrumb -->
@endsection


@section('content')
<div id="content">
        <div class="row">
            <div class="col-sm-12">
            <!-- widget grid -->
                    <section id="widget-grid" class="">
                       
                        <!-- START ROW -->
                        <div class="row">
                            <!-- NEW COL START -->
                            <article class="col-sm-12 col-md-12 col-lg-12">
                        
                                <!-- Widget ID (each widget will need unique ID)-->
                                <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                                        <!-- widget options:
                                        usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
                        
                                        data-widget-colorbutton="false"
                                        data-widget-editbutton="false"
                                        data-widget-togglebutton="false"
                                        data-widget-deletebutton="false"
                                        data-widget-fullscreenbutton="false"
                                        data-widget-custombutton="false"
                                        data-widget-collapsed="true"
                                        data-widget-sortable="false"
                        
                                        -->
                                    <header>
                                            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                                            <h2>Modifier détail</h2>
                    
                                    </header>
                        
                                    <!-- widget div-->
                                    <div>
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
    
                        
                                    <!-- widget content -->
    
                                            
                                    <div class="widget-body">
                                                
                                        <form class="smart-form" files="true" action="{{route('backoffice_detail_modifier')}}" method="POST" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        {{method_field('PATCH')}}
                                                        
                                             <header></header>
                        
                                                <fieldset>
                                                    <div class="row">
                                                               
                                                        <section class="col col-6">
                                                            <label  class="label">
                                                                            Trajet
                                                            </label>
                                                            <label class="select">
                                                                    <input type="hidden" name="id" value="{{$details->id}}">
                                                                
                                                                <select class="select" name="trajet" id="trajet"  required>
                                                                    <option value="{{$details->trajet_id}}">{{$details->trajet->libelle}}</option>
                                                                   
                                                                    @foreach($trajets as $t)
                                                                    <option value="{{$t->id}}">{{$t->libelle}}</option>
                                                                    @endforeach
                                                                    
                                                                </select>
                                                            </label>
                                                            
                                                        </section>
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                                    Catégorie du trajet
                                                                </label>
                                                                <label class="select">                                                                    
                                                                    <select class="select" name="categorie_trajet" id="categorie"  required>
                                                                        <option value="{{$details->categorie_id}}">{{$details->categorietrajet->libelle}}</option>
                                                                       
                                                                        @foreach($categories as $c)
                                                                        <option value="{{$c->id}}">{{$c->libelle}}</option>
                                                                        @endforeach
                                                                        
                                                                    </select>
                                                                           
                                                                </label>
                                                        </section>
                                                      
                                                    </div>
                                                    <div class="row">
                                                            <section class="col col-6">
                                                                    <label class="label">
                                                                                        Date début
                                                                    </label>
                                                                    <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="date_debut" value="{{$details->date_debut}}" required>                                                                        
                                                                    </label>                      
                                                            </section>
                                                        <section class="col col-6">
                                                                            <label class="label">
                                                                                    Date fin
                                                                            </label>
                                                                            <label class="input">                                                                    
                                                                                    <input type="text"  class="form-control" name="date_fin" value="{{$details->date_fin}}" required>
                                                                            </label>
                                                        </section>
                                                      
                                                       
                                                    </div>
                                                    <div class="row">
                                                        
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                        Prime de déplacement du 1er conducteur
                                                                </label>
                                                                <label class="input"><i class="icon-append ">Dh</i>                                                                   
                                                                        <input type="number" min="0" step="0.01" class="form-control" name="prime_deplacement_1er_conducteur" value="{{$details->prime_deplacement_1er_conducteur}}" required>
                                                                   
                                                                </label>
                                                        </section>
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                Prime de déplacement du 2eme conducteur
                                                            </label>
                                                            <label class="input"><i class="icon-append ">Dh</i>                                                                    
                                                                    <input type="number" min="0" step="0.01"  class="form-control" name="prime_deplacement_2eme_conducteur" value="{{$details->prime_deplacement_2eme_conducteur}}" required>
                                                                               
                                                            </label>
                                                        </section>
                                                    </div>
                                                    <div class="row">
                                                            <section class="col col-6">
                                                                    <label class="label">
                                                                                Frais de route
                                                                    </label>
                                                                    <label class="input"><i class="icon-append ">Dh</i>                                                                    
                                                                            <input type="number" min="0" step="0.01" class="form-control" name="frais_route" value="{{$details->frais_route}}" required>
                                                                       
                                                                    </label>
                                                            </section>
                                                            <section class="col col-6">
                                                                    <label class="label">
                                                                                Consommation
                                                                    </label>
                                                                    <label class="input"><i class="icon-append ">L</i>                                                                    
                                                                            <input type="number" min="0" class="form-control" name="consommation" value="{{$details->consommation}}" required>
                                                                       
                                                                    </label>
                                                            </section>
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                            Description
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="description" value="{{$details->description}}" required>
                                                                   
                                                                </label>
                                                        </section>
                                                         
                                                         
                                                    </div>
                        
                                                    
                                                                 
                                                </fieldset>
                        
                                                   
                        
                                                    <footer>
                                                        <button type="submit" class="btn btn-red">
                                                            Valider
                                                        </button>
                                                        <button type="button" class="btn btn-default" onclick="window.history.back();">
                                                            Retour
                                                        </button>
                                                    </footer>
                                                </form>
                        
                                            </div>
                                            <!-- end widget content -->
                        
                                        </div>
                                        <!-- end widget div -->
                        
                                    </div>
                                    <!-- end widget -->
                        
                                </article>
                                <!-- END COL -->
                                </div>
                           <!-- END ROW -->
                       
                  </section>

                </div>


         </div>   

        </div>
    </div>    




        
@endsection