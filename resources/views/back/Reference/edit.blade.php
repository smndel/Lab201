@extends('back.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('reference.index')}}">Les Références</a> / Modifier la référence {{$reference->company}}</li>
      </ol>
      
  </div>

<form action="{{route('reference.update', $reference)}}" method="post" enctype="multipart/form-data">
    <!-- Token de sécurité : -->
    {{csrf_field()}}
    {{method_field('PUT')}}

<div class="card col-md-8 mx-auto">
      <div class="jumbotron">
        <h1 class="display-4">Modifier une Référence</h1>
      </div>


  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
          <h3>Informations Générales</h3>
      </h5>
    </div>

    <div class="card-body">
      <li class="list-group-item"><strong>Nom de l'entreprise</strong> :
          <input type="text" class="form-control" placeholder="Nom de l'entreprise" id="company" name="company" value="{{$reference->company}}">
          @if($errors->has('company'))
          <span class="error" style="color : red;">
          {{$errors->first('company')}}
          </span>
          @endif
      </li>
      <li class="list-group-item"><strong>Statut</strong> : 
          <select class="form-control" id="statut" name="statut">       
          <option value="publish" @if($reference->statut == 'publish') selected='selected' @endif>Publier</option>
          <option value="unpublish" @if($reference->statut == 'unpublish') selected='selected' @endif>Dépublier</optio>
          </select>
      </li>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
          <h3>Logo de l'Entreprise</h3>
      </h5>
    </div>
      <div class="card-body">
        <input type="file" name="picture">
          @if(count($reference->picture)>0)
          <img src="{{url('images', $reference->picture->link)}}">
              @if($errors->has('picture'))
          <span class="error" style="color : red;">
              {{$errors->first('picture')}}
          </span>
              @endif
          @endif
      </div>
    </div>
  

    <div class="form-group">
      <button type="submit" class="btn btn-success btn-lg btn-block" href="{{route('reference.update', $reference)}}">Valider
      </button>
    </div>
  
  </div>
</form>
</div>



@endsection