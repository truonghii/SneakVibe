<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    public $timestamps = true;
    protected $date =[
      'created_at',
      'updated_at'  
    ];
    protected $fillable = [
        'id_order',
        'name',
        'phone',
        'email',
        'total_amount',
        'city',  
        'district',
        'ward',
        'address',  
        'paymentMethod',  
        'token',  
    ];
    public function details(){
      return $this->hasMany(tbl_order_details::class, 'id_order', 'id_order');
    }
}
