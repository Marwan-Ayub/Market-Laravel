@extends('Layout.layout')

@section('content')

<div class="row justify-content-lg-start m-3">
    @foreach ($lists as $key => $value)
    <span class="btn btn-success m-2">{{$key}} : {{$value}}</span>
    @endforeach

</div>

@include('Layout.Table')




@endsection
