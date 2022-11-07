@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label>* Nome do Perfil</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" 
        value="{{ $profile->name ?? old('name') }}">
</div> {{-- Verifica se a variavel existe se não não imprime ?? '' validação necessaria para o metodo criate --}} {{-- old('name') caso de falha retorna os dados --}}
{{-- Verifica se a variavel existe se não não imprime ?? '' validação necessaria para o metodo criate --}}
<div class="form-group">
    <label>Descrição de Perfil</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição:"
        value="{{ $profile->description ?? old('description') }}">
</div> {{-- Verifica se a variavel existe se não não imprime ?? '' validação necessaria para o metodo criate --}}
<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
{{-- formulario compartilhado entre edit e new --}}
