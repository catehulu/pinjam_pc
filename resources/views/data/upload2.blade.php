@extends('layouts.app')

@section('content')
<div class="container">
    @if(count( $errors ) > 0)
        @foreach ($errors->all() as $error)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $error }}</strong>
            </span>
        @endforeach
    @endif
    <div class="row justify-content-center">
    
        <div class="col-md-8">
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
            
              <option id="pilihpc">Upload Berkas Reservasi PC</option>
              <option id="pilihbarang">Upload Berkas Peminjaman Barang</option>
            </select>
        </div>
            <div class="card" id="formpc">
                <div class="card-header">Upload Berkas Peminjaman PC</div>
                
                <div class="card-body">
                    
                    <form action="{{route('data.upload')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}

                        
                        <div class="form-group row">
                            <label for="NRP" class="col-sm-4 col-form-label text-md-right">NRP</label>
                            <div class="col-md-6">
                                <input id="NRP" type="text" class="form-control" name="NRP" value="" required autofocus maxlength="14">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="spesifikasi" class="col-sm-4 col-form-label text-md-right">Spesifikasi</label>
                            <div class="col-md-6">
                                <textarea name="spesifikasi" id="spesifikasi" cols="39" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kebutuhan" class="col-sm-4 col-form-label text-md-right">Kebutuhan</label>
                            <div class="col-md-6">
                                <textarea name="kebutuhan" id="kebututhan" cols="39" rows="3" placeholder="cth: install matlab,ubuntu"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pdf" class="col-sm-4 col-form-label text-md-right">File PDF</label>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <input type="file" class="form-control-file" name="pdf" id="pdf" placeholder="Upload" aria-describedby="fileHelpId">
                                  <small id="fileHelpId" class="form-text text-muted">File tidak lebih dari 1 MB</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10 col-form-label text-md-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="card" id="formbarang" style="display: none">
                <div class="card-header">Upload Berkas Peminjaman Barang</div>
                
                <div class="card-body">
                    
                    <form action="{{route('peminjam.upload')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group row">
                            <label for="NRP" class="col-sm-4 col-form-label text-md-right">NRP</label>
                            <div class="col-md-6">
                                <input id="NRP" type="text" class="form-control" name="NRP" value="" required autofocus maxlength="14">
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label for="">Barang yang dipinjam:</label>
                            <select class="form-control" id="" name="barang_id">
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="pdf" class="col-sm-4 col-form-label text-md-right">File PDF</label>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <input type="file" class="form-control-file" name="pdf" id="pdf" placeholder="Upload" aria-describedby="fileHelpId">
                                  <small id="fileHelpId" class="form-text text-muted">File tidak lebih dari 1 MB</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10 col-form-label text-md-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
