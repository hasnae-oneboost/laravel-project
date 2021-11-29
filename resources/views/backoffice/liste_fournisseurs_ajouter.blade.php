@extends('layouts.dashboard')
@section('title')
Ajouter un nouveau fournisseur 
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Consommations</li>
                <li><a href="{{route('backoffice_liste_fournisseurs')}}">Liste des fournisseurs</a></li>
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
                                        <span class="widget-icon"> <i class="fa fa-plus"></i> </span>
                                        <h2>Ajouter un nouveau fournisseur</h2>                
                                </header>
                    
                                <!-- widget div-->
                                <div>                                 
                    
                                <!-- widget content -->

                                        
                                <div class="widget-body">
                                            
                            <form id="login-form" class="smart-form" files="true" action="{{route('backoffice_liste_fournisseurs_ajouter')}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                         <header>Informations générales                                        
                                         </header>
                    
                                            <fieldset>
                                                <div class="row">
                                                           
                                                    <section class="col col-6">
                                                        <label  class="label">
                                                                        Code
                                                        </label>
                                                        <label class="input">
                                                            <input type="text"  class="form-control" name="code" value="" required>
                                                        </label>
                                                        
                                                    </section>
                                                    <section class="col col-6">
                                                            <label class="label">
                                                                        Libelle
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="libelle" value="" required>
                                                               
                                                            </label>
                                                    </section>                                                   
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                 Pays
                                                        </label>
                                                        <label class="select">                                                                    
                                                            <select class="pays_select" name="pays" id="pays" style="width:695px;" required>
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
                                                                <select class="ville_select" name="ville" id="ville" style="width:695px;" required>
                                                                    <option value=""></option>
                                                                    
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
                                                                        <input type="text"  class="form-control" name="adresse" value="" required>
                                                                
                                                                </label>
                                                        </section> 
                                                        <section class="col col-6">
                                                                <label  class="label">
                                                                       Type
                                                                </label>
                                                                <label class="select">
                                                                        <select name="type" id="type" class="" onchange="showDiv(this)" required>
                                                                            <option value=""></option>
                                                                            @foreach($types as $ty)
                                                                        <option value="{{$ty->type}}" >{{$ty->type}}</option>
                                                                            @endforeach
                                                                            </select>
                                                                </label>
                                                                       
                                                            
                                                        </section>
                                                    </div>
                                                        <div class="row">
                                                        <section class="col col-6">
                                                                <label  class="label">
                                                                       Echeance
                                                                </label>
                                                                <label class="select">
                                                                        <select name="echeance" id="type" class="" required>
                                                                            <option value=""></option>
                                                                            @foreach($echeances as $echeance)
                                                                        <option value="{{$echeance->id}}">{{$echeance->libelle}}</option>
                                                                            @endforeach
                                                                            </select>
                                                                </label>
                                                        </section>
                                                        <section class="col col-6">
                                                                    <div class="inline-group"  id="hidden_div" style="display: none;">
                                                                        <label class="label">Activité(s)</label>
                                                                        <div class="" style="margin-left: 25px">
                                                                            
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                    
                                                                                  <input type="checkbox" class="checkbox style-0" value="Location" name="activite[]" >
                                                                                  <span>Location</span>
                                                                                </label>
                                                                            </div>
                                    
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                  <input type="checkbox" class="checkbox style-0" value="Société de leasing" name="activite[]">
                                                                                  <span>Société de leasing</span>
                                                                                </label>
                                                                            </div>
                                    
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                  <input type="checkbox" class="checkbox style-0" value="Concessionnaire" name="activite[]">
                                                                                  <span>Concessionnaire</span>
                                                                                </label>
                                                                            </div>
                                    
                                                                        </div>
                                                                    </div>
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
                                                                <input type="text"  class="form-control" name="rc" value="" required>
                                                            </label>
                                                            
                                                        </section>
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
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                                Compte bancaire
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="compte_bancaire" value="" required>
                    
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
                                                                                            CNSS
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="cnss" value="" required>
                                                                   
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
                                                                <input type="text"  class="form-control" name="fixe1" value="" required>
                                                            </label>
                                                            
                                                        </section>
                                                        <section class="col col-6">
                                                                <label  class="label">
                                                                        Fixe 2
                                                        </label>
                                                        <label class="input">
                                                            <input type="text"  class="form-control" name="fixe2" value="" required>
                                                        </label>
                                                        </section>
                                                        <section class="col col-6">
                                                                <label  class="label">
                                                                        Fixe 3
                                                                </label>
                                                                <label class="input">
                                                                    <input type="text"  class="form-control" name="fixe3" value="" required>
                                                                </label>
                                                        </section>
                                                        <section class="col col-6">
                                                                <label  class="label">
                                                                        Fixe 4
                                                                </label>
                                                                <label class="input">
                                                                    <input type="text"  class="form-control" name="fixe4" value="" required>
                                                                </label>
                                                                       
                                                            
                                                        </section>
                                                    </div>
                                                    <div class="row">
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                                        GSM 1
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="gsm1" value="" required>
                                                               
                                                            </label>
                                                                           
                                                           
                                                        </section>
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                                            GSM 2
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="gsm2" value="" required>
                                                                   
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
                                                                <input type="text"  class="form-control" name="gerant" value="" required>
                                                            </label>
                                                            
                                                        </section>
                                                        <section class="col col-6">
                                                                <label  class="label">
                                                                        Nom du résponsable
                                                        </label>
                                                        <label class="input">
                                                            <input type="text"  class="form-control" name="responsable" value="" required>
                                                        </label>
                                                        </section>
                                                        <section class="col col-6">
                                                                <label  class="label">
                                                                        Site web
                                                                </label>
                                                                <label class="input">
                                                                    <input type="text"  class="form-control" name="site_web" value="" required>
                                                                </label>
                                                        </section>
                                                        <section class="col col-6">
                                                                <label  class="label">
                                                                       Commentaire
                                                                </label>
                                                                <label class="input">
                                                                    <input type="text"  class="form-control" name="commentaire" value="" required>
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
