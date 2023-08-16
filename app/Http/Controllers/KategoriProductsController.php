<?php

namespace App\Http\Controllers;

use App\Models\KategoriProducts;
use App\Http\Requests\StoreKategoriProductsRequest;
use App\Http\Requests\UpdateKategoriProductsRequest;

class KategoriProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kategories.data')->with([
            'kategori_products' => KategoriProducts::all()
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
     * @param  \App\Http\Requests\StoreKategoriProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriProductsRequest $request)
    {
        $validate = $request->validated();
        $kategori = new KategoriProducts();
        $kategori->nama_kategori = $request->txtnama;
        $kategori->save();
        return redirect('kategori_products')->with('msg','Tambahan kategori dengan nama '. $request->txtnama. ' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriProducts  $kategoriProducts
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriProducts $kategoriProducts, $id_kategori)
    {
       $data = $kategoriProducts->find($id_kategori);
        return view('kategories.edit')->with([
            'txtid' => $data->id_kategori,
            'txtnama' => $data->nama_kategori

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriProducts  $kategoriProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriProducts $kategoriProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriProductsRequest  $request
     * @param  \App\Models\KategoriProducts  $kategoriProducts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriProductsRequest $request, KategoriProducts $kategoriProducts, $id_kategori)
    {
        $data = $kategoriProducts->find($id_kategori);
        $data->id_kategori = $request->txtid;
        $data->nama_kategori = $request->txtnama;
        $data->save();
        return redirect('kategori_products')->with('msg', 'Data dengan nama '.$data->nama_kategori. ' berhasil di update');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriProducts  $kategoriProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriProducts $kategoriProducts)
    {
        //
    }
}
