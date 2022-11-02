@extends('adminlte::page')
@section('title', "Detalhes do plano {$plan->name}")
@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('details.index', $plan->url) }}" class="active"></a>Datalhes</a></li>
</ol>
    <h1>Detalhes do plano {{ $plan->name }} <br><a href="{{ route('details.create', $plan->url) }}" class="btn btn-dark">ADD Detalhe</a></h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>
                                {{ $detail->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">New</a>
                                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop