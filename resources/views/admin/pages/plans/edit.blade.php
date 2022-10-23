@extends('adminlte::page')
@section('title', "Editando o plano {$plan->name}")
@section('content_header')
    <h1>Editar o plano <b>{{ $plan->name }}</b></h1>
@stop
@section('content')
    <div class="card">
      <div class="card-body">
          <form action="{{ route('plans.update', $plan->url) }}" class="form" method="POST">
            @csrf
            @method('PUT')
            @include('admin.pages.plans._partials.form') {{-- chama o formulario compartilhado entre edit e new --}}
          </form>
      </div>
    </div>
@stop