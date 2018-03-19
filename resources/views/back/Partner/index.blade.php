@extends('back.layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Les Collaborateurs</li>
      </ol>
      
  </div>

<div class="card col-md-8 mx-auto">
    <div class="jumbotron">
      <h1 class="display-4">Les Collaborateurs</h1>
      <a href="{{route('partner.create')}}" class="btn btn-info btn-xs" style="float:right">Ajouter un Collaborateur</a>'
    </div>

        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{Session::get('message')}}</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

  <div id="accordion">
  
  @foreach($partners as $partner)
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <div class="d-flex justify-content-between">
          <h3>{{$partner->name}}</h3>
          <div class="d-flex justify-content-around">
          <a href="{{route('partner.show', $partner->id)}}" class="btn btn-success btn-xs"><i class="fa fa-eye text-ligth"></i></a>
          <a href="{{route('partner.edit', $partner->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit text-ligth"></i></a>
            <form class="delete" action="{{route('partner.destroy', $partner->id)}}" method="POST">
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
        @if(count($partner->picture)>0)
        <img class="img-thumbnail " src="{{url('images', $partner->picture->link)}}" style="width: auto">
        @endif
      </div>

      <div class="card-body col-8">
      <li class="list-group-item"><strong>Nom</strong> : {{$partner->name}}</li>
      <li class="list-group-item"><strong>Bio</strong> : {{$partner->bio}}</li>
      </div>
    </div>  
  </div>
@endforeach
</div>
</div>
@endsection
