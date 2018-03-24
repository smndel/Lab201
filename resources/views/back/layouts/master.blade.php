<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Back-office AFOGEC">
    <link rel="icon" type="image/png" href="/images_front/logo.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Afogec Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <!-- Admin template CSS -->
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
    <!-- Datatables CSS-->
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">    
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row h-200">
                @include('back.partials.menu') 
            <main class="col bg-faded py-3">
                @yield('content')
            </main>
        </div>
    </div>
      
    <!-- jQuery -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Datatables sorter -->
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <!-- Script pour la table bénéficiaire -->
    <script>
        $('#applicantTable').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url":"<?= route('ApplicantProcessing') ?>",
                "dataType":"json",
                "type":"POST",
                "data":{"_token":"<?= csrf_token() ?>"}
            },
            "columns":[
                {"data":"last_name"},
                {"data":"first_name"},
                {"data":"company"},
                {"data":"accepted"},
                {"data":"funded"},
                {"data":"price"},
                {"data":"created_at"},
                {"data":"action", "searchable":false,"orderable":false}
            ]    
    } );
    </script>

     <!--     Calendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <!--Script pour le Calendrier-->
    @yield('script')

    @section('scripts')
    <script src="{{asset('js/confirm.js')}}"></script>
    @show 
</body>

</html>