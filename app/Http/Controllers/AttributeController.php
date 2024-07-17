<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_attribute;
use Illuminate\Support\Facades\Session;

class AttributeController extends Controller
{
    public function themThuocTinh(){
        return view('admin.attribute.them_thuoc_tinh');
    }
    public function themThuocTinh_(Request $request){
        $data = $request->all();
        $attr = new tbl_attribute();
        $attr->name = $data['name'];
        $attr->value = $data['value'];
        $attr->save();
        Session::flash('message','Thêm thuộc tính thành công');
        return redirect()->back();
        
    }
}