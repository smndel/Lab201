<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="/images_front/logo.png" />
        <title>AFOGEC Compétences</title>
        <html xmlns:og="http://ogp.me/ns#"/> 
        <meta property="og:title" content="AFOGEC Compétences" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="#" />
        <meta property="og:image" content="#" />
        <meta property="og:site_name" content="AFOGEC Compétences" />
        <meta property="og:description" content="Depuis 40 ans, Afogec compétences accompagne les salariés et les entreprises dans leurs project professionneles et personnels" />

        <!-- Styles -->
        <!-- retourne le lien vers la feuille de style qui se trouve dans le dossier public -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dosis:300,400,500,700" rel="stylesheet">
        <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
    
    <div class="container-fluid" id="myApp">
        @include('front.partials.header')
        @include('front.partials.menu')
        <div class="row">
            <div class="col-md-6">
            
            </div>
        </div>
            <div class="container-fluid">
                <!-- permet d'étendre le layout pour insérer une vue composite à l'intérieur -->
                @yield('content')
            </div>
        @include('front.partials.footer')
    </div>
    @section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    @show 

    </body>
</html>

