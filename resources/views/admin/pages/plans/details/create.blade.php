@extends('adminlte::page')
@section('title', "Adicionar novo detalhe ao plano {$plan->name}")
@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item "><a href="{{ route('details.index', $plan->url) }}"></a>Datalhes</a>
        <li class="breadcrumb-item active"><a href="{{ route('details.create', $plan->url) }}" class="active"></a>Novo</a>
        </li>
    </ol>
    <h1>Adicionar novo detalhe ao plano {{ $plan->name }}</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('details.store', $plan->url) }}" method="POST">
              @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop
