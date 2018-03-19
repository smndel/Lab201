@extends('back.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('applicant.index')}}">Les Bénéficiaires</a> / {{$applicant->first_name}} {{$applicant->last_name}}</li>
      </ol>
      
  </div>

<div class="card col-md-8 mx-auto">
  	<div class="jumbotron">
	    <h1 class="display-4">{{$applicant->first_name}} {{$applicant->last_name}}</h1>
	    <h3><strong>Téléphone</strong> : {{$applicant->phone_number}}</h3>
	    <h3><strong>Mail</strong> : {{$applicant->mail}}</h3>
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
	    <li class="list-group-item"><strong>Entreprise</strong> : {{$applicant->company}}</li>
	    <li class="list-group-item"><strong>Poste</strong> : {{$applicant->career}}</li>
	    <li class="list-group-item"><strong>Premier contact</strong> : {{$applicant->contact}}</li>
	    <li class="list-group-item"><strong>Expérience</strong> : {{$applicant->experience}} ans</li>
	    <li class="list-group-item"><strong>Niveau d'étude</strong> : {{$applicant->education_level->level}}</li> 

      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h3>Accompagnement</h3>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      	
      	<li class="list-group-item"><strong>Accompagnement(s)</strong> : 
        @forelse($applicant->services as $service)
        {{$service->title}}
        @empty
        @endforelse
        </li>
      	
		    
      	<li class="list-group-item"><strong>Accompagnateur(s)</strong> : 
        @forelse($applicant->partners as $partner)
        {{$partner->name}}
      	@empty
      	@endforelse
        </li>

      <li class="list-group-item"><strong>Accepté</strong> : 
      @if($applicant->accepted=='en_cours')
      En cours
      @else
      {{$applicant->accepted}}
      @endif
      </li>
	    <li class="list-group-item"><strong>Financé</strong> : 
      @if($applicant->funded=='en_cours')En cours
      @else
      {{$applicant->funded}}
      @endif
      </li>
	    <li class="list-group-item"><strong>Montant</strong> : {{$applicant->price}}</li>

	    <li class="list-group-item"><strong>Organisme</strong> : {{$applicant->funding->title}}</li>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h3>Commentaires</h3>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        	<li class="list-group-item">
              {{$applicant->comment->comments}}
          </li>
      </div>
    </div>
  </div>

   <div class="card">
    <div class="card-header" id="headingfour">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          <h3>Questionnaire</h3>
        </button>
      </h5>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
      <div class="card-body">
      		<p><strong>Date d'envoi du questionnaire</strong> : 
      		@if(isset($applicant->questionnaire_sent))
        	{{$applicant->questionnaire_sent}}
    			@else
    			Non envoyé
    			@endif
        	</p>

        	<p><strong>Date de réception du questionnaire</strong> : 
			    @if(isset($applicant->questionnaire_returned))
        	{{$applicant->questionnaire_returned}}
        	@else
        	Non retourné
        	@endif
			</p>
      </div>
    </div>
  </div>

</div>
</div>
</div>


@endsection