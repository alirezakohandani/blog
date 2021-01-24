@if ($errors->any())
@foreach ($errors->all() as $error)
    <div style="color: red">
        {{ $error }}
    </div>    
@endforeach
@endif