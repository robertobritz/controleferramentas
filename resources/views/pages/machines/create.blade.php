@extends('adminlte::page')

@section('title', 'Cadastrar Nova Máquina')

@section('content_header')
    <h1>Cadastrar Nova Máquina</h1>

@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('machines.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                
                @include('pages.machines.__partials.form')
        </div>
    </div>
@endsection