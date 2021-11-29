@extends('layouts.dashboard')

@section('title')
Données de l'entreprise
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
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
                                        <h2>Données de l'entreprise</h2>
                
                                    </header>
                    
                                    <!-- widget div-->
                                    <div>
                
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
                                            
                                            <form class="smart-form" files="true" action="{{ route('backoffice_entreprise_modifier') }}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    {{method_field('PATCH')}}
                                             <header></header>
                    
                                                <fieldset>
                                                    <div class="row">
                                                           
                                                        <section class="col col-6">
                                                            <label for="raison_sociale" class="label">
                                                                        Raison Sociale
                                                            </label>
                                                            <label class="input">
                                                                <input type="text"  class="form-control" name="raison_sociale" id="raison_sociale" value="{{$entreprise->raison_sociale}}">
                                                            </label>
                                                            @if ($errors->has('raison_sociale'))

                                                                <span class="text-danger">{{ $errors->first('raison_sociale') }}</span>

                                                            @endif
                                                        </section>
                                                        <section class="col col-3">
                                                                <label for="logo" class="label">
                                                                            Logo
                                                                </label>
                                                                <label class="input">                                                                    
                                                                    <input type="file" name="logoInput" id="logoInput" >
                                                                   
                                                                </label>
                                                               
                                                           
                                                                @if ($errors->has('logoInput'))

                                                                <span class="text-danger">{{ $errors->first('logoInput') }}</span>

                                                            @endif
                                                            </section>
                                                            <section class="col col-3">
                                                                        <div class="row">
                                                                                <img src="/images/{{$entreprise->logo}}" alt="logo" width="200px" height="60px" >
                                                                        </div>
                                                                    </label>
                                                                   
                                                               
                                                                    @if ($errors->has('logoInput'))
    
                                                                    <span class="text-danger">{{ $errors->first('logoInput') }}</span>
    
                                                                @endif
                                                                </section>
                                                     
                                                        <section class="col col-6">
                                                            <label for="IF" class="label">
                                                                        IF
                                                            </label>
                                                            <label class="input">
                                                                <input type="text" name="IF" id="IF" value="{{$entreprise->IF}}">
                                                            </label>
                                                            @if ($errors->has('IF'))

                                                            <span class="text-danger">{{ $errors->first('IF') }}</span>

                                                        @endif
                                                        </section>

                                                        <section class="col col-3">
                                                                <label for="logo" class="label">
                                                                            Logo Document
                                                                </label>
                                                                <label class="input">                                                                    
                                                                    <input type="file" name="logoDocInput" id="logoDocInput" >
                                                                   
                                                                </label>
                                                               
                                                           
                                                                @if ($errors->has('logoDocInput'))

                                                                <span class="text-danger">{{ $errors->first('logoDocInput') }}</span>

                                                            @endif
                                                            </section>
                                                            <section class="col col-3">
                                                                        <div class="row">
                                                                                <img src="/images/{{$entreprise->logo_document}}" alt="logo" width="100px" height="60px" >
                                                                        </div>
                                                                    </label>
                                                                   
                                                               
                                                                    @if ($errors->has('logoInput'))
    
                                                                    <span class="text-danger">{{ $errors->first('logoInput') }}</span>
    
                                                                @endif
                                                                </section>
                                                            </div>
                    
                                                            <div class="row">
                                                        <section class="col col-6">
                                                            <label for="RC" class="label">
                                                                        RC
                                                            </label>
                                                            <label class="input">
                                                                <input type="text" name="RC" id="RC" value="{{$entreprise->RC}}">
                                                            </label>
                                                            @if ($errors->has('RC'))

                                                            <span class="text-danger">{{ $errors->first('RC') }}</span>

                                                        @endif
                                                           
                                                        </section>
                                                    
                    
                                                      
                                                        <section class="col col-6">
                                                            <label for="adresse" class="label">
                                                                        Adresse
                                                            </label>
                                                            <label class="input">
                                                                <input type="text" name="adresse" id="adresse" value="{{$entreprise->adresse}}">
                                                            </label>
                                                            @if ($errors->has('adresse'))

                                                            <span class="text-danger">{{ $errors->first('adresse') }}</span>

                                                        @endif
                                                        </section>
                                                        <section class="col col-6">
                                                                <label for="telephone" class="label">
                                                                            Téléphone
                                                                </label>
                                                                <label class="input">
                                                                    <input type="text" name="telephone" id="telephone" value="{{$entreprise->telephone}}">
                                                                </label>
                                                                @if ($errors->has('telephone'))

                                                                <span class="text-danger">{{ $errors->first('telephone') }}</span>

                                                            @endif
                                                        </section>
                                                                           
                                                        <section class="col col-6">
                                                            <label for="fixe" class="label">
                                                                        Fixe
                                                            </label>
                                                            <label class="input">
                                                                <input type="text" name="fixe" id="fixe" value="{{$entreprise->fixe}}">
                                                            </label>
                                                            @if ($errors->has('fixe'))

                                                            <span class="text-danger">{{ $errors->first('fixe') }}</span>

                                                        @endif
                                                        </section>
                                                    </div>
                    
                                                    <div class="row">
                                                        <section class="col col-6">
                                                            <label for="type" class="label">
                                                                        Type
                                                            </label>
                                                            <label class="input">
                                                                <input type="text" name="type" id="type" value="{{$entreprise->type}}">
                                                            </label>
                                                            @if ($errors->has('type'))

                                                            <span class="text-danger">{{ $errors->first('type') }}</span>

                                                        @endif
                                                        </section>
                                                   
                                                        <section class="col col-6">
                                                            <label for="capital" class="label">
                                                                        Capital
                                                            </label>
                                                            <label class="input">
                                                                <input type="text" name="capital" id="capital" value="{{$entreprise->capital}}">
                                                            </label>
                                                            @if ($errors->has('capital'))

                                                            <span class="text-danger">{{ $errors->first('capital') }}</span>

                                                        @endif
                                                        </section>
                                                        <section class="col col-6">
                                                            <label for="cnss" class="label">
                                                                       CNSS
                                                            </label>
                                                                <label class="input">
                                                                    <input type="text" name="cnss" id="cnss" value="{{$entreprise->cnss}}">
                                                                </label>
                                                                @if ($errors->has('cnss'))

                                                                <span class="text-danger">{{ $errors->first('cnss') }}</span>

                                                            @endif
                                                            </section>
                                                    
                                                        <section class="col col-6">
                                                                <label for="tp" class="label">
                                                                        TP
                                                             </label>
                                                                 <label class="input">
                                                                     <input type="text" name="tp" id="tp" value="{{$entreprise->TP}}">
                                                                 </label>
                                                                @if ($errors->has('tp'))

                                                                 <span class="text-danger">{{ $errors->first('tp') }}</span>
 
                                                                @endif
                                                             </section>
                                                            </div>
                                                            <div class="row">
                                                        <section class="col col-6">
                                                                <label for="swift" class="label">
                                                                        SWIFT
                                                             </label>
                                                                 <label class="input">
                                                                     <input type="text" name="swift" id="swift" value="{{$entreprise->swift}}">
                                                                 </label>
                                                                 @if ($errors->has('swift'))

                                                                 <span class="text-danger">{{ $errors->first('swift') }}</span>
 
                                                                 @endif
                                                             
                                                        </section>
                                                 
                                                        <section class="col col-6">
                                                                <label for="site" class="label">
                                                                        Site
                                                             </label>
                                                                 <label class="input">
                                                                     <input type="text" name="site" id="site" value="{{$entreprise->site}}">
                                                                 </label>
                                                                 @if ($errors->has('site'))

                                                                 <span class="text-danger">{{ $errors->first('site') }}</span>
 
                                                             @endif
                                                             
                                                        </section>
                                                        <section class="col col-6">
                                                                <label for="ice" class="label">
                                                                        ICE
                                                             </label>
                                                                 <label class="input">
                                                                     <input type="text" name="ice" id="ice"  value="{{$entreprise->ice}}">
                                                                 </label> 
                                                                 @if ($errors->has('ice'))

                                                                 <span class="text-danger">{{ $errors->first('ice') }}</span>
 
                                                             @endif
                                                        </section>
                                                   
                                                      
                                                        <section class="col col-6">
                                                                <label for="email" class="label">
                                                                        E-mail
                                                             </label>
                                                                 <label class="input">
                                                                     <input type="text" name="email" id="email" value="{{$entreprise->email}}">
                                                                 </label>
                                                                 @if ($errors->has('email'))

                                                                 <span class="text-danger">{{ $errors->first('email') }}</span>
 
                                                             @endif
                                                            
                                                        </section>
                                                    </div>
                    
                                                   
                                                   
                                                </fieldset>
                    
                                               
                    
                                                <footer>
                                                    @permission('Modifier')
                                                    <button type="submit" class="btn btn-red">
                                                        Valider
                                                    </button>
                                                    @endpermission
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