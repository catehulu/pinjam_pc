@extends('layouts.app')

@section('content')
<div class="container">
</div>
<div class="card-columns container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Komputer {{$komputer->id}}</h4>
            <table class="table table-borderless table-inverse table-responsive">
                <thead class="thead-inverse|thead-default">
                    <tr>
                        <th>Status : </th>
                    @if ($komputer->id_peminjam == NULL)
                    <th>Tidak ada peminjam</th>
                </tr>
                <tr>
                    <th>Pinjamkan : </th>
                        <th>
                            <form action="{{route('komputer.pinjam')}}" method="post">
                            @csrf
                            {{ method_field('PATCH') }}
                            <input type="text" name="id" value="{{$komputer->id}} " hidden>
                            <div class="form-group">
                                    <select name="id_peminjam" id="" class="form-control">
                                        @foreach ($data as $datas)
                                            <option value="{{$datas->id}}">{{$datas->NRP}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Pinjamkan" class="btn btn-primary">
                                </div>
                            </form>
                        </th>
                    </tr>
                    @else
                        <th>Dipinjam</th>
                    </tr>
                    <tr>
                        <th>Oleh : </th>
                        <th>{{$data->nama}}</th>
                    </tr>
                    <tr>
                        <th>
                            <form action="{{route('komputer.kembalikan')}}" method="POST">
                            @csrf
                            {{ method_field('PATCH') }}
                            <input type="text" name="id" value="{{$komputer->id}} " hidden>
                            <input type="text" name="id_peminjam" value="{{$data->id}} " hidden>
                            <div class="form-group">
                                <input type="submit" value="Lepas Peminjaman" class="btn btn-danger">
                            </div>
                        </th>
                    </tr>
                    </form>
                    @endif
                    <tr>
                        <td>
                            <a name="" id="" class="btn btn-dark" href="{{route('komputer.index')}}" role="button">Kembali</a>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection