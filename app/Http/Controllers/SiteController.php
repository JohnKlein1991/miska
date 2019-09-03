<?php


namespace App\Http\Controllers;


use App\Models\GoodsModel;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        $groups = DB::table('goods')
            ->select(DB::raw('count(*), category_id'))
            ->groupBy('category_id')
            ->get();
        $allGoods = GoodsModel::all();
        return view('site.index', compact('groups', 'allGoods'));
    }
}