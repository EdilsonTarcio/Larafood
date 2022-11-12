@extends('adminlte::page')
@section('title', "Detalhes da Permissão {$permission->name}")
@section('content_header')
    <h1>Detalhes da Permissão <b>{{ $permission->name }}</b></h1>
@stop
@section('content')
    <div class="card">
      @include('admin.includes.alerts')
        <div class="card-body">
          <ul>
            <li>
              <strong>Nome: </strong>{{ $permission->name }}
            </li>
            <li>
              <strong>Descrição: </strong>{{ $permission->description }}
            </li>
          </ul>
          <form action="{{ route('permission.destroy', $permission->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"  class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Deletar a Parmissão</button>
          </form>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop