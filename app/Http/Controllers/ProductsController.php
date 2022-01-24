<?php

namespace App\Http\Controllers;
use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index($id){
        $products = products::all()->where('id', $id);

        return view('products.index', ['products' => $products]);
    }

}
