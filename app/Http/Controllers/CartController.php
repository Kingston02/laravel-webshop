<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;
use App\Product;
use App\Order;
use Auth;

class CartController extends Controller
{
    /**
     * addToCart function send request and productId
     */
    public function addToCart(Request $request, $productId){
        // Trying to get product from the database with the eloquent method 'find'
        $product = Product::find($productId);
        /* Check if cart already exists.
        If the cart does exist it wil retrieve it.
        If the cart does not exist, it will be null */
        $cart = new Cart($request);
        $cart->addToCart($product, $product->id);

        $request->session()->put('cart.index', $cart);

        return view('cart.index');
    }

    public function getModelProd($productIdArr){
       $products = Product::whereIn('id', $productIdArr)->get();
       return $products;
    }

    /**
     * getCart function get the products en return them with view to the cart
     */
    public function getCart(Request $request) {
        // dd($request->session()->has('cart'));
        if ( ! $request->session()->has('cart'))
        {
            return view('cart.index');
        }
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);

        return view('cart.index', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    /**
     * Updatecart function uppdates the qty of a product
     */
    public function updateCart(Request $request){
        $qty = $request->input('qty');
        $productId = $request->input('productId');
        $cart = new Cart($request);
        $cart->updateCart($productId,$qty);
        return redirect()->to('cart.index');
    }
    
    /**
     * removeCart function removes a specifically product trough the product id 
     */
    public function removeCart(Request $request, $productId){
        $cart = new Cart($request);
        $cart->removeCart($productId);
        return redirect()->to('cart');
    }

    /**
     * checkout function go to checkout page
     */
    public function checkout(Request $request){
        if (!$request->session()->has('cart')) {
            return view('checkout.index', ['products' => null]);
        }
        $cart = new Cart($request);
        $cart->getCart($cart->items, $cart->totalPrice);
        Auth::user();
        return view('checkout.index', ['items' => $cart->items, 'priceTot' => $cart->totalPrice]);
    }

    /**
     * order submit function stores the order in the DB and redirect to orderPlaced page
     */
    public function orderSubmit(Request $request){
        $cart = new Cart($request);
        $order = new Order();
        $order->cart = json_encode($cart->items);
        dd(json_decode($order->cart));
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        $idCust = $request->session()->all()['_token'];
        $order->cust_id = $idCust;
        $order->save();

        $request->session()->forget('cart');

        return redirect()->route('home');
    }
    
    public function viewOrder(Request $request){
        Auth::user();
        $idCust = $request->session()->all()['_token'];
        $orderArr = [$idCust];
        $products = Order::whereIn('cust_id', $orderArr)->get('cart')->all()[0];
        $arrItems = json_decode($products->cart);
        dd($arrItems);
        return view('order-view.index', ['items' => $arrItems->items, 'priceTot' => $arrItems->totalPrice]);
    }
}