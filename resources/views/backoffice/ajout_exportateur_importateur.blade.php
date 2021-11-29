@extends('layouts.dashboard')
@section('title')
Ajouter un nouveau exportateur ou importateur
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
                                        <span class="widget-icon"> <i class="fa fa-plus"></i> </span>
                                        <h2>Ajouter un nouveau exportateur ou importateur</h2>
                                </header>
                    
                                <!-- widget div-->
                                <div>                                 
                    
                                <!-- widget content -->

                                        
                            <div class="widget-body">
                                            
                                        <form class="smart-form" files="true" action="{{route('backoffice_exportateur_importateur_ajouter')}}" method="POST" >
                                            {{csrf_field()}}
                                            <fieldset>
                                                <div class="row">
                                                    <section class="col col-6">
                                                            <label class="label">
                                                                        Raison sociale
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="raison_sociale" value="" required>
                                                               
                                                            </label>
                                                    </section>
                                                    <section class="col col-6">
                                                                        <label class="label">
                                                                        Adresse
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="adresse" value="" required>
                                                                           
                                                                        </label>
                                                    </section>
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                 Pays
                                                        </label>
                                                        <label class="select">                                                                    
                                                            <select class="pays_select" name="pays" id="pays" style="width:695px;" >
                                                                <option value=""></option>
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
                                                            <select class="ville_select" name="ville" id="ville" style="width:695px;" >
                                                                <option value=""></option>
                                                                
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
                                                                    <input type="text"  class="form-control" name="fixe1" value="" required>
                                                              
                                                                           
                                                            </label>
                                                        </section>
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                       Telephone fixe N°2
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="fixe2" value="" required>
                                                              
                                                                           
                                                            </label>
                                                        </section>
                                                </div>
                                                <div class="row">
                                                        
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                        GSM
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="gsm" value="" required>
                                                                           
                                                            </label>
                                                        </section>
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                       Fax
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="fax" value="" required>
                                                              
                                                                           
                                                            </label>
                                                        </section>
                                                    </div>
                                                    <div class="row">
                                                            
                                                            <section class="col col-6">
                                                                <label class="label">
                                                                            Site web
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="site_web" value="" required>
                                                                               
                                                                </label>
                                                            </section>
                                                            <section class="col col-6">
                                                                <label class="label">
                                                                           E-mail
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="email" value="" required>
                                                                  
                                                                               
                                                                </label>
                                                            </section>
                                                        </div>
                                                        <div class="row">                                                               
                                                                <section class="col col-6">
                                                                    <label class="label">
                                                                                Capital
                                                                    </label>
                                                                    <label class="input">                                                                    
                                                                            <input type="text"  class="form-control" name="capital" value="" required>
                                                                                   
                                                                    </label>
                                                                </section>
                                                                <section class="col col-6">
                                                                    <label class="label">
                                                                               RC
                                                                    </label>
                                                                    <label class="input">                                                                    
                                                                            <input type="text"  class="form-control" name="rc" value="" required>
                                                                      
                                                                                   
                                                                    </label>
                                                                </section>
                                                            </div>
                                                            <div class="row">
                                                                 
                                                                    <section class="col col-6">
                                                                        <label class="label">
                                                                                    Patente
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="patente" value="" required>
                                                                                       
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-6">
                                                                        <label class="label">
                                                                                   IF
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="if" value="" required>
                                                                          
                                                                                       
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