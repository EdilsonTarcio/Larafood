@extends('adminlte::page')
@section('title', 'Planos')
@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
</ol>
    <h1>Planos <a href="{{ route('plans.new') }}" class="btn btn-dark">ADD</a></h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{ route('plans.search') }}" method="POST" class="form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Filter" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button type="submit" class="btn btn-dark"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
           </form>
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>
                              R$ {{ number_format($plan->price, 2, ',', '.') }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('details.index', $plan->url) }}" class="btn btn-primary">Detalhes</a>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">Ver</a>
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
    <link rel="stylesheet" href="sweetalert2.min.css">
@stop
@section('js')
    <script src="sweetalert2.min.js"></script>
@stop