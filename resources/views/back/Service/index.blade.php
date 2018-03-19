@extends('back.layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Les Services</li>
      </ol>
      
  </div>

 <div class="card mb-3">
        <div class="card-header">
          <h1><i class="fa fa-table"></i> Les Services</h1>
          <a href="{{route('service.create')}}" class="btn btn-info btn-xs float-right">Ajouter un Service</a>'
        </div>

        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{Session::get('message')}}</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
          
        <div class="card-header"><h2>Particulier</h2></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="serviceTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                  <th>Titre</th>
                  <th>Catégorie</th>
                  <th>Statut</th>
                  <th>Créé le</th>
                  <th>Action</th>
                </tr>
            </thead>
			<tbody>
				@foreach($services as $service)
                @if($service->type == 'particulier')
                <tr>
                  <td>{{$service->title}}</td>
                  <td>{{$service->category}}</td>
                  <td>{{$service->statut}}</td>
                  <td>{{$service->created_at}}</td>
                  <td><a href="{{route('service.show', $service)}}" class="btn btn-success btn-xs">Voir</a>
                    <a href="{{route('service.edit', $service)}}" class="btn btn-warning btn-xs">Editer</a>
                    <form style="display:inline-block" class="delete" action="{{route('service.destroy', $service)}}" method="POST">
                    	<button type="submit" class="btn btn-danger btn-xs" value="delete">Supprimer</button>
                    	<input type="hidden" name="_method" value="DELETE">
                    	<input type="hidden" name="_token" value="{{csrf_token()}}"></form>'
			      </td>
                </tr>
				@endif
                @endforeach
			</tbody>
            </table>
          </div>
        </div>

        <div class="card-header"><h2>Professionnel</h2></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="serviceTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                  <th>Titre</th>
                  <th>Catégorie</th>
                  <th>Statut</th>
                  <th>Créé le</th>
                  <th>Action</th>
                </tr>
            </thead>
			<tbody>
				@foreach($services as $service)
                @if($service->type == 'professionnel')
                <tr>
                  <td>{{$service->title}}</td>
                  <td>{{$service->category}}</td>
                  <td>{{$service->statut}}</td>
                  <td>{{$service->created_at}}</td>
                  <td><a href="{{route('service.show', $service)}}" class="btn btn-success btn-xs">Voir</a>
                    <a href="{{route('service.edit', $service)}}" class="btn btn-warning btn-xs">Editer</a>
                    <form style="display:inline-block" class="delete" action="{{route('service.destroy', $service)}}" method="POST">
                    	<button type="submit" class="btn btn-danger btn-xs" value="delete">Supprimer</button>
                    	<input type="hidden" name="_method" value="DELETE">
                    	<input type="hidden" name="_token" value="{{csrf_token()}}"></form>'
			      </td>
                </tr>
				@endif
                @endforeach
			</tbody>
            </table>
          </div>
        </div>      
@endsection