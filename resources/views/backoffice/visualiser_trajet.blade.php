@extends('layouts.dashboard')
@section('title')
Visualiser le trajet
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>utilisation</li>
                <li>Transport</li>
                <li><a href="{{route('backoffice_trajets')}}">Trajets</a></li>
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
                                            <span class="widget-icon"><i class="fa fa-eye"></i></span>
                                            <h2>Visualiser le trajet</h2>
                    
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
                                                                            Numero
                                                            </label>
                                                            <label class="input">
                                                                <input type="hidden" name="id" value="{{$trajets->id}}">                                                                
                                                                <input type="number" min="0" class="form-control" name="numero" value="{{$trajets->numero}}" disabled>
                                                            </label>
                                                            
                                                        </section>
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                        Libelle
                                                                </label>
                                                                <label class="input">                                                                     
                                                                        <input type="text" id="libelle" class="form-control" name="libelle" value="{{$trajets->libelle}}" disabled>
                                                                   
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
                                                                       <select name="lieu_chargement1" id="lieu_chargement1" disabled>
                                                                                <option value="{{$trajets->lieu_chargement1}}">{{$trajets->lieu_chargement1}}</option>
                                                                                
                                                                                    @foreach($lieu1 as $l)
                                                                                    <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                    @endforeach
                                                                        </select>
                                                                            
                                                                    </label>
                                                                    @if(empty($trajets->lieu_chargement2))
                                                                        <label class="pull-right">
                                                                                        <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieu2" 2 class="btn btn-red btn-sm" disabled>Ajouter un nouveau lieu de chargement</i></a>
                                                                        </label>
                                                                    @endif
                                                                    
                                                            </section>
                                                            <section class="col col-6">
                                                                <label class="label" style="">
                                                                           Douane
                                                                </label>
                                                                <label class="select">                                                                        
                                                                        <select name="douane" disabled>
                                                                                <option value="{{$trajets->douane}}">{{$trajets->douane}}</option>
                                                                                 
                                                                                @foreach($lieudouane as $l)
                                                                                <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                @endforeach
                                                                        </select>
                                                                             
                                                                     </label>
                                                         </section>
                                                            
                                                    </div>
                                                    <div class="row">
                                                            @if(!empty($trajets->lieu_chargement2 ))    
                                                            <div class="" id="lieu2">
                                                                        <section class="col col-6">
                                                                                <label class="select"> 

                                                                                <select name="lieu_chargement2" id="lieu_chargement2" disabled>                                                                    
                                                                                                <option value="{{$trajets->lieu_chargement2}}">{{$trajets->lieu_chargement2}}</option>
                                                                                                
                                                                                                @foreach($lieu1 as $l)
                                                                                                <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                @endforeach
                                                                                </select>
                                                                                            
                                                                                </label>
                                                                                @if(empty($trajets->lieu_chargement3 )) 
                                                                                        <label class="pull-right">
                                                                                                <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieu3" 3 class="btn btn-red btn-sm" disabled>Ajouter un nouveau lieu de chargement</a>
                                                                                        </label>
                                                                               @endif
                                                                        </section>
                                                                       
                                                                </div>
                                                            @endif
                                                            <div class="" id="lieu2"  style="display:none;" >
                                                                    <section class="col col-6">
                                                                            <label class="select"> 
                                                                       <select name="lieu_chargement2" id="lieu_chargement2">
                                                                                                                                                               
                                                                                            <option value="{{$trajets->lieu_chargement2}}">{{$trajets->lieu_chargement2}}</option>
                                                                                            
                                                                                                @foreach($lieu1 as $l)
                                                                                                <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        
                                                                            </label>
                                                                            <label class="pull-right">
                                                                                    <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieu3" 3 class="btn btn-red btn-sm" disabled>Ajouter un nouveau lieu de chargement</a>
                                                                            </label>
                                                                    </section>
                                                                   
                                                            </div>

                                                    </div>
                                                    <div class="row">
                                                            @if(!empty($trajets->lieu_chargement3))
                                                            <div class="" id="lieu3">
                                                                        <section class="col col-6">
                                                                                <label class="select">
                                                                           <select name="lieu_chargement3" id="lieu_chargement3" disabled>
                                                                                                                                                                    
                                                                                                <option value="{{$trajets->lieu_chargement3}}">{{$trajets->lieu_chargement3}}</option>
                                                                                                
                                                                                                    @foreach($lieu1 as $l)
                                                                                                    <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                    @endforeach
                                                                                            </select>
                                                                                            
                                                                                </label>
                                                                                @if(empty($trajets->lieu_chargement4))
                                                                                <label class="pull-right">
                                                                                        <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieu4" 4 class="btn btn-red btn-sm" disabled>Ajouter un nouveau lieu de chargement</a>
                                                                                </label>
                                                                                @endif
                                                                        </section>
                                                                        
                                                                </div>
                                                            @endif
                                                            <div class="" id="lieu3"  style="display:none;" >
                                                                    <section class="col col-6">
                                                                            <label class="select">
                                                                       <select name="lieu_chargement3" id="lieu_chargement3">
                                                                                                                                                                
                                                                                            <option value="{{$trajets->lieu_chargement3}}">{{$trajets->lieu_chargement3}}</option>
                                                                                            
                                                                                                @foreach($lieu1 as $l)
                                                                                                <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        
                                                                            </label>
                                                                            <label class="pull-right">
                                                                                    <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieu4" 4 class="btn btn-red btn-sm" disabled>Ajouter un nouveau lieu de chargement</a>
                                                                            </label>
                                                                    </section>
                                                                    
                                                            </div>

                                                    </div>
                                                    <div class="row" >   
                                                            @if(!empty($trajets->lieu_chargement4))
                                                            <div class="" id="lieu4" >
                                                                        <section class="col col-6">
                                                                                <label class="select">
                                                                           <select name="lieu_chargement4" id="lieu_chargement4" disabled>
                                                                                                                                                                    
                                                                                                <option value="{{$trajets->lieu_chargement4}}">{{$trajets->lieu_chargement4}}</option>
                                                                                                
                                                                                                    @foreach($lieu1 as $l)
                                                                                                    <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                    @endforeach
                                                                                            </select>
                                                                                            
                                                                                </label>
                                                                                @if(empty($trajets->lieu_chargement5))
                                                                                <label class="pull-right">
                                                                                        <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieu5" 5 class="btn btn-red btn-sm" disabled>Ajouter un nouveau lieu de chargement</a>
                                                                                </label>
                                                                                @endif
                                                                        </section>
                                                                        
                                                                </div>
                                                            
                                                            @endif
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
                                                                                    <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieu5" 5 class="btn btn-red btn-sm" disabled>Ajouter un nouveau lieu de chargement</a>
                                                                            </label>
                                                                    </section>
                                                                    
                                                            </div>
                                                    </div>
                                                    <div class="row">
                                                            @if(!empty($trajets->lieu_chargement5))
                                                                <div class="" id="lieu5" >
                                                                                <section class="col col-6">
                                                                                        <label class="select">
                                                                                   <select name="lieu_chargement5" id="lieu_chargement5" disabled>
                                                                                                                                                                            
                                                                                                        <option value="{{$trajets->lieu_chargement5}}">{{$trajets->lieu_chargement5}}</option>
                                                                                                        
                                                                                                            @foreach($lieu1 as $l)
                                                                                                            <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                            @endforeach
                                                                                                    </select>
                                                                                                    
                                                                                        </label>
                                                                                </section>
                                                                        </div>
                                                                        @endif
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
                                                                       <select name="lieu_dechargement1" id="lieu_dechargement1" disabled>
                                                                                <option value="{{$trajets->lieu_dechargement1}}">{{$trajets->lieu_dechargement1}}</option>
                                                                                
                                                                                    @foreach($lieu2 as $l)
                                                                                    <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                    @endforeach
                                                                            </select>
                                                                            
                                                                    </label>
                                                                    @if(empty($trajets->lieu_dechargement2))
                                                                    <label class="pull-right">
                                                                            <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieude2" de2 class="btn btn-red btn-sm" disabled>Ajouter un nouveau lieu de chargement</i></a>
                                                                    </label>
                                                                    @endif
                                                            </section>
                                                            <section class="col col-6">
                                                                <label  class="label">
                                                                                Distance 
                                                                </label>
                                                                <label class="input"><i class="icon-append ">Km</i>
                                                                    <input type="number" min="0" class="form-control" name="distance" value="{{$trajets->distance}}" disabled>
                                                                </label>
                                                                
                                                            </section>  
                                                            
                                                           
                                                    </div>
                                                    <div class="row">  
                                                            @if(!empty($trajets->lieu_dechargement2))
                                                            <div class="" id="lieude2" >
                                                                        <section class="col col-6">
                                                                                <label class="select"> 
                                                                           <select name="lieu_dechargement2" id="lieu_dechargement2" disabled>
                                                                                                                                                                   
                                                                                                <option value="{{$trajets->lieu_dechargement2}}">{{$trajets->lieu_dechargement2}}</option>
                                                                                                
                                                                                                    @foreach($lieu2 as $l)
                                                                                                    <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                    @endforeach
                                                                                            </select>
                                                                                            
                                                                                </label>
                                                                                @if(empty($trajets->lieu_dechargement3))
                                                                                <label class="pull-right">
                                                                                        <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieude3" de3 class="btn btn-red btn-sm" disabled>Ajouter un nouveau lieu de chargement</a>
                                                                                </label>
                                                                                @endif
                                                                        </section>
                                                                       
                                                                </div>                                                            
                                                            @endif
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
                                                                                    <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieude3" de3 class="btn btn-red btn-sm" disabled>Ajouter un nouveau lieu de chargement</a>
                                                                            </label>
                                                                    </section>
                                                                   
                                                            </div>

                                                    </div>
                                                    <div class="row">
                                                            @if(!empty($trajets->lieu_dechargement3))
                                                            <div class="" id="lieude3">
                                                                        <section class="col col-6">
                                                                                <label class="select">
                                                                           <select name="lieu_dechargement3" id="lieu_dechargement3" disabled>
                                                                                                                                                                    
                                                                                                <option value="{{$trajets->lieu_dechargement3}}">{{$trajets->lieu_dechargement3}}</option>
                                                                                                
                                                                                                    @foreach($lieu2 as $l)
                                                                                                    <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                    @endforeach
                                                                                            </select>
                                                                                            
                                                                                </label>
                                                                                @if(empty($trajets->lieu_dechargement4))
                                                                                <label class="pull-right">
                                                                                        <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieude4" de4 class="btn btn-red btn-sm" disabled>Ajouter un nouveau lieu de chargement</a>
                                                                                </label>
                                                                                @endif
                                                                        </section>
                                                                        
                                                                </div>

                                                            @endif
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
                                                                                    <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieude4" de4 class="btn btn-red btn-sm" disabled>Ajouter un nouveau lieu de chargement</a>
                                                                            </label>
                                                                    </section>
                                                                    
                                                            </div>

                                                    </div>
                                                    <div class="row" > 
                                                            @if(!empty($trajets->lieu_dechargement4)) 
                                                            <div class="" id="lieude4">
                                                                        <section class="col col-6">
                                                                                <label class="select">
                                                                           <select name="lieu_dechargement4" id="lieu_dechargement4" disabled>
                                                                                                                                                                    
                                                                                                <option value="{{$trajets->lieu_dechargement4}}">{{$trajets->lieu_dechargement4}}</option>
                                                                                                
                                                                                                    @foreach($lieu2 as $l)
                                                                                                    <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                    @endforeach
                                                                                            </select>
                                                                                            
                                                                                </label>
                                                                                @if(empty($trajets->lieu_dechargement5))
                                                                                <label class="pull-right">
                                                                                        <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieude5" de5 class="btn btn-red btn-sm" disabled>Ajouter un nouveau lieu de chargement</a>
                                                                                </label>
                                                                                @endif
                                                                        </section>
                                                                        
                                                                </div>
                                                            
                                                            @endif
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
                                                                                    <a style="margin-top: 25px;margin-bottom: 25px" id="btnAddLieude5" de5 class="btn btn-red btn-sm" disabled>Ajouter un nouveau lieu de chargement</a>
                                                                            </label>
                                                                    </section>
                                                                    
                                                            </div>
                                                    </div>
                                                    <div class="row">
                                                            @if(!empty($trajets->lieu_dechargement5))
                                                            <div class="" id="lieude5" >
                                                                        <section class="col col-6">
                                                                                <label class="select">
                                                                           <select name="lieu_dechargement5" id="lieu_dechargement5" disabled>
                                                                                                                                                                    
                                                                                                <option value="{{$trajets->lieu_dechargement5}}">{{$trajets->lieu_dechargement5}}</option>
                                                                                                
                                                                                                    @foreach($lieu2 as $l)
                                                                                                    <option value="{{$l->ville->libelle_ville}}">{{$l->ville->libelle_ville}}</option>
                                                                                                    @endforeach
                                                                                            </select>
                                                                                            
                                                                                </label>
                                                                        </section>
                                                            </div>
                                                            @endif
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
                                                                         <input type="text" class="form-control" name="description" value="{{$trajets->description}}" disabled>                                                             
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




        
@endsection