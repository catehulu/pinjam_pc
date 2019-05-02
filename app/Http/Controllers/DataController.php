<?php

namespace Pinjam\Http\Controllers;

use Illuminate\Http\Request;
use Pinjam\Data;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Mail;
use Pinjam\Mail\EmailDitolak;
use Pinjam\PeminjamBarang;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = Data::withTrashed()->orderBy('created_at','DESC')->paginate(10);
        $peminjams = PeminjamBarang::orderBy('created_at','DESC')->paginate(10);

        return view('data.index', compact('data','peminjams'));
    }

    public function readone($id)
    {

        $read = DB::table('data')->where('id',$id)->first();
        $komputer = DB::table('komputer')->where('id_peminjam',$id)->first();

        return view('data.readone', compact('read','komputer'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'NRP' => 'required|min:14|unique:data,NRP,NULL,id,deleted_at,NULL',
            'nama' => 'required',
            'No_Telp' => 'required',
            'Email' => 'required',
            'Dosbing' => 'required',
            'NIP' => 'required',
            'Awal_Reservasi' => 'required|before:Akhir_Reservasi',
            'Akhir_Reservasi' => 'required',
        ]);



        Data::create([
            'NRP' => request('NRP'),
            'nama' => request('nama'),
            'No_Telp' => request('No_Telp'),
            'Email' => request('Email'),
            'Dosbing' => request('Dosbing'),
            'NIP' => request('NIP'),
            'Awal_Reservasi' => request('Awal_Reservasi'),
            'Akhir_Reservasi' => request('Akhir_Reservasi')
        ]);

        return redirect()->route('data.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $read = DB::table('data')->orderBy('created_at','DESC')->first();

        return view('data.show', compact('read'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $stat)
    {
        $edit = Data::find($id);
        
        if($stat == 1){
            return redirect()->route('komputer.pilih',$edit->id);
        }
        else {
            $edit->update([
                'STAT' => $stat
            ]);
            // Mail::to($edit->Email)->send(new EmailDitolak($edit));
            $edit->delete();
        }

        return redirect()->route('data.index')->with('success','Perubahan Sudah di Terapkan');

    }

    public function upload(Request $request)
    {
        $validatedData = $request->validate([
            'NRP' => 'required|min:14|exists:data,NRP,deleted_at,NULL',
            'spesifikasi' => 'required',
            'kebutuhan' => 'required',
            'pdf' => 'required'
        ]);

        $filename = pathinfo($request->file('pdf')->getClientOriginalName(), PATHINFO_FILENAME);

        $uniqueFilename = $filename.'_'.$request->input('NRP').'.'.$request->file('pdf')->getClientOriginalExtension();

        $path = $request->file('pdf')->storeAs('public/filePDF',$uniqueFilename);

        $edit = Data::where('NRP',$request->input('NRP'))->first();
        $edit->update([
            'spesifikasi' => request('spesifikasi'),
            'kebutuhan' => request('kebutuhan'),
            'path' => $uniqueFilename
        ]);

        return redirect()->route('welcome')->with('success','File berhasil diinput,email mengenai keterangan lanjut akan dikirimkan secepatnya');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generatePDF($id)
    {
        $data = Data::where('id',$id)->first();
        $pdf = PDF::loadView('surat',compact('data'))->setPaper('A4');
        return $pdf->download('Surat Reservasi Komputer.pdf');
        //return view('surat',compact('data'));
    }
}
