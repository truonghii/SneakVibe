<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tbl_blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tbl_blog';
    public $timestamps = true;
    protected $date =[
      'created_at',
      'updated_at'  
    ];
    protected $fillable = [
        'category_blog_id',
        'blog_title',
        'blog_image',
        'blog_content',
        'blog_status',  
    ];
}