<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_product_attribute extends Model
{
    use HasFactory;
    protected $table = 'tbl_product_attribute';
    public $timestamps = false;
    protected $fillable = [
        'id_attribute',
        'id_product',
    ];
}