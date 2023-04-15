@extends('adminlte::page')

@section('title', "Editar a Ferramenta {$tool->name}")

@section('content_header')
    <h1>Editar a Ferramenta {{$tool->name}}</h1>

@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tools.update', $tool->id) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('pages.tools.__partials.form')
        </div>
    </div>
@endsection