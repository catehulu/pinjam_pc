@extends('layouts.app')

@section('content')

    <div class="container">
          @if ($errors->all())
            <div class="alert alert-danger" style="margin:0px;text-align:center">
                <ul>
                    <li>Perhatikan Data yang Diinput</li>
                </ul>
            </div>
          @endif

        <form class="" action="{{ route('Barang.update',$barang) }}" method="post">
            {{ csrf_field() }}
            @method('PATCH')
            <div class="form-group">
              <label for="">Nama Barang</label>
              <input type="text" name="nama" id="" class="form-control" value="{{$barang->nama}}">
              <!-- <small id="helpId" class="text-muted">NRP yang dimasukkan 14 digit</small> -->
            </div>

            <div class="form-group">
              <label for="">Jumlah</label>
              <input type="number" name="jumlah" id="" class="form-control" value={{$barang->jumlah}}>
            </div>

            <div class="form-group">
              <label for="">Keterangan</label>
              <input type="text" name="keterangan" id="" class="form-control" value="{{$barang->keterangan}}">
            </div>

            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
        </form>
@endsection