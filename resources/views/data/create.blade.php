@extends('layouts.user')

@section('content')

    <div class="container">

          @if ($errors->has('NRP') > 0)
            <div class="alert alert-danger" style="margin:0px;text-align:center">
                <ul>
                    <center><li>Perhatikan Kembali NRP Anda</li></center>
                </ul>
            </div>
          @elseif ($errors->has('Awal_Reservasi') > 0)
          <div class="alert alert-danger" style="margin:0px;text-align:center">
              <ul>
                  <li>Tanggal awal harus lebih awal dari tanggal akhir</li>
              </ul>
          </div>
          @elseif ($errors->all())
            <div class="alert alert-danger" style="margin:0px;text-align:center">
                <ul>
                    <li>Perhatikan Data yang Diinput</li>
                </ul>
            </div>
          @endif

        <form class="" action="{{ route('data.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="">NRP</label>
              <input type="text" name="NRP" id="" class="form-control" placeholder="NRP" aria-describedby="helpId" maxlength="14">
              <small id="helpId" class="text-muted">NRP yang dimasukkan 14 digit</small>
            </div>

            <div class="form-group">
              <label for="">Nama</label>
              <input type="text" name="nama" id="" class="form-control" placeholder="Nama">
            </div>

            <div class="form-group">
              <label for="">Nomor Telpon</label>
              <input type="text" name="No_Telp" id="" class="form-control" placeholder="Nomor Telpon">
            </div>

            <div class="form-group">
              <label for="">Email</label>
              <input type="Email" name="Email" id="" class="form-control" placeholder="Email">
            </div>

            <div class="form-group">
              <label for="">Dosen Pembimbing</label>
              <input type="text" name="Dosbing" id="" class="form-control" placeholder="Nama Dosen Pembimbing" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Gelar dimasukkan</small>
            </div>

            <div class="form-group">
              <label for="">NIP Dosen Pembimbing</label>
              <input type="text" name="NIP" id="" class="form-control" placeholder="NIP Dosen Pembimbing" aria-describedby="helpId">
            </div>

            <div class="form-group">
              <label for="">Awal Peminjaman</label>
              <input type="date" name="Awal_Reservasi" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted"></small>
            </div>

            <div class="form-group">
              <label for="">Akhir Peminjaman</label>
              <input type="date" name="Akhir_Reservasi" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted"></small>
            </div>

            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
                <a href="{{ route('data.create') }}" class="btn btn-danger">Reset</a>
            </div>
        </form>
@endsection