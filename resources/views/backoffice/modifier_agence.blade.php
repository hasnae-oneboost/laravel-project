@extends('layouts.dashboard')
@section('title')
Modifier l'agence bancaire
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Utilisation</li>
                <li>Caisses</li>
                <li>Trésorerie</li>
                <li><a href="{{route('backoffice_agences')}}">Agences bancaires</a></li>
                <li>@yield('title')</li>	
		</ol>
			<!-- end breadcrumb -->
@endsection


@section('content')

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
                                        <h2>Modifier l'agence bancaire</h2>
                
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
                                            
                                            <form class="smart-form" files="true" action="{{route('backoffice_agences_modifier')}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    {{method_field('PATCH')}}
                                             <header></header>
                    
                                                <fieldset>
                                                    <div class="row">
                                                           
                                                        <section class="col col-6">
                                                            <label  class="label">
                                                                        Code
                                                            </label>
                                                            <label class="input">
                                                                <input type="hidden" name="id" value="{{$agences->id}}">
                                                                <input type="text"  class="form-control" name="code" value="{{$agences->code}}" required>
                                                            </label>
                                                        
                                                        </section>
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                            Libelle
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="libelle" value="{{$agences->libelle}}" required>
                                                                   
                                                                </label>
                                                        </section>
                                                        <section class="col col-6">
                                                                        <label class="label">
                                                                                Directeur de l'agence
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="directeur" value="{{$agences->directeur_agence}}" required>
                                                                           
                                                                        </label>
                                                        </section>
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                            Banque
                                                                </label>
                                                                <label class="select">                                                                    
                                                                        <select class="banque_selected" name="banque" id="banque" style="width:695px;" required>
                                                                            <option value="{{$agences->banque_id}}">{{$agences->banque->nom}}</option>
                                                                            @foreach($banque as $b)
                                                                            <option value="{{$b->id}}">{{$b->nom}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                   
                                                                </label>
                                                        </section>
                                                    </div>
                                                    <div class="row">
                                                        <section class="col col-6">
                                                                        <label class="label">
                                                                                    Ville
                                                                        </label>
                                                                        <label class="select">                                                                    
                                                                                        <select class="ville_selected" name="ville" id="ville" style="width:695px;" required>
                                                                                                        <option value="{{$agences->ville_id}}">{{$agences->ville->libelle_ville}}</option>
                                                                                                       @foreach($ville as $v)
                                                                                                        <option value="{{$v->id}}">{{$v->libelle_ville}}</option>
                                                                                                       @endforeach
                                                                                                    </select>
                                                                       
                                                                     </label>
                                                            </section>
                                                      
                                                        <section class="col col-6">
                                                                        <label class="label">
                                                                                    Tel.
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="telephone" value="{{$agences->telephone}}" required>
                                                                           
                                                                        </label>
                                                        </section>

                                                        <section class="col col-6">
                                                                    <label class="label">
                                                                                Fax
                                                                    </label>
                                                                    <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="fax" value="{{$agences->fax}}" required>
                                                                   
                                                                </label>
                                                                  
                                                        </section>
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                            Description
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="description" value="{{$agences->description}}" required>
                                                                   
                                                                </label>
                                                </section>      
                                                 </div>
                    
                                                 <div class="row">
                                                                 
                                                                <section class="col col-6">
                                                                                <label class="label">
                                                                                            Adresse
                                                                                </label>
                                                                                <label class="input">                                                                    
                                                                                        <input type="text"  class="form-control" name="adresse" value="{{$agences->adresse}}" required>
                                                                                   
                                                                                </label>
                                                                </section>
                                                                <section class="col col-6">
                                                                                    <label class="label">
                                                                                                Chargé de la clientèle
                                                                                    </label>
                                                                                    <label class="input">                                                                    
                                                                                            <input type="text"  class="form-control" name="chargé_de_la_clientèle" value="{{$agences->charge_de_clientele}}" required>
                                                                                       
                                                                                    </label>
                                                                </section>                                                     
                                                            
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                        Tel. Chargé de la clientèle
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="telephone_chargé_de_la_clientèle" value="{{$agences->tel_charge_de_clientele}}" required>
                                                                </label>
                                                    </section>
                                                 <section class="col col-6">
                                                                <label class="label">
                                                                       Email Chargé de la clientèle
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="email_chargé_de_la_clientèle" value="{{$agences->email_cdc}}" required>
                                                                   
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