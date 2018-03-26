@extends('back.layouts.master')


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('service.index')}}">Les Services</a> / Modifier le service {{$service->title}}</li>
      </ol>
      
  </div>

<form action="{{route('service.update', $service)}}" method="post" enctype="multipart/form-data">
    <!-- Token de sécurité : -->
    {{csrf_field()}}
    {{method_field('PUT')}}

<div class="card col-md-8 mx-auto">
    <div class="jumbotron vertical-center">
        <div class="text-center">  
           <h1 class="display-4">Modifier Service</h1> 
        </div>
    </div>

  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
          <h3>Informations Générales</h3>
      </h5>
    </div>
      <div class="card-body">
        <li class="list-group-item"><strong>Titre</strong> : 
          <input type="text" class="form-control" placeholder="Titre" id="title" name="title" value="{{$service->title}}">
              @if($errors->has('title'))
              <span class="error" style="color : red;">
              {{$errors->first('title')}}
              </span>
              @endif
        </li>

        <li class="list-group-item"><strong>Type</strong> :
          <div class="input-radio">
            @if(($service->type) =='particulier')
            <input 
            type="radio" 
            checked  
            name="type" 
            value="particulier" 
            checked>Particulier <br>
            <input 
            type="radio" 
            name="type" value="professionnel">Professionnel<br>    
            @else
            <input 
            type="radio"  
            name="type" 
            value="particulier" 
            checked> particulier <br>
            <input 
            type="radio" 
            checked
            name="type" value="professionnel">Professionnel<br>
            @endif
          </div>
        </li>

        <li class="list-group-item"><strong>Catégorie</strong> :
          <div class="input-radio">
            @if(($service->category) =='accompagnement')
            <input 
            type="radio" 
            checked  
            name="category" 
            value="accompagnement" 
            checked>Accompagnement <br>
            <input 
            type="radio" 
            name="category" value="formation">Formation<br>    
            @else
            <input 
            type="radio"  
            name="category" 
            value="accompagnement" 
            checked>Accompagnement <br>
            <input 
            type="radio" 
            checked
            name="category" value="formation">Formation<br>
            @endif
          </div>
        </li>

        <li class="list-group-item"><strong>Description</strong> : 
          <textarea type="textarea" class="form-control" id="description" name="description">{{$service->description}}</textarea>
              @if($errors->has('description'))
              <span class="error" style="color : red;">
              {{$errors->first('description')}}
              </span>
              @endif
        </li>
      </div>
    </div>


  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
          <h3>Collaborateur(s)</h3>
        </button>
      </h5>
    </div>
      <div class="card-body">
        <li class="list-group-item">
          <strong> Ajouter des Collaborateur(s)</strong> :<br> 
          @foreach($partners as $id => $name)
            <input 
              name="partners[]" 
              type="checkbox" 
              value="{{$id}}" 
              id="partner{{$id}}" 
              @forelse($service->partners as $partner)
              @if(($id) == $partner->id) checked @endif
              @empty 
              @endforelse
              >{{$name}}
              <label class="control-label" >{{$name}}</label><br>
              @endforeach
        </li>
      </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
          <h3>Photo du Service</h3>
      </h5>
    </div>
      <div class="card-body">
            <input type="file" name="picture">
          @if(count($service->picture)>0)
          <img src="{{url('images', $service->picture->link)}}">
              @if($errors->has('picture'))
          <span class="error" style="color : red;">
              {{$errors->first('picture')}}
          </span>
              @endif
          @endif
      </div>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success btn-lg btn-block">Valider
      </button>
    </div>
</div>
</form>
</div>


@endsection