@extends('layouts.dashboard')
@section('title')
Ajouter un nouveau Contrat de leasing
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
            <li><a href="">Accueil</a></li>
            <li>Flotte</li>
            <li><a href="{{route('backoffice_contrats_leasing')}}">Contrats de leasing</a></li>
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
                <form class="" files="true" action="{{route('backoffice_contrat_leasing_ajouter')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
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
                               <p class="h6">&nbsp;Informations générales</p>		   
                            </header>

                            <!-- widget div-->
                            <div>
                                
                                <!-- widget content -->
                                <div class="widget-body">
                                   
                                <fieldset>
                                    <div class="form-group">
                                                    <div class="col-md-2">
                                                    <label>N°Contrat</label>
                                                    </div>
													<div class="col-md-10">
                                                            <input class="form-control" type="text" name="numero_contrat" required>
                                                    </div>
                                    </div>
                                    
                                </fieldset>
                                <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Fournisseur de véhicules</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <select class="form-control" name="fournisseur" id="" required>
                                                                <option value=""></option>
                                                                @foreach($fournisseurs as $f)
                                                                <option value="{{$f->id}}">{{$f->libelle}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                            </div>

                                </fieldset>
                                <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Véhicule</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                            <select class="form-control" name="vehicule[]" id="" multiple required>
                                                                <option value=""></option>
                                                                @foreach($vehicules as $v)
                                                                    <option value="{{$v->immatriculation}}">{{$v->immatriculation}}</option>
                                                                @endforeach
                                                            </select>
                                                    </div>
                                            </div>
                                </fieldset>
                                <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Date de contrat</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                            <input class="form-control" type="text" id="date" name="date_contrat" required>

                                                    </div>
                                            </div>

                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Date 1er prelevement</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                            <input class="form-control" type="text" id="date" name="date_premier_prelevement" required>

                                                    </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                                <div class="form-group" >
                                                        <div class="col-md-2" style="margin-top: 15px">
                                                            <label>Date fin de contrat</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                                <input class="form-control" type="text" id="date" name="date_fin_contrat" required>
                                                        </div>
                                                </div>
                                            </fieldset>

                                            <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Durée (mois)</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                            <input class="form-control" type="text" name="duree" required >
                                                    </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Date de reception</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                            <input class="form-control" type="text" id="date" name="date_reception" required>

                                                    </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Description</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                            <input class="form-control" type="text" name="description" required>

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
                                <span class="widget-icon"> <i class="fa fa-money">&nbsp;</i> </span>
                                <p class="h6">&nbsp;Coûts</p>	
                            </header>

                            <!-- widget div-->
                            <div>                                    
                                <!-- widget content -->
                                <div class="widget-body">
                                   
                                <fieldset>
                                    <div class="form-group">
                                                    <div class="col-md-4">
                                                    <label>Montant contrat HT (DHs)</label>
                                                    </div>
                                                    <div class="col-md-12" >
                                                        <input class="form-control" type="text" name="montant_contrat_ht" required>
                                                    </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group" >
                                            <div class="col-md-4" style="margin-top: 15px">
                                                <label>Montant prelevement TTC (DHs)</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" name="montant_prelevement_ttc" required>
                                            </div>
                                    </div>
                                </fieldset>
                                    <fieldset>
                                    <div class="form-group" >
                                            <div class="col-md-4" style="margin-top: 15px">
                                                <label>Montant valeur residuelle (DHs)</label>
                                            </div>
                                            <div class="col-md-12" >
                                                <input class="form-control" type="text" name="montant_valeur_residuelle" required>
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


