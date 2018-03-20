@extends('back.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('accreditation.index')}}">Les Accréditations</a>/Nouvelle Accréditation</li>
      </ol>
      
  </div>

<form action="{{route('accreditation.update', $accreditation)}}" method="post" enctype="multipart/form-data">
    <!-- Token de sécurité : -->
    {{csrf_field()}}
    {{method_field('PUT')}}

<div class="card col-md-8 mx-auto">
      <div class="jumbotron">
        <h1 class="display-4">Ajouter une Accréditation</h1>
      </div>


  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
          <h3>Informations Générales</h3>
      </h5>
    </div>

    <div class="card-body">
      <li class="list-group-item"><strong>Title</strong> :
          <input type="text" class="form-control" placeholder="Titre" id="title" name="title" value="{{$accreditation->title}}">
          @if($errors->has('title'))
          <span class="error" style="color : red;">
          {{$errors->first('title')}}
          </span>
          @endif
      </li>
      <li class="list-group-item"><strong>Statut</strong> : 
          <select class="form-control" id="statut" name="statut">       
          <option value="publish" @if($accreditation->statut == 'publish') selected='selected' @endif>Publier</option>
          <option value="unpublish" @if($accreditation->statut == 'unpublish') selected='selected' @endif>Dépublier</optio>
          </select>
      </li>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
          <h3>Logo de l'Accréditation</h3>
      </h5>
    </div>
      <div class="card-body">
        <input type="file" name="picture">
          @if(count($accreditation->picture)>0)
          <img src="{{url('images', $accreditation->picture->link)}}">
              @if($errors->has('picture'))
          <span class="error" style="color : red;">
              {{$errors->first('picture')}}
          </span>
              @endif
          @endif
      </div>
    </div>
  

    <div class="form-group">
      <button type="submit" class="btn btn-success btn-lg btn-block" href="{{route('accreditation.update', $accreditation)}}">Valider
      </button>
    </div>
  
  </div>
</form>
</div>



@endsection