@extends('adminlte::page')
@section('title', "Cadastrar editar Perfil {$profile->name}")
@section('content_header')
    <h1>Editar o Plano <b>{{ $profile->name }}</b></h1>
@stop
@section('content')
    <div class="card">
      <div class="card-body">
          <form action="{{ route('profiles.update', $profile->id) }}" class="form" method="POST">
            @method('PUT')
            @include('admin.pages.profiles._partials.form') {{-- chama o formulario compartilhado entre edit e new --}}
          </form>
      </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="sweetalert2.min.css">
@stop
@section('js')
    <script src="sweetalert2.min.js"></script>
@stop