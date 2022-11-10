@extends('adminlte::page')
@section('title', 'Cidades')
@section('content_header')
@stop
@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cidades as $cidade)
                        <tr>
                            <td>
                                {{ $cidade->nome }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('profiles.show', $cidade->id) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('profiles.edit', $cidade->id) }}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="sweetalert2.min.css">
@stop
@section('js')
    <script src="sweetalert2.min.js"></script>
@stop