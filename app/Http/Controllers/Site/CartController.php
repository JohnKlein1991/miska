<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Models\GoodsModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = GoodsModel::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new CartModel($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function removeFromCart(Request $request, $id)
    {
        $product = GoodsModel::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if(!$oldCart){
            return redirect()->back();
        }
        $cart = new CartModel($oldCart);
        $cart->remove($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function removeAllByIdFromCart(Request $request, $id)
    {
        $product = GoodsModel::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if(!$oldCart){
            return redirect()->back();
        }
        $cart = new CartModel($oldCart);
        $cart->removeAllById($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function showCart()
    {
        if(!Session::has('cart')){
            return view('site.cart.show', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new CartModel($oldCart);
        return view('site.cart.show', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}