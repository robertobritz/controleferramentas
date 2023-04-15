@extends('adminlte::page')

@section('title', "Detalhe da Máquina {{ $machine->name }}")

@section('content_header')
    <h1>Detalhes da Máquina <b>{{ $machine->name }}</b></h1>

@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $machine->name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $machine->description}}
                </li>
            </ul>

            @include('pages.includes.alerts')

            <form action="{{ route('machines.destroy', $machine->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-lock"></i>DELETAR O PRODUTO {{ $machine->name}}</button>
            </form>
        </div>
    </div>
@endsection
