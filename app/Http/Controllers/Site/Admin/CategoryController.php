<?php

namespace App\Http\Controllers\Site\Admin;

use App\Models\CategoryModel;
use App\Models\GoodsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new CategoryModel();
        $list = $model->getAllWithPaginate();
        return view('site.admin.categories.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new CategoryModel();
        return view('site.admin.categories.edit', compact('category'));
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
        if($request->file('image')){
            $imgPath = $request->file('image')->store('images', 'public');
            $data['img_path'] = $imgPath;
        }
        $item = new CategoryModel($data);
        $result = $item->save();
        if($result){
            return redirect()
                ->route('admin.category.index')
                ->with(['success' => 'Новая группа добавлена']);
        } else {
            return back()
                ->withInput()
                ->withErrors(['msg' => "Не удалось добавить новую группу"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CategoryModel::where('id', '=', $id)->first();
        return view('site.admin.categories.edit', compact('category'));
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
        $item = CategoryModel::find($id);
        if(!$item){
            return back()
                ->withInput()
                ->withErrors(['msg' => "Категории с id:$id не существует"]);
        }

        $data = $request->all();
        if($request->file('image')){
            $imgPath = $request->file('image')->store('images', 'public');
            $data['img_path'] = $imgPath;
        }
        $result = $item->fill($data)->save();
        if($result){
            return redirect()
                ->route('admin.category.edit', $item->id)
                ->with(['success' => 'Категория обновлена успешно']);
        } else {
            return back()
                ->withInput()
                ->withErrors(['msg' => "Не удалось обовить данные"]);
        }
    }
}
