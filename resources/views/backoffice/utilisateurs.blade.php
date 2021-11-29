@extends('layouts.dashboard')
@section('title')
Gestion des utilisateurs
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="">Administration</a></li>
                <li>Gestion des autorisations</li>
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


    <!--Button gestion roles-->
   <!-- <div class="pull-right">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <div class="">
                    <a href="" class="btn btn-red btn-lg">Roles</a>
                    </div>
                </h1>
            </div>
    </div>-->
    <!-- End button roles-->  
 

    <!--Button ajout-->
    <div class="pull-right">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <div class="">
                    <a href="" data-toggle="modal" data-target="#Ajout" class="btn btn-red btn-lg">Ajouter</a>
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
                    <span class="widget-icon"> <i class="fa fa-users">&nbsp;</i> </span>
                    <p class="h6">&nbsp;Listes des utilisateurs</p>  
                </header>
                
                <!-- widget div-->
                <div>
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
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>E-mail</th>
                                    <th>Login</th>
                                    <th>Role</th> 
                                    <th>Client</th> 
                                    <th>Parc</th>
                                    <th>Actions</th>
                                </tr>                          
                            </thead>
                            <tbody>
                                @foreach($users as $u)
                                <tr>
                                    <td>{{$u->matricule}}</td>
                                    <td>{{$u->name}}</td> 
                                    <td>{{$u->prenom}}</td>                                   
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->login}}</td>
                                    <td>
                                    @foreach($u->roles as $r)
                                    {{$r->name}}
                                    @endforeach
                                    </td>
                                    @if($u->client_id != null)
                                    <td>{{$u->client->raison_sociale}}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                    @if($u->parc_id != null)                                                                  
                                    <td>{{$u->parc->nom}}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                    <td>                                     
                                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#ModifierModal-{{$u->id}}"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-red" data-toggle="modal" data-target="#SupprimerModal-{{$u->id}}"> <i class="fa fa-trash"></i></button></td>   
                                    </td>
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

 <!-- Modal: Ajouter-->
 <div class="modal fade" id="Ajout" tabindex="-1" role="dialog">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                     &times;
                 </button>
                 <h4 class="modal-title">
                     Ajout
                 </h4>
             </div>
             <div class="modal-body no-padding">
 
             <form id="login-form" class="smart-form" action="{{route('backoffice_user_ajouter')}}" method="POST">
                     {{csrf_field()}}                     
                             <fieldset> 
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Matricule</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        
                                                        <input type="text" name="matricule" value="" required>
                                                    </label>
                                                </div>
                                            </div>
                                        </section>                  
                                 <section>
                                     <div class="row">
                                         <label class="label col col-2">Nom</label>
                                         <div class="col col-10">
                                             <label class="input">
                                                 
                                                 <input type="text" name="nom" value="" required>
                                             </label>
                                         </div>
                                     </div>
                                 </section>
                                 <section>
                                        <div class="row">
                                            <label class="label col col-2">Prénom</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="text" name="prenom" value="" required>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                            
                                 <section>
                                         <div class="row">
                                             <label class="label col col-2">E-mail</label>
                                             <div class="col col-10">
                                                 <label class="input">
                                                     <input type="text" name="email" value="" required>
                                                 </label>
                                             </div>
                                         </div>
                                 </section>
                                 <section>
                                        <div class="row">
                                            <label class="label col col-2">Login</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="text" name="login" value="" required>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Mot de passe</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="password" id="password" name="password" value="" required>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                <section>
                                        <div class="row">
                                            <label class="label col col-2">Confirmer Mot de passe</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="password" id="password-confirm" name="password_confirmation" value="" required>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                 <section>
                                         <div class="row">
                                             <label class="label col col-2">Role</label>
                                             <div class="col col-10">
                                                 <label class="">
                                                     <select name="role[]" class="role_selected" required>                                                        
                                                         @foreach($roles as $ro)
                                                         <option value="{{$ro->id}}">{{$ro->name}}</option>
                                                         @endforeach
                                                     </select>
 
                                                 </label>
                                             </div>
                                         </div>
                                 </section> 
                                 <section>
                                    <div class="row">
                                        <label class="label col col-2">Client</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <select name="client">  
                                                    <option value=""></option>                                                      
                                                    @foreach($clients as $client)
                                                    <option value="{{$client->id}}">{{$client->raison_sociale}}</option>
                                                    @endforeach
                                                </select>
                                            <div class="note note-error" style="color:#e9212e">Choisissez le nom si le nouveau utilisateur est de type client</div>
                                                
                                                 
                                            </label>
                                        </div>
                                    </div>
                            </section>  
                            <section>
                                <div class="row">
                                    <label class="label col col-2">Parc</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <select name="parc">
                                                <option value=""></option>                                                        
                                                @foreach($parc as $par)
                                                <option value="{{$par->id}}">{{$par->nom}}</option>
                                                @endforeach
                                            </select>
                                            <div class="note note-error" style="color:#e9212e">Choisissez le nom si le nouveau utilisateur est de type parc</div>
                                            
                                        </label>
                                    </div>
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


 <!-- Modal: Modifier user -->
 @foreach($users as $us)
 <div class="modal fade" id="ModifierModal-{{$us->id}}" tabindex="-1" role="dialog">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                     &times;
                 </button>
                 <h4 class="modal-title">
                     Modification 
                 </h4>
             </div>
             <div class="modal-body no-padding">
 
             <form id="login-form" class="smart-form" action="{{route('backoffice_user_modifier')}}" method="POST">
                     {{csrf_field()}}
                     {{method_field('PATCH')}}
                             <fieldset>                   
                                    <section>
                                            <div class="row">
                                                <label class="label col col-2">Matricule</label>
                                                <div class="col col-10">
                                                    <label class="input">
                                                        <input type="hidden" name="id" value="{{$us->id}}">
                                                        
                                                        <input type="text" name="matricule" value="{{$us->matricule}}" required>
                                                    </label>
                                                </div>
                                            </div>
                                    </section>                  
                                 <section>
                                     <div class="row">
                                         <label class="label col col-2">Nom</label>
                                         <div class="col col-10">
                                             <label class="input">
                                                 
                                                 <input type="text" name="nom" value="{{$us->name}}" required>
                                             </label>
                                         </div>
                                     </div>
                                 </section>
                                 <section>
                                        <div class="row">
                                            <label class="label col col-2">Prénom</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="text" name="prenom" value="{{$us->prenom}}" required>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                            
                                 <section>
                                         <div class="row">
                                             <label class="label col col-2">E-mail</label>
                                             <div class="col col-10">
                                                 <label class="input">
                                                     <input type="text" name="email" value="{{$us->email}}" required>
                                                 </label>
                                             </div>
                                         </div>
                                 </section>
                                 <section>
                                        <div class="row">
                                            <label class="label col col-2">Login</label>
                                            <div class="col col-10">
                                                <label class="input">
                                                    <input type="text" name="login" value="{{$us->login}}" required>
                                                </label>
                                            </div>
                                        </div>
                                </section>
                                 <section>
                                         <div class="row">
                                             <label class="label col col-2">Role</label>
                                             <div class="col col-10">
                                                 <label class="">
                                                     <select name="role[]" class="role_selected" required>
                                                            @foreach($us->roles as $r)
                                                            <option value="{{$r->id}}">{{$r->name}}</option>
                                                            @endforeach
                                                         
                                                         @foreach($roles as $ro)
                                                         <option value="{{$ro->id}}">{{$ro->name}}</option>
                                                         @endforeach
                                                     </select>
 
                                                 </label>
                                             </div>
                                         </div>
                                 </section>
                                 <section>
                                    <div class="row">
                                        <label class="label col col-2">Nouveau mot de passe</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="password" id="password" name="password" value="" >
                                            </label>
                                        </div>
                                    </div>
                            </section>
                            <section>
                                    <div class="row">
                                        <label class="label col col-2">Confirmer Mot de passe</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <input type="password" id="password-confirm" name="password_confirmation" value="" >
                                            </label>
                                        </div>
                                    </div>
                            </section>
                                @if($us->client_id != null) 
                                <section>
                                    <div class="row">
                                        <label class="label col col-2">Client</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <select name="client"> 
                                                    <option value="{{$us->client_id}}">{{$us->client->raison_sociale}}</option>                                                       
                                                    @foreach($clients as $client)
                                                    <option value="{{$client->id}}">{{$client->raison_sociale}}</option>
                                                    @endforeach
                                                </select>

                                            </label>
                                        </div>
                                    </div>
                                </section>
                                @else 
                                <section>
                                    <div class="row">
                                        <label class="label col col-2">Client</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <select name="client">  
                                                    <option value=""></option>                                                      
                                                    @foreach($clients as $client)
                                                    <option value="{{$client->id}}">{{$client->raison_sociale}}</option>
                                                    @endforeach
                                                </select>
                                                    
                                            </label>
                                        </div>
                                    </div>
                                </section>
                                @endif 
                                @if($us->parc_id != null) 
                                <section>
                                    <div class="row">
                                        <label class="label col col-2">Parc</label>
                                        <div class="col col-10">
                                            <label class="input">
                                                <select name="parc">
                                                    <option value="{{$us->parc_id}}">{{$us->parc->nom}}</option>                                                 
                                                    @foreach($parc as $par)
                                                    <option value="{{$par->id}}">{{$par->nom}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </section> 
                            @else
                            <section>
                                <div class="row">
                                    <label class="label col col-2">Parc</label>
                                    <div class="col col-10">
                                        <label class="input">
                                            <select name="parc"> 
                                                 <option value=""></option>                                                       
                                                @foreach($parc as $par)
                                                <option value="{{$par->id}}">{{$par->nom}}</option>
                                                @endforeach
                                            </select>

                                        </label>
                                    </div>
                                </div>
                            </section> 
                            @endif                    
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
 
 <!-- Modal: Supprimer user -->
@foreach($users as $use)
 <div class="modal fade" id="SupprimerModal-{{$use->id}}"  tabindex="-1" role="dialog">
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
 
             <form id="login-form" class="smart-form" action="{{route('backoffice_user_supprimer')}}" method="POST">
                     {{csrf_field()}}
                     {{method_field('delete')}}
                          <fieldset>
                             <input type="hidden" name="id" value="{{$use->id}}">
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