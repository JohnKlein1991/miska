<?php


namespace App\Http\Controllers;


use App\Models\GoodsModel;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        $groups = DB::table('goods')
            ->select(DB::raw('count(*), category_id, categories.name as name, categories.img_path as img_path'))
            ->join('categories', 'goods.category_id', '=', 'categories.id')
            ->groupBy(['category_id', 'categories.name', 'categories.img_path'])
            ->get();
        $allGoods = GoodsModel::all();
        return view('site.index', compact('groups', 'allGoods'));
    }
}