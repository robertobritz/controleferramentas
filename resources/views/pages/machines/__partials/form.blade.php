@include('pages.includes.alerts')
@csrf
<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $machine->name ?? old('name')}}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{ $machine->description ?? old('description')}}">
</div>
<div class="form-group">
    <label>Posições Magazine:</label>
    <input type="number" name="positions_magazine" class="form-control" placeholder="Posições Magazine" value="{{ $machine->positions_magazine ?? old('positions_magazine')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
