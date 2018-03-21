@extends('back.layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Les Témoignages</li>
      </ol>
      
  </div>

<div class="card col-md-8 mx-auto">
    <div class="jumbotron">
      <h1 class="display-4">Les Témoignages</h1>
      <a href="{{route('testimony.create')}}" class="btn btn-info btn-xs" style="float:right">Ajouter un Témoignage</a>'
    </div>

        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{Session::get('message')}}</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

  {{$testimonies->links()}}

  <div id="accordion">
  
  @foreach($testimonies as $testimony)
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <div class="d-flex justify-content-between">
          <h3>{{$testimony->applicant->first_name}} {{$testimony->applicant->last_name}}</h3>
          <div class="d-flex justify-content-around">
          <a href="{{route('testimony.show', $testimony->id)}}"><button class="btn btn-success btn-xs"><i class="fa fa-eye text-ligth"></i></button></a>
          <a href="{{route('testimony.edit', $testimony->id)}}"><button class="btn btn-warning btn-xs"><i class="fa fa-edit text-ligth"></i></button></a>
            <form class="delete" action="{{route('testimony.destroy', $testimony->id)}}" method="POST">
              <button type="submit" class="btn btn-danger btn-xs" value="delete"><i class="fa fa-trash text-ligth"></i></button>
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
          </div>
        </div>
      </h5>
    </div>
    <div class="row">
      <div class="card-body col-4">
        @if(isset($testimony->picture))
        <img class="img-thumbnail" src="{{url('images', $testimony->picture->link)}}" style="width: auto">
        @else
        @endif
      </div>

      <div class="card-body col-8">
      <li class="list-group-item"><strong>Nom</strong> : {{$testimony->applicant->first_name}}{{$testimony->applicant->last_name}}</li>
      <li class="list-group-item"><strong>Témoignage</strong> : {{$testimony->testimony}}</li>
      <li class="list-group-item"><strong>Statut</strong> :
        @if($testimony->statut=='publish')Publié
        @else Non publié
        @endif
      </li>
      <li class="list-group-item"><strong>Date</strong> : {{Carbon\Carbon::parse($testimony->created_at)->format('d.m.Y')}}</li>
      </div>
    </div>  
  </div>
  @endforeach

{{$testimonies->links()}}
</div>
</div>
@endsection
