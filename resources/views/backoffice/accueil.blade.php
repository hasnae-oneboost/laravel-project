@extends('layouts.dashboard')
@section('title')
Accueil
@endsection
@section('breadcrumb')
		<!-- breadcrumb -->
		<ol class="breadcrumb" style="background-color: #333;" >
                <li><a href="{{route('backoffice_accueil')}}">Accueil</a></li>	
		</ol>
			<!-- end breadcrumb -->
@endsection
@section('content')
<div id="content">
    <div class="">
        <div class="col-md-12">
            <div class="row">
                    <div class="alert alert-success col-md-offset"  role="alert" animated fadeIn>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @if (session('status'))                                           
                        {{ session('status') }}  
                                              
                    @endif
                    Vous êtes connecté en tant que/qu' {{ Auth::user()->roles[0]->name }} !
                </div>
                </div>           
            </div>
            
        </div>
</div>





@endsection