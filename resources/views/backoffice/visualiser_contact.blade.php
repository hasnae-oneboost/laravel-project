@extends('layouts.dashboard')
@section('title')
Visualiser contact 
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Transport</li>
                <li><a href="{{route('backoffice_clients')}}">Clients</a></li>
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
                                        <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                                        <h2>Visualiser contact </h2>
                
                                </header>
                    
                                <!-- widget div-->
                                <div>                                 
                    
                                <!-- widget content -->

                                        
                            <div class="widget-body">

                                    
                                    <form class="smart-form" files="true" method="POST" action=" ">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                           
                                           
                                            <fieldset>
                                                <div class="row">
                                                           
                                                    <section class="col col-6">
                                                        <label  class="label">
                                                                        Client
                                                        </label>
                                                        <label class="input">
                                                                <input type="hidden" name="id" value="{{$values->id}}">
                                                            <input type="text"  class="form-control" name="client" value="{{$values->code}}" disabled>
                                                        </label>
                                                        
                                                    </section>
                                                    <section class="col col-6">
                                                            <label class="label">
                                                                        Nom
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="nom" value="{{$contactclient->nom}}" disabled>
                                                            </label>
                                                            
                                                    </section>
                                                    <section class="col col-6">
                                                                        <label class="label">
                                                                        Poste
                                                                        </label>
                                                                        <label class="input">                                                                    
                                                                                <input type="text"  class="form-control" name="poste" value="{{$contactclient->poste}}" disabled>
                                                                           
                                                                        </label>
                                                    </section>
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                 Telephone
                                                        </label>
                                                        <label class="input">                                                                    
                                                                <input type="text"  class="form-control" name="telephone" value="{{$contactclient->telephone}}" disabled>
                                                           
                                                        </label>
                                                    </section>
                                                </div>
                                                <div class="row">
                                                    <section class="col col-6">
                                                        <label class="label">
                                                                    E-mail
                                                        </label>
                                                        <label class="input">                                                                    
                                                                <input type="text"  class="form-control" name="email" value="{{$contactclient->email}}" disabled>
                                                           
                                                        </label>
                                                    </section>
                                                    <section class="col col-6">
                                                            <label class="label">
                                                                    Commentaire
                                                            </label>
                                                            <label class="input">                                                                    
                                                                    <input type="text"  class="form-control" name="commentaire" value="{{$contactclient->commentaire}}" disabled>
                                                                   
                                                            </label>
                                                        </section>
                                                </div>     
                                                             
                                            </fieldset>
                                           
                        
                        
                                    <footer>
                                           
                                            <button type="button" class="btn btn-default" onclick="window.history.back();">
                                                Retour
                                            </button>
                                        </footer>
                                    </form>                                  
                                   
                              
                                    
                            </div>
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
