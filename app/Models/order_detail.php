<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order_detail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'order_details';
    protected $primaryKey = 'id_details';
    public $timestamps = false;
    protected $fillable = [
        'id_order',
        'name_sp',
        'quantity',
        'price',
        'created_at',  
        'updated_at',  
    ];
}
