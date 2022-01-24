<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function filter(){
        $category = Categories::where('id',$catId)->first();
        $items = $category->items;
        dd($items);
    }
}
