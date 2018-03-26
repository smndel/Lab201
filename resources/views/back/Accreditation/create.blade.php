@extends('back.layouts.master')


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('accreditation.index')}}">Les Accréditations</a> / Nouvelle Accréditation</li>
      </ol>
      
  </div>

<form action="{{route('accreditation.store')}}" method="post" enctype="multipart/form-data">
    <!-- Token de sécurité : -->
    {{csrf_field()}}

<div class="card col-md-8 mx-auto">
      <div class="jumbotron">
        <h1 class="display-4">Rédiger une nouvelle Accréditation</h1>
      </div>


  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
          <h3>Informations Générales</h3>
      </h5>
    </div>

    <div class="card-body">
      <li class="list-group-item"><strong>Titre</strong> :
          <input type="text" class="form-control" placeholder="Titre" id="title" name="title" value="{{old('title')}}">
          @if($errors->has('title'))
          <span class="error" style="color : red;">
          {{$errors->first('title')}}
          </span>
          @endif
      </li>
      <li class="list-group-item"><strong>Statut</strong> : 
          <select class="form-control" id="statut" name="statut">       
          <option value="publish" @if(old('statut') == 'publish') selected='selected' @endif>Publier</option>
          <option value="unpublish" @if(old('statut') == 'unpublish') selected='selected' @endif>Dépublier</optio>
          </select>
      </li>
      <li class="list-group-item"><strong>Lien</strong> :
          <input value="{{old('url')}}" type="url" name="url" class="w-100">
          @if($errors->has('url'))
          <span class="error" style="color : red;">
          {{$errors->first('url')}}
          </span>
          @endif
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
            <div class="form-group">
                <input type="file" name="picture">
            </div>
      </div>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success btn-lg btn-block" href="{{route('accreditation.store')}}">Valider
      </button>
    </div>
  
  </div>
</form>
</div>



@endsection