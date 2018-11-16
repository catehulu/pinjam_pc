@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">

             @if ($message = Session::get('success'))
                <div class="alert alert-success" style="margin:0px;text-align:center">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card border-primary" style="">
                <div class="card-header">Daftar Peminjam</div>

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
                                    @else
                                    <td><div class="btn btn-dark btn-block"></span>Error</div></td>
                                    @endif
                                    @if ($datas->path == NULL)
                                       <td>Belum</td>
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
        </div>
    </div>
</div>
@endsection
