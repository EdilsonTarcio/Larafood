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
            @include('admin.pages.plans._partials.form') {{-- chama o formulario compartilhado entre edit e new --}}
          </form>
      </div>
    </div>
@stop