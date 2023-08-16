@extends('layout.main')

@section('content')
<h3>Edit Data Student</h3>
<div class="card-header">
    <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{url('add_products')}}'">
        <i class="fas fa-plus-circle"></i>Add New data
    </button>
  </div>
  <div class="card-body">
    @if (session('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil</strong>
        {{ session('msg') }}
    </div>
@endif
@if (session('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Berhasil</strong>
    {{ session('delete') }}
</div>
@endif
    <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>  
                <th>Code Produk</th> 
                <th>Nama Produk</th>  
                <th>Id Kategori</th>
                <th>Harga</th>
                <th>Image</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $row)
            <tr>
                <th>{{ $loop->iteration}}</th>
                <td>{{ $row->code}}</td>
                <td>{{ $row->nama}}</td>
                <td>{{ $row->id_kategori}}</td>
                <td>{{ $row->harga}}</td>
                <td class="text-center"><img src="{{ asset('/storage/posts/'.$row->image) }}" width="150px" height="100px"> </td>
                <td>
                    <button onclick="window.location='{{url('products/'. $row->id_produk)}}'" type="button" class="btn btn-sm btn-info" title="Edit Data">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form onsubmit="return deleteData('{{$row->nama}}')" style="display: inline" method="POST" action="{{url('products/'. $row->id_produk)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" title="Hapus Data" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    </form>
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
  </div>
</div>
    <script>
        function deleteData(name) {
            pesan = confirm(`Yakin data students dengan nama ${name} ini dihapus`);
            if (pesan) return true;
            else return false;
        }
    </script>
@endsection