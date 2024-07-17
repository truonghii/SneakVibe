<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_attribute extends Model
{
    use HasFactory;
    protected $table = 'tbl_attribute';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'value',
    ];
}