@extends('projects.layout')
  
@section('content')
    <div class="row">
        <div class="mt-5">
            <a class="btn btn-primary" href="{{ route('projects.index') }}"><i class="bi bi-arrow-left-circle"></i></a>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <h4>Informations of {{ $project->nom }}</h4>
        </div>
    </div>
   
    <div class="row justify-content-between">
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Number</h5>
            <div class="card-body">
                <h6 class="card-text">{{ $project->numero }}</h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Name</h5>
            <div class="card-body">
                <h6 class="card-text">{{ $project->nom }}</h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Technologies</h5>
            <div class="card-body">
                <h6 class="card-text">{{ $project->technologies }}</h6>
            </div>        
        </div>
    </div>

    <div class="row justify-content-between mt-5">
        <div class="card border-dark text-center col-12">
            <h5 class="card-header">Description</h5>
            <div class="card-body">
                <h6 class="card-text">{{ $project->description }}</h6>
            </div>        
        </div>
    </div>

    <div class="row justify-content-between mt-5">
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Client</h5>
            <div class="card-body">
                <h6 class="card-text">{{ $project->client ? $project->client->nom : '' }}</h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Type</h5>
            <div class="card-body">
                <h6 class="card-text">{{ $project->type ? $project->type->libelle : '' }}</h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Responsable</h5>
            <div class="card-body">
                <h6 class="card-text">{{ $project->responsable }}</h6>
            </div>        
        </div>
    </div>

    <div class="row justify-content-between mt-5">
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Start Date</h5>
            <div class="card-body">
                <h6 class="card-text">{{ date('d/m/Y', strtotime($project->date_debut)); }}</h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Estimated End Date</h5>
            <div class="card-body">
                <h6 class="card-text">{{ date('d/m/Y', strtotime($project->date_fin_estimee )); }}</h6>
            </div>        
        </div>
        <div class="card border-dark text-center col-md-3">
            <h5 class="card-header">Real End Date</h5>
            <div class="card-body">
                @if($project->date_fin_reelle)
                    <h6 class="card-text">{{ date('d/m/Y', strtotime($project->date_fin_reelle)); }}</h6>
                @else
                    <h6 class="card-text"></h6>
                @endif
            </div>        
        </div>
    </div>
@endsection
