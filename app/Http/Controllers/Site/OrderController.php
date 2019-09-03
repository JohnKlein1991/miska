<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function showForm()
    {
        if (!Session::has('cart')) {
            return redirect()->route('main');
        }
        $oldCart = Session::get('cart');
        $cart = new CartModel($oldCart);
        $totalPrice = $cart->totalPrice;
        $products = $cart->items;
        return view('site.order.form', compact('products', 'totalPrice'));
    }

    public function placeOrder(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('main');
        }
        $oldCart = Session::get('cart');
        $cart = new CartModel($oldCart);
        $order = new OrderModel();
        $order->cart = base64_encode(serialize($cart));
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        if ($order->save()) {
            Session::forget('cart');
            return redirect(route('main'))->with('success', 'Заказ успешно оформлен');
        } else {
            return redirect(route('main'))->with('fail', 'Не удалось оформить заказ. Попробуйте позже');
        }
    }
}