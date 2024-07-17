<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_customers_reset_tokens extends Model
{
    use HasFactory;
    protected $table = 'tbl_customers_reset_tokens';
    protected $primaryKey = 'email';
    protected $fillable = ['email','token'];
}