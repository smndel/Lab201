@extends('back.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('partner.index')}}">Les Collaborateurs</a>/ Modifier le collaborateur {{$partner->name}}</li>
      </ol>
      
  </div>

<form action="{{route('partner.update', $partner)}}" method="post" enctype="multipart/form-data">
    <!-- Token de sécurité : -->
    {{csrf_field()}}
    {{method_field('PUT')}}

<div class="card col-md-8 mx-auto">
      <div class="jumbotron">
        <h1 class="display-4">Modification d'un Collaborateur</h1>
      </div>


  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
          <h3>Informations Générales</h3>
      </h5>
    </div>
      <div class="card-body">
        <li class="list-group-item"><strong>Nom</strong> :
            <input type="text" class="form-control" placeholder="Nom" id="name" name="name" value="{{$partner->name}}">
            @if($errors->has('name'))
            <span class="error" style="color : red;">
            {{$errors->first('name')}}
            </span>
            @endif
        </li>
        <li class="list-group-item"><strong>Bio</strong> :
            <textarea type="textarea" class="form-control" id="bio" name="bio">{{$partner->bio}}
            </textarea>
              @if($errors->has('bio'))
              <span class="error" style="color : red;">
              {{$errors->first('bio')}}
              </span>
              @endif
        </li>
        <li class="list-group-item"><strong>Poste</strong> :
            <div class="form-group">
              <select class="form-control" id="position" name="position">     
                  <option value="collaborator" @if(($partner->position) == 'collaborator') {{'selected'}} @endif>Collaborateur
                  </option>
                  <option value="director" @if(($partner->position) == 'director') {{'selected'}} @endif>Directeur
                  </option>
              </select>
            </div>
        </li>
        <li class="list-group-item"><strong>Statut</strong> :
            <div class="form-group">
              <select class="form-control" id="statut" name="statut">     
                  <option value="actif" @if($partner->statut) == 'actif') {{'selected'}} @endif>Actif
                  </option>
                  <option value="inactif" @if($partner->statut) == 'inactif') {{'selected'}} @endif>Inactif
                  </option>
              </select>
            </div>
        </li>
      </div>
    </div>

  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
          <h3>Accompagnement(s)</h3>
      </h5>
    </div>
      <div class="card-body">
          <li class="list-group-item"><strong>Accompagnement(s)</strong> : 
              <br>
              @forelse($services as $id =>$title)
              <input 
                name="services[]" 
                type="checkbox" 
                value="{{$id}}" 
                id="service{{$id}}" 
                @forelse($partner->services as $service)
                @if(($id) == $service->id) checked @endif
                @empty 
                @endforelse
                >{{$title}}
                <label class="control-label" >{{$title}}</label><br>
              @empty
              @endforelse
          </li>
      </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
          <h3>Photo du Collaborateur</h3>
      </h5>
    </div>
      <div class="card-body">
        <input type="file" name="picture">
          @if(count($partner->picture)>0)
          <img src="{{url('images', $partner->picture->link)}}">
              @if($errors->has('picture'))
          <span class="error" style="color : red;">
              {{$errors->first('picture')}}
          </span>
              @endif
          @endif
      </div>
  

    <div class="form-group">
      <button type="submit" class="btn btn-success btn-lg btn-block">Valider
      </button>
    </div>
  
  </div>
</form>
</div>

@endsection