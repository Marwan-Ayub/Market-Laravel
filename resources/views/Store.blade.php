@extends('Layout.layout')

@section('content')
<div class="container">
    <br>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger"> {{$error}} </div>
    @endforeach
    @endif

    @if (session('Result'))
    <div class="alert alert-warning"> {{session('Result')}}</div>
    @endif

    <form action="buy/0/0" method="POST">
        @csrf
        <div class="row text-center justify-content-center">

            <div class="col col-lg-4 col-12">
                <label>Barcode Store</label><br>
                <input name="id" type="text" placeholder="Code Barcode" class="p-2 bg-light border text-left w-100 radius-20"
                    required>
            </div>

            <div class="col col-lg-4 col-12">
                <label>Name Store</label><br>
                <input name="name" type="text" placeholder="Name" class="p-2 bg-light border text-left w-100 radius-20"
                    required>
            </div>


            <div class="col col-lg-4 col-12">
                <label>Supplier</label><br>
                <select name="supplier_id" class="p-2 bg-light border text-left w-100 radius-20">
                    @foreach ($supplier as $sup)
                    <option value="{{$sup->id}}">{{$sup->company_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col col-lg-4 col-12">
                <label>Count Store</label><br>
                <input name="count" type="number" placeholder="Count" class="p-2 bg-light border text-left w-100 radius-20"
                    required>
            </div>

            <div class="col col-lg-4 col-12 mt-2">
                <label>Price Store</label><br>
                <input name="price" type="text" placeholder="price" class="p-2 bg-light border text-left w-100 radius-20"
                    required>
            </div>

            <div class="col col-lg-4 col-12 mt-2">
                <label>Expire Store</label><br>
                <input name="expire_date" type="date" class="p-2 bg-light border text-left w-100 radius-20" required>
            </div>

            <div class="col col-lg-4 col-12 mt-2">
                <label>Is Debt</label><br>
                <select name="is_debt" class="p-2 bg-light border text-left w-100 radius-20">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>

            <div class="col col-lg-4 col-12 mt-2">
                <label>Type</label><br>
                <select name="type" class="p-2 bg-light border text-left w-100 radius-20">
                    <option value="0">Barcode</option>
                    <option value="1">QRcode</option>
                </select>
            </div>

        </div>
        <div class="mt-4 text-center">
            <button class="btn btn-success border w-50 radius-20 col col-lg-4 col-12">Submit</button>
        </div>
    </form>
    <hr>

    @include('Layout.Card')

    <div class="d-flex justify-content-center mt-2">
        {{$store->links()}}
    </div>


</div>



@endsection
