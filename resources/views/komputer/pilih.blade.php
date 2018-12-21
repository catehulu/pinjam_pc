@extends('layouts.app')

@section('content')
<div class="container" style="position:relative">
    @if ($message = Session::get('success'))
        <div class="alert alert-success" style="margin:0px;text-align:center">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div>
        <img src="{{asset('images/Denah-NCC-fix.jpg')}}" alt="denahNCC" style="width:100%;position:absolute;z-index: 1;top:0px;left:0px">
            @foreach ($komputer as $komputers)
            <form action="{{route('komputer.pinjam')}}" method="post">
                    @csrf
                    {{ method_field('PATCH') }}
                    <input type="text" name="id" value="{{$komputers->id}} " hidden>
                    <input type="text" name="id_peminjam" value="{{$data->id}} " hidden>
                    <input type="image" src="{{($komputers->id_peminjam != NULL) ? asset('images/KomputerTidakOk.jpg'):asset('images/KomputerOk.jpg')}}" style="position:absolute;z-index: 2;top:{{$komputers->x1}}px;left:{{$komputers->y1}}px" 
                     alt="">
                    </form>
            @endforeach   
    </div>
    <div>
        <h2>Silahkan pilih komputer untuk {{$data->nama}}</h2>
    </div>
</div>
@endsection