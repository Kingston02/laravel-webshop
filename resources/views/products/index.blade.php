@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($products as $prod)

                <div class="card my-4">
                    <div class="card-header">{{ $prod->name }}</</div>

                    <a href='product/{{ $prod->id }}'>
                        <div class="card-body">
                            <img src="{{ $prod->image_url }}" style='width:100px;'>
                        </div>
                    </a>

                </div>

            @endforeach
            
        </div>
    </div>
</div>
@endsection
