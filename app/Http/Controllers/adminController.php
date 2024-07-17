<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class adminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    
}