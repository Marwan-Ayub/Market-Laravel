@extends('Layout.layout')

@section('content')
<form action="_debtlist_" method="POST">
    @csrf
    <div class="text-left ">

        <select name="supplier_id" class="mr-4 p-2 mt-2 bg-light border border-success text-center w-25 col col-lg-2 col-12 radius-20">
            @foreach ($supplier as $sup)
            <option value="{{$sup->id}}">{{$sup->company_name}}</option>
            @endforeach
        </select>

        <button class="btn btn-success border w-25 radius-20 col col-lg-1 col-12">Search</button>

    </div>
</form>

<div style="margin-top:100px">

    @include('Layout.Card')

</div>

<div class="d-flex justify-content-center mt-2">
    {{$store->links()}}
</div>


@endsection
