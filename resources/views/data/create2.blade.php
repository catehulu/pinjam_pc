@extends('layouts.app')

@section('content')

    <div class="container">

          @if ($errors->has('NRP') > 0)
            <div class="alert alert-danger" style="margin:0px;text-align:center">
                <ul>
                    <center><li>Perhatikan Kembali NRP Anda</li></center>
                </ul>
            </div>
          @endif

        <form class="" action="{{ route('peminjam.store') }}" method="post">
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
            <label for="">Barang yang dipinjam:</label>
            <select class="form-control" id="" name="barang_id">
            @if (!$barangs)
            <option disabled>Tidak ada barang yang dapat dipinjam untuk saat ini</option>
            @else
              @foreach ($barangs as $barang)
                @if ($barang->jumlah > 0)
                  <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                @else
                  <option disabled>{{ $barang->nama }}</option>
                @endif
              @endforeach
            @endif
            </select>
          </div>

          <div class="form-group">
              <label for="">Jumlah barang</label>
              <input type="Number" name="jumlah" id="" class="form-control" placeholder="0">
            </div>

            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
                <a href="{{ route('peminjam.create') }}" class="btn btn-danger">Reset</a>
            </div>
        </form>
@endsection