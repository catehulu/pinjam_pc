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
            <div class="card">
                <div class="card-header">Upload Berkas</div>

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
        </div>
    </div>
</div>
@endsection
