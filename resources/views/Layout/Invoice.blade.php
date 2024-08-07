<div class="text-center p-2 radius-20 shadow ">
    <br>
    <img src="{{asset('assets/img/shop.png')}}" width="100" alt="">
    <br>
    <br>
    @foreach ($sold as $item )
    <div class="row">
        <div class="col"><small>{{$item->one_store->name}}</small></div>
        <div class="col"><small>{{$item->piece}}</small></div>
        <div class="col"><small>{{number_format($item->piece * $item->price_at , 0,'.','.')}} IQD</small></div>
    </div>
    @endforeach


    @php
    $sum = 0;

     for ($i=0; $i <count($sold) ; $i++) {
        $k = $sold[$i]['price_at'] * $sold[$i]['piece'];
        $sum += $k;
     }

    @endphp
<span class="btn btn-success mt-3 radius-20">All Money: {{number_format($sum, 0,'.','.')}} IQD</span>
</div>
<a href="clean" class="btn btn-danger mt-3 radius-20 w-100">Clean</a>
