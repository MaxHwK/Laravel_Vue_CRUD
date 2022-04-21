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
    
    {{ html()->form('POST', route('projects.store'))->open() }}

        @csrf

        <div class="card border-dark pt-5 ps-5">
            <div class="row align-items-center">
                <div class="col-2 ms-5 ms-5">
                    {{ html()->label('Number *')->class('col-form-label ms-5')->for('numero') }}
                </div>
                <div class="col-2 ms-5 ms-5">
                    {{ html()->text('numero')->class('form-control ms-5')->placeholder('(ex: 123)')->required() }}
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    {{ html()->label('Name *')->class('col-form-label ms-5')->for('nom') }}
                </div>
                <div class="col-3 ms-5">
                    {{ html()->text('nom')->class('form-control ms-5')->placeholder('(ex: My Project)')->required() }} 
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    {{ html()->label('Technologies')->class('col-form-label ms-5')->for('technologies') }}
                </div>
                <div class="col-3 ms-5">
                    {{ html()->text('technologies')->class('form-control ms-5')->placeholder('(ex: Laravel)') }} 
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    {{ html()->label('Description')->class('col-form-label ms-5')->for('description') }}
                </div>
                <div class="col-6 ms-5">
                    {{ html()->textarea('description')->class('form-control ms-5')->placeholder('(ex: Here is the description of my project)') }} 
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    {{ html()->label('Client')->class('col-form-label ms-5')->for('client_id') }}
                </div>
                <div class="col-3 ms-5">
                    {{ html()->select('client_id')->class('form-control ms-5')->options($clients->pluck('nom', 'id'))
                    ->placeholder('Choose a client') }}
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    {{ html()->label('Type')->class('col-form-label ms-5')->for('type_id') }}
                </div>
                <div class="col-3 ms-5">
                    {{ html()->select('type_id')->class('form-control ms-5')->options($types->pluck('libelle', 'id'))
                    ->placeholder('Choose a type') }}
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    {{ html()->label('Responsable')->class('col-form-label ms-5')->for('responsable') }}
                </div>
                <div class="col-3 ms-5">
                    {{ html()->text('responsable')->class('form-control ms-5')->placeholder('(ex: Thomas)') }}
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    {{ html()->label('Start Date *')->class('col-form-label ms-5')->for('date_debut') }}
                </div>
                <div class="col-2 ms-5">
                    {{ html()->date('date_debut')->class('form-control ms-5')->required() }} 
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    {{ html()->label('Est End Date *')->class('col-form-label ms-5')->for('date_fin_estimee') }}
                </div>
                <div class="col-2 ms-5">
                    {{ html()->date('date_fin_estimee')->class('form-control ms-5')->required() }} 
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-2 ms-5">
                    {{ html()->label('Real End Date')->class('col-form-label ms-5')->for('date_fin_reelle') }}
                </div>
                <div class="col-2 ms-5">
                    {{ html()->date('date_fin_reelle')->class('form-control ms-5') }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                {{ html()->button('Create')->type('submit')->class('btn btn-primary my-4 ms-5') }}
            </div>
        </div>
    
    {{ html()->form()->close() }}

@endsection