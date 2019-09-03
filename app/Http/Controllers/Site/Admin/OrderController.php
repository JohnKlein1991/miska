<?php

namespace App\Http\Controllers\Site\Admin;

use App\Models\OrderModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new OrderModel();
        $list = $model->getAllWithPaginate();
        return view('site.admin.orders.index', compact('list'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = OrderModel::where('id', '=', $id)->first();
        $cart = unserialize(base64_decode($order->cart));
//        dd($cart, $order->totalPrice);
        return view('site.admin.orders.show', compact('order', 'cart'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = OrderModel::destroy($id);
        if($result){
            return redirect()
                ->route('admin.order.index')
                ->with([
                    'success' => "Заказ id:{$id} успешно удален"
                ]);
        } else {
            return redirect()
                ->back()
                ->withErrors([
                    'msg' => 'Не удалось удалить заказ'
                ]);
        }
    }
}
