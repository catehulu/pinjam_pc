@extends('layouts.user')

@section('content')

<div class="container">
    <div class="card border-secondary">
      <div class="card-body">
        <h4 class="card-title">Data yang diinput</h4>
        <p>Jika ada kesalahan data harap kontak admin secepatnya</p>
        <p>Download file pdf dan upload file setelah memberi tanda tangan</p>
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
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="table borderless" style="width:50%">
                <div class="row">
                    <div class="col-sm">
                        <a name="" id="" class="btn btn-primary" href="{{route('data.pdf',$read->id)}}" role="button"><i class="fa fa-file-o" aria-hidden="true"></i>Download PDF</a>
                    </div>
                    <div class="col-sm">
                        <a name="" id="" class="btn btn-light" href="{{route('welcome')}}" role="button">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
    
@endsection