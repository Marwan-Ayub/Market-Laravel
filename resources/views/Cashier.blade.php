
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

    <form action="cashier/0/0" method="POST">
        @csrf
        <div class="row text-center justify-content-center">

            <div class="col col-lg-4 col-12">
                <label>Name Cashier</label><br>
                <input name="name" type="text" placeholder="Name" class="p-2 bg-light border text-left w-100 radius-20"
                    required>
            </div>
            <div class="col col-lg-4 col-12">
                <label>Email Cashier</label><br>
                <input name="email" type="email" placeholder="Email"
                    class="p-2 bg-light border text-left w-100 radius-20" required>
            </div>
            <div class="col col-lg-4 col-12">
                <label>Password Cashier</label><br>
                <input name="password" type="password" placeholder="Password"
                    class="p-2 bg-light border text-left w-100 radius-20" required>
            </div>

            <div class="col col-lg-4 col-12  mt-4">
                <label>Rule Cashier</label><br>
                <select name="rule" class=" bg-light p-2 radius-20 w-100 border">
                    <option value="0">Cashier</option>
                    <option value="1">Admin</option>
                </select>
            </div>
        </div>
        <div class="mt-4 text-center">
            <button class="btn btn-success border w-50 radius-20 col col-lg-4 col-12">Submit</button>
        </div>
    </form>
    <hr>
    <div class="row justify-content-center text-center ">
        @foreach ($cashiers as $cashier)
        <div class="card bg-light radius-20 m-3">
            <i class="ion-person display-3 text-success"></i>
            <div class="card-body">
                <p class="card-title">Name : {{$cashier->name}}</p>
                <p class="card-title">Email : {{$cashier->email}}</p>
                <p class="card-title">Rule : {{$cashier->rule == 0?'Cashier':'Admin'}} </p>

                {{-- <span class="btn btn-success" data-toggle="modal" data-target="#y{{$cashier->id}}">Edit</span> --}}
                @if ($cashier->email != Auth::user()->email)
                    <span class="btn btn-danger" data-toggle="collapse" data-target="#x{{$cashier->id}}">
                        Delete
                    </span>
                @endif


                {{-- Delete --}}
                <div class="collapse mt-2" id="x{{$cashier->id}}">
                    <p class="text-danger"> You Want to Delete {{$cashier->name}} ?</p>
                    <form action="cashier/1/{{$cashier->id}}" method="POST">
                        @csrf
                        <button class="btn btn-danger radius-20 mt-1 w-100">Yes</button>
                    </form>
                </div>

                {{-- Edit --}}
                {{-- <div class="modal fade " id="y{{$cashier->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="y{{$cashier->id}}">Edit Supplier</h5>
                            </div>
                            <div class="modal-body">
                                <form action="cashier/2/{{$cashier->id}}" method="POST">
                                    @csrf

                                    <div class="row text-center justify-content-center mt-3">

                                        <div class="col col-lg-4 col-12">
                                            <label>Name Cashier</label><br>
                                            <input name="name" type="text" value="{{$cashier->name}}"
                                                placeholder="Name" class="p-2 bg-light border text-left w-100 radius-20"
                                                required>
                                        </div>
                                        <div class="col col-lg-4 col-12">
                                            <label>Email Cashier</label><br>
                                            <input name="email" type="email" value="{{$cashier->email}}" placeholder="Email"
                                                class="p-2 bg-light border text-left w-100 radius-20" required>
                                        </div>

                                        <div class="col col-lg-4 col-12">
                                            <label>Password</label><br>
                                            <input name="password" type="password" value="{{$cashier->password}}"
                                            placeholder="Password"
                                            class="p-2 bg-light border text-left w-100 radius-20" required>
                                        </div>


                                        <div class="col col-lg-4 col-12  mt-4">
                                            <label>Rule Cashier</label><br>
                                            <select name="rule" class=" bg-light p-2 radius-20 w-100 border">
                                                <option value="0">Cashier</option>
                                                <option value="1">Admin</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="mt-4 text-center">
                                        <button class="btn btn-success border w-50 radius-20 col col-lg-4 col-12">Edit</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection

{{--
<div class="col col-lg-4 col-12">
    <label>Supplier</label><br>
    <select name="rule" class="p-2 bg-light border text-left w-100 radius-20">
        <option style="" value="{{$sup->id}}"> {{$sup->company_name}} </option>
        @foreach ($cashier as $cash)
        <option value="{{$cash->rule}}"> {{$cash->name}} </option>
        @endforeach
    </select>
</div> --}}

