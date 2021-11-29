@extends('layouts.dashboard')
@section('title')
Modifier l'equipement de véhicule
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
            <li><a href="">Accueil</a></li>
            <li>Flotte</li>
            <li><a href="{{route('backoffice_equipements_vehicules')}}">Equipements des véhicules</a></li>
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
                                        <span class="widget-icon"> <i class="fa fa-plus"></i> </span>
                                        <h2>Modifier l'equipement de véhicule</h2>
                
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
                                            
                                    <form class="smart-form" files="true" action="{{route('backoffice_equipements_vehicules_modifier')}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    {{method_field('PATCH')}}
                                                       
                                         <header></header>
                    
                                            <fieldset>
                                                <div class="row">
                                                           
                                                    <section class="col col-6">
                                                        <label  class="label">
                                                                        Vehicule
                                                        </label>
                                                        <label class="input">
                                                            <input type="hidden" name="id" value="{{$equipementsvehicules->id}}">
                                                            <select class="form-control" name="vehicule"  required>
                                                                <option value="{{$equipementsvehicules->vehicule_id}}">{{$equipementsvehicules->vehicule->immatriculation}}</option>
                                                                @foreach($vehicules as $v)
                                                                <option value="{{$v->id}}">{{$v->immatriculation}}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                        
                                                    </section>
                                                    <section class="col col-6">
                                                            <label class="label">
                                                                        Libelle
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="libelle" value="{{$equipementsvehicules->libelle}}" required>
                                                               
                                                            </label>
                                                    </section>
                                                    <section class="col col-6">
                                                                        <label class="label">
                                                                               Code
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="code" value="{{$equipementsvehicules->code}}" required>
                                                                           
                                                                        </label>
                                                    </section>
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                            Type d'équipement
                                                        </label>
                                                        <label class="select">                                                                    
                                                            <select name="type_equipement" required>
                                                                <option value="{{$equipementsvehicules->type_id}}">{{$equipementsvehicules->typeequipementvehicule->libelle}}</option>
                                                                @foreach($typesequipement as $t)
                                                                <option value="{{$t->id}}">{{$t->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                                   
                                                        </label>
                                                    </section>
                                                </div>
                                                <div class="row">
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                                    Equipement
                                                        </label>
                                                        <label class="select">                                                                    
                                                            <select name="equipement"  required>
                                                                <option value="{{$equipementsvehicules->equipement_id}}">{{$equipementsvehicules->equipementvehicule->libelle}}</option>
                                                                
                                                            </select>
                                                                       
                                                        </label>
                                                    </section>
                                                      
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                                    Fournisseur
                                                        </label>
                                                        <label class="input">                                                                    
                                                                <select name="fournisseur"  required>
                                                                        <option value="{{$equipementsvehicules->fournisseur_id}}">{{$equipementsvehicules->fournisseur->libelle}}</option>
                                                                        @foreach($fournisseurs as $f)
                                                                        <option value="{{$f->id}}">{{$f->libelle}}</option>
                                                                        @endforeach
                                                                </select>
                                                                               
                                                        </label>
                                                    </section>
                                                </div>
                                                <div class="row">
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                                Date d'affectation
                                                        </label>
                                                        <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" id="date" name="date_affectation" value="{{$equipementsvehicules->date_affectation}}" required>
                                                                   
                                                        </label>
                                                                  
                                                    </section>
                                                    <section class="col col-6">
                                                            <label class="label">
                                                                        Description
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="description" value="{{$equipementsvehicules->description}}" required>
                                                               
                                                            </label>
                                                    </section> 
                                                     
                                                </div>
                    
                                                <div class="row">
                                                                 
                                                    <section class="col col-6">
                                                                                <label class="label">
                                                                                            Date de début
                                                                                </label>
                                                                                <label class="input">                                                                    
                                                                                        <input type="text"  class="form-control" id="date" name="date_debut" value="{{$equipementsvehicules->date_debut}}" required>
                                                                                   
                                                                                </label>
                                                    </section>
                                                    <section class="col col-6">
                                                                                    <label class="label">
                                                                                             Date de fin
                                                                                    </label>
                                                                                    <label class="input">                                                                    
                                                                                            <input type="text"  class="form-control" id="date" name="date_fin" value="{{$equipementsvehicules->date_fin}}" required>
                                                                                       
                                                                                    </label>
                                                    </section>                                                     
                                                            
                                                               
                                                </div>
                                                <div class="row">
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                    Montant HT
                                                                </label>
                                                                <label class="input">                               
                                                                    <input type="number" name="montant_ht"  min="0" step="0.01"  value="{{$equipementsvehicules->montant_ht}}" required>
                                                                   
                                                                </label>
                                                        </section>
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                TVA
                                                            </label>
                                                            <label class="input">                                                                    
                                                                <select name="montant_tva" class="type_tva_select" required>
                                                                    <option value="{{$equipementsvehicules->tva}}">{{$equipementsvehicules->tva}}</option>
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
                                                                        <input type="number" min="0" step="0.01" id="ttc" name="montant_ttc" value="{{$equipementsvehicules->montant_ttc}}"  required>
                                                                       
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



