@extends('layout.main')
@section('content')
<h3>Form Edit Data Products</h3>
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{url('products')}}'">
            <i class="fas fa-plus-circle"></i>kembali
        </button>
      </div>
      <div class="card-body">

        <form method="post" action="{{url('kategori_products/'.$txtid)}}">
        @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="txtcode" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-10">
                    <input type="hidden" class="form-control form-control-sm @error('txtid') is-invalid @enderror" id="txtid" name="txtid" value="{{$txtid}}">
                    <input type="text" class="form-control form-control-sm @error('txtnama') is-invalid @enderror" id="txtnama" name="txtnama" value="{{$txtnama}}">
                    @error('txtnama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-sm btn-success">
                </div>
            </div>
      </div>
    </div>
@endsection