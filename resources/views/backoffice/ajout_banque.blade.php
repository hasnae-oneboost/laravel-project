@extends('layouts.dashboard')
@section('title')
Ajouter une nouvelle banque
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                        <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                        <li>Utilisation</li>
                        <li>Caisses</li>
                        <li>Trésorerie</li>
                        <li><a href="{{route('backoffice_banques')}}">Banques</a></li>
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
                                        <h2>Ajouter une nouvelle banque</h2>
                
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
                                            
                                            <form class="smart-form" files="true" action="{{route('backoffice_banques_ajouter')}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                             <header></header>
                    
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
                                                                            Nom
                                                                </label>
                                                                <label class="input">                                                                    
                                                                        <input type="text"  class="form-control" name="nom" value="" required>
                                                                   
                                                                </label>
                                                            </section>
                                                            <section class="col col-6">
                                                                    <label class="label">
                                                                                Nom du responsable
                                                                    </label>
                                                                    <label class="input">                                                                    
                                                                            <input type="text"  class="form-control" name="nom_responsable" value="" required>
                                                                       
                                                                    </label>
                                                            </section>
                                                            <section class="col col-6">
                                                                    <label class="label">
                                                                                Adresse
                                                                    </label>
                                                                    <label class="input">                                                                    
                                                                            <input type="text"  class="form-control" name="adresse" value="" required>
                                                                       
                                                                    </label>
                                                             </section>
                                                             <section class="col col-6">
                                                                    <label class="label">
                                                                                Ville
                                                                    </label>
                                                                    <label class="select">                                                                    
                                                                            <select class="ville_select" name="ville" id="ville" style="width:695px;" required>
                                                                                <option value=""></option>
                                                                               @foreach($ville as $v)
                                                                                <option value="{{$v->id}}">{{$v->libelle_ville}}</option>
                                                                               @endforeach
                                                                            </select>
                                                                       
                                                                    </label>
                                                                </section>
                                                                <section class="col col-6">
                                                                                <label class="label">
                                                                                            Logo
                                                                                </label>
                                                                                <label class="input">                                                                    
                                                                                        <input type="file" name="logoInput">
                                                                                   
                                                                                </label>
                                                                </section>
                                                       
                                                                <section class="col col-6">
                                                                        <label class="label">
                                                                                    Site web
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="site_web" value="" required>
                                                                           
                                                                        </label>
                                                                </section>
                                                                <section class="col col-6">
                                                                        <label class="label">
                                                                                    Description
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="description" value="" required>
                                                                           
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-6">
                                                                            <label class="label">
                                                                                        Compte general
                                                                            </label>
                                                                            <label class="input">                                                                    
                                                                                    <input type="text"  class="form-control" name="compte_general" value="" required>
                                                                               
                                                                            </label>
                                                                        </section>
                                                                        <section class="col col-6">
                                                                                        <label class="label">
                                                                                                    Tel.
                                                                                        </label>
                                                                                        <label class="input">                                                                    
                                                                                                <input type="text"  class="form-control" name="telephone" value="" required>
                                                                                        </label>
                                                                                </section>
                                                    </div>
                    
                                                    <div class="row">                                                       
                                                            
                                                             
                                                                <section class="col col-6">
                                                                        <label class="label">
                                                                                    GSM
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="gsm" value="" required>
                                                                           
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
                                                                    <section class="col col-6">
                                                                            <label class="label">
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