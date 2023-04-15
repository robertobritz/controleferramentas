@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Magazines <a href="{{ route('magazines.create')}}" class="btn btn-dark">ADD FERRAMENTA</a></h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('magazines.search')}}"  class="form form-inline">
            @csrf 
            <input type="text" name='filter' placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? ''}}">
            <button type="submit" class="btn btn-dark">Filtrar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
           <thead>
            <tr>
                <th>ID</th>
                <th>Máquina ID</th>
                <th>Tamanho Magazine</th>
                <th width="250px">Ação</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($magazines as $magazine)
                    <tr>
                        <td>
                            {{ $magazine->id}}
                        </td>
                        <td>
                            {{ $magazine->machine_id}}
                        </td>
                        <td>
                            {{ $magazine->positions}}
                        </td>
                        <td style="width=10px">
                            <a href="{{ route('magazines.show', $magazine->id) }}" class="btn btn-warning">VER</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
        {!! $magazines->appends($filters)->links() !!}
        @else
        {!! $magazines->links() !!}
        @endif
    </div>
</div>
@stop