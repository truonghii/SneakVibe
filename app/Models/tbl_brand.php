<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_brand extends Model
{
    use HasFactory;
    protected $table = 'tbl_brand';
    public $timestamps = true;
    protected $fillable = [
        'brand_name',
        'brand_logo',
        'brand_description',
        'brand_status'
    ];
    
}