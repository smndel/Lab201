@extends('back.layouts.master')


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('service.index')}}">Les Services</a> / Créer un nouvau Service</li>
      </ol>
      
  </div>

<form action="{{route('service.store')}}" method="post" enctype="multipart/form-data">
    <!-- Token de sécurité : -->
    {{csrf_field()}}

<div class="card col-md-8 mx-auto">
    <div class="jumbotron vertical-center">
        <div class="text-center">  
           <h1 class="display-4">Nouveau Service</h1> 
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
          <input type="text" class="form-control" placeholder="Titre" id="title" name="title" value="{{old('title')}}">
              @if($errors->has('title'))
              <span class="error" style="color : red;">
              {{$errors->first('title')}}
              </span>
              @endif
        </li>

        <li class="list-group-item"><strong>Type</strong> :
          <div class="input-radio">
            <input 
            type="radio" 
            @if(old('type')=='particulier') checked @endif 
            name="type" 
            value="particulier" 
            checked> particulier <br>    
            <input 
            type="radio" 
            @if(old('type')=='professionnel') checked @endif 
            name="type" value="professionnel">Professionnel<br>
          </div>
        </li>

        <li class="list-group-item"><strong>Catégorie</strong> :
          <div class="input-radio">
            <input 
            type="radio" 
            @if(old('category')=='accompagnement') checked @endif 
            name="category" 
            value="accompagnement" 
            checked> accompagnement <br>    
            <input 
            type="radio" 
            @if(old('category')=='formation') checked @endif 
            name="category" value="formation">formation<br>
          </div>
        </li>

        <li class="list-group-item"><strong>Description</strong> : 
          <textarea type="textarea" class="form-control" id="description" name="description">{{old('description')}}
            </textarea>
              @if($errors->has('description'))
              <span class="error" style="color : red;">
              {{$errors->first('description')}}
              </span>
              @endif</li>
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
          @forelse($partners as $id =>$name)
            <input 
              name="partners[]" 
              type="checkbox" 
              value="{{$id}}" 
              id="partner{{$id}}" 
              {{ ( !empty(old('partners')) and in_array($id, old('partners')) )? 'checked' : ''  }}>
            <label class="control-label" >{{$name}}</label><br>
          @empty
          @endforelse
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
            <div class="form-group">
                <input type="file" name="picture">
            </div>
      </div>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success btn-lg btn-block" href="{{route('service.store')}}">Valider
      </button>
    </div>
</div>
</form>
</div>




@endsection