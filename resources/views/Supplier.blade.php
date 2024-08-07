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

    <form action="supplier/0/0" method="POST">
        @csrf
        <div class="row text-center justify-content-center ">

            <div class="col col-lg-4 col-12">
                <label>Company Name</label><br>
                <input name="name" type="text" placeholder="Name" class="p-2 bg-light border text-left w-100 radius-20"
                    required>
            </div>
            <div class="col col-lg-4 col-12">
                <label>Email Supplier</label><br>
                <input name="email" type="email" placeholder="Email"
                    class="p-2 bg-light border text-left w-100 radius-20" required>
            </div>
            <div class="col col-lg-4 col-12">
                <label>Address Supplier</label><br>
                <input name="address" type="text" placeholder="Address"
                    class="p-2 bg-light border text-left w-100 radius-20" required>
            </div>

            <div class="col col-lg-4 col-12  mt-4">
                <label>Phonenumber Supplier</label><br>
                <input name="phonenumber" type="number" placeholder="Phonenumber"
                    class="p-2 bg-light border text-left w-100 radius-20" required>
            </div>
        </div>
        <div class="mt-4 text-center">
            <button class="btn btn-success border w-50 radius-20 col col-lg-4 col-12">Submit</button>
        </div>
    </form>
    <hr>
    <div class="row justify-content-center text-center ">
        @foreach ($supplier as $sup)
        <div class="card bg-light radius-20 m-1">
            <i class="ion-person display-3 text-success"></i>
            <div class="card-body">
                <p class="card-title">Name : {{$sup->company_name}}</p>
                <p class="card-title">Email : {{$sup->email}}</p>
                <p class="card-title">Address : {{$sup->address}}</p>
                <p class="card-title">Phonenumber : {{$sup->phonenumber}}</p>

                <span class="btn btn-success" data-toggle="modal" data-target="#y{{$sup->id}}">Edit</span>
                <span class="btn btn-danger" data-toggle="collapse" data-target="#x{{$sup->id}}">
                    Delete
                </span>

                {{-- Delete --}}
                <div class="collapse mt-2" id="x{{$sup->id}}">
                    <p class="text-danger"> You Want to Delete {{$sup->company_name}} ?</p>
                    <form action="supplier/1/{{$sup->id}}" method="POST">
                        @csrf
                        <button class="btn btn-danger radius-20 mt-1 w-100">Yes</button>
                    </form>
                </div>

                {{-- Edit --}}
                <div class="modal fade " id="y{{$sup->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="y{{$sup->id}}">Edit Supplier</h5>
                            </div>
                            <div class="modal-body">
                                <form action="supplier/2/{{$sup->id}}" method="POST">
                                    @csrf

                                    <div class="row text-center justify-content-center mt-3">

                                        <div class="col col-lg-4 col-12">
                                            <label>Name Supplier</label><br>
                                            <input name="name" type="text" value="{{$sup->company_name}}"
                                                placeholder="Name" class="p-2 bg-light border text-left w-100 radius-20"
                                                required>
                                        </div>
                                        <div class="col col-lg-4 col-12">
                                            <label>Email Supplier</label><br>
                                            <input name="email" type="email" value="{{$sup->email}}" placeholder="Email"
                                                class="p-2 bg-light border text-left w-100 radius-20" required>
                                        </div>
                                        <div class="col col-lg-4 col-12">
                                            <label>Address Supplier</label><br>
                                            <input name="address" type="text" value="{{$sup->address}}"
                                                placeholder="Address"
                                                class="p-2 bg-light border text-left w-100 radius-20" required>
                                        </div>

                                        <div class="col col-lg-4 col-12  mt-4">
                                            <label>Phonenumber Supplier</label><br>
                                            <input name="phonenumber" type="number" value="{{$sup->phonenumber}}"
                                                placeholder="Phonenumber"
                                                class="p-2 bg-light border text-left w-100 radius-20" required>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <button
                                            class="btn btn-success border w-50 radius-20 col col-lg-4 col-12">Edit</button>
                                    </div>


                                </form>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endforeach

    </div>


</div>
@endsection
