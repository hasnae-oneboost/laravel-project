@extends('layouts.dashboard')
@section('title')
Ajouter un nouveau trajet
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Utilisation</li>
                <li>Transport</li>
                <li><a href="{{route('backoffice_trajets')}}">Trajets</a></li>
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
                                            <span class="widget-icon"> <i class="fa fa-plus"></i> </span>
                                            <h2>Ajouter un nouveau trajet</h2>         
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
                                                
                                        <form class="smart-form" files="true" action="{{route('backoffice_trajet_ajouter')}}" method="POST" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                             <header></header>
                        
                                                <fieldset>
                                                    <div class="row">
                                                               
                                                        <section class="col col-6">
                                                            <label  class="label">
                                                                            Numero
                                                            </label>
                                                            <label class="input">
                                                                <input type="number" min="0" class="form-control" name="numero" value="" required>
                                                            </label>
                                                            
                                                        </section>
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                        Libelle
                                                                </label>
                                                                <label class="input">                                                                     
                                                                        <input type="text" id="libelle" class="form-control" name="libelle" value="" required>
                                                                   
                                                                </label>
                                                        </section>
                                                    </div>
                                                       
                                        
                                                    <!--**********************-->
                                                    <div class="row">
                                                            <section class="col col-6">
                                                                    <label class="label">
                                                                                        Lieu de chargement
                                                                    </label>
                                                                    
                                                                    <label class="select">                                                                        
                                                                       <select name="lieu_chargement1" id="lieu_chargement1">
                                                                                <option value=""></option>
                                                                                
                                                                                    @foreach($lieu1 as $l)
                                                                                    <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                    @endforeach
                                                                            </select>
                                                                            
                                                                    </label>
                                                                    <label class="pull-right">
                                                                            <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieu2" onclick="Addlieu2()" class="btn btn-red btn-sm">Ajouter un nouveau lieu de chargement</i></a>
                                                                    </label>
                                                            </section>
                                                            <section class="col col-6">
                                                                <label class="label">
                                                                           Douane
                                                                </label>
                                                                   
                                                                <label class="select">                                                                        
                                                                        <select name="douane" required>
                                                                                 <option value=""></option>
                                                                                 
                                                                                     @foreach($lieudouane as $l)
                                                                                     <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                     @endforeach
                                                                             </select>
                                                                             
                                                                     </label>
                                                               
                                                        </section>
                                                    </div>
                                                    <div class="row">     
                                                            <div class="" id="lieu2"  style="display:none;" >
                                                                    <section class="col col-6">
                                                                            <label class="select"> 
                                                                       <select name="lieu_chargement2" id="lieu_chargement2">
                                                                                                                                                               
                                                                                            <option value=""></option>
                                                                                            
                                                                                                @foreach($lieu1 as $l)
                                                                                                <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        
                                                                            </label>
                                                                            <label class="pull-right">
                                                                                    <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieu3" onclick="Addlieu3()" class="btn btn-red btn-sm">Ajouter un nouveau lieu de chargement</a>
                                                                            </label>
                                                                    </section>
                                                                   
                                                            </div>

                                                    </div>
                                                    <div class="row">
                                                            <div class="" id="lieu3"  style="display:none;" >
                                                                    <section class="col col-6">
                                                                            <label class="select">
                                                                       <select name="lieu_chargement3" id="lieu_chargement3">
                                                                                                                                                                
                                                                                            <option value=""></option>
                                                                                            
                                                                                                @foreach($lieu1 as $l)
                                                                                                <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        
                                                                            </label>
                                                                            <label class="pull-right">
                                                                                    <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieu4" onclick="Addlieu4()" class="btn btn-red btn-sm">Ajouter un nouveau lieu de chargement</a>
                                                                            </label>
                                                                    </section>
                                                                    
                                                            </div>

                                                    </div>
                                                    <div class="row" >       
                                                            <div class="" id="lieu4"  style="display:none;" >
                                                                    <section class="col col-6">
                                                                            <label class="select">
                                                                       <select name="lieu_chargement4" id="lieu_chargement4">
                                                                                                                                                                
                                                                                            <option value=""></option>
                                                                                            
                                                                                                @foreach($lieu1 as $l)
                                                                                                <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        
                                                                            </label>
                                                                            <label class="pull-right">
                                                                                    <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieu5" onclick="Addlieu5()" class="btn btn-red btn-sm">Ajouter un nouveau lieu de chargement</a>
                                                                            </label>
                                                                    </section>
                                                                    
                                                            </div>
                                                    </div>
                                                    <div class="row">
                                                            <div class="" id="lieu5"  style="display:none;" >
                                                                    <section class="col col-6">
                                                                            <label class="select">
                                                                       <select name="lieu_chargement5" id="lieu_chargement5">
                                                                                                                                                                
                                                                                            <option value=""></option>
                                                                                            
                                                                                                @foreach($lieu1 as $l)
                                                                                                <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        
                                                                            </label>
                                                                    </section>
                                                            </div>
                                                    </div>
                                                    <!--*********************-->
                                                    <div class="row">
                                                            <section class="col col-6">
                                                                    <label class="label">
                                                                                        Lieu de dechargement
                                                                    </label>
                                                                    
                                                                    <label class="select">                                                                        
                                                                       <select name="lieu_dechargement1" id="lieu_dechargement1">
                                                                                <option value=""></option>
                                                                                
                                                                                    @foreach($lieu2 as $l)
                                                                                    <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                    @endforeach
                                                                            </select>
                                                                            
                                                                    </label>
                                                                    <label class="pull-right">
                                                                            <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieude2" onclick="Addlieude2()" class="btn btn-red btn-sm">Ajouter un nouveau lieu de chargement</i></a>
                                                                    </label>
                                                            </section>
                                                            <section class="col col-6">
                                                                <label  class="label">
                                                                                Distance 
                                                                </label>
                                                                <label class="input"><i class="icon-append ">Km</i>
                                                                    <input type="number" min="0" class="form-control" name="distance" value="" required>
                                                                </label>
                                                                
                                                            </section> 
                                                            
                                                           
                                                    </div>
                                                    <div class="row">     
                                                            <div class="" id="lieude2"  style="display:none;" >
                                                                    <section class="col col-6">
                                                                            <label class="select"> 
                                                                       <select name="lieu_dechargement2" id="lieu_dechargement2">
                                                                                                                                                               
                                                                                            <option value=""></option>
                                                                                            
                                                                                                @foreach($lieu2 as $l)
                                                                                                <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        
                                                                            </label>
                                                                            <label class="pull-right">
                                                                                    <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieude3" onclick="Addlieude3()" class="btn btn-red btn-sm">Ajouter un nouveau lieu de chargement</a>
                                                                            </label>
                                                                    </section>
                                                                   
                                                            </div>

                                                    </div>
                                                    <div class="row">
                                                            <div class="" id="lieude3"  style="display:none;" >
                                                                    <section class="col col-6">
                                                                            <label class="select">
                                                                       <select name="lieu_dechargement3" id="lieu_dechargement3">
                                                                                                                                                                
                                                                                            <option value=""></option>
                                                                                            
                                                                                                @foreach($lieu2 as $l)
                                                                                                <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        
                                                                            </label>
                                                                            <label class="pull-right">
                                                                                    <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieude4" onclick="Addlieude4()" class="btn btn-red btn-sm">Ajouter un nouveau lieu de chargement</a>
                                                                            </label>
                                                                    </section>
                                                                    
                                                            </div>

                                                    </div>
                                                    <div class="row" >       
                                                            <div class="" id="lieude4"  style="display:none;" >
                                                                    <section class="col col-6">
                                                                            <label class="select">
                                                                       <select name="lieu_dechargement4" id="lieu_dechargement4">
                                                                                                                                                                
                                                                                            <option value=""></option>
                                                                                            
                                                                                                @foreach($lieu2 as $l)
                                                                                                <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        
                                                                            </label>
                                                                            <label class="pull-right">
                                                                                    <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieude5" onclick="Addlieude5()" class="btn btn-red btn-sm">Ajouter un nouveau lieu de chargement</a>
                                                                            </label>
                                                                    </section>
                                                                    
                                                            </div>
                                                    </div>
                                                    <div class="row">
                                                            <div class="" id="lieude5"  style="display:none;" >
                                                                    <section class="col col-6">
                                                                            <label class="select">
                                                                       <select name="lieu_dechargement5" id="lieu_dechargement5">
                                                                                                                                                                
                                                                                            <option value=""></option>
                                                                                            
                                                                                                @foreach($lieu2 as $l)
                                                                                                <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        
                                                                            </label>
                                                                    </section>
                                                                </div>
                                                    </div>
                                                    <div class="row">                                                            
                                                                                                                                                                                       
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                        Description
                                                                </label>
                                                                <label class="input">  
                                                                         <input type="text" class="form-control" name="description" value="" required>                                                             
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

