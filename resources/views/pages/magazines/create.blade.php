@extends('adminlte::page')

@section('title', 'Cadastrar Nova Máquina')

@section('content_header')
    <h1>Cadastrar Novo Magazine</h1>

@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('magazines.store') }}" class="form" method="POST" enctype="multipart/form-data" >
                @csrf
                @include('pages.includes.alerts')
        
        <div class="form-group">
            <label>Posições Magazine:</label>
            <input type="text" name="positions" class="form-control" placeholder="Quantidade de posições" value="{{ $magazine->positions ?? old('positions')}}">
        </div>
        <div class="form-group">
            <label>Máquina:</label>
            <input type="text" name="machine_name" class="form-control" placeholder="Descrição" value="{{ $machine->name ?? old('name')}}" readonly>
        </div>    
        <div class="form-group">
            <label>ID Máquina:</label>
            <input type="text" name="machine_id" class="form-control" placeholder="Descrição" value="{{ $machine->id ?? old('id')}}" readonly>
        </div>    
        <div class="form-group">
            <button type="submit" class="btn btn-dark">Enviar</button>
        </div>
    
        </div>
    </div>
@endsection