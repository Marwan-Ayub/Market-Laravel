<div class="row justify-content-center ">
    @foreach ($store as $stor)
    <div class="card text-center m-1 radius-20 bg-light">
        <div class="mt-3">
            @if ($stor->type == 0)
            {!!DNS1D::getBarcodeSVG("$stor->id", 'C128', 1,53 ,'black',true)!!}
            @else
            {!!DNS2D::getBarcodeSVG("$stor->id", 'QRCODE')!!}
            @endif
        </div>
        <div class="card-body text-left ">
            @if ($stor->is_debt == 1)
            <span class="btn btn-warning radius-20 m-2  position-absolute" style="top: 0;left:0;" >Debt !</span>
            @endif
            <p class="card-title">Barcode : {{$stor->id}}</p>
            <p class="card-title">Name Store : {{$stor->name}}</p>
            <p class="card-title">Supplier : {{$stor->one_supplier->company_name}}</p>
            <p class="card-title">Count : {{$stor->count}}</p>
            <p class="card-title">Price : {{number_format($stor->price , 0 ,'.', '.')}} IQD</p>
            <p class="card-title">Expire : {{$stor->expire_date}}</p>
            <p class="card-title">Create At : {{$stor->created_at}}</p>

            @if (Auth::user()->rule == '1')
            <span class="btn btn-success mt-1" data-toggle="modal" data-target="#y{{$stor->id}}">Edit</span>
            <span class="btn btn-danger mt-1" data-toggle="collapse" data-target="#x{{$stor->id}}">
                Delete
            </span>

            {{-- Delete --}}
            <div class="collapse mt-2" id="x{{$stor->id}}">
                <p class="text-danger"> You Want to Delete {{$stor->name}} ?</p>
                <form action="buy/1/{{$stor->id}}" method="POST">
                    @csrf
                    <button class="btn btn-danger radius-20 mt-1 w-100">Yes</button>
                </form>
            </div>

            {{-- Edit --}}
            <div class="modal fade" id="y{{$stor->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="y{{$stor->id}}">Edit Store</h5>
                        </div>
                        <div class="modal-body">
                            <form action="buy/2/{{$stor->id}}" method="POST">
                                @csrf

                                <div class="row text-center justify-content-center mt-3">

                                    <div class="col col-lg-4 col-12">
                                        <label>Barcode Store</label><br>
                                        <input name="id" type="text" value="{{$stor->id}}"
                                            placeholder="Barcode" class="p-2 bg-light border text-left w-100 radius-20"
                                            required>
                                    </div>

                                    <div class="col col-lg-4 col-12">
                                        <label>Name Store</label><br>
                                        <input name="name" type="text" value="{{$stor->name}}"
                                            placeholder="Name" class="p-2 bg-light border text-left w-100 radius-20"
                                            required>
                                    </div>
                                    <div class="col col-lg-4 col-12">
                                        <label>Supplier</label><br>
                                        <select name="supplier_id" class="p-2 bg-light border text-left w-100 radius-20">
                                            {{-- <option style="" value="{{$sup->id}}"> {{$sup->company_name}} </option> --}}
                                            @foreach ($supplier as $sup)
                                            <option value="{{$sup->id}}"> {{$sup->company_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col col-lg-4 col-12 mt-4">
                                        <label>Count Store</label><br>
                                        <input name="count" type="number" value="{{$stor->count}}"
                                            placeholder="Count"
                                            class="p-2 bg-light border text-left w-100 radius-20" required>
                                    </div>

                                    <div class="col col-lg-4 col-12  mt-4">
                                        <label>Price Store</label><br>
                                        <input name="price" type="text" value="{{$stor->price}}"
                                            placeholder="Price"
                                            class="p-2 bg-light border text-left w-100 radius-20" required>
                                    </div>

                                    <div class="col col-lg-4 col-12  mt-4">
                                        <label>Expire Store</label><br>
                                        <input name="expire_date" type="date" value="{{$stor->expire_date}}"
                                            class="p-2 bg-light border text-left w-100 radius-20" required>
                                    </div>

                                    <div class="col col-lg-4 col-12  mt-4">
                                        <label>Is Debt</label><br>
                                        <select name="is_debt" class="p-2 bg-light border text-left w-100 radius-20">
                                            @if ($stor->is_debt == 0)
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            @else
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col col-lg-4 col-12  mt-4">
                                        <label>Type</label><br>
                                        <select name="type" class="p-2 bg-light border text-left w-100 radius-20">
                                            @if ($stor->type == 0)
                                                <option value="0">Barcode</option>
                                                <option value="1">QRcode</option>
                                            @else
                                                <option value="1">QRcode</option>
                                                <option value="0">Barcode</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-4 text-center">
                                    <button
                                        class="btn btn-success border w-50 radius-20 col col-lg-4 col-12">Edit
                                    </button>
                                </div>


                            </form>

                        </div>

                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
    @endforeach
</div>
