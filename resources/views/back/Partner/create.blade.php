@extends('back.layouts.master')


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('partner.index')}}">Les Collaborateurs</a> / Nouveau Collaborateur</li>
      </ol>
      
  </div>

<form action="{{route('partner.store')}}" method="post" enctype="multipart/form-data">
    <!-- Token de sécurité : -->
    {{csrf_field()}}

<div class="card col-md-8 mx-auto">
      <div class="jumbotron">
        <h1 class="display-4">Formulaire d'Inscription Collaborateur</h1>
      </div>


  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
          <h3>Informations Générales</h3>
      </h5>
    </div>
      <div class="card-body">
        <li class="list-group-item"><strong>Nom</strong> :
            <input type="text" class="form-control" placeholder="Nom" id="name" name="name" value="{{old('name')}}">
            @if($errors->has('name'))
            <span class="error" style="color : red;">
            {{$errors->first('name')}}
            </span>
            @endif
        </li>
        <li class="list-group-item"><strong>Bio</strong> :
            <textarea type="textarea" class="form-control" id="bio" name="bio">{{old('bio')}}
            </textarea>
              @if($errors->has('bio'))
              <span class="error" style="color : red;">
              {{$errors->first('bio')}}
              </span>
              @endif
        </li>
        <li class="list-group-item"><strong>Poste</strong> :
              <select class="form-control" id="position" name="position">     
                  <option value="collaborator" @if(old('position') == 'collaborator') {{'selected'}} @endif>Collaborateur
                  </option>
                  <option value="director" @if(old('position') == 'directeur') {{'selected'}} @endif>Directeur
                  </option>
              </select>
        </li>
        <li class="list-group-item"><strong>Statut</strong> :
              <select class="form-control" id="poste" name="poste">     
                  <option value="actif" @if(old('statut') == 'actif') {{'selected'}} @endif>Actif
                  </option>
                  <option value="inactif" @if(old('statut') == 'inactif') {{'selected'}} @endif>Inactif
                  </option>
              </select>
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
          <li class="list-group-item"><strong> Accompangement(s)</strong> :<br>
           @forelse($services as $id =>$title)
              <input 
                name="services[]" 
                type="checkbox" 
                value="{{$id}}" 
                id="service{{$id}}" 
                {{ ( !empty(old('services')) and in_array($id, old('services')) )? 'checked' : ''  }}>
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
            <div class="form-group">
                <input type="file" name="picture">
            </div>
      </div>
    </div>
  

    <div class="form-group">
      <button type="submit" class="btn btn-success btn-lg btn-block" href="{{route('partner.store')}}">Valider
      </button>
    </div>
  
  </div>
</form>
</div>



@endsection