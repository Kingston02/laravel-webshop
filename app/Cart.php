<?php
namespace App;
use App\Product;
use App\Products;
use Illuminate\Http\Request;

class Cart
{
    public $items = [];
    public $sessionQty = 0;
    public $totalPrice = 0;

    /**
     * Check if cart items in session.
     */
    public function __construct(Request $request)
    {
        if($request->session()->has('cart') == True){
            $oldCart = $request->session()->get('cart');
        } else {
            $oldCart = null;
        }

        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->sessionQty = $oldCart->sessionQty;
            $this->totalPrice = $oldCart->totalPrice;
        }

        $this->save();
    }

    /**
     * Save func
     */
    public function save() {
        if (count($this->items) > 0) {
            session()->put('cart', $this);
        } else {
            session()->forget('cart');
        }
    }

    /**
     * Add a product to cart
     */
    public function addToCart($item, $productId){
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($productId, $this->items)) {
                $storedItem = $this->items[$productId];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$productId] = $storedItem;
        $this->sessionQty++;
        $this->totalPrice += $item->price;

        $this->save();
    }

    /**
     * Get the items that
     */
    public function getCart($itemsId, $totalPrice){
        if(count($itemsId) > 0){
            $productIdArr = [];
            foreach(array_keys($itemsId) as $productId){
                array_push($productIdArr, $productId);
            }
            $products = Product::whereIn('id', $productIdArr)->get();
        }

        return ['items' => $products, 'priceTot' => $totalPrice];
    }

    /**
     * Update qty from cart
     */
    public function updateCart($productId, $qtyNew){

        $qtyOld = $this->items[$productId]['qty'];
        $priceTot = $this->items[$productId]['price'];
        //Calculate price for this product qty
        $pricePs = $priceTot / $qtyOld;
        //oldcart qty * price
        $oldCartTot = $pricePs * $qtyOld;
        //newcart qty * price
        $newPrieTot = $pricePs * intval($qtyNew);
        $removeCartTot = $this->totalPrice -= $oldCartTot;
        //totaal price + totaal product qty
        $newPricingTot = $this->totalPrice + $newPrieTot;
        $this->items[$productId]['price'] = $newPrieTot;
        $this->items[$productId]['qty'] = intval($qtyNew);
        //change total price to new generated total price
        $this->totalPrice = $newPricingTot;

        $this->save();
    }

    /**
     * Remove item from cart
     */
    public function removeCart($productId){
        $qty = $this->items[$productId]['qty'];
        $price = $this->items[$productId]['price'];
        $itemTotPrice = $qty * $price;
        $this->totalPrice -= $itemTotPrice;
        unset($this->items[$productId]);
        $this->sessionQty -= 1;

        $this->save();
    }

    /**
     * Get the items that
     */
    public function checkout(){
        if(count($itemsId) > 0){
            $productIdArr = [];
            foreach(array_keys($itemsId) as $productId){
                array_push($productIdArr, $productId);
            }
            $products = Product::whereIn('id', $productIdArr)->get();
        }

        return ['items' => $products, 'priceTot' => $totalPrice];
    }

}