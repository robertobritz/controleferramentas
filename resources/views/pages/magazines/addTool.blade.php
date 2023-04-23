@extends('adminlte::page')

@section('title', 'Incluir Nova Ferramenta')

@section('content_header')
    <h1>Incluir Nova Ferramenta</h1>

@stop

@section('content')

    <div class="card">
        <div class="card-body">
        <form action="{{ route('magazines.toolUpdate', $magazine->id) }}" class="form" method="POST" enctype="multipart/form-data" >
            @csrf
            @include('pages.includes.alerts')
        
        <div class="form-group">
            <label> Posição do Magazine:</label>
            <input type="text" name="position" class="form-control" placeholder="Quantidade de posições" value="{{ $magazine->position ?? old('position')}}" readonly>
        </div>
        <div class="form-group">
            <label>Máquina:</label>
            <input type="text" name="machine_name" class="form-control" placeholder="Descrição" value="{{ $magazine->machine_name ?? old('name')}}" readonly>
        </div>    
        <div class="form-group">
            <label>ID Máquina:</label>
            <input type="text" name="machine_id" class="form-control" placeholder="Descrição" value="{{ $magazine->machine_id ?? old('name')}}" readonly>
        </div>    
        <label for="tool_name">Ferramenta:</label>
        <select name="tool_name">
            @foreach($tools as $tool)
                <option value="{{ $tool }}">{{ $tool }}</option>
            @endforeach
        </select>
        <div class="form-group">
            <button type="submit" class="btn btn-dark">Enviar</button>
        </div>
    
        </div>
    </div>
@endsection