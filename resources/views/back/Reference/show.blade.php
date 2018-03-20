@extends('back.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('reference.index')}}">Les Références</a> / {{$reference->company}}</li>
      </ol>
      
  </div>

<div class="card col-md-8 mx-auto">
  	<div class="jumbotron vertical-center">
        <div class="text-center">
            @if(count($reference->picture)>0)
            <img class="img-thumbnail " src="{{url('images', $reference->picture->link)}}" style="width: auto"><br>
            @endif    
  	       <h1 class="display-4">{{$reference->company}}</h1> 
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
	      <li class="list-group-item"><strong>Nom de l'entreprise</strong> : {{$reference->company}}</li>
        <li class="list-group-item"><strong>Statut</strong> :
        @if($reference->statut=='publish')Publié
        @else Non publié
        @endif
      </li>
        <li class="list-group-item"><strong>Date</strong> : {{Carbon\Carbon::parse($reference->created_at)->format('d.m.Y')}}</li>
      </div>
    </div>
  </div>

</div>
</div>
</div>


@endsection