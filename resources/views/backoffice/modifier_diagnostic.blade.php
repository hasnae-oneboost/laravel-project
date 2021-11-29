@extends('layouts.dashboard')
@section('title')
Modifier diagnostic
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
            <li><a href="">Accueil</a></li>
            <li>Maintenance</li>
            <li><a href="{{route('backoffice_diagnostic')}}">Diagnostic</a></li>
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
                <form class="" id="test" files="true" action="{{route('backoffice_diagnostic_ajouter')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PATCH')}}
                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <!-- Widget *****  VEHICULE & Demandeur-->
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
                                    <span class="widget-icon"> <i class="fa fa-">&nbsp;</i> </span>
                               <p class="h6">&nbsp;Informations </p>		   
                            </header>

                            <!-- widget div-->
                            <div>
                                
                                <!-- widget content -->
                                <div class="widget-body">
                                   
                                <fieldset>                                        
                                                <div class="form-group" >
                                                        <div class="col-md-2" style="margin-top: 15px">
                                                            <label>Demande</label>
                                                        </div>
                                                        <div class="col-md-10" style="margin-top: 15px">
                                                            <select class="form-control" name="demande" id="" >
                                                                <option value="{{$diagnostics->demande_id}}">{{$diagnostics->demande->numero_systeme}}</option>
                                                                @foreach($demandes as $demand)
                                                                <option value="{{$demand->id}}">{{$demand->numero_systeme}}</option>
                                                                @endforeach
                                                        </select>
                                                        </div>
                                                </div>
                                            </fieldset>
                             
                                            <fieldset>
                                    <div class="form-group">
                                                    <div class="col-md-2" style="margin-top: 15px">
                                                    <label>Véhicules</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <select class="form-control" name="vehicule" id="" >
                                                                <option value="{{$diagnostics->vehicule_id}}">{{$diagnostics->vehicule->immatriculation}}</option>
                                                                @foreach($vehicules as $v)
                                                                <option value="{{$v->id}}">{{$v->immatriculation}}</option>
                                                                @endforeach
                                                                
                                                            </select>
                                                    </div>
                                    </div>
                                </fieldset>
                             
                                        <fieldset>
                                            <div class="form-group" >
													<div class="col-md-2" style="margin-top: 15px">
                                                        <label>Demandeur</label>
                                                    </div>
													<div class="col-md-10" style="margin-top: 15px">
                                                        <select class="form-control" name="demandeur" id="" >
                                                            <option value="{{$diagnostics->demandeur_id}}">{{$diagnostics->demandeur->nom}}&nbsp;{{$diagnostics->demandeur->prenom}}</option>
                                                            @foreach($conducteurs as $conducteur)
                                                            <option value="{{$conducteur->id}}">{{$conducteur->nom}}&nbsp;{{$conducteur->prenom}}</option>
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

                         <!-- Widget ***** Informations générales-->
                         <div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
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
                                    <span class="widget-icon"> <i class="fa fa-">&nbsp;</i> </span>
                                    <p class="h6">&nbsp;Pièces</p>	
                                </header>
    
                                <!-- widget div-->
                                <div>                                    
                                    <!-- widget content -->
                                    <div class="widget-body">
                                       
                                        <table class="table table-bordered" id="tb">
                                              <thead>  
                                            <tr>
                                                <th>Famille</th>
                                                <th>Categorie</th>
                                                <th>Pièces</th>
                                                <th>Unités</th>
                                                <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore"><span class="glyphicon glyphicon-plus"></span></a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="famille" id="" class="form-control">
                                                        <option value=""></option>
                                                        @foreach($familles as $famille)
                                                        <option value="{{$famille->libelle}}">{{$famille->libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                        <select name="categorie" id="" class="form-control">
                                                                <option value=""></option>
                                                                @foreach($familles as $famille)
                                                                <option value="{{$famille->libelle}}">{{$famille->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                </td>
                                                <td>
                                                        <select name="piece" id="" class="form-control">
                                                                <option value=""></option>
                                                                @foreach($familles as $famille)
                                                                <option value="{{$famille->libelle}}">{{$famille->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                </td>
                                                <td>
                                                        <input type="number" min="0" placeholder="0" class="form-control" name="unite">
                                                </td>
                                                <td>
                                                    <a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        </table>
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