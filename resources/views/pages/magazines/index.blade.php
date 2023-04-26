@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Magazines <a href="{{ route('magazines.create')}}" class="btn btn-dark">CRIAR MAGAZINE</a></h1> --}}
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('magazines.search')}}"  class="form form-inline">
            @csrf 
            <input type="text" name='filter' placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? ''}}">
            <button type="submit" class="btn btn-dark">Filtrar por Máquina</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
           <thead>
            <tr>
                <th>Posição</th>
                <th>Nomes da Máquina</th>
                <th>Nome Ferramenta</th>
                <th width="250px">Ação</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($magazines as $magazine)
                    <tr>
                        <td>
                            {{ $magazine->position}}
                        </td>
                        <td>
                            {{ $magazine->machine_name }}
                        </td>
                        <td>
                            {{ $magazine->tool_name}}
                        </td>
                        <td style="width=10px">
                            {{-- <a href="{{ route('magazines.show', $magazine->id) }}" class="btn btn-warning">VER</a> --}}
                            @if ($magazine->tool_name == null)
                            <a href="{{ route('magazines.addTool', $magazine->id) }}" class="btn btn-info">AddFerramenta</a>
                            @else
                            <a href="{{ route('magazines.addTool', $magazine->id) }}" class="btn disabled">AddFerramenta</a>    
                            @endif

                            
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
<div class="card-footer">
    
</div>
@stop