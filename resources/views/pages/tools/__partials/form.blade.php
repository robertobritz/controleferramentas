@include('pages.includes.alerts')
@csrf
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{ $tool->description ?? old('description')}}">
</div>
<div class="form-group">
    <label>Código do Sistema:</label>
    <input type="text" name="code_system" class="form-control" placeholder="Descrição" value="{{ $tool->code_system ?? old('code_system')}}">
</div>
<div class="form-group">
    <label>Fornecedor:</label>
    <input type="text" name="supplier" class="form-control" placeholder="Descrição" value="{{ $tool->supplier ?? old('supplier')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
