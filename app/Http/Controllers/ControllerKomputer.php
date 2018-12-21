<?php

namespace Pinjam\Http\Controllers;

use Illuminate\Http\Request;
use Pinjam\Komputer;
use Pinjam\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;
use Pinjam\Mail\EmailDiterima;

class ControllerKomputer extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $komputer = DB::select('select * from komputer');
        return view('komputer/layout',compact('komputer'));
    }

    public function pilih($id_peminjam)
    {
        $data = Data::find($id_peminjam);
        $komputer = DB::select('select * from komputer');
        return view('komputer.pilih',compact('komputer','data'));
    }

    public function readone($id)
    {
        $komputer = Komputer::find($id);
        if ($komputer->id_peminjam == NULL) {
            $data = DB::select('select * from data where NOT EXISTS (select id_peminjam from komputer where data.id = id_peminjam) AND path is NOT NULL AND STAT = 1');
        }
        else{
            $data = Data::find($komputer->id_peminjam);
        }

        return view('komputer/status',compact('komputer','data'));
    }

    public function pinjam(Request $request){
        $komputer = Komputer::find($request->input('id'));
        $user = Data::where('id',$request->input('id_peminjam'))->first();
        $komputer->update([
            'id_peminjam' => $request->input('id_peminjam')
        ]);
        $user->update([
            'STAT' => '1'
        ]);
       // Mail::to($user->Email)->send(new EmailDiterima($user));

        return redirect()->route('komputer.index')->with('success','Peminjaman telah diterima!');
    }

    public function kembalikan(){
        $komputer = Komputer::where('id',request('id'))->first();
        $komputer->update([
            'id_peminjam' => NULL
        ]);
        $data = Data::find(request('id_peminjam'));
        $data->update([
            'STAT' => 2
        ]);
        $data->delete();

        return redirect()->route('komputer.index')->with('success','Status komputer telah berhasil di update!');
    }
}
