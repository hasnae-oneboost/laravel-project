@extends('layouts.dashboard')
@section('title')
Modifier le compte bancaire
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                        <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                        <li>Utilisation</li>
                        <li>Caisses</li>
                        <li>Trésorerie</li>
                        <li><a href="{{route('backoffice_comptes')}}">Comptes bancaires</a></li>
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
                                            <h2>Modifier le compte bancaire</h2>
                    
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
                                                
                                        <form class="smart-form" files="true" action="{{route('backoffice_comptes_modifier')}}" method="POST" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        {{method_field('PATCH')}}
                                             <header></header>
                        
                                                <fieldset>
                                                    <div class="row">
                                                               
                                                        <section class="col col-6">
                                                            <label  class="label">
                                                                            Libelle
                                                            </label>
                                                            <label class="input">
                                                                    <input type="hidden" name="id" value="{{$comptes->id}}">
                                                                <input type="text"  class="form-control" name="libelle" value="{{$comptes->libelle}}" required>
                                                            </label>
                                                            
                                                        </section>
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                                Banque
                                                            </label>
                                                            <label class="select">                                                                    
                                                                <select class="banque_select" name="banque" id="banque" style="width:695px;" required>
                                                                    <option value="{{$comptes->banque_id}}">{{$comptes->banque->nom}}</option>
                                                                    @foreach($banque as $b)
                                                                    <option value="{{$b->id}}">{{$b->nom}}</option>
                                                                    @endforeach
                                                                </select>
                                                                       
                                                            </label>
                                                    </section>
                                                    
                                                    </div>
                                                    <div class="row">
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                                Agence
                                                            </label>
                                                            <label class="select">                                                                    
                                                                <select class="agence_selected" name="agence" id="agence" style="width:695px;" required>
                                                                    <option value="{{$comptes->agence_id}}">{{$comptes->agence->libelle}}</option>
                                                                    @foreach($agence as $a)
                                                                    <option value="{{$a->id}}">{{$a->libelle}}</option>
                                                                    @endforeach
                                                                </select>
                                                                       
                                                            </label>
                                                    </section>
                                                          
                                                        <section class="col col-6">
                                                                            <label class="label">
                                                                                    Date de création
                                                                            </label>
                                                                            <label class="input">                                                                    
                                                                                    <input type="text"  class="form-control" name="date_création" value="{{$comptes->date_création}}" required>
                                                                               
                                                                            </label>
                                                        </section>
                                                      
                                                       
                                                    </div>
                                                    <div class="row">
                                                        
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                        N° RIB
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="rib" value="{{$comptes->rib}}" required>
                                                                   
                                                                </label>
                                                        </section>
                                                        <section class="col col-6">
                                                            <label class="label">
                                                                                        Solde initial
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="solde_initial" value="{{$comptes->solde_initial}}" required>
                                                                               
                                                            </label>
                                                        </section>
                                                    </div>
                                                    <div class="row">
                                                        <section class="col col-6">
                                                                <label class="label">
                                                                            Description
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="description" value="{{$comptes->description}}" required>
                                                                   
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