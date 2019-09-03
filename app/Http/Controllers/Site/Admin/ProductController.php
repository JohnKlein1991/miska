<?php

namespace App\Http\Controllers\Site\Admin;

use App\Models\CategoryModel;
use App\Models\GoodsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new GoodsModel();
        $list = $model->getAllWithPaginate();
        return view('site.admin.products.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new GoodsModel();
        $categoryList = (new CategoryModel)->getListForDropdown();
        return view('site.admin.products.edit', compact('product', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = new GoodsModel($data);
        $result = $item->save();
        if($result){
            return redirect()
                ->route('admin.products.index')
                ->with(['success' => 'Новый товар добавлен']);
        } else {
            return back()
                ->withInput()
                ->withErrors(['msg' => "Не удалось добавить новый товар"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = GoodsModel::where('id', '=', $id)->first();
        $categoryList = (new CategoryModel)->getListForDropdown();
        return view('site.admin.products.edit', compact('product', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = GoodsModel::find($id);
        if(!$item){
            return back()
                ->withInput()
                ->withErrors(['msg' => "Товара с id:$id не существует"]);
        }

        $data = $request->all();
        $result = $item->fill($data)->save();
        if($result){
            return redirect()
                ->route('admin.products.edit', $item->id)
                ->with(['success' => 'Товар обновлен успешно']);
        } else {
            return back()
                ->withInput()
                ->withErrors(['msg' => "Не удалось обовить данные"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = GoodsModel::destroy($id);

        if($result){
            return redirect()
                ->route('admin.products.index')
                ->with([
                    'success' => "Товар id:{$id} успешно удален"
                ]);
        } else {
            return redirect()
                ->back()
                ->withErrors([
                    'msg' => 'Не удалось удалить товар'
                ]);
        }
    }
}
