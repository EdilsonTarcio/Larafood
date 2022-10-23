@include('admin.includes.alerts')
<div class="form-group">
  <label>Nome de Plano</label>
  <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $plan->name ?? old('name') }}" required>
</div>   {{-- Verifica se a variavel existe se não não imprime ?? '' validação necessaria para o metodo criate --}} {{-- old('name') caso de falha retorna os dados --}}
<div class="form-group">
  <label>Preço de Plano</label>
  <input type="text" name="price" class="form-control" placeholder="Preço:" value="{{ $plan->price ?? old('price')}}" required>
</div>                      {{-- Verifica se a variavel existe se não não imprime ?? '' validação necessaria para o metodo criate --}}
<div class="form-group">
  <label>Descrição de Plano</label>
  <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $plan->description ?? old('description')}}" required>
</div>                      {{-- Verifica se a variavel existe se não não imprime ?? '' validação necessaria para o metodo criate --}}
<div class="form-group">
  <button type="submit" class="btn btn-primary">Enviar</button>
</div>
{{-- formulario compartilhado entre edit e new --}}