<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">Checkout page:</div>

                @foreach($items as $item)
                    <p>{{ $item-> }}</p>
                    <ul>
                        <div class="form-row">
                            <h4 class='items-group'>{{ $item }}</h4>
                        </div>
                    </ul>
                @endforeach

                <hr>
                Totaal prijs: €{{ $priceTot }},-
            </div>
        </div>
    </div>
</div>
</div>
@endsection -->