@extends('back.layouts.master')

@section('content')
<!-- Calendar CSS-->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Calendrier des Paiements 
        </li> 
      </ol>
    </div>


<div class="container col-md-12">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Calendrier de Paiements</div>
                  <div class="panel-body">
                      {!! $calendar->calendar() !!}
                  </div>
            </div>
        </div>
</div>
@endsection

@section('script')
{!! $calendar->script() !!}
@endsection