@extends('adminlte::page')

@section('title', 'Cadastrar Nova Ferramenta')

@section('content_header')
    <h1>Cadastrar Nova Ferramenta</h1>

@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tools.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                
                @include('pages.tools.__partials.form')
        </div>
    </div>
@endsection