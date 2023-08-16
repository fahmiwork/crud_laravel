@extends('layout.main')

@section('content')
<h3>Form New Data Products</h3>
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{url('products')}}'">
            <i class="fas fa-plus-circle"></i>kembali
        </button>
      </div>
      <div class="card-body">
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
        <form method="post" action="{{url('products')}}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="txtcode" class="col-sm-2 col-form-label">Code Product</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm @error('txtcode') is-invalid @enderror" id="txtcode" name="txtcode" value="{{old('txtcode')}}">
                    @error('txtcode')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    
                </div>
            </div>
            <div class="row mb-3">
                <label for="txtnama" class="col-sm-2 col-form-label">Nama</label>
                
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm @error('txtnama') is-invalid @enderror" id="txtnama" name="txtnama" value="{{old('txtfullname')}}">
                    @error('txtnama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="txtimage" class="col-sm-2 col-form-label">Gambar</label>
                
                <div class="col-sm-10">
                    <input type="file" class="form-control form-control-sm @error('txtimage') is-invalid @enderror" id="txtimage" name="txtimage" value="{{old('txtimage')}}">
                    @error('txtimage')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="txtkategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select class="form-select form-select-sm @error('txtkategori') is-invalid @enderror" id="txtkategori" name="txtkategori" value="{{old('txtkategori')}}">
    
                        <option value="" selected>--Pilih--</option>
                        @foreach ($kategori_products as $item)
                        <option value="{{$item->id_kategori}}" {{(old('txtkategori') == 'Detergen') ? 'selected' : ''}}>Detergen</option>
                        @endforeach
                        {{-- <option value="Pokok" {{(old('txtkategori') == 'Pokok') ? 'selected' : ''}}>Pokok</option> --}}

                        
                    </select>
                    @error('txtkategori')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="txtharga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm @error('txtharga') is-invalid @enderror" id="txtharga" name="txtharga" value="{{old('txtharga')}}">
                    @error('txtharga')
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