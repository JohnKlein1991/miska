<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\GoodsModel;

class GoodsController extends Controller
{
    public function showItem($id)
    {
        $model = GoodsModel::where('id', $id)->first();
        return view('site.goods.item', compact('model'));
    }

    public function showCategory($category)
    {
        $models = GoodsModel::where('category_id', $category)->get();
        return view('site.goods.category', compact('models', 'category'));
    }
}