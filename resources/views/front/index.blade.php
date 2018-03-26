@extends('front.layouts.master')

@section('content')

<div class="share_box">
    	<a href="#"><p>ENTRETIEN GRATUIT</p></a>
</div>

<section class="col-12 mx-auto" id="main__top">
	<section class="row justify-content-center">
		<div class="col-10" id="main__top__linkService">
			<h1>AFOGEC COMPETENCES VOUS ACCOMPAGNE<br>TOUT AU LONG DE LA VIE</h1>
				<div class="row justify-content-around" id="main__top__linkService__card">
					<div class="card col-lg-3 col-sm-12" style="width: 18rem;">
					  <div class="card-img-top mx-auto" alt="Card image cap" id="img_bc">
					  </div>
					  <div class="card-body pl-0 pr-0 mx-auto">
					    <p class="card-text">BILAN DE COMPETENCES</p>
					  </div>
					</div>

					<div class="card col-lg-3 col-sm-12" style="width: 18rem;">
					  <div class="card-img-top mx-auto" alt="Card image cap" id="img_vae">
					  </div>
					  <div class="card-body pl-0 pr-0 mx-auto">
					    <p class="card-text">VAE</p>
					  </div>
					</div>

					<div class="card col-lg-3 col-sm-12" style="width: 18rem;">
					  <div class="card-img-top mx-auto" alt="Card image cap" id="img_retraite">
					  </div>
					  <div class="card-body pl-0 pr-0 mx-auto">
					    <p class="card-text">PROJET DE RETRAITE</p>
					  </div>
					</div>
				</div>
		</div>
	</section>

	<section class="row justify-content-center">
		<div class="col-lg-6" id="main__presentation">
		<h2>QUI SOMME-NOUS?</h2>
			<hr>
			<div>
				<p>Depuis 40 ans, Afogec compétences accompagne les salariés et les entreprises dans leurs project professionneles et personnels</p>
				<p>Au cours de ces années nous avons développé un partenariat avec près de 3000 entreprises ainsi qu'avec des institutionnels comme Le Conseil Régional d'Ile-de-France, le Ministère de travail.</p>
				<p>A proximité de la gare St Lazare, notre équipe vous accueille dans ses locaux destinés à la VAE et au bilan de compétences.</p>
			</div>
			<button type="button" class="btn my-secondary btn-lg">JE PRENDS RDV</button>
		</div>
	</section>


	<div class="col-12" id="main__top__bottom">
		<div class="row justify-content-around">
	
			<div class="col-lg-6" id="main__top__bottom__director">		
					<h3>LE MOT DE LA DIRECTRICE</h3>

				<div class="row justify-content-center d-flex align-items-center">
					<div class="col-4 col-6-sm director_image d-none d-sm-block">
					@foreach($partners as $partner)
						@if(($partner->position) =='director')
						<img src="{{url('images', $partner->picture->link)}}" alt="photo de la directrice" class="rounded-circle">
						</div>
						@else
						@endif
					@endforeach

					<div class="col-6 col-6-sm" id="diretor_text">
						<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia voluptates perferendis, tempore dicta atque culpa officiis, voluptatibus ducimus rem reiciendis magnam veniam esse fugiat minima laboriosam pariatur odit debitis mollitia.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia voluptates perferendis, tempore dicta atque culpa officiis.
						</p>
					</div>
				</div>
			</div>

			<section id="carousel_actualities" class="carousel slide col-lg-4" data-ride="carousel">

	                <!-- Wrapper for slides -->
	                <div class="carousel-inner" role="listbox">
	                    @foreach( $actualities as $actuality)
	                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" >
	                        	<div class="card p-5" style="width:100%;">
								  <div class="card-body">
								    <h5 class="card-title"><img src="{{url('/images_front/evenement.png')}}">{{Carbon\Carbon::parse($actuality->created_at)->format('d.m.Y')}}</h5>
								    <h6 class="card-subtitle mb-2">{{$actuality->title}}</h6>
								    <p class="card-text">{{$actuality->description}}</p>
								    <a href="#" class="card-link float-right">En savoir plus</i></a>
								  </div>
								</div>											
	                        </div>
	                    @endforeach
	                </div>

	                <!-- Controls -->
	                <a class="carousel-control-prev" href="#carousel_actualities" role="button" data-slide="prev">
	                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				   		<span class="sr-only">Previous</span>
	                </a>
	                <a class="carousel-control-next" href="#carousel_actualities" role="button" data-slide="next">
	                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    	<span class="sr-only">Next</span>
	                </a>
	        </section>
		</div>
	</section>
</section>

<section class="col-12" id="main__middle">
		<section class="row justify-content-around" id="main__middle__top">
			<div class="col-2-lg col-12-sm">
				<figure class="figure">
				  		<img src="{{asset('images_front/personnesacc.png')}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
				  		<figcaption class="figure-caption"><span class="counter">{{count($applicants)}}</span> Personnes<br> accompagnées</figcaption>
				</figure>
			</div>

			<div class="col-2-lg col-12-sm">
				<figure class="figure">
				  <img src="{{asset('images_front/accredi.png')}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
				  <figcaption class="figure-caption"><span class="counter">{{count($accreditations)}}</span> accréditations,<br> gages de qualité</figcaption>
				</figure>
			</div>

			<div class="col-2-lg col-12-sm">
				<figure class="figure">
				  <img src="{{asset('images_front/disposi.png')}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
				  <figcaption class="figure-caption"><span class="counter">{{count($services)}}</span> dispositifs<br> d'accompagnement</figcaption>
				</figure>
			</div>

			<div class="col-2-lg col-12-sm">
				<figure class="figure">
				  <img src="{{asset('images_front/consultant.png')}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
				  <figcaption class="figure-caption"><span class="counter">{{count($partners)}}</span> consultants<br> experts</figcaption>
				</figure>
			</div>
		</section>
