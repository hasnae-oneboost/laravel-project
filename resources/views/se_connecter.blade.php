<!DOCTYPE html>
<html lang="en-us">
	@include('includes.head')
    <link rel="stylesheet" type="text/css" href="/frontend/css/login.css" />
    
</head>

<body>

    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div id="container_demo">
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <a class="hiddenanchor" id="toforgot"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <!--<form action="http://www.dshtrans.com/fr/authentification" autocomplete="on" method="post">-->
                            <form method="POST" action="{{ route('login') }}" accept-charset="UTF-8" autocomplete="on"><input name="_token" type="hidden" value="Z2qnDQqFZpyXwHQ1JLb82NjUg5HVINRIcamPveTF">                                
                                @csrf
                                <h3 class="black_bg">
                                    <img src="/frontend//img/logo.png" width="195px" alt="dsh logo" class="pull-right"><br><!--Authentification-->
                                    
                                </h3>
                                                                                                <p>
                                    <label style="margin-bottom:0px;" for="email" class="uname"> 
                                    <i class="fa fa-envelope"></i>
                                     E- mail
                                    </label>
                                    <input id="email" type="email" placeholder="e-mail" class="input{{ $errors->has('email') ? 'est invalide!' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </p>
                                <p>
                                    <label style="margin-bottom:0px;" for="password" class="youpasswd"> 
                                    <i class="fa fa-lock"></i>
                                        Mot de passe                                    </label>
                                
                                    <input id="password" type="password" class="input{{ $errors->has('password') ? 'est invalide!' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </p>
                                <p class="login button">
                                    <input type="submit" value="Connexion" class="btn btn-responsive botton-alignment btn-red" />
                                </p>

                                
                                   
                                
                                
                                
                                <button class="btn btn-red" href="{{ route('password.request') }}">
                                    {{ __('Mot de passe oublié ?') }}
                                </button>
                            </form>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
 
<!--Old login page-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
