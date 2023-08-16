<?php

namespace App\Http\Controllers;

use App\Models\KategoriProducts;
use Illuminate\Http\Request;
class add_produck extends Controller
{
    public function index (){
        return view('products.formadd')->with([
            'kategori_products' => KategoriProducts::all()
        ]);
    }
   
}
