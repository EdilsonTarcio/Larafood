@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $key)
            <p>{{ $key }}</p>
        @endforeach
    </div>
@endif
@if (session('deletado'))
    <div class="alert alert-success">
        {{ session('deletado') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif
