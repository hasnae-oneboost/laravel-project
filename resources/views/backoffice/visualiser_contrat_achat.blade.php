@extends('layouts.dashboard')
@section('title')
Visualiser le Contrat d'achat
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
            <li><a href="">Accueil</a></li>
            <li>Flotte</li>
            <li><a href="{{route('backoffice_contrats_achat')}}">Contrats d'achat</a></li>
            <li>@yield('title')</li>	
		</ol>
		<!-- end breadcrumb -->
@endsection
@section('content')
<!-- MAIN PANEL -->
<div id="main" role="main">
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
                                                    <span class="widget-icon"> <i class="fa fa-plus"></i> </span>
                                                    <h2>Visualiser le Contrat d'achat </h2>
                            
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
                                                        
                                              <form class="smart-form" files="true" action="" method="POST" enctype="multipart/form-data">
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
                                                 <input type="hidden" name="id" value="{{$contrats->id}}">
                                                    
                                                 <input type="text" class="form-control" name="code" value="{{$contrats->code}}" disabled>
                                                </label>
                                                
                                            </section>
                                            <section class="col col-6">
                                                    <label class="label">
                                                                Fournisseur de véhicule
                                                    </label>
                                                    <label class="input"> 
                                                        <select name="fournisseur" id="">
                                                            <option value="{{$contrats->fournisseur_id}}">{{$contrats->fournisseur->libelle}}</option>
                                                            @foreach($fournisseurs as $fournisseur)
                                                            <option value="{{$fournisseur->id}}">{{$fournisseur->libelle}}</option>
                                                            @endforeach
                                                        </select>                                                                   
                                                    </label>
                                            </section>
                                          
                                        </div>
                                        <div class="row">
                                                <section class="col col-6">
                                                        <label class="label">
                                                            Vehicule
                                                        </label>
                                                        <label class="input">                                                                    
                                                                <select name="vehicule[]" id="" disabled multiple>
                                                                    @foreach(explode(', ',$contrats->vehicule) as $v)
                                                                    <option value="{{$v}}" selected>{{$v}}</option>
                                                                    @endforeach
                                                                        @foreach($vehicules as $v)
                                                                        <option value="{{$v->immatriculation}}">{{$v->immatriculation}}</option>
                                                                        @endforeach
                                                                </select>
                                                        </label>                      
                                                </section>
                                            <section class="col col-6">
                                                                <label class="label">
                                                                        Date d'achat
                                                                </label>
                                                                <label class="input">                                                                    
                                                         <input type="text" class="form-control" name="date_achat" id="date" value="{{$contrats->date_achat}}" disabled>
        
                                                                </label>
                                            </section>
                                          
                                           
                                        </div>
                                        <div class="row">
                                                <section class="col col-6">
                                                        <label class="label">
                                                                Garantie
                                                        </label>
                                                        <label class="input">                                                                    
                                                            <input type="text" class="form-control" name="garantie" value="{{$contrats->garantie}}" disabled>
                                                        </label>
                                                </section>
                                                <section class="col col-6">
                                                        <label class="label">
                                                            Montant HT
                                                        </label>
                                                        <label class="input">                               
                                                            <input type="number" name="montant_ht"  min="0" step="0.01" value="{{$contrats->montant_ht}}" disabled>
                                                           
                                                        </label>
                                                </section>
                                        </div>
                                        <div class="row">                                  
                                            <section class="col col-6">
                                                <label class="label">
                                                    TVA
                                                </label>
                                                <label class="input">                                                                    
                                                    <select name="montant_tva" class="type_tva_select" disabled>
                                                        <option value="{{$contrats->tva}}">{{$contrats->tva}}</option>
                                                            @foreach($tva as $res)
                                                            <option value="{{$res->taux_tva}}">{{$res->taux_tva}}</option>
                                                            @endforeach
                                                        </option>
                                                    </select>         
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                        <label class="label">
                                                            Montant TTC
                                                        </label>
                                                        <label class="input">                                                                  
                                                            <input type="number" min="0" step="0.01" id="ttc" name="montant_ttc" value="{{$contrats->montant_ttc}}" disabled>
                                                           
                                                        </label>
                                            </section>
                                        </div>      
                                    </fieldset>      
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

</div>
<!-- END MAIN PANEL -->

@endsection


