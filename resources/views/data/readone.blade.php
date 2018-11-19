@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card border-secondary">
      <img class="card-img-top" src="holder.js/100px180/" alt="">
      <div class="card-body">
        <h4 class="card-title">Biodata Peminjam</h4>
        <div class="container " align='center'>
            <table class="table borderless" style="width:50%">
                
                <thead>
                    <tr>
                        <th>Nama : </th>
                        <th>{{$read->nama}}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>NRP : </th>
                        <th>{{$read->NRP}}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>No Telepon : </th>
                        <th>{{$read->No_Telp}}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Email : </th>
                        <th>{{$read->Email}}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Dosen Pembimbing : </th>
                        <th>{{$read->Dosbing}}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>NIP : </th>
                        <th>{{$read->NIP}}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Awal Reservasi : </th>
                        <th>{{$read->Awal_Reservasi}}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Akhir Reservasi : </th>
                        <th>{{$read->Akhir_Reservasi}}</th>
                        <th></th>
                    </tr>
                    @if ($read->STAT === NULL)
                    <tr>
                        <th>Status : </th>
                        <th>Belum diproses</th>
                        <th></th>
                    </tr>
                    @elseif ($read->STAT === 0)
                    <tr>
                        <th>Status : </th>
                        <th>Ditolak</th>
                        <th></th>
                    </tr>
                    @elseif ($read->STAT === 1)
                    <tr>
                        <th>Nama : </th>
                        <th>Diterima</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Komputer : </th>
                        <th>{{$read->id}}</th>
                    </tr>
                    @elseif ($read->STAT === 2)
                    <tr>
                        <th>Status : </th>
                        <th>Selesai</th>
                    </tr>
                    @else
                    <tr>
                        <th>Status : </th>
                        <th>Kesalahan Database</th>
                    </tr>
                    @endif
                    <tr>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="table borderless" style="width:50%">
                <div class="row">
                    @if ($read->STAT === NULL)
                    <div class="col-sm">
                        <form action="{{route('data.update',[$read->id,1])}}" method="post">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <input type="submit" value="Terima" class="btn btn-primary">
                        </form>
                    </div>
                    <div class="col-sm">
                        <form action="{{route('data.update',[$read->id,0])}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="submit" value="Tolak" class="btn btn-dark">
                        </form>
                    </div>
                    @endif
                    <div class="col-sm">
                            <a href="{{route('data.index')}}" class="btn btn-danger float-right">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
    
@endsection