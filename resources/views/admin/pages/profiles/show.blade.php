@extends('adminlte::page')
@section('title', "Detalhes do Perfil {$profile->name}")
@section('content_header')
    <h1>Detalhes do Perfil <b>{{ $profile->name }}</b></h1>
@stop
@section('content')
    <div class="card">
      @include('admin.includes.alerts')
        <div class="card-body">
          <ul>
            <li>
              <strong>Nome: </strong>{{ $profile->name }}
            </li>
            <li>
              <strong>Descrição: </strong>{{ $profile->description }}
            </li>
          </ul>
          <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"  class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Deletar o plano</button>
          </form>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop