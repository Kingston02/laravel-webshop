<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id){
        $product = product::all()->where('id', $id);

        return view('product.index', ['products' => $product]);
    }
}
