@if ($errors->any())
    <div class="alert alert-warning">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach 
    </div>  
@endif
@csrf
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{ $machine->description ?? old('description')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
