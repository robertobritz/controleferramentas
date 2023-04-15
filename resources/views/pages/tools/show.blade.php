@extends('adminlte::page')

@section('title', "Detalhe da Ferramenta {{ $tool->name }}")

@section('content_header')
    <h1>Detalhes da Ferramenta <b>{{ $tool->name }}</b></h1>

@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $tool->name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $tool->description}}
                </li>
                <li>
                    <strong>Codigo Sistema: </strong> {{ $tool->code_system}}
                </li>
                <li>
                    <strong>Fornecedor: </strong> {{ $tool->supplier}}
                </li>
            </ul>

            @include('pages.includes.alerts')

            <form action="{{ route('tools.destroy', $tool->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-lock"></i>DELETAR O PRODUTO {{ $tool->name}}</button>
            </form>
        </div>
    </div>
@endsection
