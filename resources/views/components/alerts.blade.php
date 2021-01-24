@if (session('registred'))
    <div style="color: green">
         register was sucessfull
    </div>
@endif

@if (session('failed'))
    failed
@endif