<table class="table table-hover mt-3 radius-20 table-responsive-sm">
    <thead class="text-center">
        <tr>
            <th>Cashier</th>
            <th>Barcode</th>
            <th>Name</th>
            <th>Price</th>
            <th>Expire Date</th>
            <th>Created At</th>
            <th>Sold At</th>
            <th>Piece</th>
            @if (Request::segment(1) != 'sellers')
            <th>Undo</th>
            @endif
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($solds as $sold)
            <tr>
                <td>{{$sold->cashier->name}}</td>
                <td>
                    @if ($sold->one_store->type == 0)
                    {!!DNS1D::getBarcodeSVG("$sold->store_id", 'C128', 1,33 ,'dark',false)!!}
                    @else
                    {!!DNS2D::getBarcodeSVG("$sold->store_id", 'QRCODE', 1.2,1.2)!!}
                    @endif
                </td>
                <td>{{$sold->one_store->name}}</td>
                <td>{{number_format($sold->one_store->price , 0 ,'.', '.')}} IQD</td>
                <td>{{$sold->one_store->expire_date}}</td>
                <td>{{$sold->one_store->created_at}}</td>
                <td>{{$sold->created_at}}</td>
                <td class="bg-dark text-white border ">{{$sold->piece}}</td>
                @if (Request::segment(1) != 'sellers')
                <td class="bg-danger text-white border" onclick="undo(`{{$sold->id}}`)"> <i class="ion-arrow-return-left"></i> </td>
                @endif
            </tr>
        @endforeach

    </tbody>



</table>
