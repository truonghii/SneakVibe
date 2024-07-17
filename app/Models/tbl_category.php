<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_category extends Model
{
    use HasFactory;
    protected $table = 'tbl_category';
    public $timestamps = true;
    protected $fillable = [
        'category_name',
        'brand_id',
        'category_description',
        'category_status'
    ];
}