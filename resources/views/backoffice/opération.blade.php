@extends('layouts.dashboard')
@section('title')
Journal d'événements
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="">Administration</a></li>
                <li>Paramétrage</li>
                <li>@yield('title')</li>	
		</ol>
		<!-- end breadcrumb -->
@endsection

@section('content')

<!-- MAIN CONTENT -->
<div id="content">
    <!-- Get the success message / Message de succes-->
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

				
    <!-- widget grid -->
    <section id="widget-grid" class="">

        <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
                    <!--******************RECHERCHE*********************-->
                    <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false">
                                        <i class="fa fa-filter">&nbsp;</i> Recherche<span class="pull-right"> <i class="fa fa-angle-down"></i></span>
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <form id="login-form" class="smart-form" action="{{route('backoffice_operation')}}" method="get">
                                             
                                            
                                            <fieldset>
                                                    <div class="row">
                                               
                                                            <div class="col col-3">
                                                                <label class="label">
                                                                            Nom de l'utilisateur
                                                                </label>
                                                                <label class="select">
                                                                        <select name="utilisateur" class="utilisateur_select">
                                                                            <option value=""></option>
                                                                            @foreach($users as $u)
                                                                            <option value="{{$u->name}}" @if($selected_user == $u->name) selected="selected" @endif>{{$u->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                </label>
                                            
                                                            </div>
                                                            <div class="col col-3">
                                                                    <label class="label">
                                                                               Date debut
                                                                    </label>
                                                                    <label class="input">
                                                                            <input type="text"  class="form-control" name="date_debut" value="{{$selected_date_debut}}">                                                                          
                                                                    </label> 
                                                                    
                                                                </div>
                                                                <div class="col col-3">
                                                                        <label class="label">
                                                                                   Date fin
                                                                        </label>
                                                                                                                                              
                                                                        <label class="input">
                                                                                <input type="text"  class="form-control" name="date_fin" value="{{$selected_date_fin}}">                                                                          
                                                                            </label>
                                                                    </div>
                                                       
                                                            <div class="col col-3">
                                                                    
                                                                    <label class="pull-right"  style="margin-top: 25px;">                                                                    
                                                                            <button class="btn btn-red btn-sm"  type="submit">
                                                                                    <i class="fa fa-search"></i>
                                                                                    Recherche 
                                                                                </button>
                                                                    </label>
                                                            </div>
                                                
                                            </fieldset>
                                        </form>
                                    </div>
                              </div>
                            </div>
                    </div>
        </article>
        </div>
        <!-- row -->
        <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" 
            data-widget-deletebutton="false" data-widget-togglebutton="false" role="widget">
            
            

                <header>                    
                    <span class="widget-icon"> <i class="fa fa-info ">&nbsp;</i> </span>
                    <p class="h6">&nbsp;Informations</p>  
                </header>
                
                <!-- widget div-->
                <div>
                        
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="table-responsive">

                            <div id="dt_basic_wrapper" class="dataTables form-inline dt-bootstrap no-footer">
                                    <div class="dt-toolbar">
                                            <div class="col-sm-6 col-xs-12 hidden-xs">
                                                <div class="dataTables_length" id="dt_basic_length">
                                                  <!--entries-->
                                                </div>
                                            </div>
                                        </div>
                            </div>

                        <table id="dt_basic" class="table table-bordered" width="100%">
                            <thead>			                
                                <tr>
                                    <th>Nom d'utilisateur</th>
                                    <th>Page</th>
                                    <th>Date</th>  
                                </tr>                          
                            </thead>
                            <tbody>
                                @foreach($acces as $a)
                                <tr>
                                    <td>{{$a->utilisateur}}</td>                                    
                                    <td>{{$a->page}}</td>
                                    <td>{{$a->date}}</td>
                                  
                                </tr>
                                @endforeach
                            
                            </tbody>
                           
                        </table>
                        {{$acces->appends(Request::except('page'))->render()}}
                    </div>
                    <!-- end widget content -->
                </div>
            </div>
        </article>
        </div>
    </section>
</div>

 


@endsection