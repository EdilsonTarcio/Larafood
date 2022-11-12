@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label>* Nome da Permissão</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" 
        value="{{ $permission->name ?? old('name') }}" required>
</div> {{-- Verifica se a variavel existe se não não imprime ?? '' validação necessaria para o metodo criate --}} {{-- old('name') caso de falha retorna os dados --}}
{{-- Verifica se a variavel existe se não não imprime ?? '' validação necessaria para o metodo criate --}}
<div class="form-group">
    <label>Descrição da Permissão</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição:"
        value="{{ $permission->description ?? old('description') }}" required>
</div> {{-- Verifica se a variavel existe se não não imprime ?? '' validação necessaria para o metodo criate --}}
<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
{{-- formulario compartilhado entre edit e new --}}
