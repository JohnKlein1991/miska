<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'orders';

//    protected $fillable = array('id', 'name');

    public function getAllWithPaginate($count = 10)
    {
        $fields = [
            'id',
            'created_at',
            'name',
            'phone',
            'address',
            'cart'
        ];
        $result = $this
            ->select($fields)
            ->orderBy('id', 'DESC')
            ->paginate($count);
        return $result;
    }
}
