@extends('layouts.master')

@section('content')
<div class="col-12 mx-auto" id="main__top">
	<div class="row justify-content-center">
		<div class="col-10" id="main__top__linkService">
			<h1>AFOGEC COMPETENCES VOUS ACCOMPAGNE TOUT AU LONG DE LA VIE</h1>
				<div class="row justify-content-around" id="main__top__linkService__card">
					<div class="card col-lg-3" style="width: 18rem;">
					  <div class="card-img-top mx-auto" alt="Card image cap" id="img_bc">
					  </div>
					  <div class="card-body pl-0 pr-0 mx-auto">
					    <p class="card-text">BILAN DE COMPETENCES</p>
					  </div>
					</div>

					<div class="card col-lg-3" style="width: 18rem;">
					  <div class="card-img-top mx-auto" alt="Card image cap" id="img_vae">
					  </div>
					  <div class="card-body pl-0 pr-0 mx-auto">
					    <p class="card-text">VAE</p>
					  </div>
					</div>

					<div class="card col-lg-3" style="width: 18rem;">
					  <div class="card-img-top mx-auto" alt="Card image cap" id="img_retraite">
					  </div>
					  <div class="card-body pl-0 pr-0 mx-auto">
					    <p class="card-text">PROJET DE RETRAITE</p>
					  </div>
					</div>
				</div>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-lg-7" id="main__presentation">
		<h2>QUI SOMME-NOUS?</h2>
			<hr>
			<div>
				<p>Depuis 40 ans, Afogec compétences accompagne les salariés et les entreprises<br>dans leurs project professionneles et personnels</p>
				<p>Au cours de ces années nous avons développé un partenariat avec près de 3000<br>entreprises ainsi qu'avec des institutionnels comme Le Conseil Régional<br>d'Ile-de-France, le Ministère de travail.</p>
				<p>A proximité de la gare St Lazare, notre équipe vous accueille dans ses locaux<br>destinés à la VAE et au bilan de compétences.</p>
			</div>
			<button type="button" class="btn my-secondary btn-lg">JE PRENDS RDV</button>
		</div>
	</div>


	<div class="col-12" id="main__top__bottom">
		<div class="row justify-content-around mh-100">
			<div class="col-lg-6" id="main__top__bottom__manager">
				
				<h3>LE MOT DE LA DIRECTRICE</h3>
				
				<div class="row justify-content-around">
					<div class="col-4">
					<img src="{{asset('images/front/photo.jpg')}}" alt="photo de la directrice" class="rounded-circle">
					</div>

					<div class="col-7">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia voluptates perferendis, tempore dicta atque culpa officiis, voluptatibus ducimus rem reiciendis magnam veniam esse fugiat minima laboriosam pariatur odit debitis mollitia.Tempore dicta atque culpa officiis, voluptatibus ducimus rem reiciendis magnam veniam esse fugiat minima laboriosam pariatur odit debitis mollitia
						</p>
					</div>
				</div>
			</div>

			<div id="carousel_actualities" class="carousel slide col-lg-4" data-ride="carousel">

	                <!-- Wrapper for slides -->
	                <div class="carousel-inner" role="listbox">
	                    @foreach( $actualities as $actuality )
	                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" >
	                        	<div class="card h-200" style="width:100%;">
								  <div class="card-body">
								    <h5 class="card-title"><i class="fa fa-calendar fa-3x mr-10" aria-hidden="true"></i>{{Carbon\Carbon::parse($actuality->created_at)->format('d.m.Y')}}</h5>
								    <h6 class="card-subtitle mb-2 text-muted">{{$actuality->title}}</h6>
								    <p class="card-text">{{$actuality->description}}</p>
								    <a href="#" class="card-link">En savoir plus</a>
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
	        </div>
		</div>
	</div>
</div>

<div class="col-12" id="main__middle">
		<div class="row justify-content-around" id="main__middle__top">
			<div class="col-2">
				<figure class="figure">
				  <img src="{{asset('images/front/personnesacc.png')}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
				  <figcaption class="figure-caption"><span class="counter">{{count($applicants)}}</span> Personnes accompagnées</figcaption>
				</figure>
			</div>

			<div class="col-2">
				<figure class="figure">
				  <img src="{{asset('images/front/accredi.png')}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
				  <figcaption class="figure-caption"><span class="counter">{{count($accreditations)}}</span> accréditations, gages de qualité</figcaption>
				</figure>
			</div>

			<div class="col-2">
				<figure class="figure">
				  <img src="{{asset('images/front/disposi.png')}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
				  <figcaption class="figure-caption"><span class="counter">{{count($services)}}</span> dispositifs d'accompagnement</figcaption>
				</figure>
			</div>

			<div class="col-2">
				<figure class="figure">
				  <img src="{{asset('images/front/consultant.png')}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
				  <figcaption class="figure-caption"><span class="counter">{{count($partners)}}</span> consultants experts</figcaption>
				</figure>
			</div>
		</div>
</div>









@endsection