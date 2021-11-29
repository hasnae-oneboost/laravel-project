@extends('layouts.dashboard')
@section('title')
Modifier personnel
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
            <li><a href="">Accueil</a></li>
            <li>Ressources humaines</li>
            <li><a href="{{route('backoffice_personnels')}}">Personnels</a></li>
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
               
                
             </div>
         </div>           
        </div>
</div>
<!-- MAIN PANEL -->
<div id="main" role="main">
    <!-- MAIN CONTENT -->
    <div id="content">
        <!-- widget grid -->
        <section id="widget-grid" class="">
            <!-- row -->
            <div class="row">                
                <form class="" files="true" action="{{route('backoffice_personnels_modifier')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PATCH')}}                
                    
                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
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
                                    <span class="widget-icon"> <i class="fa fa-info">&nbsp;</i> </span>
                               <p class="h6">&nbsp;Informations personnelles</p>		   
                            </header>

                            <!-- widget div-->
                            <div>
                                
                                <!-- widget content -->
                                <div class="widget-body">
                                   
                                <fieldset>
                                    <div class="form-group">
                                                    <div class="col-md-2">
                                                    <label>Matricule</label>
                                                    </div>
													<div class="col-md-10">
                                                        <input type="hidden" name="id" value="{{$personnels->id}}">
                                                        <input class="form-control" type="text" name="matricule" value="{{$personnels->matricule}}" required>

                                                    </div>
                                    </div>
                                    
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Nom</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <input class="form-control" type="text" name="nom" value="{{$personnels->nom}}" required>

                                                    </div>
                                            </div>

                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Prenom</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <input class="form-control" type="text" name="prenom" value="{{$personnels->prenom}}" required>
                                                        
                                                    </div>
                                            </div>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Date de naissance</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <input class="form-control" type="text" id="date" name="date_naissance" value="{{$personnels->date_naissance}}" required>

                                                    </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Date prévue de retraite</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <input class="form-control" type="text" id="date" name="date_prevue_retraite" value="{{$personnels->date_prevue_retraite}}"  required>

                                                    </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Pays de naissance</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <select class="form-control" name="pays" required>
                                                                <option value="{{$personnels->pay_id}}">{{$personnels->pay->libelle_pays}}</option>
                                                                @foreach($pays as $pay)
                                                                <option value="{{$pay->id}}">{{$pay->libelle_pays}}</option>
                                                                @endforeach
                                                        </select>
                                                    
                                                    </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Ville</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                    <select class="form-control" name="ville" id="" required>
                                                            <option value="{{$personnels->ville_id}}">{{$personnels->ville->libelle_ville}}</option>
                                                           
                                                    </select>
                                                </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                            <div class="col-md-2" style="margin-top: 15px">
                                                <label>Adresse postale</label>
                                            </div>
                                            <div class="col-md-10" style="margin-top: 15px">
                                                <input class="form-control" type="text" name="adresse_postale" value="{{$personnels->adresse_postale}}" required>

                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                            <div class="col-md-2" style="margin-top: 15px">
                                                <label>Nationnalité</label>
                                            </div>
                                            <div class="col-md-10" style="margin-top: 15px">
                                                <select class="form-control" name="nationalite" id="" required>
                                                        <option value="{{$personnels->nationnalite_id}}">{{$personnels->nationalite->libelle}}</option>
                                                    @foreach($nationalites as $nationalite)
                                                    <option value="{{$nationalite->id}}">{{$nationalite->libelle}}</option>
                                                    @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                            <div class="col-md-2" style="margin-top: 15px">
                                                <label>CIN</label>
                                            </div>
                                            <div class="col-md-10" style="margin-top: 15px">
                                                <input class="form-control" type="text" name="cin" value="{{$personnels->cin}}" required>

                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                            <div class="col-md-2" style="margin-top: 15px">
                                                <label>Date d'approbation</label>
                                            </div>
                                            <div class="col-md-10" style="margin-top: 15px">
                                                <input class="form-control" type="text" id="date" name="date_approbation" value="{{$personnels->date_approbation}}" required>

                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                            <div class="col-md-2" style="margin-top: 15px">
                                                <label>Sexe</label>
                                            </div>
                                            <div class="col-md-10" style="margin-top: 15px">
                                                <select name="sexe" required>
                                                    <option value="{{$personnels->sexe}}">{{$personnels->sexe}}</option>
                                                    <option value="Femme">Femme</option>
                                                    <option value="Homme">Homme</option>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                            <div class="col-md-2" style="margin-top: 15px">
                                                <label>Photo</label>
                                            </div>
                                            <div class="col-md-10" style="margin-top: 15px">
                                                <input class="form-control" type="file" name="photo" required>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Categorie</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                        <select class="form-control" name="categorie" id="" required>
                                                                <option value="{{$personnels->categorie_id}}">{{$personnels->categorie->libelle}}</option>
                                                                @foreach($categories as $categorie)
                                                                <option value="{{$categorie->id}}">{{$categorie->libelle}}</option>
                                                                @endforeach
                                                        </select>
                                                </div>
                                            </div>

                                </fieldset>
                                   
                                </div>
                                <!-- end widget content -->
                            </div>
                            <!-- end widget div -->
                            
                        </div>
                        <!-- end widget -->

                         <!-- Widget ID (each widget will need unique ID)-->
                         <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
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
                                    <span class="widget-icon"> <i class="fa fa-calendar">&nbsp;</i> </span>
                                    <p class="h6">&nbsp;Contact</p>	
                                </header>
    
                                <!-- widget div-->
                                <div>                                    
                                    <!-- widget content -->
                                    <div class="widget-body">
                                       
                                    <fieldset>
                                        <div class="form-group">
                                                        <div class="col-md-2">
                                                        <label>GSM Professionnel</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" name="gsm_professionnel" value="{{$personnels->gsm_professionnel}}" required>
                                                        </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                            <div class="form-group">
                                                    <div class="col-md-2">
                                                    <label>GSM Personnel</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="gsm_personnel" value="{{$personnels->gsm_personnel}}" required>
                                                    </div>
                                    </div>
                                    </fieldset>
                                        <fieldset>
                                                <div class="form-group">
                                                        <div class="col-md-2">
                                                        <label>GSM Etranger</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" name="gsm_etranger" value="{{$personnels->gsm_etranger}}" required>
                                                        </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group" >
                                                <div class="col-md-2">
                                                    <label>Email Professionnel</label>
                                                </div>
                                                <div class="col-md-10" style="margin-top: 15px">
                                                    <input class="form-control" type="email" name="email_professionnel" value="{{$personnels->email_pro}}" required>
                                                </div>
                                        </div>                                               
                                    </fieldset>
                                    <fieldset>
                                            <div class="form-group" >
                                                    <div class="col-md-2">
                                                        <label>Email Personnel</label>
                                                    </div>
                                                    <div class="col-md-10" style="margin-top: 15px">
                                                        <input class="form-control" type="email" name="email_personnel" value="{{$personnels->email_perso}}" required>
                                                    </div>
                                            </div> 
                                    </fieldset>
                                       
                                    </div>
                                    <!-- end widget content -->
                            </div>
                                <!-- end widget div -->
                                
                        </div>
                        <!--end widget-->

                       		
                    </article>
                    <!-- WIDGET END -->

                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
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
    
                                    <p class="h6">&nbsp;Contact en cas d'urgence</p>			
                                </header>
    
                                <!-- widget div-->
                                <div>
                                    <!-- widget content -->
                                    <div class="widget-body">
                                            <fieldset>
                                                    <div class="form-group">
                                                                    <div class="col-md-2">
                                                                    <label>Contact 1</label>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <input class="form-control" name="contact1" type="text" value="{{$personnels->contact1}}" required>        
                                                                    </div>
                                                    </div>   
                                                </fieldset>
                                                <fieldset>                                             
                                                    <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>GSM 1</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                       <input type="text" name="gsm1" class="form-control" value="{{$personnels->gsm1}}" required>
                                                                    </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Contact 2</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                        <input class="form-control" name="contact2" type="text" value="{{$personnels->contact2}}" required>
                                                                    </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>GSM 2</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                        <input class="form-control" name="gsm2" type="text" value="{{$personnels->gsm2}}" required>        
                                                                    </div>
                                                    </div>
                                            
                                            </fieldset>
                                            				                                    
                                    </div>
                                    <!-- end widget content -->                                
                                </div>
                                <!-- end widget div -->                           
                            </div>
                            <!-- end widget -->	

                        <!--Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
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
                                    <span class="widget-icon"> <i class="fa fa-clipboard-list">&nbsp;</i> </span>
                                    <p class="h6">&nbsp;Autres</p>				
                                </header>    
                                <!-- widget div-->
                                <div>
                                    <!-- widget content -->
                                    <div class="widget-body">
                                            <fieldset>
                                                    <div class="form-group">
                                                                    <div class="col-md-2">
                                                                    <label>CNSS</label>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <input class="form-control" name="cnss" type="text" value="{{$personnels->cnss}}" required>        
                                                                    </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                            <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Banque</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                            <select class="form-control" name="banque" id="" required>
                                                                                    <option value="{{$personnels->banque_id}}">{{$personnels->banque->nom}}</option>
                                                                                    @foreach($banques as $banque)
                                                                                    <option value="{{$banque->id}}">{{$banque->nom}}</option>
                                                                                    @endforeach
                                                                            </select>
                                                                        </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Date d'immatriculation</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                        <input class="form-control" name="date_immatriculation" id="date" value="{{$personnels->date_immatriculation}}" type="text" required>
                                                                    </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>Compte bancaire</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                        <input class="form-control" name="compte_bancaire" type="text" value="{{$personnels->compte_bancaire}}" required>
                                                                    </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="form-group" >
                                                                    <div class="col-md-2" style="margin-top: 15px">
                                                                        <label>N° compte comptable</label>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin-top: 15px">
                                                                        <input class="form-control" name="numero_compte_comptable" type="text" value="{{$personnels->numero_compte_comptable}}" required>
                                                                    </div>
                                                            </div>
                
                                            </fieldset>				
                                        
                                    </div>
                                    <!-- end widget content -->
                                    
                                </div>
                                <!-- end widget div -->
                                
                        </div>
                        <!-- end widget -->	

                    </article>
                    <!-- WIDGET END -->
                    
                    <footer class="pull-right" style="margin-right: 50px; margin-top: 200px">
                        <button type="button" class="btn btn-default btn-lg" onclick="window.history.back();">
                            Retour
                        </button>
                        <button type="submit" class="btn btn-red btn-lg">
                            Valider
                        </button>
                    </footer>
                 
                </form>
            </div>

            <!-- end row -->

            

        </section>
        <!-- end widget grid -->

    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

@endsection