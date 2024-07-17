<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tbl_product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tbl_product';
    public $timestamps = true;
    protected $attributes = [
        'product_promotion'=> 0,
        'product_hot'=>0
    ];
    protected $fillable = [
        'product_name',
        'category_id',
        'product_description',
        'product_image',
        'product_price',
        
        'product_quantity',
       
        
        'product_status',
        
    ];
}