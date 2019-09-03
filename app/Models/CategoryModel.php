<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';

    protected $fillable = array('id', 'name');

    public function getAllWithPaginate($count = 10)
    {
        $fields = [
            'id',
            'name'
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
            'name'
        ];
        $result = $this
            ->select($fields)
            ->get();
        return $result;
    }
}