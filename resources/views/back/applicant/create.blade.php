@extends('back.layouts.master')


@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('applicant.index')}}">Les Bénéficiaire</a> / Inscription d'un nouveau bénéficiaire
        </li> 
      </ol>
    </div>

    @if(Session::has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{Session::get('message')}}</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif

<form action="{{route('applicant.store')}}" method="post">
    <!-- Token de sécurité : -->
    {{csrf_field()}}

  <div class="card col-md-8 mx-auto">
    	<div class="jumbotron">
  	    <h1 class="display-4">Formulaire d'Inscription Bénéficaire</h1>
  	 </div>

      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
              <h3>Informations Générales</h3>
            </button>
          </h5>
        </div>

        <div class="card-body">

          <li class="list-group-item"><strong>Nom</strong> :
            <input type="text" class="form-control" placeholder="Nom" id="last_name" name="last_name" value="{{old('last_name')}}">
            @if($errors->has('last_name'))
            <span class="error" style="color : red;">
            {{$errors->first('last_name')}}
            </span>
            @endif
           </li>

          <li class="list-group-item"><strong>Prénom</strong> :
            <input type="text" class="form-control" placeholder="Prénom" id="first_name" name="first_name" value="{{old('first_name')}}">
            @if($errors->has('first_name'))
            <span class="error" style="color : red;">
            {{$errors->first('first_name')}}
            </span>
            @endif
           </li>

          <li class="list-group-item"><strong>Téléphone</strong> :
            <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{old('phone_number')}}" placeholder="XX.XX.XX.XX.XX">
            @if($errors->has('phone_number'))
            <span class="error" style="color : red;">
            {{$errors->first('phone_number')}}
            </span>
            @endif
          </li>

           <li class="list-group-item"><strong>Mail</strong> :
            <input type="email" class="form-control" placeholder="Email" id="mail" name="mail" value="{{old('mail')}}">
            @if($errors->has('mail'))
            <span class="error" style="color : red;">
            {{$errors->first('mail')}}
            </span>
            @endif
           </li>


    	    <li class="list-group-item"><strong>Entreprise</strong> :
            <input type="text" class="form-control" placeholder="Nom de l'entreprise" id="company" name="company" value="{{old('company')}}">
            @if($errors->has('company'))
            <span class="error" style="color : red;">
            {{$errors->first('company')}}
            </span>
            @endif
           </li>

    	    <li class="list-group-item"><strong>Poste</strong> : 
            <input type="text" class="form-control" placeholder="Poster occupé" id="career" name="career" value="{{old('career')}}">
            @if($errors->has('career'))
            <span class="error" style="color : red;">
            {{$errors->first('career')}}
            </span>
            @endif
          </li>

    	    <li class="list-group-item"><strong>Premier contact</strong> : 
                  <div class="col-4 col-form-label">
                  <input class="form-control" name="contact" size="16" type="date" value="{{old('contact')}}"> 
                  </div>
          </li>

    	    <li class="list-group-item"><strong>Expérience</strong>
            <input type="number" name="experience" id="experience" min="1" max="50" value="{{old('experience')}}">
            @if($errors->has('experience'))
            <span class="error" style="color : red;">
            {{$errors->first('experience')}}
            </span>
            @endif
           : années
          </li>

    	    <li class="list-group-item"><strong>Niveau d'étude</strong> : 
            <select class="form-control" id="education_level_id" name="education_level_id">   
            @forelse($education_levels as $id => $education_level)  
            <option value="{{$id}}" @if(old('education_level_id') == $id) {{'selected'}} @endif>{{$education_level}}</option>
            @empty
            @endforelse
            </select>
          </li>
        </div>
      </div>


      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            
              <h3>Accompagnement</h3>
            </button>
          </h5>
        </div>
        
          <div class="card-body">
          	
          	<li class="list-group-item"><strong>Accompagnement(s)</strong> : 
              <br>
              @forelse($services as $id =>$title)
              <input 
                name="services[]" 
                type="checkbox" 
                value="{{$id}}" 
                id="service{{$id}}" 
                {{ ( !empty(old('services')) and in_array($id, old('services')) )? 'checked' : ''  }}>
                <label class="control-label" >{{$title}}</label><br>
              @empty
              @endforelse
            </li>
          
          	<li class="list-group-item"><strong>Accompagnateur(s)</strong> : 
              <br>
              @foreach($partners as $id => $name)
              <input 
                name="partners[]" 
                type="checkbox" 
                value="{{$id}}" 
                id="partner{{$id}}" 
                {{ ( !empty(old('partners')) and in_array($id, old('partners')) )? 'checked' : ''  }}>
                <label class="control-label" >{{$name}}</label><br>
              @endforeach
            </li>
          

            <li class="list-group-item"><strong>Accepté</strong> : 
              <select class="form-control" id="accepted" name="accepted">
              <option value="non" @if(old('accepted') == 'non') {{'selected'}} @endif>Non</option>       
              <option value="oui" @if(old('accepted') == 'oui') {{'selected'}} @endif>Oui</option>
              <option value="en_cours" @if(old('accepted') == 'en_cours') {{'selected'}} @endif>En cours</option>
              </select>
            </li>

    	    <li class="list-group-item"><strong>Financé</strong> : 
              <select class="form-control" id="funded" name="funded"> 
              <option value="non" @if(old('funded') == 'non') {{'selected'}} @endif>Non</option>      
              <option value="oui" @if(old('funded') == 'oui') {{'selected'}} @endif>Oui</option>
              <option value="en_cours" @if(old('funded') == 'en_cours') {{'selected'}} @endif>En cours</option>
              </select>
          </li>
    	    <li class="list-group-item"><strong>Montant</strong> :
              <input type="number" name="price" id="price" min="1" max="100000" value="{{old('price')}}" step="any"> H.T
              @if($errors->has('price'))
              <span class="error" style="color : red;">
              {{$errors->first('price')}}
              </span>
              @endif
          </li>

          <li class="list-group-item list-input"><strong>Etalement</strong> :
              <button class="add_form_field btn btn-outline-danger btn-sm">Ajouter &nbsp; <span style="font-size:16px; font-weight:bold;"></span></button>
              <div class="form-control">
                <input name=event[] type=number value="value" >
                <input name=event[] type="date" value="start_date" class="start_date">
              </div>
          </li>

    	    <li class="list-group-item"><strong>Organisme</strong> : 
            <select class="form-control" id="funding_id" name="funding_id">   
            @forelse($fundings as $id => $funding)  
            <option value="{{$id}}" @if(old('funding_id') == $id) {{'selected'}} @endif>{{$funding}}</option>
            @empty
            @endforelse
            </select>
          </li>
          </div>
      </div>
      

      <div class="card">
        <div class="card-header" id="headingThree">
          <h5 class="mb-0">
              <h3>Commentaires</h3>
          </h5>
        </div>
          <div class="card-body">
            	<textarea type="textarea" class="form-control" id="comment" name="comment">{{old('comment')}}</textarea>
              @if($errors->has('comment'))
              <span class="error" style="color : red;">
              {{$errors->first('comment')}}
              </span>
              @endif
          </div>
        </div>


       <div class="card">
        <div class="card-header" id="headingfour">
          <h5 class="mb-0">
              <h3>Questionnaire</h3>
          </h5>
        </div>
       
          <div class="card-body">

            <li class="list-group-item">   
          		<p><strong>Date d'envoi du questionnaire</strong> :</p>
                  <div class="col-4 col-form-label">
                  <input class="form-control" name="questionnaire_sent" size="16" type="date" value="{{old('questionnaire_sent')}}"> 
                  </div>
            </li>

            <li class="list-group-item">
            	<strong>Date de réception du questionnaire</strong> :
                  <div class="col-4 col-form-label">
                  <input class="form-control" name="questionnaire_returned" size="16" type="date" value="{{old('questionnaire_sent')}}"> 
                  </div>
            </li>

          </div>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" href="{{route('applicant.store')}}">Valider
            </button>
        </div>

      </div>

    </div>

  </div>

</form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
$(document).ready(function() {
    var max_fields      = 10;
    var wrapper         = $(".list-input"); 
    var add_button      = $(".add_form_field"); 
    
    var x = 1; 
    $(add_button).click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++; 
            $(wrapper).append('<div class="form-control"><input name=event[] type="number" value="value"> <input name=event[] type="date" value="started_at"><a href="#" class="delete"><i class="fa fa-times"></i></a></div>'); //add input box
        }
    else
    {
    alert('Vous avez atteins la limite')
    }
    });
    
    $(wrapper).on("click",".delete", function(e){ 
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>




@endsection