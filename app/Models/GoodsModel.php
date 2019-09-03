<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;

class GoodsModel extends Model
{
    protected $table = 'goods';

    protected $fillable = array('id', 'title', 'price', 'category_id');

    public function category()
    {
        return $this->belongsTo(CategoryModel::class);
    }

    public function getAllWithPaginate($count = 10)
    {
        $fields = [
            'id',
            'title',
            'price',
            'category_id'
        ];
        $result = $this
            ->select($fields)
            ->orderBy('id', 'DESC')
            ->paginate($count);
        return $result;
    }
}