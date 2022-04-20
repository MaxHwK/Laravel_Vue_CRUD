@extends('clients.layout')
  
@section('content')
    <div class="row">
        <div class="mt-5">
            <a class="btn btn-primary" href="{{ route('clients.index') }}"><i class="bi bi-arrow-left-circle"></i></a>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <h4>New Client</h4>
        </div>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input !<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="card border-dark pt-5 ps-5">
            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputName" class="col-form-label ms-5">Name *</label>
                </div>
                <div class="col-3 ms-5">
                    <input type="text" name="nom" id="inputName" class="form-control ms-5" placeholder="(ex: Maxence)">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputAddress" class="col-form-label ms-5">Address</label>
                </div>
                <div class="col-4 ms-5">
                    <input type="text" name="adresse" id="inputAddress" class="form-control ms-5" placeholder="(ex: 3 avenue du Blues)">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputPostalCode" class="col-form-label ms-5">Postal Code</label>
                </div>
                <div class="col-2 ms-5">
                    <input type="text" name="cp" id="inputPostalCode" class="form-control ms-5" placeholder="(ex: L-4368)">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputCity" class="col-form-label ms-5">City</label>
                </div>
                <div class="col-3 ms-5">
                    <input type="text" name="ville" id="inputCity" class="form-control ms-5" placeholder="(ex: Belval)">  
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    <label for="inputCountryId" class="col-form-label ms-5">Country</label>
                </div>
                <div class="col-3 ms-5">
                    <select name="pays_id" id="inputCountryId" class="form-control ms-5">
                        <option value="">Choose a country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->libelle }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary my-4 ms-5">Create</button>
            </div>
        </div>
    </form>
@endsection