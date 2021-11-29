@extends('layouts.dashboard')
@section('title')
Visualiser le prestataire
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Transport</li>
                <li><a href="{{route('backoffice_prestataires')}}">Transitaires</a></li>
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
                                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                                <h2>Visualiser le prestataire</h2>
                            </header>                      
                            <div class="widget-body">                                            
                                        <form class="smart-form" files="true" action="" method="POST" >
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}                                            
                                            <fieldset>
                                                <div class="row">
                                                    <section class="col col-6">
                                                            <label class="label">
                                                                        Raison sociale
                                                            </label>
                                                            <label class="input"> 
                                                                <input type="hidden" name="id" value="{{$prestataires->id}}" >                                                                   
                                                                    <input type="text"  class="form-control" name="raison_sociale" value="{{$prestataires->raison_sociale}}" disabled>
                                                            </label>
                                                    </section>
                                                    <section class="col col-6">
                                                                        <label class="label">
                                                                        Adresse
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="adresse" value="{{$prestataires->adresse}}" disabled>                                                                           
                                                                        </label>
                                                    </section>
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                 Pays
                                                        </label>
                                                        <label class="select">                                                                    
                                                            <select class="pays_select" name="pays" id="pays" style="width:695px;" disabled>
                                                                <option value="{{$prestataires->pay_id}}">{{$prestataires->pay->libelle_pays}}</option>
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
                                                            <select class="ville_select" name="ville" id="ville" style="width:695px;" disabled>
                                                                    <option value="{{$prestataires->ville_id}}">{{$prestataires->ville->libelle_ville}}</option>                                                    
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
                                                                    <input type="text"  class="form-control" name="fixe1" value="{{$prestataires->fixe1}}" disabled>        
                                                            </label>
                                                    </section>
                                                    <section class="col col-6">
                                                            <label class="label">
                                                                       Telephone fixe N°2
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="fixe2" value="{{$prestataires->fixe2}}" disabled>        
                                                            </label>
                                                    </section>
                                                </div>
                                                <div class="row">                                                        
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                        GSM
                                                        </label>
                                                        <label class="input">                                                                    
                                                                <input type="text"  class="form-control" name="gsm" value="{{$prestataires->gsm}}" disabled>
                                                                       
                                                        </label>
                                                    </section>
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                   Fax
                                                        </label>
                                                        <label class="input">                                                                    
                                                                <input type="text"  class="form-control" name="fax" value="{{$prestataires->fax}}" disabled>       
                                                        </label>
                                                    </section>                                                      
                                                    </div>
                                                    <div class="row">                                                           
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                Site web
                                                            </label>
                                                            <label class="input">                                                                    
                                                                <input type="text"  class="form-control" name="site_web" value="{{$prestataires->site_web}}" disabled>                                                                               
                                                            </label>
                                                        </section>
                                                            <section class="col col-6">
                                                                <label class="label">
                                                                    E-mail
                                                                </label>
                                                                <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="email" value="{{$prestataires->email}}" disabled>        
                                                                </label>
                                                            </section>                                                          
                                                        </div>
                                                        <div class="row">                                                                
                                                                <section class="col col-6">
                                                                    <label class="label">
                                                                                Capital
                                                                    </label>
                                                                    <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="capital" value="{{$prestataires->capital}}" disabled>                                                                                   
                                                                    </label>
                                                                </section>
                                                                <section class="col col-6">
                                                                    <label class="label">
                                                                               RC
                                                                    </label>
                                                                    <label class="input">                                                                    
                                                                            <input type="text"  class="form-control" name="rc" value="{{$prestataires->rc}}" disabled>      
                                                                    </label>
                                                                </section>                                                              
                                                            </div>
                                                            <div class="row">                                                                    
                                                                    <section class="col col-6">
                                                                        <label class="label">
                                                                                    Patente
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="patente" value="{{$prestataires->patente}}" disabled>
                                                                                       
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-6">
                                                                        <label class="label">
                                                                                   IF
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="if" value="{{$prestataires->if}}" disabled>
                                                                          
                                                                                       
                                                                        </label>
                                                                    </section>                                                                
                                                            </div>                                                            
                                            </fieldset>
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