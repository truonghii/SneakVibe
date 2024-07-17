<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_category_blog extends Model
{
    use HasFactory;
    protected $table = 'tbl_category_blog';
    public $timestamps = true;
    protected $attributes = [
      'category_description'=>'Đang Cập Nhật'  
    ];
    protected $fillable = [
      'category_name',
      'category_status',  
    ];
    
    
}