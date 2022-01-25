@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">Checkout page:</div>

                @foreach($orders as $order)
                    <ul>
                        <div class="form-row">
                        @foreach($order->cart->items as $order)
                            <h4 class='items-group'>{{ $item['name'] }}</h4>
                            @endforeach
                        </div>
                    </ul>
                @endforeach

                <hr>

            </div>
        </div>
    </div>
</div>
</div>
@endsection