@extends('adminlte::page')
@section('title', 'Cadastrar Novo Plano')
@section('content_header')
    <h1>Castro de Plano</h1>
@stop
@section('content')
    <div class="card">
      <div class="card-body">
          <form action="{{ route('plans.store') }}" class="form" method="POST">
            @csrf
            <div class="form-group">
              <label>Nome de Plano</label>
              <input type="text" name="name" class="form-control" placeholder="Nome:" required>
            </div>
            <div class="form-group">
              <label>Preço de Plano</label>
              <input type="text" name="price" class="form-control" placeholder="Preço:" required>
            </div>
            <div class="form-group">
              <label>Descrição de Plano</label>
              <input type="text" name="description" class="form-control" placeholder="Descrição:" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </form>
      </div>
    </div>
@stop