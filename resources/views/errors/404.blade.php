<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Erreur 404! | {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
<div class="content">
    <!-- row -->
    <div class="row">
				
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center error-box">
                        <h1 class="error-text-2 bounceInDown animated" style="color: #e9212e;"> Erreur 404 <span class="particle particle--c"></span><span class="particle particle--a"></span><span class="particle particle--b"></span></h1>
                        <h2 class="font-xl"><strong><i class="fa fa-fw fa-warning fa-lg text-warning"></i> Page <u>Non</u> Trouvée</strong></h2>
                        <br />
                       <p class="lead">
                            La page n'existe pas ou plus !
                        </p>
                       
                        <br>
                        
    
                    
    
                    </div>
    
                </div>
    
            </div>
    
        </div>

    <!-- end row -->
    </div>
</div>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

