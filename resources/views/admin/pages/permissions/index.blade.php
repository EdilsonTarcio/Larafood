@extends('adminlte::page')
@section('title', 'Permissão')
@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('permission.index') }}">Permissão</a></li>
</ol>
    <h1>Permissão <a href="{{ route('permission.create') }}" class="btn btn-dark">ADD</a></h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{ route('permission.search') }}" method="POST" class="form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button type="submit" class="btn btn-dark"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
           </form>
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
                    @foreach ($permission as $permissio_n)
                        <tr>
                            <td>
                                {{ $permissio_n->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('permission.show', $permissio_n->id) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('permission.edit', $permissio_n->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('permission.profiles', $permissio_n->id) }}" class="btn btn-secondary">Profiles</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
          @if (isset($filters))
            {!! $permission->appends($filters)->links() !!}
          @else 
            {!! $permission->links() !!}
          @endif
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