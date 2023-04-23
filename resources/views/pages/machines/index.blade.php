@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Máquinas <a href="{{ route('machines.create')}}" class="btn btn-dark">ADD MÁQUINA</a></h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('machines.search')}}"  class="form form-inline">
            @csrf 
            <input type="text" name='filter' placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? ''}}">
            <button type="submit" class="btn btn-dark">Filtrar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
           <thead>
            <tr>
                <th>Nome Máquina</th>
                <th>Descrição Máquina</th>
                <th>Posições Magazine</th>
                <th width="250px">Ação</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($machines as $machine)
                    <tr>
                        <td>
                            {{ $machine->name}}
                        </td>
                        <td>
                            {{ $machine->description}}
                        </td>
                        <td>
                            {{ $machine->positions_magazine}}
                        </td>
                        <td style="width=10px">
                            <a href="{{ route('magazines.create', $machine) }}" class="btn btn-success">Magazine</a>
                            <a href="{{ route('machines.edit', $machine->id) }}" class="btn btn-info">Editar</a>
                            <a href="{{ route('machines.show', $machine->id) }}" class="btn btn-warning">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
        {!! $machines->appends($filters)->links() !!}
        @else
        {!! $machines->links() !!}
        @endif
    </div>
</div>
@stop