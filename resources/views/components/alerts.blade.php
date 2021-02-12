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

@if (session('dontSendSms'))
<div style="color: red">
    message dont send
</div>
@endif

@if (session('sendSms'))
<div style="color: green">
    successfully send
</div>
@endif

@if (session('signed'))
<div style="color: green">
    post signed
</div>
@endif

@if (session('dontAllowSign'))
<div style="color: red">
    The post has already been signed
</div>
@endif