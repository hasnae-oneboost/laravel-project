<!DOCTYPE html>

<html lang="fr">

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

   

    
    
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" media="print" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.print.css"/>
    
</head>

<body>

@extends('layouts.dashboard')

@section('title')
Calendrier
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_referentiel')}}">Référentiel</a></li>	
                <li>Calendrier</li>
		</ol>
		<!-- end breadcrumb -->
@endsection

@section('content')


<div id="content">
    <div class="row">
        <section class="widget">
        <div class="col-sm-12 col-md-12 col-lg-3">
            <!-- new widget -->
            <div class="jarviswidget jarviswidget">
                    <header>
                            <h2>Ajouter un evenement </h2>
                        </header>
            
                        <!-- widget div-->
                        <div>
            
                            <div class="widget-body">
                                <!-- content goes here -->
            
                                <form id="add-event-form smart-form" action="{{route('backoffice_event_ajout')}}" method="POST">
                                    {{csrf_field()}}

                                    <fieldset>            
                                        <div class="form-group">
                                            <label>Evenement</label>
                                            <input class="form-control" name="titre" type="text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Date debut</label>
                                            <input class="form-control" name="date_debut" maxlength="40" type="text" required>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Date fin</label>
                                            <input class="form-control" name="date_fin" maxlength="40" type="text" required>
                                        </div>
            
                                        @if(Auth::user()->roles[0]->name == 'Administrateur')
                                            <div class="form-group">
                                                <label>Role d'utilisateur</label>
                                                <select name="role" id="" class="form-control" required>
                                                    <option value=""></option>
                                                    @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
            
                                    </fieldset>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-red" type="submit" >
                                                    Ajouter
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                <div class="pull-right" style="margin-top: 10px; margin-bottom: 10px">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <a class="btn btn-default" href="{{route('backoffice_event_list')}}" target="_blank">
                                                    Liste des événements crées
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                <!-- end content -->
                            </div>
            
                        </div>
                        <!-- end widget div -->
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-9">
        
                <!-- new widget -->
                <div class="jarviswidget jarviswidget-color-blueDark">
                        <div class="panel panel-primary">

                                <div class="panel-heading">
                
                                    Calendrier  
                
                                </div>
                
                                <div class="panel-body" >
                
                                    {!! $calendar->calendar() !!}
                
                                    {!! $calendar->script() !!}
                
                                </div>
                
                            </div>
                </div>
        </div>
    </section>
    </div>

</div>



@endsection