<!DOCTYPE html>
<html lang="en-us">
	@include('includes.head')
    <link rel="stylesheet" type="text/css" href="/frontend/css/login.css" />
    
</head>

<body>
    <div class="container">
        
    
        <div class="row vertical-offset-100">
        <!--Error message--> 
        <div class="center"> 
            @if ($errors->any())
                <div class="alert alert-danger col-md-offset">
                    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif 
        </div>
        <!--End error message-->
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
                                    <img src="/frontend//img/logo.png" width="199px" alt="dsh logo" class="pull-right"><br><!--Authentification-->   
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
                                
                                    <input id="password" type="password" placeholder="******" class="input{{ $errors->has('password') ? 'est invalide!' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </p>
                                <p class="login button">
                                    <input type="submit" value="Connexion" class="btn btn-responsive botton-alignment btn-red" />
                                </p>

                            </form>
                            <!--<button class="btn btn-red" href=" /*route('password.request') }}">
                                    /* __('Mot de passe oublié ?') }}
                                </button>-->
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
 

