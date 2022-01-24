@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">Winkelmandje:</</div>
                @if(isset($items))
                        @foreach($items as $item)
                            <div class="card my-4" style='padding:40px;'>
                                <ul>
                                    <img src="{{ $item->image_url }}" style='width:100px;position:relative;'>
                                    <h2>{{ $item->name }}</h2>
                                    <p>{{ $item->description }}</p>
                                    <p>€{{ $item->price }},-</p>
                                </ul>

                                <div class="btn-group">
                                    <form method="GET" action="{{ route('update-cart') }}">
                                    {{csrf_field()}}
                                        <input type="number" id="quantity" name="qty" min="1" max="100" value="{{ $item->id }}">
                                        <input type="hidden" name="productId" value="{{ $item->id }}">
                                        <button type='submit' class="btn btn-primary">Update quantity</button>
                                    </form>
                                    <a href="{{ url('removeCart/'.$item->id) }}" class="btn btn-danger">Remove Item</a>
                                </div>
                            </div>
                        @endforeach
                    
                    <hr>
                    <br>
                    <h3>Total price: €{{ $totalPrice }},-</h3>
                    <a href="{{ url('checkout') }}" class="btn btn-warning">Checkout</a>
                    @else
                    <h3>Voeg producten toe</h3>
                    <a class="btn btn-primary" href='/category'>Producten overzicht</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
