@extends('layouts.dashboard')
@section('title')
Modifier centre de visite technique
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Interventions</li>
                <li>Intervention</li>
                <li><a href="{{route('backoffice_fournisseurs')}}">Centres de visite technique</a></li>
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
                                <header>
                                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                                        <h2>Modifier centre de visite technique</h2>
                
                                </header>
                    
                                <!-- widget div-->
                                <div>                                 
                    
                                <!-- widget content -->

                                        
                                <div class="widget-body">
                                            
                            <form class="smart-form" files="true" action="{{route('backoffice_fournisseur_modifier')}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                       
                                         <header> Informations générales                                          
                                         </header>
                    
                                            <fieldset>
                                                <div class="row">
                                                           
                                                    <section class="col col-6">
                                                        <label  class="label">
                                                                        Code
                                                        </label>
                                                        <label class="input">
                                                            <input type="hidden" name="id" value="{{$fournisseurs->id}}">
                                                            <input type="text"  class="form-control" name="code" value="{{$fournisseurs->code}}" required>
                                                        </label>
                                                        
                                                    </section>
                                                    <section class="col col-6">
                                                            <label class="label">
                                                                        Libelle
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="libelle" value="{{$fournisseurs->libelle}}" required>
                                                               
                                                            </label>
                                                    </section>                                                   
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                 Pays
                                                        </label>
                                                        <label class="select">                                                                    
                                                            <select class="pays_select" name="pays" id="pays" style="width:695px;" required >
                                                                <option value="{{$fournisseurs->pay_id}}">{{$fournisseurs->pay->libelle_pays}}</option>
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
                                                                    <option value="{{$fournisseurs->ville_id}}">{{$fournisseurs->ville->libelle_ville}}</option>
  
                                                                </select>
                                                                           
                                                            </label>
                                                        </section>
                                                </div>
                                                <div class="row">
                                                 
                                                    <section class="col col-6">
                                                            <label class="label">
                                                            Adresse
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="adresse" value="{{$fournisseurs->adresse}}" required>
                                                               
                                                            </label>
                                                        </section>
                                                    
                                                </div>
                                                             
                                            </fieldset>
                        
                                    <!-- widget div-->
                                    <div>                                 
                        
                                    <!-- widget content -->
    
                                            
                                    <div class="widget-body">
                                                    
                                             <header>Statut                                          
                                             </header>
                        
                                                <fieldset>
                                                    <div class="row">
                                                               
                                                        <section class="col col-6">
                                                            <label  class="label">
                                                                            RC
                                                            </label>
                                                            <label class="input">
                                                                <input type="text"  class="form-control" name="rc" value="{{$fournisseurs->rc}}" required>
                                                            </label>
                                                            
                                                        </section>
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                            Patente
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="patente" value="{{$fournisseurs->patente}}" required>
                                                                   
                                                                </label>
                                                        </section>
                                                        <section class="col col-6">
                                                                            <label class="label">
                                                                            IF
                                                                            </label>
                                                                            <label class="input">                                                                    
                                                                                    <input type="text"  class="form-control" name="if" value="{{$fournisseurs->if}}" required>
                                                                               
                                                                            </label>
                                                        </section>
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                                Compte bancaire
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="compte_bancaire" value="{{$fournisseurs->compte_bancaire}}" required>
                    
                                                            </label>
                                                                       
                                                            
                                                        </section>
                                                    </div>
                                                    <div class="row">
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                                        Capital
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="capital" value="{{$fournisseurs->capital}}" required>
                                                               
                                                            </label>
                                                                           
                                                           
                                                        </section>
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                                            CNSS
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="cnss" value="{{$fournisseurs->cnss}}" required>
                                                                   
                                                                </label>
                                                                               
                                                               
                                                            </section>
                                                    </div>
                                                                 
                                                </fieldset>
    
                                               
                                        
                        
                                    <!-- widget div-->
                                    <div>                                 
                        
                                    <!-- widget content -->
    
                                            
                                    <div class="widget-body">
                                               
                                             <header>Téléphone                                          
                                             </header>
                        
                                                <fieldset>
                                                    <div class="row">
                                                               
                                                        <section class="col col-6">
                                                            <label  class="label">
                                                                            Fixe 1
                                                            </label>
                                                            <label class="input">
                                                                <input type="text"  class="form-control" name="fixe1" value="{{$fournisseurs->fixe1}}" required>
                                                            </label>
                                                            
                                                        </section>
                                                        <section class="col col-6">
                                                                <label  class="label">
                                                                        Fixe 2
                                                        </label>
                                                        <label class="input">
                                                            <input type="text"  class="form-control" name="fixe2" value="{{$fournisseurs->fixe2}}" required>
                                                        </label>
                                                        </section>
                                                        <section class="col col-6">
                                                                <label  class="label">
                                                                        Fixe 3
                                                                </label>
                                                                <label class="input">
                                                                    <input type="text"  class="form-control" name="fixe3" value="{{$fournisseurs->fixe3}}" required>
                                                                </label>
                                                        </section>
                                                        <section class="col col-6">
                                                                <label  class="label">
                                                                        Fixe 4
                                                                </label>
                                                                <label class="input">
                                                                    <input type="text"  class="form-control" name="fixe4" value="{{$fournisseurs->fixe4}}" required>
                                                                </label>
                                                                       
                                                            
                                                        </section>
                                                    </div>
                                                    <div class="row">
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                                        GSM 1
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="gsm1" value="{{$fournisseurs->gsm1}}" required>
                                                               
                                                            </label>
                                                                           
                                                           
                                                        </section>
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                                            GSM 2
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="gsm2" value="{{$fournisseurs->gsm2}}" required>
                                                                   
                                                                </label> 
                                                        </section>
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                                            Fax
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="fax" value="{{$fournisseurs->fax}}" required>
                                                                   
                                                                </label> 
                                                        </section>
                                                    </div>
                                                                 
                                                </fieldset>
    
                                        
                        
                                    <!-- widget div-->
                                    <div>                                 
                        
                                    <!-- widget content -->
    
                                            
                                    <div class="widget-body">
                                                                                                    
                                             <header> Autres                                         
                                             </header>
                        
                                                <fieldset>
                                                    <div class="row">
                                                                   
                                                        
                                                               
                                                        <section class="col col-6">
                                                            <label  class="label">
                                                                            Gérant
                                                            </label>
                                                            <label class="input">
                                                                <input type="text"  class="form-control" name="gerant" value="{{$fournisseurs->gerant}}" required>
                                                            </label>
                                                            
                                                        </section>
                                                        <section class="col col-6">
                                                                <label  class="label">
                                                                        Nom du résponsable
                                                        </label>
                                                        <label class="input">
                                                            <input type="text"  class="form-control" name="responsable" value="{{$fournisseurs->responsable}}" required>
                                                        </label>
                                                        </section>
                                                        <section class="col col-6">
                                                                <label  class="label">
                                                                        Site web
                                                                </label>
                                                                <label class="input">
                                                                    <input type="text"  class="form-control" name="site_web" value="{{$fournisseurs->site_web}}" required>
                                                                </label>
                                                        </section>
                                                        <section class="col col-6">
                                                                <label  class="label">
                                                                       Commentaire
                                                                </label>
                                                                <label class="input">
                                                                    <input type="text"  class="form-control" name="commentaire" value="{{$fournisseurs->commentaire}}" required>
                                                                </label>
                                                                       
                                                            
                                                        </section>
                                                    </div>
                                                    
                                                                 
                                                </fieldset>
    
                                              
                        
                                            </div>
                                            <!-- end widget content -->
                        
                                     </div>
                                        <!-- end widget div -->
                        
                                    </div>
                                    <!-- end widget -->
                        
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