@extends('back.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('partner.index')}}">Les Collaborateurs</a> / {{$partner->name}}</li>
      </ol>
      
  </div>

<div class="card col-md-8 mx-auto">
  	<div class="jumbotron vertical-center">
        <div class="text-center">
            @if(count($partner->picture)>0)
            <img class="img-thumbnail " src="{{url('images', $partner->picture->link)}}" style="width: auto"><br>
            @endif    
  	       <h1 class="display-4">{{$partner->name}}</h1> 
        </div>
	  </div>


<div id="accordion">

  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h3>Informations Générales</h3>
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
	      <li class="list-group-item"><strong>Nom</strong> : {{$partner->name}}</li>
        <li class="list-group-item"><strong>Bio</strong> : {{$partner->bio}}</li>
        <li class="list-group-item"><strong>Poste</strong> : 
          @if(($partner->position)== 'director')
          Directeur
          @else
          Collaborateur
          @endif
        </li>
        <li class="list-group-item"><strong>Statut</strong> : {{$partner->statut}}</li>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h3>Bénéficaires</h3>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      	
      	<li class="list-group-item">
        <strong>Nombre de bénéficaire(s) : </strong>{{count($partner->applicant)}}
        </li>

        <li class="list-group-item">
        <strong> Le(s) bénéficiare(s)</strong> : 
        <ul>
        @forelse($partner->applicant as $applicant)
        <li>{{$applicant->first_name}} {{$applicant->last_name}}</li>
      	@empty
      	@endforelse
        </li>
      </ul>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h3>Accompagnement(s)</h3>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        	<li class="list-group-item">
           <strong> Accompangement(s)</strong> : 
            <ul>
            @forelse($partner->services as $service)
            <li>{{$service->title}}</li>
            @empty
            @endforelse
            </li>
          </li>
      </div>
    </div>
  </div>

</div>
</div>
</div>


@endsection