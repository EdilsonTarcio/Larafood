@if ($errors->any())
    <div class="alert alert-danger">
      @foreach($errors->all() as $key)
        <p>{{ $key }}</p>        
      @endforeach
    </div>
@endif
