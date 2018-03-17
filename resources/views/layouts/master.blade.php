<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Post</title>

        <!-- Styles -->
        <!-- retourne le lien vers la feuille de style qui se trouve dans le dossier public -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body>
    <div class="container" id="myApp">
        @include('partials.menu')
        <div class="row">
            <div class="col-md-6">
            
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- permet d'étendre le layout pour insérer une vue composite à l'intérieur -->
                @yield('content')
                
            </div>
        </div>
    </div>
    @section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    @show 

    </body>
</html>

