<?php

namespace Pinjam\Http\Controllers;

use Pinjam\PeminjamBarang;
use Illuminate\Http\Request;
use Pinjam\Barang;
use PDF;
class PeminjamBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('data.create2',compact('barangs'));
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
            'NRP' => 'required',
            'nama' => 'required',
            'barang_id' => 'required',
            'jumlah' => 'required',
        ]);


        $barang = Barang::find($request->input('barang_id'));
        if ($barang->jumlah < $request->input('jumlah') ) {
            return redirect()->back()->with('error','Jumlah barang tidak tersedia');
        }

        $peminjamBarang = PeminjamBarang::create([
                'NRP' => request('NRP'),
                'nama' => request('nama'),
                'nama_barang' => $barang->nama,
                'jumlah' => request('jumlah')
            ]);

        return redirect()->route('peminjam.show',$peminjamBarang);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Pinjam\PeminjamBarang  $peminjamBarang
     * @return \Illuminate\Http\Response
     */
    public function show(PeminjamBarang $peminjamBarang)
    {
        return view('data.show2',compact("peminjamBarang"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Pinjam\PeminjamBarang  $peminjamBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(PeminjamBarang $peminjamBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Pinjam\PeminjamBarang  $peminjamBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PeminjamBarang $peminjamBarang)
    {    
        $stat = $request->input('STAT');
        $peminjamBarang->update([
            'STAT' => $stat
        ]);

        return redirect()->route('data.index')->with('success','Perubahan Sudah di Terapkan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Pinjam\PeminjamBarang  $peminjamBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeminjamBarang $peminjamBarang)
    {
        //
    }

    public function generatePDF(PeminjamBarang $peminjamBarang)
    {
        $pdf = PDF::loadView('surat2',compact('peminjamBarang'))->setPaper('A4');
        return $pdf->download('Surat Reservasi Komputer.pdf');
        //return view('surat',compact('data'));
    }

    public function upload(Request $request)
    {
        $validatedData = $request->validate([
            'NRP' => 'required',
            'barang_id' => 'required',
            'pdf' => 'required'
        ]);

        $barang = Barang::find($request->input('barang_id'));
        $filename = pathinfo($request->file('pdf')->getClientOriginalName(), PATHINFO_FILENAME);

        $uniqueFilename = $filename.'_'.$request->input('NRP').'_'.$barang->nama.'.'.$request->file('pdf')->getClientOriginalExtension();

        $path = $request->file('pdf')->storeAs('public/filePDF/inventaris',$uniqueFilename);

        $edit = PeminjamBarang::where('NRP',$request->input('NRP'))->where('nama_barang',$barang->nama)->first();
        // dd($edit);
        if (!$edit) {
            return redirect()->back()->withError('404','Data peminjaman tidak ditemukan!');
        }
        $edit->update([
            'path' => $uniqueFilename
        ]);

        return redirect()->route('welcome')->with('success','File berhasil diinput,email mengenai keterangan lanjut akan dikirimkan secepatnya');
    }
}
