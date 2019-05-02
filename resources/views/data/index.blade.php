@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
    
        <div class="">
        <div style="margin-bottom:20px">
            <!-- <button type="submit" class="btn btn-primary" id="pilihpc">berkas peminjaman PC</button>
            <button type="submit" class="btn btn-primary" id="pilihbarang">berkas peminjaman barang</button>
             -->
            <!-- <ul  class="nav nav-tabs">
			<li class="active">
            Upload berkas peminjaman barang
			</li>
			<li>Upload berkas reservasi PC
			</li>
		    </ul> -->
            <select class="form-control" id="pilihan" name="Inventory">
            
              <option id="menupc">Daftar Peminjam PC</option>
              <option id="menubarang">Daftar Peminjam Barang</option>
            </select>
        </div>
             @if ($message = Session::get('success'))
                <div class="alert alert-success" style="margin:0px;text-align:center">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card border-primary" style="" id="pc">
                <div class="card-header">Daftar Peminjam PC</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" style="margin:0px;text-align:center">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($data->isEmpty())
                        Tidak ada data
                    @else
                    <table class="center table table-striped table-inverse table-responsive">
                        <thead class="thead-black" align="center">
                            <tr>
                                <th>Nama</th>
                                <th>NRP</th>
                                <th>Dosen Pembimbing</th>
                                <th>Disubmit</th>
                                <th>Diupdate</th>
                                <th>Status</th>
                                <th>File</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $datas)
                                <tr>
                                    <td>{{ $datas->nama }}</td>
                                    <td>{{ $datas->NRP }}</td>
                                    <td>{{ $datas->Dosbing }}</td>
                                    <td>{{ $datas->created_at}}</td>
                                    <td>{{ $datas->updated_at}}</td>
                                    @if ($datas->STAT === NULL)
                                    <td><div class="btn btn-warning btn-block">Pending</div></td>
                                    @elseif ($datas->STAT === 0)
                                    <td><div class="btn btn-danger btn-block"></span>Ditolak</div></td>
                                    @elseif ($datas->STAT === 1)
                                    <td><div class="btn btn-success btn-block"></span>Diterima</div></td>
                                    @elseif ($datas->STAT === 2)
                                    <td><div class="btn btn-info btn-block"></span>Selesai</div></td>
                                    @else
                                    <td><div class="btn btn-dark btn-block"></span>Error</div></td>
                                    @endif
                                    @if ($datas->path == NULL)
                                       <td>
                                           <div class="btn btn-dark btn-block">
                                                <i class="fa fa-question-circle-o" aria-hidden="true"></i></i>Belum
                                            </div>
                                        </td>
                                    @else
                                        <td><a name="download" id="download" class="btn btn-secondary" href="storage/filePDF/{{$datas->path}}" role="button" download="">
                                        <i class="fa fa-file-o" aria-hidden="true"></i>Download</a></td>    
                                    @endif
                                    <td><a href="{{ route('data.readone',$datas->id) }}" class="btn btn-primary">Detail</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                        @endif
                </div>
            </div>
            <div style="display: none" class="card border-primary" style="" id="barang">
                <div class="card-header">Daftar Peminjam Barang</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" style="margin:0px;text-align:center">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($peminjams->isEmpty())
                        Tidak ada data
                    @else
                    <table class="center table table-striped table-inverse table-responsive">
                        <thead class="thead-black" align="center">
                            <tr>
                                <th>Nama</th>
                                <th>NRP</th>
                                <th>Barang</th>
                                <th>Disubmit</th>
                                <th>Diupdate</th>
                                <th>Status</th>
                                <th>File</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjams as $peminjam)
                                <tr>
                                    <td>{{ $peminjam->nama }}</td>
                                    <td>{{ $peminjam->NRP }}</td>
                                    <td>{{ $peminjam->nama_barang }}</td>
                                    <td>{{ $peminjam->created_at}}</td>
                                    <td>{{ $peminjam->updated_at}}</td>
                                    @if ($peminjam->STAT === NULL)
                                    <td><div class="btn btn-warning btn-block">Pending</div></td>
                                    @elseif ($peminjam->STAT === 0)
                                    <td><div class="btn btn-danger btn-block"></span>Ditolak</div></td>
                                    @elseif ($peminjam->STAT === 1)
                                    <td><div class="btn btn-success btn-block"></span>Diterima</div></td>
                                    @elseif ($peminjam->STAT === 2)
                                    <td><div class="btn btn-info btn-block"></span>Selesai</div></td>
                                    @else
                                    <td><div class="btn btn-dark btn-block"></span>Error</div></td>
                                    @endif
                                    @if ($peminjam->path == NULL)
                                       <td>
                                           <div class="btn btn-dark btn-block">
                                                <i class="fa fa-question-circle-o" aria-hidden="true"></i></i>Belum
                                            </div>
                                        </td>
                                    @else
                                    <td>
                                        <button onclick="submit_stat(0)">Tolak</button>
                                        <button onclick="submit_stat(1)">Terima</button>
                                        <button onclick="submit_stat(2)">Selesai</button>
                                    </td>
                                    <td><a name="download" id="download" class="btn btn-secondary" href="storage/filePDF/inventaris/{{$peminjam->path}}" role="button" download="">
                                        <i class="fa fa-file-o" aria-hidden="true"></i>Download</a></td>    
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $peminjams->links() }}
                        @endif
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('peminjam.update',$peminjam)}}" method="post" id="form_stat">
        @csrf
        @method('PATCH')
        <input type="number" name="STAT" id="STAT" value=0 hidden>
    </form>
</div>

<script>
    function submit_stat($id) {
        // alert($id);
        $('#STAT').attr('value', $id);
        $('#form_stat').submit();
    }
</script>
@endsection