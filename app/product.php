<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $primaryKey = 'idproduct';
    protected $table ='products';
    protected $fillable = ['nameproduct','namesupplier','quantity'];
}
