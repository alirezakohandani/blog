@if (session('registred'))
    <div style="color: green">
         register was sucessfull
    </div>
@endif

@if (session('wrongInformation'))
<div style="color: red">
    username or password was wrong
</div>
@endif

@if (session('SuccessComment'))
<div style="color: green">
    comment insert successfully
</div>
@endif
