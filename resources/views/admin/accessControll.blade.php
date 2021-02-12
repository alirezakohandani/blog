@extends('admin.admin')

@section('content')
    @if(\Gate::allows('access-controll'))
        hey

    @else
        dont permison    
    @endif
@endsection