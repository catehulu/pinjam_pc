@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

             @if ($message = Session::get('success'))
                <div class="alert alert-success" style="margin:0px;text-align:center">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" style="margin:0px;text-align:center">
                            {{ session('status') }}
                        </div>
                    @endif

                    Daftar Peminjam
                    <table class="center table table-striped table-inverse table-responsive" align="center">
                        <thead class="thead-black">
                            <tr>
                                <th>Nama</th>
                                <th>NRP</th>
                                <th>Dosen Pembimbing</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $datas)
                                <tr>
                                    <td scope="row">{{ $datas->nama }}</td>
                                    <td>{{ $datas->NRP }}</td>
                                    <td>{{ $datas->Dosbing }}</td>
                                    @if ($datas->STAT === NULL)
                                        <td><div class="btn btn-warning btn-block">Pending</div></td>
                                    @elseif ($datas->STAT === 0)
                                        <td><div class="btn btn-danger btn-block"></span>Ditolak</div></td>
                                    @elseif ($datas->STAT === 1)
                                        <td><div class="btn btn-success btn-block"></span>Diterima</div></td>
                                    @else
                                        <td><div class="btn btn-dark btn-block"></span>Error</div></td>
                                    @endif
                                    <td><a href="{{ route('data.readone',$datas->id) }}" class="btn btn-primary">Detail</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
