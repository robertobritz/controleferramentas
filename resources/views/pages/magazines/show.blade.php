@extends('adminlte::page')

@section('title', "Detalhe do Magazine {{ $magazine->id }}")

@section('content_header')
    <h1>Detalhes do Magazine <b>{{ $magazine->id }}</b></h1>

@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>ID: </strong> {{ $magazine->id}}
                </li>
                <li>
                    <strong>Máquina ID: </strong> {{ $magazine->machine_id}}
                </li>
                <li>
                    <strong>Tamanho Magazine: </strong> {{ $magazine->positions}}
                </li>
            </ul>

            @include('pages.includes.alerts')

            <form action="{{ route('magazines.destroy', $magazine->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>DELETAR O PRODUTO {{ $magazine->name}}</button>
            </form>
        </div>
    </div>
@endsection
