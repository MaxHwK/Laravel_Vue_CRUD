@extends('clients.layout')
  
@section('content')
    <div class="row">
        <div class="mt-5">
            <a class="btn btn-primary" href="{{ route('clients.index') }}"><i class="bi bi-arrow-left-circle"></i></a>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <h4>Informations of {{ $client->nom }}</h4>
        </div>
    </div>
   
    <div class="row justify-content-around">
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Name</h5>
            <div class="card-body">
                <h6 class="card-text">{{ $client->nom }}</h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-7">
            <h5 class="card-header">Address</h5>
            <div class="card-body">
                <h6 class="card-text">{{ $client->adresse }}</h6>
            </div>        
        </div>
    </div>

    <div class="row justify-content-around mt-5">
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Postal Code</h5>
            <div class="card-body">
                <h6 class="card-text">{{ $client->cp }}</h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">City</h5>
            <div class="card-body">
                <h6 class="card-text">{{ $client->ville }}</h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Country</h5>
            <div class="card-body">
                <h6 class="card-text">{{ $client->country ? $client->country->libelle : '' }}</h6>
            </div>        
        </div>
    </div>
@endsection
