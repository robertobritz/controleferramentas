@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ferramentas <a href="{{ route('tools.create')}}" class="btn btn-dark">ADD FERRAMENTA</a></h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('tools.search')}}"  class="form form-inline">
            @csrf 
            <input type="text" name='filter' placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? ''}}">
            <button type="submit" class="btn btn-dark">Filtrar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
           <thead>
            <tr>
                <th>Image</th>
                <th>Descrição</th>
                <th>Código Sistema</th>
                <th>Fornecedor</th>
                <th width="250px">Ação</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($tools as $tool)
                    <tr>
                        <td>
                            <img src="{{ url("storage/$tool->image") }}" alt="{{ $tool->description}}" style="max-width: 90px">
                        </td>
                        <td>
                            {{ $tool->description}}
                        </td>
                        <td>
                            {{ $tool->code_system}}
                        </td>
                        <td>
                            {{ $tool->supplier}}
                        </td>
                        <td style="width=10px">
                            <a href="{{ route('tools.edit', $tool->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('tools.show', $tool->id) }}" class="btn btn-warning">VER</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
        {!! $tools->appends($filters)->links() !!}
        @else
        {!! $tools->links() !!}
        @endif
    </div>
</div>
@stop