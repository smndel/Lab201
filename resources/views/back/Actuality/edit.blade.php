@extends('back.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('actuality.index')}}">Les Actualités</a> / Modifier l'actualité {{$actuality->title}}</li>
      </ol>
      
  </div>

<form action="{{route('actuality.update', $actuality)}}" method="post" enctype="multipart/form-data">
    <!-- Token de sécurité : -->
    {{csrf_field()}}
    {{method_field('PUT')}}

<div class="card col-md-8 mx-auto">
      <div class="jumbotron">
        <h1 class="display-4">Modifier une actualité</h1>
      </div>


  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
          <h3>Informations Générales</h3>
      </h5>
    </div>

    <div class="card-body">
      <li class="list-group-item"><strong>Titre</strong> :
          <input type="text" class="form-control" placeholder="Titre" id="title" name="title" value="{{$actuality->title}}">
          @if($errors->has('title'))
          <span class="error" style="color : red;">
          {{$errors->first('title')}}
          </span>
          @endif
      </li>
      <li class="list-group-item"><strong>Description</strong> :
          <textarea type="textarea" class="form-control" id="description" name="description">{{$actuality->description}}
          </textarea>
            @if($errors->has('description'))
            <span class="error" style="color : red;">
            {{$errors->first('description')}}
            </span>
            @endif
      </li>
      <li class="list-group-item"><strong>Statut</strong> : 
          <select class="form-control" id="statut" name="statut">       
          <option value="publish" @if($actuality->statut == 'publish') selected='selected' @endif>Publier</option>
          <option value="unpublish" @if($actuality->statut == 'unpublish') selected='selected' @endif>Dépublier</optio>
          </select>
      </li>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
          <h3>Photo de l'Actualité</h3>
      </h5>
    </div>
      <div class="card-body">
        <input type="file" name="picture">
          @if(count($actuality->picture)>0)
          <img src="{{url('images', $actuality->picture->link)}}">
              @if($errors->has('picture'))
          <span class="error" style="color : red;">
              {{$errors->first('picture')}}
          </span>
              @endif
          @endif
      </div>
    </div>
  

    <div class="form-group">
      <button type="submit" class="btn btn-success btn-lg btn-block" href="{{route('actuality.update', $actuality)}}">Valider
      </button>
    </div>
  
  </div>
</form>
</div>



@endsection