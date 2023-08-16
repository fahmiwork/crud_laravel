<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Http\Requests\StoreproductsRequest;
use App\Http\Requests\UpdateproductsRequest;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('products.data')->with([
        //yang tampil di halaman
        'products' => products::all()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductsRequest $request)
    {
        $validate = $request->validated();
        $products = new Products;
        $image = $request->file('txtimage');
        $image->storeAs('public/posts', $image->hashName());
        $products->image = $image->hashName();
        $products->code = $request->txtcode;
        $products->nama = $request->txtnama;
        $products->id_kategori = $request->txtkategori;
        $products->harga = $request->txtharga;
        $products->save();

        return redirect('products')->with('msg', 'Add new products '. $request->txtnama. ' successfull');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products, $id_produk)
    {
        $data = $products->find($id_produk);
            return view('products.formedit')->with([
                'txtid' => $data->id_produk,
                'txtcode' => $data->code,
                'txtnama' => $data->nama,
                'txtkategori' => $data->id_kategori,
                'txtharga' => $data->harga,
                'txtimage' => $data->image
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductsRequest  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductsRequest $request, products $products, $id_produk)
    {
        $data = $products->find($id_produk);

        if ($request->hasFile('txtimage')) {
            $image = $request->file('txtimage');
            $image->storeAs('public/posts', $image->hashName());
            Storage::delete('public/posts/'.$data->image);
            $data->image = $image->hashName();
            $data->id_produk = $request->txtid;
            $data->code = $request->txtcode;
            $data->nama = $request->txtnama;
            $data->id_kategori = $request->txtkategori;
            $data->harga = $request->txtharga;
            $data->update();
        }else{
            $data->id_produk = $request->txtid;
            $data->code = $request->txtcode;
            $data->nama = $request->txtnama;
            $data->id_kategori = $request->txtkategori;
            $data->harga = $request->txtharga;
            $data->update();
        }

        return redirect('products')->with('msg','Data dengan nama students '.$data->nama. ' berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products, $id_produk)
    {
       $data = $products->find($id_produk);
       Storage::delete('public/posts/'.$data->image);
       $data->delete();
       return redirect('products')->with('delete', 'Data dengan nama products '. $data->nama. ' berhasil di delete');
    }
}
