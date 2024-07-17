<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tbl_detailproduct extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_detailproduct';
    public $timestamps = true;
    protected $fillable =[
        'product_id',
        'product_detail_image',
        'product_image_title',
    ];

}