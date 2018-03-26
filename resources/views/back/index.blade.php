@extends('back.layouts.master')

@section('content')
    <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">AFOGEC Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><h3>{{count($applicants)}} Bénéficaires</h3></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('applicant.index')}}">
              <span class="float-left">Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
    </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-star fa-fw"></i>
              </div>
              <div class="mr-5"><h3>{{count($partners)}} Collaborateurs</h3></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('partner.index')}}">
              <span class="float-left">Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
    </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-book fa-fw"></i>
              </div>
              <div class="mr-5"><h3>{{count($services)}} Services</h3></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('service.index')}}">
              <span class="float-left">Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
    </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-heart fa-fw"></i>
              </div>
              <div class="mr-5"><h3>{{count($actualities)}} Actualités</h3></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('actuality.index')}}">
              <span class="float-left">Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
    </div>
      </div>

      <div class="card mb-3 mt-5">
          <div class="card-header">
          <h2><i class="fa fa-table"></i> Bénéficiaire</h2></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="applicantTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Entreprise</th>
                    <th>Accepté</th>
                    <th>Financé</th>
                    <th>Montant</th>
                    <th>Créé le</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Entreprise</th>
                    <th>Accepté</th>
                    <th>Financé</th>
                    <th>Montant</th>
                    <th>Créé le</th>
                    <th>action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
     </div>

		<div class="row">
      <div class="col-12">
      @foreach($comments as $comment)
            <div class="card mb-3">
              <div class="card-body">
                  <h6 class="card-title mb-1"><a href="{{route('applicant.show', $comment->applicant_id)}}">{{$comment->applicant->first_name}} {{$comment->applicant->last_name}}</a></h6>
                  <p class="card-text small">{{$comment->comments}}
                  </p>
              </div>
                <hr class="my-0">
                <div class="card-footer small text-muted">{{$comment->created_at}}</div>  
            </div>
            @endforeach
      </div>
      <div clas='col-6'>
    	   <div class="mb-2 mt-4">
          <div class="row d-flex justify-content-between ml-5 mr-5">
            <a href="{{route('actuality.index')}}" style="text-decoration:none;"><h2><i class="fa fa-newspaper-o"></i> Dernière Actualités></h2></a>
          </div>
        </div>
         <div class="card-deck col-12">
            @foreach($actualities as $actuality)
            <div class="card mb-5">
              <a href="{{route('actuality.show', $actuality->id)}}">
              	@if(count($actuality->picture)>0)
                <img class="card-img-top img-fluid w-100" src="{{url('images', $actuality->picture->link)}}">
                @endif
              </a>
            <div class="card-body">
                <h6 class="card-title mb-1"><a href="{{route('actuality.show', $actuality->id)}}">{{$actuality->title}}</a></h6>
                <p class="card-text small">{{$actuality->description}}
                </p>
            </div>
              <hr class="my-0">
              <div class="card-footer small text-muted">{{$actuality->created_at}}</div>  
            </div>
            @endforeach  
        </div>
      </div>
    </div>
</div>
</div>


@endsection