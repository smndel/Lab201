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
          <i class="fa fa-table"></i> Les Bénéficiaires
          <a href="{{route('applicant.create')}}" class="btn btn-info btn-xs float-right">Ajouter un Bénéficiaire</a>'
        </div>
          
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
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
            </table>
          </div>
        </div>
@endsection