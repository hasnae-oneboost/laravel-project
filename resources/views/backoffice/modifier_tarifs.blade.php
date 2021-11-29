@extends('layouts.dashboard')
@section('title')
Modifier tarifs
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Consommations</li>
                <li>Péages autoroute</li>
                <li><a href="{{route('backoffice_tarifs')}}">Tarifs</a></li>                
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
                                            <h2>Modifier tarifs</h2>
                    
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
                                                
                                        <form class="smart-form" files="true" action="{{route('backoffice_tarifs_modifier')}}" method="POST" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                                        
                                             <header></header>
                        
                                                <fieldset>
                                                    <div class="row">
                                                               
                                                        <section class="col col-6">
                                                            <label  class="label">
                                                                            Date de début
                                                            </label>
                                                            <label class="input">
                                                            <input type="hidden" name="id" value="{{$tarifs->id}}">                                                                
                                                             <input type="text" class="form-control" name="date_debut" value="{{$tarifs->date_debut}}" required>
                                                            </label>
                                                            
                                                        </section>
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                                    Date fin
                                                                </label>
                                                                <label class="input">                                                                    
                                                                    <input type="text" class="form-control" name="date_fin" value="{{$tarifs->date_fin}}" required>                                                                           
                                                                </label>
                                                        </section>
                                                      
                                                    </div>
                                                    <div class="row">
                                                            <section class="col col-6">
                                                                    <label class="label">
                                                                        Catégorie
                                                                    </label>
                                                                    <label class="input">                                                                    
                                                                            <select name="categorie_vehicule" id="" required>
                                                                                    <option value="{{$tarifs->categorie_vehicule}}">{{$tarifs->categorievehicule->libelle}}</option>
                                                                                    @foreach($categories as $s)
                                                                                    <option value="{{$s->id}}">{{$s->libelle}}</option>
                                                                                    @endforeach
                                                                            </select>
                                                                    </label>                      
                                                            </section>
                                                        <section class="col col-6">
                                                                            <label class="label">
                                                                                    Péage de départ
                                                                            </label>
                                                                            <label class="input">                                                                    
                                                                                    <select name="peage_depart" required>
                                                                                            <option value="{{$tarifs->peage_depart}}">{{$tarifs->pegageautoroute->peage}}</option>    
                                                                                            @foreach($peages as $p)
                                                                                                <option value="{{$p->id}}">{{$p->peage}}</option>
                                                                                                @endforeach
                                                                                        </select> 
                                                                            </label>
                                                        </section>
                                                      
                                                       
                                                    </div>
                                                    <div class="row">
                                                            <section class="col col-6">
                                                                    <label class="label">
                                                                            Péage d'arrivée
                                                                    </label>
                                                                    <label class="input">                                                                    
                                                                            <select name="peage_arrivee" required>
                                                                                    <option value="{{$tarifs->peage_arrivee}}">{{$tarifs->pegageautoroute->peage}}</option>
                                                                                    @foreach($peages as $p)
                                                                                        <option value="{{$p->id}}">{{$p->peage}}</option>
                                                                                        @endforeach
                                                                            </select>
                                                                    </label>
                                                            </section>
                                                            <section class="col col-6">
                                                                    <label class="label">
                                                                            Description
                                                                    </label>
                                                                    <label class="input">                                                                    
                                                                            <input type="text" name="description" value="{{$tarifs->description}}" required>

                                                                    </label>
                                                            </section>
                                                    </div>
                                                    <div class="row">
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                    Montant HT
                                                                </label>
                                                                <label class="input">                               
                                                                    <input type="number" name="ht"  min="0" step="0.01" value="{{$tarifs->montant_ht}}" required>
                                                                   
                                                                </label>
                                                        </section>
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                TVA
                                                            </label>
                                                            <label class="input">                                                                    
                                                                <select name="tva" class="type_tva_select" required>
                                                                    <option value="{{$tarifs->tva}}">{{$tarifs->tva}}</option>
                                                                        @foreach($tva as $res)
                                                                        <option value="{{$res->taux_tva}}">{{$res->taux_tva}}</option>
                                                                        @endforeach
                                                                    </option>
                                                                </select>         
                                                            </label>
                                                        </section>
                                                    </div>
                                                    <div class="row">
                                                            <section class="col col-6">
                                                                    <label class="label">
                                                                        Montant TTC
                                                                    </label>
                                                                    <label class="input">                                                                  
                                                                        <input type="number" min="0" step="0.01" id="ttc" name="ttc" value="{{$tarifs->montant_ttc}}" required>
                                                                       
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