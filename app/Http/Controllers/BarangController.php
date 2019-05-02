<?php

namespace Pinjam\Http\Controllers;

use Pinjam\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::paginate(10);
        return view("data.listinventaris",compact("barangs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.createinventaris');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = new Barang();
        $barang->nama = $request->input('nama');
        $barang->jumlah = $request->input('jumlah');
        $barang->keterangan = $request->input('keterangan');
        $barang->save();

        return redirect()->route('Barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Pinjam\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Pinjam\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        // dd($barang);
        return view('data.editinventaris',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Pinjam\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        // dd($barang);
        $barang->nama = $request->input('nama');
        $barang->jumlah = $request->input('jumlah');
        $barang->keterangan = $request->input('keterangan');
        $barang->save();

        return redirect()->route('Barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Pinjam\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        // dd($barang);
        $barang->delete();
        return redirect()->back();
    }
}
