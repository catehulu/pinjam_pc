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
            <a href="{{route('komputer.readone',$komputers->id)}}"><img src="{{($komputers->id_peminjam != NULL) ? asset('images/KomputerTidakOk.jpg'):asset('images/KomputerOk.jpg')}}" style="position:absolute;z-index: 2;top:{{$komputers->x1}}px;left:{{$komputers->y1}}px" 
             alt=""></a>
            @endforeach   
    </div>
    <a name="" id="" class="btn btn-primary" href="{{route('komputer.readone',1)}}" role="button">Komputer 1</a>
</div>
@endsection