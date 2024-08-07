@extends('Layout.layout')

@section('content')

@include('Layout.Card')


<div class="d-flex justify-content-center mt-2">
    {{$store->links()}}
</div>


@endsection