</section>

	<section class="col-12" id="main__middle__bottom">
		<div class="row justify-content-around">

			<div class="col-lg-6 col-md-12 d-flex align-items-center" id="main__middle__bottom__docmuentation">
				<div class="col-12">
                    <div class="row d-flex justify-content-center">                
						<h3>JE SUIS INTERESSE PAR L'UNE DE CES OFFRES</h3>
                    </div>
                    <div class="row d-flex justify-content-center mt-5">
            			<button type="button" class="btn my-secondary btn-lg">JE DEMANDE LA DOCUMENTATION GRATUITE</button>
                   </div>
                </div>  
	        </div>
	        @if(isset($testimony_applicant))
			<div class="col-lg-4" id="main__middle__bottom__testimony">		
					<h3 class="d-flex align-self-left">
						Témoignage de {{$testimony->applicant->first_name}} .{{$applicantFL}}<br>
						@foreach($testimony_applicant->services as $service)
						Bénéficiaire de {{$service->title}} 
						@endforeach
					</h3>

					<img src="{{url('images', $testimony->picture->link)}}" alt="photo de la directrice" class="rounded-circle" id="testimony_image">

				<div class="row d-flex align-items-center">
					<div class="col-9 text-align-center" id="testimony_text">
						<p>{{$testimony->testimony}}
						</p>
					</div>
				</div>
			</div>
			@else
			@endif
		</div>
	</section>

	<section class="col-12" id="main__bottom__top">
		<div class="row">
			<h2>NOS ACCREDITATIONS</h2>
			<hr>
		</div>

		<div class="row d-flex justify-content-center mt-5">
			<div id="carousel_accreditations" class="carousel slide col-9" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="col carousel-item active">
                    	<div class="row">
                    	@foreach($accreditations->slice(0, 5) as $accreditation)
                        	<div class="col">
                        	<a href="{{$accreditation->url}}" title="$accreditation->title" target = "_blank">
                        	<img src="{{url('images',$accreditation->picture->link)}}" alt='accréditation'>
                        	</a>
                        	</div>
						@endforeach	
                    	</div>
                    </div>
                    <div class="col carousel-item">
                    	<div class="row">
                    	@foreach($accreditations->slice(0, 5) as $accreditation)
                        	<div class="col">
                        	<img src="{{url('images', $accreditation->picture->link)}}" alt='accréditation'>
                        	</div>
						@endforeach	
                    	</div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="carousel-control-prev" href="#carousel_accreditations" role="button" data-slide="prev">
                    <i class="fa fa-chevron-left fa-5x"></i>
                </a>
                <a class="carousel-control-next" href="#carousel_accreditations" role="button" data-slide="next">
                    <i class="fa fa-chevron-right fa-5x"></i>
                </a>
		    </div>
		</div>
	</section>

	<section class="col-12" id="main-bottom-middle">
		<div class="row">
			<h2>RETROUVEZ NOUS EN PLEIN COEUR DE PARIS</h2>
			<hr>
		</div>
		<div class="row" id="main-bottom-top__adress">
			<p><strong>AFOGEC COMPETENCES</strong></p>
			<p>6 AVENUE PERCIER</p>
			<p>75008 PARIS</p>
		</div>

		<div class="row d-flex justify-content-center mt-4">
			<div id="map" class="map col-12">
					{!! Mapper::render() !!}    
			</div>
		</div>
	</section>

	<section class="col-12" id="main__bottom__bottom">
		<div class="row">
			<h2>ILS NOUS FONT CONFIANCE</h2>
			<hr>
		</div>

		<div class="row d-flex justify-content-center mt-5">
			<div id="carousel_references" class="carousel slide col-9" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="col carousel-item active">
                    	<div class="row">
                    	@foreach($references->slice(0, 5) as $reference)
                        	<div class="col">
                        	<img src="{{url('images',$reference->picture->link)}}" alt='accréditation'>
                        	</div>
						@endforeach	
                    	</div>
                    </div>
                    <div class="col carousel-item">
                    	<div class="row">
                    	@foreach($references->slice(0, 5) as $reference)
                        	<div class="col">
                        	<img src="{{url('images', $reference->picture->link)}}" alt='accréditation'>
                        	</div>
						@endforeach	
                    	</div>
                    </div>
                </div>


                <!-- Controls -->
                <a class="carousel-control-prev" href="#carousel_references" role="button" data-slide="prev">
                    <i class="fa fa-chevron-left fa-5x"></i>
                </a>
                <a class="carousel-control-next" href="#carousel_references" role="button" data-slide="next">
                    <i class="fa fa-chevron-right fa-5x"></i>
                </a>
		    </div>
		</div>
	</section>

                        



@endsection