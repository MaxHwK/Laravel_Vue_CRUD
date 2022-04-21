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

    {{ html()->form('POST', route('clients.store'))->open() }}

        @csrf

        <div class="card border-dark pt-5 ps-5">
            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    {{ html()->label('Name *')->class('col-form-label ms-5')->for('nom') }}
                </div>
                <div class="col-3 ms-5">
                    {{ html()->text('nom')->class('form-control ms-5')->placeholder('(ex: Maxence)')->required() }}
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    {{ html()->label('Address')->class('col-form-label ms-5')->for('adresse') }}
                </div>
                <div class="col-4 ms-5">
                    {{ html()->text('adresse')->class('form-control ms-5')->placeholder('(ex: 3 avenue du Blues)') }}
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    {{ html()->label('Postal Code')->class('col-form-label ms-5')->for('cp') }}
                </div>
                <div class="col-2 ms-5">
                    {{ html()->text('cp')->class('form-control ms-5')->placeholder('(ex: L-4368)') }} 
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    {{ html()->label('City')->class('col-form-label ms-5')->for('ville') }}
                </div>
                <div class="col-3 ms-5">
                    {{ html()->text('ville')->class('form-control ms-5')->placeholder('(ex: Belval)') }}
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    {{ html()->label('Country')->class('col-form-label ms-5')->for('pays_id') }}
                </div>
                <div class="col-3 ms-5">
                    {{ html()->select('pays_id')->class('form-control ms-5')->options($countries->pluck('libelle', 'id'))
                    ->placeholder('Choose a country') }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                {{ html()->button('Create')->type('submit')->class('btn btn-primary my-4 ms-5') }} 
            </div>
        </div>

    {{ html()->form()->close() }}

@endsection