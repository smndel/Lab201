@extends('back.layouts.master')


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('testimony.index')}}">Les Témoignages</a> / Nouveau Témoignage</li>
      </ol>
      
  </div>

<form action="{{route('testimony.store')}}" method="post" enctype="multipart/form-data">
    <!-- Token de sécurité : -->
    {{csrf_field()}}

<div class="card col-md-8 mx-auto">
      <div class="jumbotron">
        <h1 class="display-4">Rédiger une nouveau Témoignage</h1>
      </div>


  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
          <h3>Informations Générales</h3>
      </h5>
    </div>

    <div class="card-body">
      <li class="list-group-item"><strong>Sélection du Bénéficiaire</strong> : 
            <select class="form-control" id="applicant_id" name="applicant_id">   
            @forelse($applicants as $applicant) 
                @if(in_array($applicant->id, $present_id))
                @else
                <option value="{{$applicant->id}}" @if(old('applicant_id') == $applicant->id) {{'selected'}} @endif>{{$applicant->first_name}} {{$applicant->last_name}}</option>
                @endif 
            @empty
            @endforelse
            </select>
      </li>
      <li class="list-group-item"><strong>Statut</strong> : 
          <select class="form-control" id="statut" name="statut">       
          <option value="publish" @if(old('statut') == 'publish') selected='selected' @endif>Publier</option>
          <option value="unpublish" @if(old('statut') == 'unpublish') selected='selected' @endif>Dépublier</optio>
          </select>
      </li>
    </div>
  </div>

  <div class="card">
        <div class="card-header" id="headingThree">
          <h5 class="mb-0">
              <h3>Témoignage</h3>
          </h5>
        </div>
          <div class="card-body">
              <textarea type="textarea" class="form-control" id="testimony" name="testimony">{{old('testimony')}}</textarea>
              @if($errors->has('testimony'))
              <span class="error" style="color : red;">
              {{$errors->first('testimony')}}
              </span>
              @endif
          </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
          <h3>Photo du bénéficiaire</h3>
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