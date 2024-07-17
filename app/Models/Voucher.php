<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'voucher';
    protected $primaryKey = 'coupon_id';

    protected $filltable = [
        'voucher_name',
        'code',
        'discount',
        'expired_date',
        'voucher_condition',
    ];
}
