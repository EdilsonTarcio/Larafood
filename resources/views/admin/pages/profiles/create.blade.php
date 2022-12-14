@extends('adminlte::page')
@section('title', 'Cadastrar Novo Perfil')
@section('content_header')
    <h1>Castro de Perfis</h1>
@stop
@section('content')
    <div class="card">
      <div class="card-body">
          <form action="{{ route('profiles.store') }}" class="form" method="POST">
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