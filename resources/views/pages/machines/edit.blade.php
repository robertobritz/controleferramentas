@extends('adminlte::page')

@section('title', "Editar a Máquina {$machine->name}")

@section('content_header')
    <h1>Editar a Máquina {{$machine->name}}</h1>

@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('machines.update', $machine->id) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('pages.machines.__partials.form')
        </div>
    </div>
@endsection