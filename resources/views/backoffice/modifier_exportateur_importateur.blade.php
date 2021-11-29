@extends('layouts.dashboard')
@section('title')
Modifier exportateur/importateur
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Transport</li>
                <li><a href="{{route('backoffice_exportateurs_importateurs')}}">Exportateur & Importateur</a></li>
                <li>@yield('title')</li>	
		</ol>
			<!-- end breadcrumb -->
@endsection

@section('content')

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
                                        <h2>Modifier exportateur/importateur</h2>
                
                                </header>
                    
                                <!-- widget div-->
                                <div>                                 
                    
                                <!-- widget content -->

                                        
                            <div class="widget-body">
                                            
                                        <form class="smart-form" files="true" action="{{route('backoffice_exportateur_importateur_ajouter')}}" method="POST" >
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}                                            
                                            <fieldset>
                                                <div class="row">
                                                    <section class="col col-6">
                                                            <label class="label">
                                                                        Raison sociale
                                                            </label>
                                                            <label class="input"> 
                                                                <input type="hidden" name="id" value="{{$exportateurs_importateurs->id}}">                                                                   
                                                                    <input type="text"  class="form-control" name="raison_sociale" value="{{$exportateurs_importateurs->raison_sociale}}" required>
                                                            </label>
                                                    </section>
                                                    <section class="col col-6">
                                                                        <label class="label">
                                                                        Adresse
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="adresse" value="{{$exportateurs_importateurs->adresse}}" required>                                                                           
                                                                        </label>
                                                    </section>
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                 Pays
                                                        </label>
                                                        <label class="select">                                                                    
                                                            <select class="pays_select" name="pays" id="pays" style="width:695px;" required>
                                                                <option value="{{$exportateurs_importateurs->pay_id}}">{{$exportateurs_importateurs->pay->libelle_pays}}</option>
                                                                @foreach($pays as $p)
                                                                    <option value="{{$p->id}}">{{$p->libelle_pays}}</option>
                                                                @endforeach
                                                            </select>                                                                   
                                                        </label>
                                                    </section>
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                    Ville
                                                        </label>
                                                        <label class="select">                                                                    
                                                            <select class="ville_select" name="ville" id="ville" style="width:695px;" required>
                                                                    <option value="{{$exportateurs_importateurs->ville_id}}">{{$exportateurs_importateurs->ville->libelle_ville}}</option>                                                    
                                                            </select>                                                                       
                                                        </label>
                                                    </section>
                                                </div>
                                                <div class="row">                                                    
                                                    <section class="col col-6">
                                                            <label class="label">
                                                                       Telephone fixe N°1
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="fixe1" value="{{$exportateurs_importateurs->fixe1}}" required>        
                                                            </label>
                                                    </section>
                                                    <section class="col col-6">
                                                            <label class="label">
                                                                       Telephone fixe N°2
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="fixe2" value="{{$exportateurs_importateurs->fixe2}}" required>        
                                                            </label>
                                                    </section>
                                                </div>
                                                <div class="row">                                                        
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                        GSM
                                                        </label>
                                                        <label class="input">                                                                    
                                                                <input type="text"  class="form-control" name="gsm" value="{{$exportateurs_importateurs->gsm}}" required>
                                                                       
                                                        </label>
                                                    </section>
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                   Fax
                                                        </label>
                                                        <label class="input">                                                                    
                                                                <input type="text"  class="form-control" name="fax" value="{{$exportateurs_importateurs->fax}}" required>       
                                                        </label>
                                                    </section>                                                      
                                                    </div>
                                                    <div class="row">                                                           
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                Site web
                                                            </label>
                                                            <label class="input">                                                                    
                                                                <input type="text"  class="form-control" name="site_web" value="{{$exportateurs_importateurs->site_web}}" required>                                                                               
                                                            </label>
                                                        </section>
                                                            <section class="col col-6">
                                                                <label class="label">
                                                                    E-mail
                                                                </label>
                                                                <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="email" value="{{$exportateurs_importateurs->email}}" required>        
                                                                </label>
                                                            </section>                                                          
                                                        </div>
                                                        <div class="row">                                                                
                                                                <section class="col col-6">
                                                                    <label class="label">
                                                                                Capital
                                                                    </label>
                                                                    <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="capital" value="{{$exportateurs_importateurs->capital}}" required>                                                                                   
                                                                    </label>
                                                                </section>
                                                                <section class="col col-6">
                                                                    <label class="label">
                                                                               RC
                                                                    </label>
                                                                    <label class="input">                                                                    
                                                                            <input type="text"  class="form-control" name="rc" value="{{$exportateurs_importateurs->rc}}" required>
                                                                      
                                                                                   
                                                                    </label>
                                                                </section>                                                              
                                                            </div>
                                                            <div class="row">                                                                    
                                                                    <section class="col col-6">
                                                                        <label class="label">
                                                                                    Patente
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="patente" value="{{$exportateurs_importateurs->patente}}" required>
                                                                                       
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-6">
                                                                        <label class="label">
                                                                                   IF
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="if" value="{{$exportateurs_importateurs->if}}" required>
                                                                          
                                                                                       
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
                        </article>
                        <!-- END COL -->
                      
                    </div>
                       <!-- END ROW -->
                   
                       
            </section>
            <!--STATUT-->
            
         </div>
     </div>           
    </div>
</div>
@endsection