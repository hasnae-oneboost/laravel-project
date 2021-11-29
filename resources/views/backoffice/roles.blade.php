@extends('layouts.dashboard')
@section('title')
Roles des utilisateurs
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>
                <li>Utilisateurs</li>
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

    <!--Button ajout-->
    <div class="pull-right">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
                <div class="">
                <a href="" data-toggle="modal" data-target="#Ajout" class="btn btn-red btn-lg">Créer un nouveau role</a>
                </div>
            </h1>
        </div>
    </div>
    <!-- End button ajout-->  
 

				
    <!-- widget grid -->
    <section id="widget-grid" class="">


 
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" 
                data-widget-deletebutton="false" data-widget-togglebutton="false" role="widget">
                
                

                    <header>
                        
                        <span class="widget-icon"> <i class="fa fa-list">&nbsp;</i> </span>
                        <p class="h6">&nbsp;Liste des roles</p>  

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
                                        <th>Nom</th>                                    
                                        <th>Description</th>
                                        <th>Permissions</th>
                                        
                                        <th>Actions</th>
                                                                            
                                </thead>
                                <tbody>
                                    @foreach($roles as $rol)
                                    <tr>
                                        <td>{{$rol->name}}</td>            
                                        <td>{{$rol->description}}</td>
                                        <td>
                                            @foreach ($rol->perms as $permission)
                                            {{ $permission->name }}&nbsp;
                                            @endforeach
                                        </td>
                                        <td>    
                                            <button class="btn btn-secondary"  data-toggle="modal" data-target="#Modifier-{{$rol->id}}"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-red" data-toggle="modal" data-target="#Supprimer-{{$rol->id}}"> <i class="fa fa-trash"></i></button></td>
                                        </tr>
                                    @endforeach                            
                                </tbody>
                            </table>
                            
                        </div>
                        <!-- end widget content -->
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>


<!-- Modal: Ajouter role -->
<div class="modal fade" id="Ajout" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">
                        Créer un nouveau role
                    </h4>
                </div>
                <div class="modal-body no-padding">
                    <form id="login-form" class="smart-form" action="{{route('backoffice_role_ajouter')}}" method="POST">
                        {{csrf_field()}}
                                <fieldset>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-2">Nom</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    
                                                    <input type="text" name="name" required>
                                                </label>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Description</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="description" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <label class="label">Permissions</label>
                                            <div class="inline-group">
                                                @foreach($permissions as $p)
                                                <label class="checkbox">                                                   
                                                    <input type="checkbox" name="permission[]" value="{{$p->id}}">
                                                    <i></i>{{$p->name}}                                                    
                                                </label>
                                                @endforeach
                                                    
                                               
                                            </div>
                                        </section>

    
                        
                                </fieldset>
                                
                                <footer>
                                    <button type="submit" class="btn btn-red">
                                       Valider
                                    </button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Annuler
                                    </button>
    
                                </footer>
                    </form>						
                            
    
                </div>
    
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  

<!-- Modal: Modifier role -->
@foreach($roles as $r)
<div class="modal fade" id="Modifier-{{$r->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">
                        Modifier
                    </h4>
                </div>
                <div class="modal-body no-padding">
                    <form id="login-form" class="smart-form" action="{{route('backoffice_role_modifier')}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                                <fieldset>
                                    <section>
                                        <div class="row">

                                            <label class="label col col-2">Nom</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="hidden" name="id" value="{{$r->id}}">
                                                    <input type="text" name="name" value="{{$r->name}}" required>
                                                </label>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Description</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="text" name="description" value="{{$r->description}}" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>
                                    <section>
                                            <label class="label">Permissions</label>
                                            <div class="inline-group">
                                                
                                                @foreach($permissions as $p)
                                                <label class="checkbox">                                                   
                                                <input type="checkbox"  name="permission[]" value="{{$p->id}}" @foreach ($r->perms as $permission)
                                                   @if($p->name == $permission->name ) ? checked @endif
                                                @endforeach >
                                                    <i></i>{{$p->name}}                                                    
                                                </label>
                                                @endforeach
                                                
                                            </div>
                                        </section>

    
                        
                                </fieldset>
                                
                                <footer>
                                    <button type="submit" class="btn btn-red">
                                       Valider
                                    </button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Annuler
                                    </button>
    
                                </footer>
                    </form>						
                            
    
                </div>
    
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach

<!-- Modal: Supprimer Agnce -->
@foreach($roles as $ro)
<div class="modal fade" id="Supprimer-{{$ro->id}}"  tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    Suppression
                </h4>
            </div>
            <div class="modal-body no-padding">

            <form id="login-form" class="smart-form" action="{{route('backoffice_role_supprimer')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                         <fieldset>
                            <input type="hidden" name="id" value="{{$ro->id}}">
                                    <div class="">
                                        <h2><i class="fa fa-warning"></i>&nbsp;Etes-vous sûr de vouloir supprimer cet élément?</h2>
                                    </div>
                        </fieldset>
                            
                        <footer>
                                <button type="submit" class="btn btn-red">
                                   Oui
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Annuler
                                </button>
                        </footer>
                </form>	
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach



@endsection