@extends('layout.main')

@section('content')
<h3>Form Edit Data Student</h3>
<div class="card">
<div class="card-header">
    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{url('students')}}'">
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
    <form method="post" action="{{url('students/'.$txtid)}}">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="txtid" class="col-sm-2 col-form-label">ID Students</label>
            <div class="col-sm-10">
                <input type="hidden" class="form-control-plaintext" id="txtid" name="txtid" value="{{$txtid}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="txtfullname" class="col-sm-2 col-form-label">Full Name</label>
            
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm @error('txtfullname') is-invalid @enderror" id="txtfullname" name="txtfullname" value="{{$txtfullname}}">
                @error('txtfullname')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="txtgender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                <select class="form-select form-select-sm @error('txtgender') is-invalid @enderror" id="txtgender" name="txtgender" value="{{old('txtgender')}}">

                    <option value="" selected>--Pilih--</option>
                    <option value="M" {{($txtgender == 'M') ? 'selected' : ''}}>Male</option>
                    <option value="F" {{($txtgender == 'F') ? 'selected' : ''}}>Female</option>
                </select>
                @error('txtgender')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="txtaddress" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <textarea class="form-control form-control-sm @error('txtaddress') is-invalid @enderror" name="txtaddress" id="txtaddress" cols="30" rows="10">{{$txtaddress}}</textarea>
                @error('txtaddress')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="txtemail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control form-control-sm @error('txtemail') is-invalid @enderror" id="txtemail" name="txtemail" value="{{$txtemail}}">
                @error('txtemail')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="txtphone" class="col-sm-2 col-form-label">No Telepone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm @error('txtphone') is-invalid @enderror" id="txtphone" name="txtphone" value="{{$txtphone}}">
                @error('txtphone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-sm btn-success">
                    Update
                </button>
            </div>
        </div>
  </div>
</div>
@endsection