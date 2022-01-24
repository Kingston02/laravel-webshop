@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">Checkout page:</div>

                    <form method="GET" action="{{ route('order-submit') }}" style='margin:30px;'>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" name='name' class="form-control" id="inputName4" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Email</label>
                            <input type="email" name='email' class="form-control" id="inputPassword4" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" name='address' class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <hr>

                        @foreach($items as $item)
                        <ul>
                        <div class="form-row">
                            <h4 class='items-group'>{{ $item['item']['name'] }} ______</h4>
                            <h4 class='items-group'><b> X{{ $item['qty'] }} ______</b> </h4>
                            <h4 class='items-group'>€{{ $item['item']['price'] }},-</h4>
                            </div>
                        </ul>
                        @endforeach
                        <hr>
                        Totaal prijs: €{{ $priceTot }},-
                        <br>
                        <button type="submit" class="btn btn-primary">Place order</button>
                        <img src='https://wempewempe.nl/wp-content/uploads/2017/08/iDeal-logo-1.png' style='width:90px;'>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
