<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';

    protected $fillable = array('id', 'name', 'img_path');

    public function getAllWithPaginate($count = 10)
    {
        $fields = [
            'id',
            'name',
            'img_path'
        ];
        $result = $this
            ->select($fields)
            ->orderBy('id', 'DESC')
            ->paginate($count);
        return $result;
    }
    public function getListForDropdown()
    {
        $fields = [
            'id',
            'name',
            'img_path'
        ];
        $result = $this
            ->select($fields)
            ->get();
        return $result;
    }
}