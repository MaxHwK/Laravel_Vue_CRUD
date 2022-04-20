@extends('projects.layout')
  
@section('content')
    <div class="row">
        <div class="mt-5">
            <a class="btn btn-primary" href="{{ route('projects.index') }}"><i class="bi bi-arrow-left-circle"></i></a>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <h4>New Project</h4>
        </div>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your fiels !<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="card border-dark pt-5 ps-5">
            <div class="row align-items-center">
                <div class="col-2 ms-5 ms-5">
                    <label for="inputNumber" class="col-form-label ms-5">Number *</label>
                </div>
                <div class="col-2 ms-5 ms-5">
                    <input type="number" name="numero" id="inputNumber" class="form-control ms-5" placeholder="(ex: 123)">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputName" class="col-form-label ms-5">Name *</label>
                </div>
                <div class="col-3 ms-5">
                    <input type="text" name="nom" id="inputName" class="form-control ms-5" placeholder="(ex: My Project)">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputTechnologies" class="col-form-label ms-5">Technologies</label>
                </div>
                <div class="col-3 ms-5">
                    <input type="text" name="technologies" id="inputTechnologies" class="form-control ms-5" placeholder="(ex: Laravel)">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputDescription" class="col-form-label ms-5">Description</label>
                </div>
                <div class="col-6 ms-5">
                    <textarea name="description" id="inputDescription" class="form-control ms-5" placeholder="(ex: Here is the description of my project)"></textarea>
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputClientId" class="col-form-label ms-5">Client</label>
                </div>
                <div class="col-3 ms-5">
                    <select name="client_id" id="inputClientId" class="form-control ms-5">
                        <option value="">Choose a client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputTypeId" class="col-form-label ms-5">Type</label>
                </div>
                <div class="col-3 ms-5">
                    <select name="type_id" id="inputTypeId" class="form-control ms-5">
                        <option value="">Choose a type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputResponsable" class="col-form-label ms-5">Responsable</label>
                </div>
                <div class="col-3 ms-5">
                    <input type="text" name="responsable" id="inputResponsable" class="form-control ms-5" placeholder="(ex: Thomas)">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputStartDate" class="col-form-label ms-5">Start Date *</label>
                </div>
                <div class="col-2 ms-5">
                    <input type="date" name="date_debut" id="inputStartDate" class="form-control ms-5">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputEstEndDate" class="col-form-label ms-5">Est End Date *</label>
                </div>
                <div class="col-2 ms-5">
                    <input type="date" name="date_fin_estimee" id="inputEstEndDate" class="form-control ms-5">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputRealEndDate" class="col-form-label ms-5">Real End Date</label>
                </div>
                <div class="col-2 ms-5">
                    <input type="date" name="date_fin_reelle" id="inputRealEndDate" class="form-control ms-5">  
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary my-4 ms-5">Create</button>
            </div>
        </div>
    </form>
@endsection