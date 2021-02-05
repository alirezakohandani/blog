@extends('admin.admin')
@section('content')
@foreach ($thumbs as $key => $value)
@if ($key == 'null')
 
    <h4>posts without image: {{ $value }} </h4>
    <h4>posts with image : {{ $sum - $value }} </h4>
@endif
   
@endforeach
  @endsection