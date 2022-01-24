@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($products as $prod)

                <div class="card my-4" style='padding:40px;'>

                    <img src="{{ $prod->image_url }}" style='width:300px;position:relative;'>
                    <h1>{{ $prod->name }}</h1>
                    <p>{{ $prod->description }}</p>
                    <h1>€{{ $prod->price }},-</h1>
                    
                    <p class="btn-holder"><a href="{{ url('add-to-cart/'.$prod->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                </div>

            @endforeach
            
        </div>
    </div>
</div>
@endsection
