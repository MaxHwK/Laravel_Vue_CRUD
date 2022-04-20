@extends('clients.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="mt-5">
                <h4>Here are our different clients ...</h4>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Add <i class="bi bi-plus-circle"></i></a>
            </div>
        </div>
    </div>

    <br>

    @if ($message = Session::get('success'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            <div class="alert alert-success alert-block">
                <h6>{{ $message }}</h6>
            </div>
        </div>
    @endif
   
    <client-table-component
        :rows='@json($clients)'
        concept="client">
    </client-table-component>       
      
@endsection