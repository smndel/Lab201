<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Afogec Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">

    <!-- Datatables CSS-->
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

    <!-- Morris Charts CSS -->
    <link href="{{asset('css/plugins/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    
    
<div class="container-fluid h-100">
    <div class="row h-100">

           @include('back.partials.menu') 
    <!-- /#wrapper -->
        <main class="col bg-faded py-3">

            @include('back.partials.header')
              
              @yield('content')
  
        </main>
    </div>
</div>
      

    

    <!-- jQuery -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Morris Charts JavaScript -->
    {{-- <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script> --}}

    <!-- Datatables JS -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('js/sb-admin.min.js')}}"></script>
    
    <!-- Datatables sorter -->
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  
    <script src="{{asset('js/confirm.js')}}"></script>

  <!--   <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script> -->

   <!--  <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script> -->

    <script>
    $('#toggleNavPosition').click(function() {
      $('body').toggleClass('fixed-nav');
      $('nav').toggleClass('fixed-top static-top');
    });

    </script>

    
    <!-- Toggle between dark and light navbar-->
    <script>
    $('#toggleNavColor').click(function() {
      $('nav').toggleClass('navbar-dark navbar-light');
      $('nav').toggleClass('bg-dark bg-light');
      $('body').toggleClass('bg-dark bg-light');
    });

    </script>

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

</body>

</html>