@extends('back.layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('admin.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Les Bénéficiaires</li>
      </ol>
      
  </div>

 <div class="card mb-3">
        <div class="card-header">
          <h1><i class="fa fa-table"></i> Les Bénéficiaires</h1>
          <a href="{{route('applicant.create')}}" class="btn btn-info btn-xs float-right">Ajouter un Bénéficiaire</a>'
        </div>

        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{Session::get('message')}}</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
          
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="applicantTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Entreprise</th>
                  <th>Accepté</th>
                  <th>Financé</th>
                  <th>Montant</th>
                  <th>Créé le</th>
                  <th>Modifié le</th>
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
                  <th>Modifié le</th>
                  <th>action</th>
                </tr>
            </table>
          </div>
        </div>
   
@endsection