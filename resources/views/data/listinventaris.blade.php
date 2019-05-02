@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
    
        <div class="">
        <div style="margin-bottom: 20px">
            <td><a href="{{ route('Barang.create') }}" class="btn btn-primary">Tambah</a></td>
        </div>
             @if ($message = Session::get('success'))
                <div class="alert alert-success" style="margin:0px;text-align:center">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card border-primary" style="">
            
                <div class="card-header">Daftar Inventaris</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" style="margin:0px;text-align:center">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($barangs->isEmpty())
                        Tidak ada data
                    @else
                    <table class="center table table-striped table-inverse table-responsive">
                        <thead class="thead-black" align="center">
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Edit</th>
                                <th>Hapus</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $barang)
                                <tr>
                                    <td>{{ $barang->nama }}</td>
                                    <td>{{ $barang->jumlah }}</td>
                                    <td>{{ $barang->keterangan }}</td>
                                    <td><a href="{{ route('Barang.edit',$barang) }}" class="btn btn-primary">Edit</a></td>
                                    <td><a href="{{ route('Barang.delete',$barang) }}" class="btn btn-danger">Hapus</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $barangs->links() }}
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
