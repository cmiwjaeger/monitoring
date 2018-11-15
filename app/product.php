<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class product extends Model
{
    protected $primaryKey = 'idproduct';
    protected $table ='products';
    protected $fillable = ['nameproduct','namesupplier','quantity'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
